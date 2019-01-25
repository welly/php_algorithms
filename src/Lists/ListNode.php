<?php

namespace welly\PHPAlgorithms\Lists;

class ListNode {

  /**
   * @var null Contains ListNode data.
   */
	public $data = NULL;

  /**
   * @var null "Pointer" to next ListNode item.
   */
	public $next = NULL;

  /**
   * ListNode constructor.
   *
   * @param null $data
   */
	public function __construct($data = NULL) {
		$this->data = $data;
	}
}
