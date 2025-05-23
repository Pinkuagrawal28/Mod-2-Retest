<?php
namespace App\Query;

use PDO;

/**
 * Class UserQuery
 *
 * Handles the Authentication for the User
 */
class UserQuery extends BaseQuery{

  /**
   * To get the User From DB
   * @param string email
   * @param string password
   * @return array user
   */
  function getUser($mail,$password){
    $stmt = $this->db->prepare("
            SELECT *
            FROM userlist
            WHERE email = :mail AND password = :pwd
            LIMIT 1
        ");
    $stmt->execute([
      'mail'=>$mail,
      'pwd' => $password
    ]);
    return $stmt->fetchAll();
  }

  /**
   * To Genreate Random Users
   * @param string mail
   * @param string password
   * @param string role
   * @return bool statusquery
   */
  function RandomUser($mail,$password,$role){
    $stmt = $this->db->prepare("
            INSERT INTO userlist (email, password, role)
            VALUES (?, ?, ?)
        ");
    return $stmt->execute([$mail, $password, $role]);
  }
}