<?php
namespace App\Core;

use App\Action\LoginAction;
use App\Action\PlayerAction;
use App\Action\TeamAction;

use App\Query\UserQuery;

/***
   * This classes Handles Initialization of backend
   */
class App
{
    /***
   * This is function initializse everything to run the app
   */
    public function run()
    {
        $uri    = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET'){
          switch ($uri) {
            case "/":
              require_once BASE_PATH . "/src/pages/home.php";
              break;
            case "/team":
              if($_SESSION["name"] = ""){
                header('Location: /');
              }
              $currentplayers = (new TeamAction())->TeamAPI();
              $players = (new PlayerAction())->playerAPI();
              require_once BASE_PATH . "/src/pages/team.php";
              break;
            case "/player":
              if($_SESSION["name"] = ""){
                header('Location: /');
              }
              require_once BASE_PATH . "/src/pages/player.php";
              break;
            case "/logout":
                (new LoginAction())->logout();
                break;
            case "deletefromteam":
                break;
          }
        }

        if($method === 'POST'){
          switch ($uri) {
            case "/login":
              (new LoginAction())->login();
              break;
            case "/add-player":
              if($_SESSION["name"] = ""){
                header('Location: /');
              }
              (new PlayerAction())->add();
              break;
            case "/addtoteam":
                if($_SESSION["name"] = ""){
                  header('Location: /');
                }
                (new TeamAction())->add();
                break;
          }
        }
    }
}
