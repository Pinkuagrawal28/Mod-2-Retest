<?php

namespace App\Action;

use App\Query\TeamQuery;
use App\Query\PlayerQuery;

use App\Service\RedisService;

/***
   * This classes Handles The Player Logic
   */
class TeamAction{
  /**
   * Function Intialize the Redis and setup the Points
   */
  public function __construct(){
    $redis = new RedisService();
    $redis->set("point",100);
    $redis->set("strength",0);
  }
  /**
   * Function to add the Players avaliable to your current Team
   */
  public function add(){
    $emid = $_POST["player_id"];

    $redis = new RedisService();

    $currentpoint = $redis->get("point");
    $currentstrength = $redis->get("strength");

    $playerQuery = new PlayerQuery();
    $thatPlayer = $playerQuery->playerById($emid);

    if($currentpoint < 0){
      echo "You are Lack Points";
    }

    if($currentstrength>=11){
      echo "You are Cannot add more Players";
    }

    $name = $thatPlayer[0]["employee_name"];
    $type = $thatPlayer[0]["player_type"];
    $points = $thatPlayer[0]["points"];

    $currentpoint = $currentpoint - $thatPlayer[0]["points"];
    $redis->set("point",$currentpoint);
    $currentstrength = $currentstrength +1 ;
    $redis->set("strength",$currentstrength);

    echo '
<tr class="">
  <td class="">' . htmlspecialchars($emid) . '</td>
  <td class="">' . htmlspecialchars($name) . '</td>
  <td class="">' . htmlspecialchars($type) . '</td>
  <td class="">' . htmlspecialchars($points) . '</td>
  <td class="">' . htmlspecialchars($currentpoint) . '</td>
  <td class="px-6 py-4">
    <a hx-get="/deletefromteam" hx-target="closest tr"
    hx-swap="outerHTML" class="">Delete
    </a>
  </td>
</tr>';

  }

  /**
   * Function to return Player in API Form
   * @return json players
   */
  public function TeamAPI(){
    $teamQuery = new TeamQuery();
    return $teamQuery->getTheTeam();
  }

  /**
   * Function to render the player on UI
   */
  public function render(){
    $teamQuery = new PlayerQuery();
    $players = $teamQuery->getTheTeam();
  }
}