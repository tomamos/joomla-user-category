<?php
/**
 * @package     mod_users_category
 *
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Helper for mod_users_category
 *
 * @package     Joomla.Site
 * @subpackage  mod_users_category
 *
 * @since       1.6
 */
class ModUsersCategoryHelper
{
	public static function getUsers($params)
	{
		$db		= JFactory::getDbo();
		$query	= $db->getQuery(true)
			->select($db->quoteName(array('a.id', 'a.name', 'a.username')))
			->from('#__users AS a')
			->join('INNER', $db->quoteName('#__user_usergroup_map', 'b') . ' ON (' . $db->quoteName('a.id') . ' = ' . $db->quoteName('b.user_id') . ')')
			->join('INNER', $db->quoteName('#__usergroups', 'c') . ' ON (' . $db->quoteName('b.group_id') . ' = ' . $db->quoteName('c.id') . ')')
//            ->where('b.group_id = ' . $db->Quote('13'))
            ->where('c.id = ' . $db->Quote($params))
			->order($db->quoteName('a.name') . ' ASC');
		$user = JFactory::getUser();
		
//		$db->setQuery($query, 0, $params->get('shownumber'));
		$db->setQuery($query, 0);

		try
		{
			return (array) $db->loadObjectList();
		}
		catch (RuntimeException $e)
		{
			JFactory::getApplication()->enqueueMessage(JText::_('JERROR_AN_ERROR_HAS_OCCURRED'), 'error');

			return array();
		}
	}
}
