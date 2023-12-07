<?php

$graph = [
  '1' => ['2', '6'],
  '2' => ['1', '6', '3', '4'],
  '6' => ['1', '2', '4', '5'],
  '4' => ['2', '3', '5', '6'],
  '3' => ['2', '4' , '5'],
  '5' => ['3', '4', '6'],
];

class Graph {
  protected array $visited;
  protected array $graph;
  protected array $queue = [];

  protected array $path = [];

  public function __construct(array $graph) {
    $this->graph = $graph;
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

    $this->resultFindPath($startNode, $destination);
  }

  protected function unvisitedNodes(){
    foreach ($this->graph as $node => $elem) {
      $this->visited[$node] = false;
    }
  }

  protected function resultFindPath(string $startNode, string $destination){
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
}

$graph = new Graph($graph);
$graph->findPath('1', '3');

