<?php

namespace welly\PHPAlgorithms\Helpers;

/**
 * Class Comment
 *
 * @package welly\PHPAlgorithms\Helpers
 */
class Comment {

  private $postId;
  private $author;
  private $authorEmail;
  private $subject;
  private $body;

  /**
   * Comment constructor.
   *
   * @param $postId
   * @param $author
   * @param $authorEmail
   * @param $subject
   * @param $body
   */
  public function __construct($postId, $author, $authorEmail, $subject, $body) {
    $this->postId = $postId;
    $this->author = $author;
    $this->authorEmail = $authorEmail;
    $this->subject = $subject;
    $this->body = $body;
  }

  /**
   * @return mixed
   */
  public function getPostId() {
    return $this->postId;
  }

  /**
   * @return mixed
   */
  public function getAuthor() {
    return $this->author;
  }

  /**
   * @return mixed
   */
  public function getAuthorEmail() {
    return $this->authorEmail;
  }

  /**
   * @return mixed
   */
  public function getSubject() {
    return $this->subject;
  }

  /**
   * @return mixed
   */
  public function getBody() {
    return $this->body;
  }

}
