<?php

namespace slayer\cache;

use ReflectionException;
use slayer\cache\component\CacheComponents;

class Cache
{
    private array $components = [];

    /**
     * @param CacheComponents ...$cacheComponents
     * @return void
     * @throws ReflectionException
     */
    public function add(CacheComponents ...$cacheComponents): void
    {
        array_map(function ($cacheComponent): void
        {
            if (array_key_exists(strtolower($cacheComponent->getIdentifier()), $this->components))
            {
                throw new \LogicException(((new \ReflectionClass($cacheComponent))->getShortName()) . " class is already registered!");
            }

            $this->components[strtolower($cacheComponent->getIdentifier())] = $cacheComponent;
        }, $cacheComponents);
    }

    /**
     * @return CacheComponents[]
     */
    public function getComponents(): array
    {
        return $this->components;
    }

}