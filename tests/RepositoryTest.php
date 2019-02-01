<?php

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;
use welly\PHPAlgorithms\Factory\CommentFactory;
use welly\PHPAlgorithms\Helpers\Comment;
use welly\PHPAlgorithms\Repository\CommentRepository;
use welly\PHPAlgorithms\Utils\InMemoryPersistence;

class RepositoryTest extends TestCase {

  use MockeryPHPUnitIntegration;

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

  function testAPersistedCommentCanBeRetrievedFromTheGateway() {

    $persistanceGateway = new InMemoryPersistence();
    $commentRepository = new CommentRepository($persistanceGateway);

    $commentData = array(1, 'x', 'x', 'x', 'x');
    $comment = (new CommentFactory())->make($commentData);

    $commentRepository->add($comment);

    $this->assertEquals($commentData, $persistanceGateway->retrieve(0));
  }

  function testItCallsThePersistenceWhenAddingAComment() {

    $mock = \Mockery::mock('welly\PHPAlgorithms\Utils\PersistenceInterface');
    $commentRepository = new CommentRepository($mock);

    $commentData = array(1, 'x', 'x', 'x', 'x');
    $comment = (new CommentFactory())->make($commentData);

    $mock->shouldReceive('persist')
      ->once()
      ->with($commentData);

    $commentRepository->add($comment);
  }

}
