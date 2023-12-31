<?php

namespace slayer\cache\trait;

use pocketmine\utils\Config;

trait CacheTrait
{
    /** @var array */
    protected array $cache = [];

    /**
     * @param array $cache
     * @return void
     */
    public function setCache(array $cache): void
    {
        $this->cache = $cache;
    }

    /**
     * @return array
     */
    public function getCache(): array
    {
        return $this->cache;
    }

}