<?php /* $Id */

//  This is a module template replace all text between <<    >> with appropriate values
//  the word <<module>> is used in place of the actual module short name
//  this file must be renamed to page.<<moduleshortname>>.php

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

// generic function that checks installed Asterisk version is greater/equal to 1.6
$ast_ge_16 = version_compare($amp_conf['ASTVERSION'], "1.6", "ge");

//used for switch on config.php set var to module short name
$dispnum = "<<moduleshortname"; 

// check form and define var for form action
isset($_REQUEST['action'])?$action = $_REQUEST['action']:$action='';


//if submitting form, update database
if(isset($_POST['action'])) {
	switch ($action) {
		case "add":
			cidlookup_add($_POST);
			needreload();
			redirect_standard();
		break;
		case "delete":
			cidlookup_del($itemid);
			needreload();
			redirect_standard();
		break;
		case "edit":
			cidlookup_edit($itemid,$_POST);
			needreload();
			redirect_standard('itemid');
		break;
	}
}

//  to add right navigation menu enclose output in <div class="rnav"> </div>
echo '<div class="rnav">';
echo "menu items";
echo '</div>';
	
?>

