<?php

namespace App\Action;

use App\Query\PlayerQuery;

/***
   * This classes Handles The Player Logic
   */
class PlayerAction{
  /**
   * Function to Add Player to the Database
   */
  public function add(){
    $emid = $_POST["emid"];
    $name = $_POST["emname"];
    $type = $_POST["playertype"];
    $points = $_POST["points"];

    $playerQuery = new PlayerQuery();

    $playerQuery->addPlayer($emid,$name,$type,$points);

    header('Location: /player');
  }

  /**
   * Function to return Player in API Form
   * @return json players
   */
  public function playerAPI(){
    $playerQuery = new PlayerQuery();
    return $playerQuery->getAllPlayers();
  }

  /**
   * Function to render the player on UI
   */
  public function render(){
    $playerQuery = new PlayerQuery();
    $players = $playerQuery->getAllPlayers();
  }
}