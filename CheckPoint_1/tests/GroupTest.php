<?php namespace CZ4\Tests;

use CZ4\Dictionary\Group;

class GroupTest extends \PHPUnit_Framework_TestCase
{
    protected $actualString;
    protected $resultArray;

    public function setUp()
    {
        $this->actualString = 'Prosper has finished the curriculum and he will submit it to Nadayar. Tight Tight Tight';
        $this->resultArray =
        [
            'Tight'     => 3, 'submit'      => 1, 'it'      => 1,
            'Nadayar'   => 1, 'will'        => 1, 'to'      => 1,
            'he'        => 1, 'finished'    => 1, 'has'     => 1,
            'the'       => 1, 'curriculum'  => 1, 'and'     => 1,
            'Prosper'   => 1,
        ];
    }
    /**
    * @expectedException InvalidArgumentException
    * @expectedExceptionMessage You cannot pass null as the argument
    */
    public function testNullArgumentException()
    {
        Group::build();
    }

    /**
    * @expectedException InvalidArgumentException
    * @expectedExceptionMessage This function only accepts strings
    */
    public function testNonStringArgumentException()
    {
        Group::build(123);
    }

    public function testEmptyStringArgumentReturnEmptyArray()
    {
        $this->assertEmpty(Group::build(''), 'Method should return empty array for empty string argument');
    }

    public function testCorrectReturnCount()
    {
        $this->assertCount(13, Group::build($this->actualString), 'Test Should Return the Correct Count');
    }

    public function testReturnTypeIsArray()
    {
        $this->assertInternalType('array', Group::build($this->actualString), 'Return Type Should be an array');
    }

    public function testReturnValue()
    {
        $this->assertEquals(
            Group::build($this->actualString),
            $this->resultArray,
            'Should return the correct array as output'
        );
    }
}
