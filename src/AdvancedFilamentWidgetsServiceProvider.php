<?php

namespace Heleyboo\AdvancedFilamentWidgets;

use Filament\Support\Assets\Asset;
use Filament\Support\Facades\FilamentAsset;
use Heleyboo\AdvancedFilamentWidgets\Commands\StatsListItemWidgetCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class AdvancedFilamentWidgetsServiceProvider extends PackageServiceProvider
{
    public static string $name = 'advanced-filament-widgets';

    public static string $viewNamespace = 'advanced-filament-widgets';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name(static::$name)
            ->hasCommands($this->getCommands())
            ->hasViews(static::$viewNamespace);

    }

    public function packageRegistered(): void {}

    public function packageBooted(): void
    {
        FilamentAsset::register($this->getAssets(), $this->getAssetPackageName());
    }

    /**
     * @return array<Asset>
     */
    protected function getAssets(): array
    {
        return [];
    }

    protected function getAssetPackageName(): ?string
    {
        return 'heleyboo/advanced-filament-widgets';
    }

    /**
     * @return array<class-string>
     */
    protected function getCommands(): array
    {
        return [
            StatsListItemWidgetCommand::class,
        ];
    }
}
