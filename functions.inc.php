<?php /* $Id */

//  This is a module template replace all text between <<    >> with appropriate values
//  the word <<module>> is used in place of the actual module short name

if (!defined('FREEPBX_IS_AUTH')) { die('No direct script access allowed'); }
//This file is part of FreePBX.
//
//    This is free software: you can redistribute it and/or modify
//    it under the terms of the GNU General Public License as published by
//    the Free Software Foundation, either version 2 of the License, or
//    (at your option) any later version.
//
//    This module is distributed in the hope that it will be useful,
//    but WITHOUT ANY WARRANTY; without even the implied warranty of
//    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//    GNU General Public License for more details.
//
//    see <http://www.gnu.org/licenses/>.
//



//  Boilerplate to check for settings and return
function <<modulename>>_config() {
	$sql = "SELECT <<whatever>> FROM <<tablename>> WHERE <<columnname>> = 'whatever'";
	$results = sql($sql,"getAll",DB_FETCHMODE_ASSOC);
	return is_array($results)?$results:array();
}

// boilerplate to store settings
function <<modulename>>_edit($id,$post){
	global $db;

	$<<var1>> = $db->escapeSimple($post['<<column1>>']);
	$<<var2>> = $db->escapeSimple($post['<<column2>>']);


	$results = sql("
		UPDATE <<tablename>> 
		SET 
			<<column1>> = '$var1', 
			<<column2>> = '$var2', 
		WHERE <<indexcolumnname>> = '$id'");
}

//  It is critical that no characters (including LF) be outside the php tags, best to eliminate the final ?> altogether
?>
