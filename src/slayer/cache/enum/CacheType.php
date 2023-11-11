<?php

namespace slayer\cache\enum;

enum CacheType: int
{
    case JSON = 1;
    case YAML = 2;
}