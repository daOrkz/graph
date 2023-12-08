<?php

class Logger {
  protected string $directory =  __DIR__ . '/..';
  protected string $fileName;
 
  public function __construct(string $directory, string $fileName){
    $this->directory .= $directory;
    $this->fileName = $fileName;
  }

  public function writeLog($text){
    if (!file_exists($this->directory)) { 
      mkdir($this->directory, 0777, true);
    }

    file_put_contents($this->directory . $this->fileName, $text);
  }
}
