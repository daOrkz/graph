<?php

class Logger {
  static $directory =  __DIR__ . '/..' . '/Logs';
  static $fileName = '/log.php';

  static function writeLog($text){
    if (!file_exists(self::$directory)) { 
      mkdir(self::$directory, 0777, true);
    }

    file_put_contents(self::$directory . self::$fileName, $text);
  }
}
