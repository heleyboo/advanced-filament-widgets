<?php

namespace Heleyboo\AdvancedFilamentWidgets\Components;

use Closure;
use Filament\Infolists\Components\TextEntry;
use Filament\Support\Colors\Color;
use Filament\Support\Concerns\HasColor;

class SimpleTextEntry extends TextEntry
{
//    use HasColor;

    protected string | int $level = 2;

    protected string | Closure $content = '';

    protected string $view = 'advanced-filament-widgets::components.simple-text-entry';

    public function content(string | Closure $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function level(string | int $level): static
    {
        $this->level = $level;

        return $this;
    }

//    public function getColor(): array
//    {
//        return $this->evaluate($this->color) ?? Color::Amber;
//    }

    public function getContent(): string
    {
        return $this->evaluate($this->content);
    }

    public function getLevel(): string
    {
        return is_int($this->level) ? 'h' . $this->level : $this->level;
    }
}
