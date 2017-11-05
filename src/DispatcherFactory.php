<?php

namespace g4m;

/**
 * Factory class for generating Dispatcher instances to support different transport types.
 *
 * @author Adam Wierzynkiewicz
 */
class DispatcherFactory
{

  const TRANSPORT_FTP = 1;
  const TRANSPORT_EMAIL = 2;

  /**
   * Creates an instance of a dispatcher relevant to the transport type provided.
   *
   * @param int $transportType
   * @return \g4m\DispatcherInterface
   * @throws \Exception
   */
  public static function create(int $transportType): DispatcherInterface
  {
    switch ($transportType) {
      case self::TRANSPORT_FTP:
        return new DispatcherFTP();
      case self::TRANSPORT_EMAIL:
        return new DispatcherEmail();
      default:
        throw new \Exception('Unsupported transport type');
    }
  }

}
