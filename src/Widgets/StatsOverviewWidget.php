<?php

namespace Heleyboo\AdvancedFilamentWidgets\Widgets;

use Filament\Widgets\Widget;

class StatsOverviewWidget extends Widget
{
    protected static string $view = 'advanced-filament-widgets::widgets.stats-overview-widget';

    public ?string $icon = 'heroicon-o-chart-pie';
    public int | string | array $columnSpan = 4;

    public function icon(): string | null
    {
        return $this->icon;
    }
}
