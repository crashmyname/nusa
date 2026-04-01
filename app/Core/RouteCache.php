<?php
namespace App\Core;

class RouteCache
{
    protected static string $cacheFile = __DIR__ . '/../../storage/cache/routes.php';

    public static function exists(): bool
    {
        return file_exists(self::$cacheFile);
    }

    public static function load(): array
    {
        $data = require self::$cacheFile;

        if (!is_array($data)) {
            throw new \Exception("Route cache invalid");
        }

        return $data;
    }

    public static function store(array $routes): void
    {
        if (empty($routes)) {
            throw new \Exception("Route cache kosong!");
        }

        $export = var_export($routes, true);

        file_put_contents(
            self::$cacheFile,
            "<?php return $export;"
        );
    }

    public static function clear(): void
    {
        echo "Path: " . self::$cacheFile . PHP_EOL;

        if (file_exists(self::$cacheFile)) {
            unlink(self::$cacheFile);
            echo "Deleted \n";
        } else {
            echo "File not found \n";
        }
    }
}