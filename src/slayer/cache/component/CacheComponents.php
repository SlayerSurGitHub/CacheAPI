<?php

namespace slayer\cache\component;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use slayer\cache\enum\CacheType;

abstract class CacheComponents
{
    /** @var Config */
    private Config $config;

    /**
     * @param PluginBase $pluginBase
     * @param CacheType $cacheType
     */
    public function __construct(
        private readonly PluginBase $pluginBase,
        private readonly CacheType $cacheType
    )
    {
        $this->config = new Config(
            $this->pluginBase->getDataFolder() . strtolower($this->getIdentifier()) . "." . strtolower(($type = $this->cacheType)->name),
            $type->value
        );
    }

    /**
     * @return string
     */
    abstract public function getIdentifier(): string;

    /**
     * @return array
     */
    abstract public function getCache(): array;

    /**
     * @param array $cache
     * @return void
     */
    abstract public function setCache(array $cache): void;

    /**
     * @return Config
     */
    public function getConfig(): Config
    {
        return $this->config;
    }

}