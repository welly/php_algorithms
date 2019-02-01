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
   * Gets single data item from persistence implementation data store.
   *
   * @param $id
   *
   * @return array
   */
  function retrieve($id);

  /**
   * Gets all data from persistence implementation data store.
   *
   * @return array
   */
  function retrieveAll();

}
