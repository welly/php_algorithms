<?php

use welly\PHPAlgorithms\Repository\InMemoryPersistence;

class InMemoryPersistenceTest extends PHPUnit\Framework\TestCase {

  function testItCanPersistAndRetrieveASingleDataArray() {
    $data = array('data');

    $persistence = new InMemoryPersistence();
    $persistence->persist($data);

    $this->assertEquals($data, $persistence->retrieve(0));
  }
}
