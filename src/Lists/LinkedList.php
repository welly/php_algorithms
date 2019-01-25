<?php

namespace welly\PHPAlgorithms\Lists;

class LinkedList {

  /**
   * @var null Contains first ListNode object.
   */
	private $first = NULL;

  /**
   * @var int Total count of ListNodes in LinkedList instance.
   */
	private $total = 0;

  /**
   * Inserts new ListNode into LinkedList instance.
   *
   * @param null $data
   *
   * @return bool
   */
	public function insert($data = NULL) {
	  $new = new ListNode($data);

	  if ($this->first === NULL) {
	    $this->first = &$new;
    }
    else {
      $current = $this->first;
      while ($current->next !== NULL) {
        $current = $current->next;
      }
      $current->next = $new;
    }
    $this->total++;
    return TRUE;
  }

  /**
   * Displays contents of LinkedList instance.
   */
  public function show() {
	  $current = $this->first;
	  while ($current !== NULL) {
	    echo $current->data . "->";
	    $current = $current->next;
    }
  }

}
