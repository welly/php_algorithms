<?php

namespace welly\PHPAlgorithms\Utils;

/**
 * Interface Persistence
 *
 * Defines the interface for Persistence classes.
 *
 * @package welly\PHPAlgorithms\Repository
 */
interface PersistenceInterface {

  /**
   * Stores data in persistence implementation data store.

   * @param $data
   *
   * @return mixed
   */
  function persist($data);

  /**
   * Gets data from persistence implementation data store.
   *
   * @param $id
   *
   * @return array
   */
  function retrieve($id);

}
