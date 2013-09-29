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
 * Prepare API
 *
 * Handles preparation of strings prior to be printed or stored.
 *
 * @package CoreAPI
 * @subpackage PrepareAPI
 * @copyright Copyright 2000 - 2002  Kenzaburo Ito - kenito@300baud.org
 * @copyright Copyright 2002  MantisBT Team - mantisbt-dev@lists.sourceforge.net
 * @link http://www.mantisbt.org
 *
 * @uses access_api.php
 * @uses config_api.php
 * @uses constant_inc.php
 * @uses string_api.php
 * @uses user_api.php
 * @uses version_api.php
 */

require_api( 'access_api.php' );
require_api( 'config_api.php' );
require_api( 'constant_inc.php' );
require_api( 'string_api.php' );
require_api( 'user_api.php' );
require_api( 'version_api.php' );

/**
 * prepares the name of the user given the id.  also makes it an email link.
 * @param int $p_user_id
 * @return string
 */
function prepare_user_name( $p_user_id ) {
	# Catch a user_id of NO_USER (like when a handler hasn't been assigned)
	if( NO_USER == $p_user_id ) {
		return '';
	}

	$t_username = user_get_name( $p_user_id );
	$t_username = string_display_line( $t_username );
	if( user_exists( $p_user_id ) && user_get_field( $p_user_id, 'enabled' ) ) {
		return '<a class="user" href="' . string_sanitize_url( 'view_user_page.php?id=' . $p_user_id, true ) . '">' . $t_username . '</a>';
	} else {
		return '<del class="user">' . $t_username . '</del>';
	}
}