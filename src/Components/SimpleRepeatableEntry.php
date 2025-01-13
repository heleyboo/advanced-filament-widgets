<?php

namespace Heleyboo\AdvancedFilamentWidgets\Components;

use Closure;
use Filament\Infolists\ComponentContainer;
use Filament\Infolists\Components\RepeatableEntry;

class SimpleRepeatableEntry extends RepeatableEntry
{

    protected bool $list = false;

    protected string $view = 'advanced-filament-widgets::components.simple-repeatable-entry';

    public function getChildComponentContainer($key = null): ComponentContainer
    {
        if (filled($key)) {
            return $this->getChildComponentContainers()[$key];
        }

        return FlexContainer::make($this->getLivewire())
            ->parentComponent($this)
            ->components($this->getChildComponents())
            ->wrapper(false);
    }

    public function list(bool | Closure $condition = false): static
    {
        $this->list = $condition;

        return $this;
    }

    public function isList(): string
    {
        return $this->evaluate($this->list);
    }
}
