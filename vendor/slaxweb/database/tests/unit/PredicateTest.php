<?php
namespace SlaxWeb\Database\Test\Unit;

use SlaxWeb\Database\Query\Where\Predicate;

/**
 * Where Statement Predicate Tests
 *
 * The Where Statement Predicate defines a Column, a value, and an comparison operator
 * for the SQL DML predicate. Its test ensures that the methods work as they should
 * and they produce proper WHERE predicates.
 *
 * @package   SlaxWeb\Database
 * @author    Tomaz Lovrec <tomaz.lovrec@gmail.com>
 * @copyright 2016 (c) Tomaz Lovrec
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://github.com/slaxweb/
 * @version   0.4
 */
class PredicateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Predicate object
     *
     * @var \SlaxWeb\Database\Query\Where\Predicate
     */
    protected $_predicate = null;

    protected function setUp()
    {
        $this->_predicate = (new Predicate)
            ->setColumn("\"bar\"");
    }

    protected function tearDown()
    {
    }

    /**
     * Test convert
     *
     * Test the conversion method that it successfuly converts the set Predicate
     * data to a correct SQL DML predicate. The test also ensures that all the comparison
     * operators that need to be handled differently, than a stanrdard "is equal"
     * operator, are handled correctly, and the conversion is done wihout error.
     *
     * @return void
     */
    public function testConvert()
    {
        $this->_predicate->setValue(1);
        $this->_predicate->setOperator(Predicate::OPR_EQUAL);
        $this->assertEquals("\"foo\".\"bar\" = ?", $this->_predicate->convert("\"foo\""));
        $this->assertEquals([1], $this->_predicate->getParams());

        $this->setUp();
        $this->_predicate->setValue("foo");
        $this->_predicate->setOperator(Predicate::OPR_EQUAL);
        $this->assertEquals("\"foo\".\"bar\" = ?", $this->_predicate->convert("\"foo\""));
        $this->assertEquals(["foo"], $this->_predicate->getParams());

        $this->setUp();
        $this->_predicate->setValue(null);
        $this->assertEquals("\"foo\".\"bar\" IS NULL", $this->_predicate->convert("\"foo\""));
        $this->assertEquals([], $this->_predicate->getParams());

        $this->setUp();
        $this->_predicate->setValue([1, 100]);
        $this->_predicate->setOperator(Predicate::OPR_BTWN);
        $this->assertEquals("\"foo\".\"bar\" BETWEEN ? AND ?", $this->_predicate->convert("\"foo\""));
        $this->assertEquals([1, 100], $this->_predicate->getParams());

        $this->setUp();
        $this->_predicate->setValue([1, 2, 3, 4]);
        $this->_predicate->setOperator(Predicate::OPR_IN);
        $this->assertEquals("\"foo\".\"bar\" IN (?,?,?,?)", $this->_predicate->convert("\"foo\""));
        $this->assertEquals([1, 2, 3, 4], $this->_predicate->getParams());
    }
}
