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
    use InteractsWithInfolists;
    use InteractsWithForms;

    protected static string $view = 'advanced-filament-widgets::widgets.flexible-widget';

    private function infolist(Infolist $infolist)
    {
        return $infolist->schema($this->getComponents())->state($this->getStates());
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
