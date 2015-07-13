<?php
/**
 * @package     mod_users_category
 *
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<?php if (!empty($names)) : ?>
	<ul class="latestusers uk-nav uk-nav-parent-icon uk-nav-side<?php echo $moduleclass_sfx ?>" >
	<?php foreach ($names as $name) : ?>
		<li>
			<a href="/people/my-profile/userprofile/<?php echo str_replace('.', '_', $name->username); ?>">
<!--			<img src="/images/staff/annette_unsworth.jpg" height="75px" width="75px" /><br />--><p>
				<?php echo $name->name; ?>
			</p>
			</a>
		</li>
	<?php endforeach;  ?>
	</ul>
<?php endif; ?>
