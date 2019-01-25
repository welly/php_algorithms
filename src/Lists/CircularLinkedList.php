<?php
namespace welly\PHPAlgorithms\Lists;

/**
 * Class CircularLinkedList
 *
 * @package welly\PHPAlgorithms\Lists
 */
class CircularLinkedList extends LinkedList {

  /**
   * Inserts new ListNode into CircularLinkedList instance.
   *
   * @param null $data
   *
   * @return bool
   */
  public function insert($data = NULL) {
    $new = new ListNode($data);
    $new->next = $this->first;

    if ($this->first === NULL) {
      $this->first = &$new;
    }
    else {
      $current = $this->first;
      while ($current->next !== $this->first) {
        $current = $current->next;
      }
      $current->next = $new;
    }
    $new->next = $this->first;
    $this->total++;
    return TRUE;
  }

}
