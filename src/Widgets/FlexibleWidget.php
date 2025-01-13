<?php

namespace Heleyboo\AdvancedFilamentWidgets\Widgets;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Infolists\Infolist;
use Filament\Widgets\Concerns\CanPoll;
use Filament\Widgets\Widget;

class FlexibleWidget extends Widget implements HasForms, HasInfolists
{
    use CanPoll;
    use InteractsWithForms;
    use InteractsWithInfolists;

    protected ?string $heading = null;

    protected ?string $description = null;

    protected static string $view = 'advanced-filament-widgets::widgets.flexible-widget';

    private function infoList(Infolist $infoList): Infolist
    {
        return $infoList->schema($this->getComponents())->state($this->getStates());
    }

    protected function getDescription(): ?string
    {
        return $this->description;
    }

    protected function getHeading(): ?string
    {
        return $this->heading;
    }

    protected function getComponents(): array
    {
        return [];
    }

    protected function getStates(): array
    {
        return [];
    }
}
