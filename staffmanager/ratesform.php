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
$obj = $DB->get_record('local_staffmanager_rates', ['id'=>$id]);
$obj->month = $fromform->month;
$obj->year = $fromform->year;
$obj->assignmentrate = $fromform->assignmentrate;
$obj->quizrate = $fromform->quizrate;
$DB->update_record('local_staffmanager_rates', $obj);

    //if there is not id else
}else{
//no id then add new record
$obj = new stdClass();
$obj->month = $fromform->month;
$obj->year = $fromform->year;
$obj->assignmentrate = $fromform->assignmentrate;
$obj->quizrate = $fromform->quizrate;
$orgid = $DB->insert_record('local_staffmanager_rates', $obj, true, false);
}
 // redirect to units page with qual id
 redirect("/local/staffmanager/rates.php?id=$id", 'Changes saved', 10,  \core\output\notification::NOTIFY_SUCCESS);

} else {
    // this branch is executed if the form is submitted but the data doesn't validate and the form should be redisplayed
    // or on the first display of the form.
    if ($id) {
        $toform = $DB->get_record('local_staffmanager_rates', ['id'=>$id]);
    }
    //Set default data (if any)
    $mform->set_data($toform);

    echo $OUTPUT->header();
    $mform->display();

    echo $OUTPUT->footer();
}