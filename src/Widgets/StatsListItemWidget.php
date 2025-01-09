<?php

namespace Heleyboo\AdvancedFilamentWidgets\Widgets;

use Filament\Support\Colors\Color;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\Concerns\CanPoll;
use Filament\Widgets\Widget;
use Heleyboo\AdvancedFilamentWidgets\Widgets\StatListItemWidget\StatItem;

class StatsListItemWidget extends Widget
{
    use CanPoll;

    /**
     * @var array<StatItem> | null
     */
    protected ?array $cachedStats = null;

    protected int | string | array $columnSpan = 4;

    protected ?string $heading = 'Sales by Countries';

    protected ?string $description = 'Monthly Sales Overview';

    protected static string $view = 'advanced-filament-widgets::widgets.stats-list-item-widget';

    protected function getDescription(): ?string
    {
        return $this->description;
    }

    protected function getHeading(): ?string
    {
        return $this->heading;
    }

    /**
     * @return array<StatItem>
     */
    protected function getCachedStats(): array
    {
        return $this->cachedStats ??= $this->getStatItems();
    }

    /**
     * @return array<StatItem>
     */
    protected function getStatItems(): array
    {
        return [
            StatItem::make('United states', '$105k', 30)
                ->icon(asset('https://demos.pixinvent.com/vuexy-html-admin-template/assets/vendor/fonts/flags/1x1/us.svg'))
                ->descriptionColor(Color::Indigo)
                ->roundedIcon()
                ->ratioColor(Color::Green)
                ->ratioIcon('heroicon-s-chevron-up', IconPosition::Before)
                ->descriptionIcon('heroicon-s-currency-dollar', IconPosition::After)
                ->showProgress(),
            StatItem::make('Brazil', '$25k', '35%')
                ->icon(asset('https://demos.pixinvent.com/vuexy-html-admin-template/assets/vendor/fonts/flags/1x1/br.svg'))
                ->roundedIcon()
                ->ratioColor(Color::Red)
                ->ratioIcon('heroicon-s-chevron-down', IconPosition::Before)
                ->descriptionIcon('heroicon-s-currency-dollar', IconPosition::After),
        ];
    }
}
