<?php

namespace Heleyboo\AdvancedFilamentWidgets\Components;

use Closure;
use Filament\Infolists\ComponentContainer;

class FlexContainer extends ComponentContainer
{
    protected string $view = 'advanced-filament-widgets::components.flex-container';

    protected bool | Closure $isList = false;
    protected bool | Closure $hasWrapper = true;

    public function list(bool | Closure $condition = false): static
    {
        $this->isList = $condition;

        return $this;
    }

    public function wrapper(bool | Closure $condition = true): static
    {
        $this->hasWrapper = $condition;

        return $this;
    }

    public function isList(): bool
    {
        return (bool) $this->evaluate($this->isList);
    }

    public function hasWrapper(): bool
    {
        return (bool) $this->evaluate($this->hasWrapper);
    }
}
