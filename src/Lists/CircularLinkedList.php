<?php
/**
 * Created by PhpStorm.
 * User: amoore
 * Date: 25/01/2019
 * Time: 14:39
 */

namespace welly\PHPAlgorithms\Lists;

class CircularLinkedList extends LinkedList {

  public function insert($data = NULL) {
    $new = new ListNode($data);
    $new->next = $this->first;

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
  }

}
