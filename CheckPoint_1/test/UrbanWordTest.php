<?php
  require '../src/UrbanWord.php';
  class UrbanWordTest extends PHPUnit_Framework_TestCase
  {
      private $_testClass;

      public function setUp()
      {
          $this->_testClass = new UrbanWord();
      }

      public function testClassHasPropertyBuild()
      {
          $this->assertClassHasStaticAttribute('data', get_class($this->_testClass), 'Should have static attribute data in class');
      }
  }
