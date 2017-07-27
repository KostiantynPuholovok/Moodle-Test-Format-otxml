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
 * Code for exporting questions as Moodle XML.
 *
 * @package    qformat_xml
 * @copyright  1999 onwards Martin Dougiamas {@link http://moodle.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/xmlize.php');
if (!class_exists('qformat_xml')) {
    // This is ugly, but this class is also (ab)used by mod/lesson, which defines
    // a different base class in mod/lesson/format.php. Thefore, we can only
    // include the proper base class conditionally like this. (We have to include
    // the base class like this, otherwise it breaks third-party question types.)
    // This may be reviewd, and a better fix found one day.
    require_once($CFG->dirroot . '/question/format/xml/format.php');
}


/**
 * Importer for OpenTest XML question format.
 *
 * See http://docs.moodle.org/en/Moodle_XML_format for a description of the format.
 *
 * @copyright  1999 onwards Martin Dougiamas {@link http://moodle.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class qformat_otxml extends qformat_xml {

public function importpreprocess(){
// LOAD XML file
    $xml = new DOMDocument( '1.0', 'UTF-8' );
    $xml->load($this->filename);
echo "Load base xml";

// LOAD XSLT file
    $xsl = new DOMDocument( '1.0', 'UTF-8' );
    $xsl->load('./format/otxml/OpenTest2Moodle.xslt');

// START and Setting XSLT Transform
    $proc = new XSLTProcessor();
    $proc->importStyleSheet($xsl); // add style's xsl

    $xml = $proc->transformToDOC($xml);

// Save XML file
    $xml->save($this->filename);

    return true;
}

protected function presave_process($content) {
// LOAD XML file
	$xml = new DOMDocument( '1.0', 'UTF-8' ) ;
	$xml->loadXML('<?xml version="1.0" encoding="UTF-8"?><quiz>' . $content . '</quiz>');
	$xml->preserveWhiteSpace = false; 
	$xml->formatOutput = true;
// LOAD XSLT file
	$xsl = new DOMDocument( '1.0', 'UTF-8' );
	$xsl->load('./question/format/otxml/Moodle2OpenTest.xslt');
	$xsl->preserveWhiteSpace = false;
	$xsl->formatOutput = true;

// START and Setting XSLT Transform
	$proc = new XSLTProcessor;
	$proc->importStyleSheet($xsl); // add style's xsl

	$xml = $proc->transformToDOC($xml);
	$xml->preserveWhiteSpace = false;
	$xml->formatOutput = true;
	$xml->encoding = 'UTF-8';

    return $xml->saveXML();
}

}
