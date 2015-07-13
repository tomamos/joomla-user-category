<?php
/**
 * @package     mod_users_category
 *
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include the latest functions only once
require_once __DIR__ . '/helper.php';

//$shownumber = $params->get('shownumber', 5);
$usercat = $params->get('title', '17');
//$names	= ModUsersCategoryHelper::getUsers($params, $usercat);
$names	= ModUsersCategoryHelper::getUsers($usercat);
$linknames = $params->get('linknames', 0);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_users_category', $params->get('layout', 'default'));
