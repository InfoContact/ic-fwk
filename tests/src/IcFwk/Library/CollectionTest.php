<?php

namespace InfoContact\IcFwk\Library;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2014-10-25 at 17:03:03.
 */
class CollectionTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Collection
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new Collection([
            "key1" => "value1",
            "key2" => "value2",
            "key3" => [
                "subkey1" => "subvalue1",
                "subkey2" => "subvalue2"
            ]
        ]);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers InfoContact\IcFwk\Library\Collection::get
     * @todo   Implement testGet().
     */
    public function testGet() {
        $this->assertEquals("value1", $this->object->get("key1"));
        $this->assertEquals("value2", $this->object->get("key2"));
        $this->assertEquals(new Collection(["subkey1" => "subvalue1","subkey2" => "subvalue2"]), $this->object->get("key3"));
        $this->assertEquals("subvalue2", $this->object->get("key3.subkey2"));
    }

    /**
     * @covers InfoContact\IcFwk\Library\Collection::set
     * @todo   Implement testSet().
     */
    public function testSet() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers InfoContact\IcFwk\Library\Collection::has
     * @todo   Implement testHas().
     */
    public function testHas() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers InfoContact\IcFwk\Library\Collection::lists
     * @todo   Implement testLists().
     */
    public function testLists() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers InfoContact\IcFwk\Library\Collection::extract
     * @todo   Implement testExtract().
     */
    public function testExtract() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers InfoContact\IcFwk\Library\Collection::join
     * @todo   Implement testJoin().
     */
    public function testJoin() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers InfoContact\IcFwk\Library\Collection::max
     * @todo   Implement testMax().
     */
    public function testMax() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers InfoContact\IcFwk\Library\Collection::offsetExists
     * @todo   Implement testOffsetExists().
     */
    public function testOffsetExists() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers InfoContact\IcFwk\Library\Collection::offsetGet
     * @todo   Implement testOffsetGet().
     */
    public function testOffsetGet() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers InfoContact\IcFwk\Library\Collection::offsetSet
     * @todo   Implement testOffsetSet().
     */
    public function testOffsetSet() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers InfoContact\IcFwk\Library\Collection::offsetUnset
     * @todo   Implement testOffsetUnset().
     */
    public function testOffsetUnset() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers InfoContact\IcFwk\Library\Collection::getIterator
     * @todo   Implement testGetIterator().
     */
    public function testGetIterator() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

}