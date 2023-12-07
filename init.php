<?php

require_once realpath( __DIR__ ) . '/Graph/Graph.php';
require_once realpath( __DIR__ ) . '/Logger/Logger.php';



$graph = [
  '1' => ['2', '6'],
  '2' => ['1', '6', '3', '4'],
  '6' => ['1', '2', '4', '5'],
  '4' => ['2', '3', '5', '6'],
  '3' => ['2', '4' , '5'],
  '5' => ['3', '4', '6'],
];

$logger = new Logger();
$graph = new Graph($graph);

$logger($graph->findPath('1', '3'));