<?php

namespace welly\PHPAlgorithms\Repository;

use welly\PHPAlgorithms\Helpers\Comment;
use welly\PHPAlgorithms\Utils\InMemoryPersistence;
use welly\PHPAlgorithms\Utils\PersistenceInterface;

class CommentRepository {

  private $persistence;

  public function __construct(PersistenceInterface $persistence = NULL) {
    $this->persistence = $persistence ?: new InMemoryPersistence();
  }

  public function add(Comment $comment) {
    $this->persistence->persist([
      $comment->getPostId(),
      $comment->getAuthor(),
      $comment->getAuthorEmail(),
      $comment->getSubject(),
      $comment->getBody()
    ]);
  }
}
