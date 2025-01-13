<?php

namespace Heleyboo\AdvancedFilamentWidgets\Components;

use Closure;
use Filament\Infolists\Components\Entry;
use Filament\Infolists\Components\IconEntry\IconEntrySize;
use Filament\Support\Concerns\HasColor;

class SimpleIconEntry extends Entry
{
    use HasColor;

    protected ?string $icon = null;
    protected bool $roundedIcon = false;

    protected IconEntrySize | string | Closure | null $size = null;

    protected string $view = 'advanced-filament-widgets::components.simple-icon';

    public function icon(?string $icon): static
    {
        $this->icon = $icon;

        return $this;
    }

    public function getIcon(): ?string
    {
        return is_string($this->getState()) ? $this->getState() : $this->icon ?? 'heroicon-o-check-circle';
    }

    public function roundedIcon(bool | Closure $rounded = true): static
    {
        $this->roundedIcon = $rounded;

        return $this;
    }

    public function getRoundedIcon(): bool
    {
        return $this->evaluate($this->roundedIcon);
    }

    public function size(IconEntrySize | string | Closure | null $size): static
    {
        $this->size = $size;

        return $this;
    }

    public function getSize(): IconEntrySize | string | null
    {
        return $this->evaluate($this->size);
    }

    public function getColor(): string | array | null
    {
        if ($this->getState() && is_string($this->color) && isset($this->getState()[$this->color])) {
            return $this->getState()[$this->color];
        }

        return $this->evaluate($this->color) ?? $this->evaluate($this->defaultColor);
    }
}
