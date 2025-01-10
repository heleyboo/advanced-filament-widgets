<?php

namespace Heleyboo\AdvancedFilamentWidgets\Widgets;

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

    protected ?string $heading = null;

    protected ?string $description = null;

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
        return [];
    }
}
