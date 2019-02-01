<?php

namespace welly\PHPAlgorithms\Utils;

/**
 * Class InMemoryPersistence
 *
 * @package welly\PHPAlgorithms\Utils
 */
class InMemoryPersistence implements PersistenceInterface {

  private $data = [];

  /**
   * {@inheritdoc}
   */
  function persist($data) {
    $this->data[] = $data;
  }

  /**
   * {@inheritdoc}
   */
  function retrieve($id) {
    return $this->data[$id];
  }

  function retrieveAll() {
    return $this->data;
  }
}
