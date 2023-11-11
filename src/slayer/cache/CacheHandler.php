<?php

namespace slayer\cache;

use pocketmine\Server;

final class CacheHandler
{
    /** @var array */
    private static array $registrant = [];

    /**
     * @param Cache $cache
     * @param Server $server
     * @return void
     */
    public static function register(Cache $cache, Server $server): void
    {
        foreach ($cache->getComponents() as $identifier => $component)
        {
            $config = $component->getConfig();
            $component->setCache($config->getAll());

            self::$registrant[$identifier] = $component;
        }

        $server->getLogger()->debug("All cache files have been saved!");
    }

    /**
     * @param Server $server
     * @return void
     */
    public static function unregister(Server $server): void
    {
        foreach (self::$registrant as $identifier => $component)
        {
            $config = $component->getConfig();
            $config->setAll($component->getCache());
            $config->save();
        }

        $server->getLogger()->debug("All cache files have been backed up!");
    }

}