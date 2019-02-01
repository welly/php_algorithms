<?php

namespace welly\PHPAlgorithms\Utils;

/**
 * Class InMemoryPersistence
 *
 * @package welly\PHPAlgorithms\Utils
 */
class InMemoryPersistence implements Persistence {

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

}
