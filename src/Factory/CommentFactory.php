<?php

namespace welly\PHPAlgorithms\Factory;

use welly\PHPAlgorithms\Helpers\Comment;

class CommentFactory implements FactoryInterface {

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
