<?php
  require("../src/UrbanDictionary.php");
  class UrbanDictionaryTest extends PHPUnit_Framework_TestCase{
    private $_slang;
    private $_description;
    private $_sentence;
    private $_dictionary;
    private $_result;

    /**
     * @before
     */
    public function setUp(){
      $this->_slang = "Dope";
      $this->_description = "A really good noun";
      $this->_sentence = "This is a dope food";
      $this->_dictionary = new UrbanDictionary();
      UrbanWord::$data = array();
      $this->_result = $this->_dictionary->create($this->_slang, $this->_description, $this->_sentence);
    }

    public function testCreate(){
      $this->assertNotEmpty(UrbanWord::$data, "Should Create and add to UrbanWord");
      $this->assertCount(1, UrbanWord::$data, "Should also have the correct number of elemenets");
      $this->assertTrue($this->_result, "Should Return True if added to list");
    }

    public function testGet(){
      $result = $this->_dictionary->get("Dope");
      $this->assertInternalType('array', $result, "should test that return type is correct");
      $this->assertEquals("Dope", $result['slang'], 'should return the correct slang value');
    }

    public function testGetDescription(){
      $result = $this->_dictionary->get("Dope")['description'];
      $this->assertEquals("A really good noun", $result, 'should return the correct description value');
    }

    public function testGetSentenceExample(){
      $result = $this->_dictionary->get("Dope")['example-sentence'];
      $this->assertEquals("This is a dope food", $result, 'should return the correct "Sentence example" value');
    }

    public function testUpdate(){
      $dictionary = $this->_dictionary;
      $result = $dictionary->update("Dope", array("slang"=>"Bam Bam"));
      $newValue = $dictionary->get("Bam Bam");


      $this->assertEquals($newValue['slang'], 'Bam Bam');
      $this->assertNull($dictionary->get('Dope'));
    }

    public function testDelete(){
      $dictionary = $this->_dictionary;
      $returnValue = $dictionary->delete('Dope');
      $this->assertNull($dictionary->get('Dope'));
      $this->assertTrue($returnValue);
    }
  }
