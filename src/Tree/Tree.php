<?php

namespace welly\PHPAlgorithms\Tree;

/**
 * Class Tree
 *
 * @package welly\PHPAlgorithms\Tree
 */
class Tree {

  /**
   * @var null|TreeNode Stores the root TreeNode element.
   */
  public $root = NULL;

  /**
   * Tree constructor.
   *
   * @param TreeNode $node
   */
  public function __construct(TreeNode $node) {
    $this->root = $node;
  }

  /**
   * Traverses Tree instance and its child nodes, outputting as a list.
   *
   * @param TreeNode $node
   * @param int $level
   */
  public function traverse(TreeNode $node, int $level = 0) {
    if ($node) {
      echo str_repeat('-', $level);
      echo $node->data . "\n";

      foreach ($node->children as $child) {
        $this->traverse($child, $level + 1);
      }
    }
  }
}
