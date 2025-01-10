<?php

namespace Heleyboo\AdvancedFilamentWidgets\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Support\Str;
class StatsListItemWidgetCommand  extends GeneratorCommand
{
    protected $name = 'make:filament-stats-list-item-widget';
    protected $description = 'Create a filament stats list item widget';
    protected $type = 'Stats List Item Widget';

    protected function getStub(): string
    {
        return __DIR__ . '/../../stubs/stats-list-item.stub';
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Filament\Widgets';
    }

    protected function getArguments(): array
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the widget class'],
        ];
    }

    protected function buildClass($name): array|false|string
    {
        $stub = file_get_contents($this->getStub());

        // Determine the namespace and class name
        $namespace = $this->getDefaultNamespace(trim($this->rootNamespace(), '\\'));
        $className = Str::studly($this->argument('name'));

        // Replace placeholders in the stub
        return str_replace(
            ['{{ namespace }}', '{{ class }}'],
            [$namespace, $className],
            $stub
        );
    }

    protected function replaceClass($stub, $name): array|string
    {
        return str_replace('{{ class }}', $name, $stub);
    }

    protected function getPath($name): string
    {
        // Define the path where the widget will be created
        $name = Str::studly($name);
        return app_path("Filament/Widgets/{$name}.php");
    }

    public function handle(): bool
    {
        $name = $this->argument('name');
        $path = $this->getPath($name);

        // Check if the file already exists
        if (File::exists($path)) {
            $this->error("The widget class {$name} already exists.");
            return false;
        }

        // Generate the class content and write to the file
        $this->makeDirectory($path);
        file_put_contents($path, $this->buildClass($name));

        $this->info("Widget class {$name} created successfully at {$path}");
        return true;
    }
}
