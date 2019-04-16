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
 * Block to ai courses by filter out course name and description.
 *
 * @package    block_ai_course2
 * @copyright  3i Logic<lms@3ilogic.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 */

/**
 * Display text box in block
 * @return string
 */
class block_ai_course2 extends block_base {

    /**
     * Initialize title
     * @return null
     */
    public function init() {
        $this->title = get_string('ai_course2', 'block_ai_course2');
    }

    /**
     * Initialize content which will display on block
     * @return string
     */
    public function get_content() {
        global $CFG, $OUTPUT;

        if ($this->content !== null) {
            return $this->content;
        }
        // Block Variable.
        $strgo = get_string('go');
        // Body of Block.
        $this->content = new stdClass;
        $this->content->text = '';
        $this->content->text .= '<form action="' . $CFG->wwwroot . '/blocks/ai_course2/view.php">';
        $this->content->text .= '<input id="aiform_ai" name="ai" type="text" size="16" />';
        $this->content->text .= '<button id="aiform_button" type="submit" title="ai">' . $strgo . '</button><br />';
        $this->content->text .= '<a href="' . $CFG->wwwroot . '/blocks/ai_course2/view.php" title="ai">Add Filters</button><br />';
        $this->content->text .= '</form>';
        return $this->content;
    }

}
