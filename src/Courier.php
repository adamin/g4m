<?php

namespace g4m;

/**
 * Courier base class. Stores common attributes and methods for all the couriers.
 *
 * @author Adam Wierzynkiewicz
 */
class Courier
{

  /**
   * Unique ID of the courier.
   *
   * @var int
   */
  private $id;

  /**
   * Data transport type required by the courier.
   *
   * @var int
   */
  private $transportType;

  /**
   * Constructor.
   *
   * @param int $transportType
   * @return void
   */
  public function __construct(int $transportType)
  {
    $this->setTransportType($transportType);
  }

  /**
   * Returns ID of the courier.
   *
   * @return int
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Sets the transport type for the courier.
   *
   * @param int $transportType
   * @return \g4m\Courier
   */
  public function setTransportType(int $transportType): Courier
  {
    $this->transportType = $transportType;

    return $this;
  }

  /**
   * Returns an instance of a dispatcher that supports courier's transport type.
   *
   * @return \g4m\DispatcherInterface
   */
  public function getDispatcher(): DispatcherInterface
  {
    return DispatcherFactory::create($this->transportType);
  }

}
