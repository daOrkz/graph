<?php

require_once realpath( __DIR__ ) . '/Graph/Graph.php';
require_once realpath( __DIR__ ) . '/Logger/Logger.php';
$config = require_once realpath( __DIR__ ) . '/conf.php';


$graph = new Graph($graph);
$logger = new Logger($config['directory'], $config['fileName']);
$graph->setLogger($logger);

$graph->findPath('1', '6');