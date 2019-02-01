<?php

use PHPUnit\Framework\TestCase;
use welly\PHPAlgorithms\Utils\InMemoryPersistence;

class InMemoryPersistenceTest extends TestCase {

  /**
   * Testing InMemoryPersistence class to see if it can store and retrieve data.
   */
  function testItCanPersistAndRetrieveASingleDataArray() {
    $data = array('data');

    $persistence = new InMemoryPersistence();
    $persistence->persist($data);

    $this->assertEquals($data, $persistence->retrieve(0));
  }

  /**
   * Testing InMemoryPersistence class to see if it can store/retrieve multiple
   * data values.
   */
  function testItCanPerisistSeveralElementsAndRetrieveAnyOfThem() {
    $data1 = array('data1');
    $data2 = array('data2');

    $persistence = new InMemoryPersistence();
    $persistence->persist($data1);
    $persistence->persist($data2);

    $this->assertEquals($data1, $persistence->retrieve(0));
    $this->assertEquals($data2, $persistence->retrieve(1));
  }

}
