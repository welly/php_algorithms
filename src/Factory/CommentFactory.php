<?php

namespace welly\PHPAlgorithms\Factory;

use welly\PHPAlgorithms\Models\Comment;

/**
 * Class CommentFactory
 *
 * @package welly\PHPAlgorithms\Factory
 */
class CommentFactory implements FactoryInterface {

  /**
   * @inheritdoc
   */
  function make(array $configuration) {
    return new Comment(
      $configuration[0],
      $configuration[1],
      $configuration[2],
      $configuration[3],
      $configuration[4]
    );
  }
}
