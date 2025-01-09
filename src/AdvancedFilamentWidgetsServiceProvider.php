<?php

namespace Heleyboo\AdvancedFilamentWidgets;

use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
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
        $package->name(static::$name)
            ->hasViews(static::$viewNamespace);

    }

    public function packageRegistered(): void {}

    public function packageBooted(): void
    {
        FilamentAsset::register([
            Css::make('headings', __DIR__ . '/../resources/dist/headings.css')->loadedOnRequest(),
        ], 'heleyboo/advanced-filament-widgets');
    }
}
