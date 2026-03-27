<?php

namespace App\Core;

class MigrationGenerator
{
    public static function make($name)
    {
        $parts = explode('/', $name);

        $migrationName = end($parts);
        array_pop($parts);

        $modulePath = implode('/', $parts);

        $timestamp = date('Y_m_d_His');
        $fileName = "{$timestamp}_" . self::toSnake($migrationName) . ".php";

        if ($modulePath) {
            $basePath = __DIR__ . "/../Modules/$modulePath/Migrations";
        } else {
            $basePath = __DIR__ . "/../../database/migrations";
        }

        if (!is_dir($basePath)) {
            mkdir($basePath, 0777, true);
        }

        $filePath = "$basePath/$fileName";

        file_put_contents($filePath, self::stub($migrationName));

        echo "Migration created: $filePath \n";
    }

    protected static function stub($name)
    {
        $table = self::parseTableName($name);

    return "<?php

use App\Core\Migration;

return new class extends Migration {

    public function up()
    {
        \$this->schema()->create('$table', function (\$table) {
            \$table->id();
            \$table->timestamps();
            \$table->softDeletes();
        });
    }

    public function down()
    {
        \$this->schema()->dropIfExists('$table');
    }
};
";
    }

    protected static function toSnake($string)
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $string));
    }

    protected static function parseTableName($name)
    {
        $name = preg_replace('/^Create|Table$/', '', $name);

        $snake = self::toSnake($name);

        return self::pluralize($snake);
    }

    protected static function pluralize($word)
    {
        if (str_ends_with($word, 'y')) {
            return substr($word, 0, -1) . 'ies';
        }

        if (str_ends_with($word, 's')) {
            return $word . 'es';
        }

        return $word . 's';
    }
}