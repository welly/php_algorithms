<?php

namespace welly\PHPAlgorithms\Factory;

use welly\PHPAlgorithms\Helpers\Comment;

class CommentFactory implements Factory {

  function make($data) {
    return new Comment($data[0], $data[1], $data[2], $data[3], $data[4]);
  }
}
