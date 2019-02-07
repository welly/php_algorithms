<?php

namespace welly\PHPAlgorithms\Factory;

/**
 * Interface FactoryInterface
 *
 * @package welly\PHPAlgorithms\Factory
 */
interface FactoryInterface {

  /**
   * @param array $configuration
   *
   * @return mixed
   */
  function make(array $configuration);

}
