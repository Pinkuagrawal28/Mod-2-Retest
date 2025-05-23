<?php
namespace App\Service;

use App\Core\Database;

/**
 * Class RedisService
 *
 * This class handles connecting to Redis and provides a set of utility methods
 * for interacting with the Redis key-value store.
 *
 * @package App\Service
 */
class RedisService
{
    /**
     * @var \Redis
     */
    private $redis;

    /**
     * RedisService constructor.
     * Initializes the Redis client using the Database facade.
     */
    public function __construct()
    {
        $this->redis = Database::redis();
    }

    /**
     * Set a key-value pair in Redis with optional TTL (time-to-live).
     *
     * @param string $key   The key to set.
     * @param string $value The value to associate with the key.
     * @param int|null $ttl Time-to-live in seconds (optional).
     *
     * @return void
     */
    public function set(string $key, string $value, int $ttl = null): void
    {
        if ($ttl) {
            $this->redis->setex($key, $ttl, $value);
        } else {
            $this->redis->set($key, $value);
        }
    }

    /**
     * Retrieve the value of a key from Redis.
     *
     * @param string $key The key to retrieve.
     * @return string|null The value or null if not found.
     */
    public function get(string $key): ?string
    {
        return $this->redis->get($key);
    }

    /**
     * Delete a key from Redis.
     *
     * @param string $key The key to delete.
     * @return void
     */
    public function delete(string $key): void
    {
        $this->redis->del($key);
    }

    /**
     * Check if a key exists in Redis.
     *
     * @param string $key The key to check.
     * @return bool True if exists, false otherwise.
     */
    public function exists(string $key): bool
    {
        return $this->redis->exists($key) > 0;
    }

    /**
     * Increment the integer value of a key by one.
     *
     * @param string $key The key to increment.
     * @return void
     */
    public function incr(string $key): void
    {
        $this->redis->incr($key);
    }
}
