<?php

namespace welly\PHPAlgorithms\Repository;

use welly\PHPAlgorithms\Factory\CommentFactory;
use welly\PHPAlgorithms\Models\Comment;
use welly\PHPAlgorithms\Utils\InMemoryPersistence;
use welly\PHPAlgorithms\Utils\PersistenceInterface;

/**
 * Class CommentRepository
 *
 * @package welly\PHPAlgorithms\Repository
 */
class CommentRepository {

  protected $commentFactory;
  protected $persistence;

  /**
   * CommentRepository constructor.
   *
   * @param \welly\PHPAlgorithms\Utils\PersistenceInterface|NULL $persistence
   * @param \welly\PHPAlgorithms\Repository\Factory|NULL $factory
   */
  public function __construct(PersistenceInterface $persistence = NULL, Factory $factory = NULL) {
    $this->commentFactory = $factory ?: new commentFactory();
    $this->persistence = $persistence ?: new InMemoryPersistence();
  }

  /**
   * @param $commentData
   */
  public function add($commentData) {

    if ($commentData instanceof Comment) {
      $this->addComment($commentData);
    }

    if (is_array($commentData)) {
      foreach ($commentData as $comment) {
      $this->addComment($comment);
      }
    }
  }

  /**
   * @param \welly\PHPAlgorithms\Models\Comment $comment
   */
  private function addComment(Comment $comment) {
    $this->persistence->persist([
      $comment->getPostId(),
      $comment->getAuthor(),
      $comment->getAuthorEmail(),
      $comment->getSubject(),
      $comment->getBody()
    ]);
  }

  /**
   * @param $id
   *
   * @return array
   */
  public function get($id) {
    return array_values(
      array_filter($this->getAll(), function ($comment) use ($id) {
        return $comment->getPostId() == $id;
      })
    );
  }

  /**
   * @return array
   */
  public function getAll() {
    $persistence_data = $this->persistence->retrieveAll();
    $comments = [];
    foreach ($persistence_data as $item) {
      $comments[] = $this->commentFactory->make($item);
    }
    return $comments;
  }

}
