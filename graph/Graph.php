<?php

$graph = array(
  'A' => array('B', 'F'),
  'B' => array('A', 'D', 'E'),
  'C' => array('F'),
  'D' => array('B', 'E'),
  'E' => array('B', 'D', 'F'),
  'F' => array('A', 'E', 'C'),
);

class Graph {
  public array $visited;
  public array $graph;
  public array $queue = [];

  public int $totalNode;

  public array $path = [];
  public array $path_2 = [];

  public function __construct(array $graph) {
    $this->graph = $graph;
    $this->totalNode = count($this->graph);
  }

  public function findPath(string $startNode, string $destination){
    $this->unvisitedNodes();

    array_push($this->queue, $startNode);
    $this->visited[$startNode] = true;

    $this->path[$startNode] = [$startNode];

    while(count($this->queue) > 0){
      $node = array_pop($this->queue);

      if (!empty($this->graph[$node])) {
        foreach ($this->graph[$node] as $neighbour) {
          if (!$this->visited[$neighbour]){
            array_push($this->queue, $neighbour);
            $this->visited[$neighbour] = true;

            if($node == $startNode){
              $this->path[$neighbour] = $this->path[$node];
              continue;
            }

            $this->path[$neighbour] = array_merge($this->path[$node], [$node]);
          }
        }
      }
    }

    if (isset($this->path[$destination])){
      $countJump = count($this->path[$destination]);
      echo PHP_EOL . "Из {$startNode} в {$destination} путь составит {$countJump} ходов" . PHP_EOL ;

      $str = ' ';

      foreach ($this->path[$destination] as $node){
        echo $node . $str;
      }
      echo $destination . PHP_EOL;
    } else {
      echo PHP_EOL . "Из {$startNode} в {$destination} пути нет!" . PHP_EOL ;
    }
  }

  protected function unvisitedNodes(){
    foreach ($this->graph as $node => $elem) {
      $this->visited[$node] = false;
    }
  }
}

$graph = new Graph($graph);
$graph->findPath('A', 'E');

