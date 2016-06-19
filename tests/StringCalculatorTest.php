<?php

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-06-18 at 10:08:58.
 */

require __DIR__ . "/../StringCalculator.php";

class StringCalculatorTest extends PHPUnit_Framework_TestCase {

    /**
     * @var StringCalculator
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new StringCalculator;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * 1. Test to create a simple String calculator with a method int Add
     */
    public function testIsEmpty(){
        $this->assertEquals(0,$this->object->Add(""));
    }
    public function testOneNumber(){
        $this->assertEquals(1,$this->object->Add("1"));
    }
    public function testTwoNumbers(){
        $this->assertEquals(3,$this->object->Add("1,2"));
    }
    
    /**
     * 2. Test to allow the Add method to handle an unknown amount of numbers
     */
    public function testUnknownAmountOfNumbers(){
        $this->assertEquals(15, $this->object->Add("1,2,5,4,3"));
    }
    
    /**
     * 3. Test to allow the Add method to handle new lines between numbers (instead of commas)
     */
    public function testExistingNewlines(){
        $this->assertEquals(6, $this->object->Add("1\n2,3"));
    }
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionCode 100
     */
    public function testInvalidExistingNewlines(){
        $this->object->Add("1,\n");
    }
    
    /**
     * 4. Test to support different delimiters
     */
    public function testDifferentDelimiters(){
        $this->assertEquals(3, $this->object->Add("//;\n1;2"));
    }
    
    /**
     * 5. Calling Add with a negative number will throw an exception “negatives not allowed”
     */
    public function testNegativeNumbers(){
        $this->setExpectedException(
          'InvalidArgumentException', 'Negatives not allowed. Invalid values: -1,-2', 100
        );
        $this->object->Add("//;\n-1;-2;5");
    }
    
    /**
     * 6. Numbers bigger than 1000 should be ignored
     */
    public function testIgnoreBiggerAllowedNumber(){
        $this->assertEquals(902, $this->object->Add("//*\n10001*2*900"));
    }
    
    /**
     * 7. Delimiters can be of any length
     */
    public function testLongLengthDelimiter(){
        $this->assertEquals(6, $this->object->Add("//[***]\n1***2***3"));
    }
}
