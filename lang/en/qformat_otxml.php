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
 * Strings for component 'qformat_otxml', language 'en', branch 'MOODLE_33_STABLE'
 *
 * @package    qformat_otxml
 * @copyright  1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @copyright  2017 onwards CTDL, National University of Radio-Electronics  {@link http://ctdl.nure.ua}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['invalidxml'] = 'Invalid XML file - string expected (use CDATA?)';
$string['pluginname'] = 'OpenTest XML format (Test-mode)';
$string['pluginname_help'] = 'This is a OpenTest-specific format for importing and exporting questions. The plugin is build on the basis of the standard Moodle XML format plugin. Please contact <a href="mailto:ctdl-staff@nure.ua">ctdl-staff@nure.ua</a> with concerns or bugs.';
$string['pluginname_link'] = 'qformat/otxml';
$string['truefalseimporterror'] = '<b>Warning</b>: The true/false question \'{$a->questiontext}\' could not be imported properly. It was not clear whether the correct answer is true or false. The question has been imported assuming that the answer is \'{$a->answer}\'. If this is not correct, you will need to edit the question.';
$string['unsupportedexport'] = 'Question type {$a} is not supported by XML export';
$string['xmlimportnoname'] = 'Missing question name in XML file';
$string['xmlimportnoquestion'] = 'Missing question text in XML file';
$string['xmltypeunsupported'] = 'Question type {$a} is not supported by XML import';
