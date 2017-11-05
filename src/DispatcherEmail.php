<?php

namespace g4m;

/**
 * Supports transport of files via email. Implements DispatcherInterface.
 *
 * @author Adam Wierzynkiewicz
 */
class DispatcherEmail implements DispatcherInterface
{

  /**
   * Send the data file via email.
   *
   * @param string $path Path to the file to send
   * @return bool True on success, false otherwise
   */
  public function send(string $path): bool
  {
    // TODO
    return true;
  }

}
