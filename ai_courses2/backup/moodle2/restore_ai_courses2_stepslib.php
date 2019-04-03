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
 * All the steps to restore block_ai_courses2 are defined here.
 *
 * @package     block_ai_courses2
 * @category    restore
 * @copyright   2018 Debonair Training <greg@debonairtraining.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// For more information about the backup and restore process, please visit:
// https://docs.moodle.org/dev/Backup_2.0_for_developers
// https://docs.moodle.org/dev/Restore_2.0_for_developers

/**
 * Defines the structure step to restore one ai_courses2 block.
 */
class restore_ai_courses2_block_structure_step extends restore_structure_step {

    /**
     * Defines the structure to be restored.
     */
    protected function define_structure() {

        $paths = array();

        return $paths;
    }

    /**
     * Defines post-execution actions.
     */
    protected function after_execute() {

        return;
    }
}
