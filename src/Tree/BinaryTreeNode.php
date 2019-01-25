<?php

namespace welly\PHPAlgorithms\Tree;

/**
 * Class BinaryTreeNode
 *
 * @package welly\PHPAlgorithms\Tree
 */
class BinaryTreeNode {

  /**
   * @var null Contains BinaryTreeNode data.
   */
  public $data;

  /**
   * @var null Pointer to left branch.
   */
  public $left;

  /**
   * @var null Pointer to right branch.
   */
  public $right;

  /**
   * BinaryTreeNode constructor.
   *
   * @param null $data
   */
  public function __construct($data = NULL) {
    $this->data = $data;
    $this->left = NULL;
    $this->right = NULL;
  }

  /**
   * Adds left and right branch children to BinaryTreeNode instances.
   *
   * @param \welly\PHPAlgorithms\Tree\BinaryTreeNode $left
   * @param \welly\PHPAlgorithms\Tree\BinaryTreeNode $right
   */
  public function addChildren(BinaryTreeNode $left, BinaryTreeNode $right) {
    $this->left = $left;
    $this->right = $right;
  }

}
