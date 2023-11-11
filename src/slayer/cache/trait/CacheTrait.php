<?php

namespace slayer\cache\trait;

trait CacheTrait
{
    /** @var array */
    public static array $cache = [];

    /**
     * @param array $cache
     * @return void
     */
    public function setCache(array $cache): void
    {
        self::$cache = $cache;
    }

    /**
     * @return array
     */
    public function getCache(): array
    {
        return self::$cache;
    }

}