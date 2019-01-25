<?php

namespace welly\PHPAlgorithms\Tree;

/**
 * Class BinaryTree
 *
 * @package welly\PHPAlgorithms\Tree
 */
class BinaryTree {

  public $root = NULL;

  /**
   * BinaryTree constructor.
   *
   * @param BinaryTreeNode $node
   */
  public function __construct(BinaryTreeNode $node) {
    $this->root = $node;
  }

  /**
   * Traverses BinaryTree instance and its child nodes, outputting as a list.
   *
   * @param \welly\PHPAlgorithms\Tree\BinaryTreeNode $node
   * @param int $level
   */
  public function traverse(BinaryTreeNode $node, int $level = 0) {
    if ($node) {
      echo str_repeat("-", $level);
      echo $node->data . "\n";
      if ($node->left) {
        $this->traverse($node->left, $level + 1);
      }
      if ($node->right) {
        $this->traverse($node->right, $level + 1);
      }
    }
  }

}
