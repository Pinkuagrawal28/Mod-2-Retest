<?php

namespace App\Core;

use PDO;
use PDOException;
use Exception;
use Predis\Client as RedisClient;

/***
   * This classes Handles Database Connection
   */
class Database
{
    private static ?PDO $pdo = null;
    private static ?RedisClient $redis = null;

    /***
   * This is function connects with the db via PDO
   * @return Object PDO
   */
    public static function pdo(): PDO
    {
        if (self::$pdo) {
            return self::$pdo;
        }

        $config = require BASE_PATH . '/config/dbh.config.php';

        try {
            $dsn = "mysql:host={$config['host']};dbname={$config['db_name']};port={$config['port']};charset={$config['charset']}";
            self::$pdo = new PDO($dsn, $config['user'], $config['pass'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]);
        } catch (PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }

        return self::$pdo;
    }

    /***
   * This is function connects with the Redis via Predis Client
   * @return Object Redis
   */
    public static function redis(): RedisClient
    {
        if (self::$redis) {
            return self::$redis;
        }

        $config = require BASE_PATH . '/config/redis.config.php';

        try {
            self::$redis = new RedisClient([
                'scheme' => $config['scheme'],
                'host'   => $config['host'],
                'port'   => $config['port'],
            ]);
        } catch (Exception $e) {
            die('Redis connection failed: ' . $e->getMessage());
        }
        return self::$redis;
    }
}
