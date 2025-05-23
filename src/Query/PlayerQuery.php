<?php
namespace App\Query;

use PDO;

/**
 * Class PlayerQuery
 *
 * Handles the Player Queries
 */
class PlayerQuery extends BaseQuery
{
    function addPlayer($emid,$emname,$type,$points)
    {
        $stmt = $this->db->prepare("
            INSERT INTO players (employee_id,employee_name, points, player_type)
            VALUES (?, ?, ?,?)
        ");

        return $stmt->execute([$emid, $emname, $points, $type]);
    }

    function getAllPlayers()
    {
        $stmt = $this->db->prepare("
            SELECT * FROM players
        ");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function playerById($emplyeeid)
    {
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
