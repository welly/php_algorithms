<?php

use PHPUnit\Framework\TestCase;
use welly\PHPAlgorithms\Factory\CommentFactory;

class CommentFactoryTest extends TestCase {

  function testValidComment() {
    $postId = 1;
    $commentAuthor = "Joe";
    $commentAuthorEmail = "joe@example.com";
    $commentSubject = "Joe Has an Opinion about the Repository Pattern";
    $commentBody = "I think it is a good idea to use the Repository Pattern to persist and retrieve objects.";
    $commentData = [$postId, $commentAuthor, $commentAuthorEmail, $commentSubject, $commentBody];

    $comment = (new CommentFactory())->make($commentData);

    $this->assertEquals($postId, $comment->getPostId());
    $this->assertEquals($commentAuthor, $comment->getAuthor());
    $this->assertEquals($commentAuthorEmail, $comment->getAuthorEmail());
    $this->assertEquals($commentSubject, $comment->getSubject());
    $this->assertEquals($commentBody, $comment->getBody());
  }
}
