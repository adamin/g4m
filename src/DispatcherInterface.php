<?php

namespace g4m;

interface DispatcherInterface
{

  /**
   * Sends the data file.
   *
   * @param string $path Path to a file to dispatch
   * @return bool True if successful, false otherwise
   */
  public function send(string $path): bool;
}
