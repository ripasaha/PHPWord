<?php
namespace PHPWord\Tests;

use PHPUnit_Framework_TestCase;
use PHPWord;
use PHPWord_Writer_Word2007;
use PHPWord_Writer_Word2007_Document;

/**
 * Class PHPWord_Writer_Word2007_DocumentTest
 * @package PHPWord\Tests
 * @runTestsInSeparateProcesses
 */
class PHPWord_Writer_Word2007_DocumentTest extends \PHPUnit_Framework_TestCase {
  /**
   * Executed before each method of the class
   */
  public function tearDown()
  {
    TestHelperDOCX::clear();
  }

  public function testWriteEndSection_PageNumbering()
  {
    $PHPWord = new PHPWord();
    $section = $PHPWord->createSection();
    $section->getSettings()->setPageNumberingStart(2);

    $doc = TestHelperDOCX::getDocument($PHPWord);
    $element = $doc->getElement('/w:document/w:body/w:sectPr/w:pgNumType');

    $this->assertEquals(2, $element->getAttribute('w:start'));
  }
}
 