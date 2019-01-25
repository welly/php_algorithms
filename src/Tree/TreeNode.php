<?php

namespace welly\PHPAlgorithms\Tree;

/**
 * Class TreeNode
 *
 * @package welly\PHPAlgorithms\Tree
 */
class TreeNode {

  /**
   * @var null Contains TreeNode data.
   */
  public $data = NULL;

  /**
   * @var array Array of TreeNode children.
   */
  public $children = [];

  /**
   * TreeNode constructor.
   *
   * @param null $data
   */
  public function __construct($data = NULL) {
    $this->data = $data;
  }

  /**
   * Adds a child node to the current TreeNode instance.
   *
   * @param \welly\PHPAlgorithms\Tree\TreeNode $node
   */
  public function addChild(TreeNode $node) {
    $this->children[] = $node;
  }

}
