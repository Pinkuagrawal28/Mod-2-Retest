<?php
namespace App\Query;

use PDO;

/**
 * Class PlayerQuery
 *
 * Handles the Player Queries
 */
class PlayerQuery extends BaseQuery{
   /**
   * To Add player in the DB
   * @param string emid
   * @param string emname
   * @param string type
   * @param string points
   * @return bool statusquery
   */
    function addPlayer($emid,$emname,$type,$points){
        $stmt = $this->db->prepare("
            INSERT INTO players (employee_id,employee_name, points, player_type)
            VALUES (?, ?, ?,?)
        ");

        return $stmt->execute([$emid, $emname, $points, $type]);
    }
    /**
   * To Add player in the DB
   * @return array PlayerList
   */
    function getAllPlayers(){
        $stmt = $this->db->prepare("
            SELECT * FROM players
        ");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
   * To Add player in the DB
   * @param string employeeid
   * @return array PlayerQuery
   */
    function playerById($emplyeeid){
        $stmt = $this->db->prepare("
            SELECT employee_name, points, player_type
            FROM players
            WHERE employee_id = ?
            LIMIT 1
        ");
        $stmt->execute([$emplyeeid]);
        return $stmt->fetchAll();
    }
}
