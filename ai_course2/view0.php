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

/**
 * Block to display enrolled, completed, inprogress and undefined courses according to course completion criteria named 'grade' based on login user.
 *
 * @package    block_ai_course2
 * @copyright  3i Logic<lms@3ilogic.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 */
require_once('../../config.php');
require_once('course_form.php');
require_once('lib.php');
require_login();
global $DB, $OUTPUT, $PAGE, $CFG, $USER;
$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_pagelayout('standard');
$PAGE->set_title(get_string("pluginname", 'block_ai_course'));
$PAGE->set_heading('Course Finder');
$pageurl = '/blocks/ai_course/view.php';
$PAGE->set_url($pageurl);
$PAGE->navbar->ignore_active();
$PAGE->navbar->add(get_string("pluginname", 'block_ai_course'));

echo $OUTPUT->header();

$form = new course_ai_form();
$ai = optional_param('ai', null, PARAM_RAW);
$toform['ai'] = $ai;
$form->set_data($toform);
$form->display();

if ($fromform = $form->get_data()) {
    $aiquery = "Select id from {course} WHERE";
    if ($fromform->ai != "")
        $aiquery .= " fullname LIKE '%" . $fromform->ai . "%'";
    if ($fromform->description == false)
        $aiquery .= " OR summary LIKE '%" . $fromform->ai . "%'";
    /*else {
        $aiquery .= " fullname LIKE '%" . $fromform->ai . "%'";
    }*/
    if ($fromform->description == true)
        $aiquery .= " OR summary LIKE '%" . $fromform->ai . "%'";
    if ($fromform->aifromtime != 0)
        $aiquery .= " AND startdate >= " . $fromform->aifromtime . "";
    if ($fromform->aitilltime != 0)
        $aiquery .= " AND enddate  <= " . $fromform->aitilltime . "";
    if ($fromform->courseformat != "")
        $aiquery .= " AND format  = '" . $fromform->courseformat . "'";
    if ($fromform->completioncriteria >= 0 && isset($fromform->completioncriteria))
        $aiquery .= " AND enablecompletion  = " . $fromform->completioncriteria . "";
    if ($fromform->sortmenu != "")
        $aiquery .= " ORDER BY " . $fromform->sortmenu;
    $courses = $DB->get_records_sql($aiquery, null);
    echo getCourses($courses);
}

echo $OUTPUT->footer();
