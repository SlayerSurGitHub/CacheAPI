# CacheAPI
**CacheAPI is an easy-to-use API that allows you to store your data temporarily in tables and redistribute them in configuration files when the server is shut down.**

# Need some help?
**If you need help, you can join this [discord server](https://discord.gg/DPNhxts5XP)**

# Installation
You can install our API directly on GitHub as a .zip file or click on this link and you'll get it as a [.phar]() file!

# How to use it
You need to start by creating a "cache" file like this:
```php
class MyCacheClass extends CacheComponents
{
    use CacheTrait;
    
    public function getIdentifier(): string
    {
        return "my_cache_file";
    }
    
}
```

Once you have created your file, start by registering your various cache classes in the `onEnable` function in your main file as follows:
```php
$cache = new Cache();
$cache->add(
    new MyCacheFile()
);

CacheHandler::getInstance()->register($cache, Server::getInstance());
```
Then you need to save your various cache files in your `onDisable`! function by doing the following:.
```php
CacheHandler::getInstance()->unregister(Server::getInstance());
```
Now you can use your cache array by making `self::$cache` in your cache file and create your different `functions`!

# Wiki
CacheAPI doesn't have a Wiki yet, but if you'd like to help me with this project, here's my discord: ``slayersuryt``



