<?php

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;
use welly\PHPAlgorithms\Factory\CommentFactory;
use welly\PHPAlgorithms\Models\Comment;
use welly\PHPAlgorithms\Repository\CommentRepository;
use welly\PHPAlgorithms\Utils\InMemoryPersistence;

class RepositoryTest extends TestCase {

  use MockeryPHPUnitIntegration;

  protected function tearDown() {
    \Mockery::close();
  }

	public function testACommentHasAllItsComposingParts() {
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

  public function testRetrieveCommentFromGateway() {

    $persistanceGateway = new InMemoryPersistence();
    $commentRepository = new CommentRepository($persistanceGateway);

    $commentData = array(1, 'x', 'x', 'x', 'x');
    $comment = (new CommentFactory())->make($commentData);

    $commentRepository->add($comment);

    $this->assertEquals($commentData, $persistanceGateway->retrieve(0));
  }

  public function testCommentStoresInPersistence() {

    $mock = \Mockery::mock('welly\PHPAlgorithms\Utils\PersistenceInterface');
    $commentRepository = new CommentRepository($mock);

    $commentData = array(1, 'x', 'x', 'x', 'x');
    $comment = (new CommentFactory())->make($commentData);

    $mock->shouldReceive('persist')
      ->once()
      ->with($commentData);

    $commentRepository->add($comment);
  }

  public function testStoreAndRetrieveMultipleComments() {
 
    $persistanceGateway = \Mockery::mock('welly\PHPAlgorithms\Utils\PersistenceInterface');
    $commentRepository = new CommentRepository($persistanceGateway);
 
    $commentData1 = array(1, 'x', 'x', 'x', 'x');
    $comment1 = (new CommentFactory())->make($commentData1);
    $commentData2 = array(2, 'y', 'y', 'y', 'y');
    $comment2 = (new CommentFactory())->make($commentData2);
 
    $persistanceGateway->shouldReceive('persist')->once()->with($commentData1);
    $persistanceGateway->shouldReceive('persist')->once()->with($commentData2);
 
    $commentRepository->add(array($comment1, $comment2));
  }

  public function testRetrieveAllComments() {
    $repository = new CommentRepository();
 
    $commentData1 = array(1, 'x', 'x', 'x', 'x');
    $comment1 = (new CommentFactory())->make($commentData1);
    $commentData2 = array(2, 'y', 'y', 'y', 'y');
    $comment2 = (new CommentFactory())->make($commentData2);
 
    $repository->add($comment1);
    $repository->add($comment2);
 
    $this->assertEquals(array($comment1, $comment2), $repository->getAll());
  }

  public function testRetrieveCommentById() {
    $repository = new CommentRepository();

    $commentData1 = array(1, 'x', 'x', 'x', 'x');
    $comment1 = (new CommentFactory())->make($commentData1);
    $commentData2 = array(1, 'y', 'y', 'y', 'y');
    $comment2 = (new CommentFactory())->make($commentData2);
    $commentData3 = array(3, 'y', 'y', 'y', 'y');
    $comment3 = (new CommentFactory())->make($commentData3);

    $repository->add(array($comment1, $comment2));
    $repository->add($comment3);

    $this->assertEquals(array($comment1, $comment2), $repository->get(1));
    $this->assertEquals(array($comment3), $repository->get(3));
  }
}
