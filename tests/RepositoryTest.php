<?php

use welly\PHPAlgorithms\Helpers\Comment;

class RepositoryTest extends \PHPUnit\Framework\TestCase {

	function testACommentHasAllItsComposingParts() {
		$postId = 1;
		$commentAuthor = "Joe";
		$commentAuthorEmail = "joe@example.com";
    $commentSubject = "Joe Has an Opinion about the Repository Pattern";
    $commentBody = "I think it is a good idea to use the Repository Pattern to persist and retrieve objects.";
    $comment = new Comment($postId, $commentAuthor, $commentAuthorEmail, $commentSubject, $commentBody);

    $this->assertEquals($postId, $comment->getPostId());
    $this->assertEquals($commentAuthor, $comment->getAuthor());
    $this->assertEquals($commentAuthorEmail, $comment->getAuthorEmail());
    $this->assertEquals($commentSubject, $comment->getSubject());
    $this->assertEquals($commentBody, $comment->getBody());

	}
}
