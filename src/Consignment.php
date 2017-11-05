<?php

namespace g4m;

/**
 * Represents a consignment.
 *
 * @author Adam Wierzynkiewicz
 */
class Consignment
{

  /**
   * Reference number of the consignment.
   *
   * @var string
   */
  private $reference;

  /**
   * Courier that the consignment belongs to.
   *
   * @var g4m\Courier
   */
  private $courier;

  /**
   * Returns the reference number of the consignment.
   *
   * @return string
   */
  public function getReference(): string
  {
    return $this->reference;
  }

  /**
   * Sets reference number for the consignment.
   *
   * @param string $reference
   * @return \g4m\Consignment
   */
  public function setReference(string $reference): Consignment
  {
    $this->reference = $reference;

    return $this;
  }

  /**
   * Returns the courier of the consignment.
   *
   * @return \g4m\CourierInterface
   */
  public function getCourier()
  {
    return $this->courier;
  }

  /**
   * Sets a courier for the consignment.
   *
   * @param \g4m\CourierInterface $courier
   * @return \g4m\
   */
  public function setCourier(CourierInterface $courier)
  {
    $this->courier = $courier;

    return $this;
  }

}
