<?php
# MantisBT - A PHP based bugtracking system

# MantisBT is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 2 of the License, or
# (at your option) any later version.
#
# MantisBT is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with MantisBT.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Edit Core Formatting Configuration
 * @package MantisBT
 * @copyright Copyright 2000 - 2002  Kenzaburo Ito - kenito@300baud.org
 * @copyright Copyright 2002  MantisBT Team - mantisbt-dev@lists.sourceforge.net
 * @link http://www.mantisbt.org
 */

auth_reauthenticate( );
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );

html_page_top( lang_get( 'plugin_format_title' ) );

print_manage_menu( );

?>

<br/>
<div class="form-container" style="width: 60%">

<form action="<?php echo plugin_page( 'config_edit' )?>" method="post">
<?php echo form_security_field( 'plugin_format_config_edit' ) ?>

<table>

<tr>
	<td class="form-title" colspan="3">
		<?php echo lang_get( 'plugin_format_title' ) . ': ' . lang_get( 'plugin_format_config' )?>
	</td>
</tr>

<tr>
	<th class="category" width="60%">
		<?php echo lang_get( 'plugin_format_process_text' )?>
		<br /><span class="small"><?php echo lang_get( 'plugin_format_process_text_warning_notice' )?></span>
	</th>
	<td class="center" width="20%">
		<label><input type="radio" name="process_text" value="1" <?php echo( ON == plugin_config_get( 'process_text' ) ) ? 'checked="checked" ' : ''?>/>
			<?php echo lang_get( 'plugin_format_enabled' )?></label>
	</td>
	<td class="center" width="20%">
		<label><input type="radio" name="process_text" value="0" <?php echo( OFF == plugin_config_get( 'process_text' ) ) ? 'checked="checked" ' : ''?>/>
			<?php echo lang_get( 'plugin_format_disabled' )?></label>
	</td>
</tr>

<tr>
	<th class="category">
		<?php echo lang_get( 'plugin_format_process_urls' )?>
	</th>
	<td class="center">
		<label><input type="radio" name="process_urls" value="1" <?php echo( ON == plugin_config_get( 'process_urls' ) ) ? 'checked="checked" ' : ''?>/>
			<?php echo lang_get( 'plugin_format_enabled' )?></label>
	</td>
	<td class="center">
		<label><input type="radio" name="process_urls" value="0" <?php echo( OFF == plugin_config_get( 'process_urls' ) ) ? 'checked="checked" ' : ''?>/>
			<?php echo lang_get( 'plugin_format_disabled' )?></label>
	</td>
</tr>

<tr>
	<th class="category">
		<?php echo lang_get( 'plugin_format_process_buglinks' )?>
		<br />
		<span class="small"><?php
			printf( lang_get( 'plugin_format_process_buglinks_info' ),
				config_get( 'bug_link_tag' ), config_get( 'bugnote_link_tag' ) );
		?></span>
	</th>
	<td class="center">
		<label><input type="radio" name="process_buglinks" value="1" <?php echo( ON == plugin_config_get( 'process_buglinks' ) ) ? 'checked="checked" ' : ''?>/>
			<?php echo lang_get( 'plugin_format_enabled' )?></label>
	</td>
	<td class="center">
		<label><input type="radio" name="process_buglinks" value="0" <?php echo( OFF == plugin_config_get( 'process_buglinks' ) ) ? 'checked="checked" ' : ''?>/>
			<?php echo lang_get( 'plugin_format_disabled' )?></label>
	</td>
</tr>

</table>

<div class="submit-button">
	<input type="submit" class="button" value="<?php echo lang_get( 'change_configuration' )?>" />
</div

</form>

</div>

<?php
html_page_bottom();
