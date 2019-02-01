<?php

namespace welly\PHPAlgorithms\Repository;

class InMemoryPersistence implements Persistence {

  private $data = [];

  /**
   * {@inheritdoc}
   */
  function persist($data) {
    $this->data = $data;
  }

  /**
   * {@inheritdoc}
   */
  function retrieve($id) {
    return $this->data;
  }
}
