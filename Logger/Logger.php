<?php

class Logger {
  public $directory =  __DIR__ . '/..' . '/Logs';
  public $fileName = '/log.php';

  public function __invoke($text){
    if (!file_exists($this->directory)) { 
      mkdir($this->directory, 0777, true);
    }

    file_put_contents($this->directory . $this->fileName, $text);
  }
}
