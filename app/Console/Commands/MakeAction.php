<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeAction extends Command
{
    protected $signature = 'make:action {name}';
    protected $description = 'Create a new Action class';

    public function handle()
{
    $inputName = $this->argument('name');
    $name = str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $inputName);
    $path = app_path('Actions/' . $name . '.php');
    if (File::exists($path)) {
        $this->error("Action {$inputName} already exists!");
        return 1;
    }
    $className = class_basename($name);
    $namespacePath = trim(str_replace('/', '\\', dirname($name)), '\\');
    $namespace = 'App\\Actions' . ($namespacePath ? '\\' . $namespacePath : '');
    $stub = <<<PHP
<?php

namespace {$namespace};

class {$className}
{
    public function execute(array \$data)
    {
        // 
    }
}
PHP;

    File::ensureDirectoryExists(dirname($path));
    File::put($path, $stub);

    $this->info("Action {$className} created successfully at Actions/{$inputName}.php");
    return 0;
}

}
