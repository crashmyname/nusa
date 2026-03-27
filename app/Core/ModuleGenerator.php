<?php

namespace App\Core;

class ModuleGenerator
{
    public static function make($name)
    {
        $parts = explode('/', $name);
        $moduleName = end($parts);
        $modulePath = implode('/', $parts);

        $basePath = __DIR__ . "/../Modules/$modulePath";

        $folders = [
            'Controllers',
            'Models',
            'Repositories',
            'Services',
            'DTOs',
        ];

        foreach ($folders as $folder) {
            $path = "$basePath/$folder";
            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }
        }

        file_put_contents(
            "$basePath/Controllers/{$moduleName}Controller.php",
            self::controllerStub($moduleName, $modulePath)
        );

        file_put_contents(
            "$basePath/Models/{$moduleName}.php",
            self::modelStub($moduleName, $modulePath)
        );

        file_put_contents(
            "$basePath/Repositories/{$moduleName}Repository.php",
            self::repoStub($moduleName, $modulePath)
        );

        file_put_contents(
            "$basePath/Services/{$moduleName}Service.php",
            self::serviceStub($moduleName, $modulePath)
        );

        file_put_contents(
            "$basePath/DTOs/{$moduleName}DTO.php",
            self::dtoStub($moduleName, $modulePath)
        );

        file_put_contents(
            "$basePath/Routes.php",
            self::routeStub($moduleName, $modulePath)
        );

        echo "Module $modulePath created successfully \n";
    }

    protected static function buildNamespace($path, $layer)
    {
        return "App\\Modules\\" . str_replace('/', '\\', $path) . "\\$layer";
    }

    protected static function routeStub($name, $path)
    {
        $namespace = self::buildNamespace($path, 'Controllers');
        $route = strtolower($name);

        return "<?php

use App\Helpers\Route;
use $namespace\\{$name}Controller;

Route::group('/$route', function() {
    Route::get('', [{$name}Controller::class, 'index']);
});
";
    }

    protected static function controllerStub($name, $path)
    {
        $namespace = self::buildNamespace($path, 'Controllers');

        return "<?php

namespace $namespace;

use App\\Core\\Controller;

class {$name}Controller extends Controller
{
    public function index()
    {
        return response()->json(['module' => '$name']);
    }
}
";
    }

    protected static function modelStub($name, $path)
    {
        $namespace = self::buildNamespace($path, 'Models');
        $table = strtolower($name) . 's';

        return "<?php

namespace $namespace;

use Illuminate\\Database\\Eloquent\\Model;

class $name extends Model
{
    protected \$table = '$table';
}
";
    }

    protected static function repoStub($name, $path)
    {
        $namespace = self::buildNamespace($path, 'Repositories');
        $modelNamespace = self::buildNamespace($path, 'Models');

        return "<?php

namespace $namespace;

use App\\Core\\BaseRepository;
use $modelNamespace\\$name;

class {$name}Repository extends BaseRepository
{
    public function __construct()
    {
        \$this->model = new $name();
    }
}
";
    }

    protected static function serviceStub($name, $path)
    {
        $namespace = self::buildNamespace($path, 'Services');

        return "<?php

namespace $namespace;

class {$name}Service
{
    //
}
";
    }

    protected static function dtoStub($name, $path)
    {
        $namespace = self::buildNamespace($path, 'DTOs');

        return "<?php

namespace $namespace;

class {$name}DTO
{
    public function __construct(
        public \$data = []
    ) {}
}
";
    }
}