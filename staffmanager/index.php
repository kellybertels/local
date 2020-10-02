<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
//###References####: 
/* Reference for the data Bellow: Book: "moodle 3.1 LTS modules development by Tomasz Muras
//$CFG - defined in config.php as stdClass6 contains various Moodle configuration variables.
Some will be defined in config.php but most will be fetched from database, mdl_config table
during initialization (function initialise_cfg() from lib/setuplib.php does the job).
//$DB - provides access to database API methods, currently supported drivers are pgsql, mariadb,
mysqli, mssql, sqlsrv and ocilib - all defined in lib/dml/*_native_moodle_database.php
//$USER - access to current user’s information. Just like with $SESSION, it’s initialized by
core\session\manager and stored in $_SESSION[‘USER’]. */

//the config file is two folders above this one, 
require_once '../../config.php';
//Those are the global setting that we will use from the config file
global $USER,$DB,$CFG;

//using the variable $PAGE moodle knows what an url is and where it is 
$PAGE->set_url('/local/staffmanager/index.php');
$PAGE->set_context(context_system::instance());
$PAGE->requires->js('/local/staffmanager/assets/staffmanager.js');

require_login();
$month = optional_param('month','',PARAM_TEXT);
$year = optional_param('year','',PARAM_TEXT);

$obj = new stdClass();
$obj->month = (int)$month;
$obj->year = (int)$year;


//the title of this page:it is using the language file to set this value. 
$strpagetitle = get_string('staffmanager', 'local_staffmanager');
$strpageheading = get_string('staffmanager', 'local_staffmanager');
//this will use the strpagetitle to set the title inside the page, in moodle this is how the title is set inside the page. 
$PAGE->set_title($strpagetitle);
$PAGE->set_heading($strpageheading);



//this is outputing the standard header from moodle
echo $OUTPUT->header();
echo $OUTPUT->render_from_template('local_staffmanager/searchbar', $obj);
echo $OUTPUT->render_from_template('local_staffmanager/searchresults', $obj);

echo $OUTPUT->footer();

