<?php

namespace g4m;

/**
 * Supports transport of files via FTP. Implements DispatcherInterface.
 *
 * @author Adam Wierzynkiewicz
 */
class DispatcherFTP implements DispatcherInterface
{

  /**
   * Uploads the data file onto a server via FTP.
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
