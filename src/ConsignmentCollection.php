<?php

namespace g4m;

/**
 * Represents a collection of consignments - a batch.
 *
 * @author Adam Wierzynkiewicz
 */
class ConsignmentCollection
{

  /**
   * Unique ID of the batch.
   *
   * @var int
   */
  private $id;

  /**
   * Flag that indicates if the collection is closed.
   *
   * @var bool
   */
  private $isClosed;

  /**
   * Start time of the batch.
   *
   * @var \DateTime
   */
  private $start;

  /**
   * Time of closing the batch.
   *
   * @var \DateTime
   */
  private $end;

  /**
   * List of consignments in the batch.
   *
   * @var \g4m\Consignment[]
   */
  private $consignments = [];

  /**
   * Constructor. Sets the start time on creation.
   */
  public function __construct()
  {
    $this->start = new \DateTime();
  }

  /**
   * Returns ID of the batch.
   *
   * @return int
   */
  public function getId()
  {
    return 1;
    return $this->id;
  }

  /**
   * Returns start time of the batch.
   *
   * @return \DateTime
   */
  public function getStart()
  {
    return $this->start;
  }

  /**
   * Returns close time of the batch.
   *
   * @return \DateTime
   */
  public function getEnd()
  {
    return $this->end;
  }

  /**
   * Indicates if the collection has already been closed or not.
   *
   * @return bool True if closed, false otherwise.
   */
  public function isClosed(): bool
  {
    return $this->isClosed;
  }

  /**
   * Adds a new consignment to the collection.
   *
   * @param \g4m\Consignment $consignment
   * @return \g4m\ConsignmentCollection
   */
  public function add(Consignment $consignment): ConsignmentCollection
  {
    $this->consignments[] = $consignment;

    return $this;
  }

  /**
   * Returns all consignments in the collection.
   *
   * @return array
   */
  public function getConsignments(): array
  {
    return $this->consignments;
  }

  /**
   * Closes the collection.
   *
   * @return \g4m\ConsignmentCollection
   */
  public function close(): ConsignmentCollection
  {
    $this->isClosed = true;
    $this->end = new \DateTime();

    $this->process();

    return $this;
  }

  /**
   * Loads the collection from persistent storage.
   *
   * @param \DateTime $start
   * @return \g4m\ConsignmentCollection
   */
  public function loadSince(\DateTime $start)
  {
    // TODO

    return $this;
  }

  /**
   * Saves the collection to a persistent storage.
   *
   * @return \g4m\ConsignmentCollection
   */
  public function save()
  {
    // TODO

    return $this;
  }

  /**
   * Processes the batch by sending out lists of consignments to their couriers.
   *
   * @throws \Exception
   */
  private function process(): void
  {
    if (!empty($this->consignments)) {
      $couriers = [];
      foreach ($this->consignments as $consignment) {
        $courier = $consignment->getCourier();
        if (!in_array($courier, $couriers)) {
          $couriers[] = $courier;
        }
        file_put_contents('/tmp/' . $courier->getId() . '-' . $this->getId(), $consignment->getReference() . "\n", FILE_APPEND);
      }

      foreach ($couriers as $courier) {
        $path = '/tmp/' . $courier->getId() . '-' . $this->getId();
        if ($courier->getDispatcher()->send($path)) {
          unlink($path);
        } else {
          throw new \Exception('Could not send a batch file');
        }
      }
    }
  }

}
