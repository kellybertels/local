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

require_once('../../config.php');
global $USER, $DB, $CFG;
$PAGE->set_url('/local/staffmanager/rates.php');
$PAGE->set_context(context_system::instance());

$id= optional_param('id', '', PARAM_TEXT);

require_login();

require_once("forms/rates.php");

$strpagetitle = get_string('staffmanager', 'local_staffmanager');
$strpageheading = get_string('rates', 'local_staffmanager');

$PAGE->set_title($strpagetitle);
$PAGE->set_heading($strpageheading);

$mform =new rates_form();
$toform = [];

if($mform->is_cancelled())
{
    //handle form cancel operation
    redirect("/local/staffmanager/rates.php",'',10);
//if the form isnt cancel, and there is data to submit on it it goes to else if
}elseif($fromform = $mform->get_data()){

    //but to submit it will just if it has an id (if estatement bellow)
if($id){
//has id then update

    //if there is not id else
}else{
//no id then add new record
}

}