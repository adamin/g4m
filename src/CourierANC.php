<?php

namespace g4m;

/**
 * Represents ANC courier. Extends Courier class, implements CourierInterface.
 *
 * @author Adam Wierzynkiewicz
 */
class CourierANC extends Courier implements CourierInterface
{

  /**
   * Generates a reference for a new consignment based on courier specific algorithm.
   *
   * @return string Reference for a consignment
   */
  public function generateConsignmentReference(): string
  {
    // TODO - replace with the algorithm
    return 'ANC-' . rand(1000, 5999);
  }

}
