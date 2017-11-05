<?php

namespace g4m;

interface CourierInterface
{

  /**
   * Returns dispatcher specific to the courier's transport type.
   *
   * @return DispatcherInterface Dispatcher that supports courier's transport type.
   */
  public function getDispatcher(): DispatcherInterface;

  /**
   * Generates a reference for a new consignment based on courier specific algorithm.
   *
   * @return string Reference for a consignment
   */
  public function generateConsignmentReference(): string;
}
