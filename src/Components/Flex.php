<?php

namespace Heleyboo\AdvancedFilamentWidgets\Components;

use Closure;
use Filament\Infolists\ComponentContainer;
use Filament\Support\Concerns\HasColor;
use Filament\Infolists\Components\Group;
use Illuminate\View\ComponentAttributeBag;

class Flex extends Group
{
    use HasColor;

    protected string $view = 'advanced-filament-widgets::components.flex';
    protected bool | Closure $isList = false;
    protected bool | Closure $hasChildComponentContainerWrapper = true;
    protected array $containerExtraAttributes = [];

    public function list(bool | Closure $condition = false): static
    {
        $this->isList = $condition;

        return $this;
    }

    public function childComponentContainerWrapper(bool | Closure $condition = true): static
    {
        $this->hasChildComponentContainerWrapper = $condition;

        return $this;
    }

    public function hasChildComponentContainerWrapper(): bool
    {
        return (bool) $this->evaluate($this->hasChildComponentContainerWrapper);
    }

    public function isList(): bool
    {
        return (bool) $this->evaluate($this->isList);
    }

    public function getChildComponentContainer($key = null): ComponentContainer
    {
        if (filled($key)) {
            return $this->getChildComponentContainers()[$key];
        }

        return FlexContainer::make($this->getLivewire())
            ->extraAttributes($this->getContainerExtraAttributes())
            ->parentComponent($this)
            ->components($this->getChildComponents())
            ->list($this->isList())
            ->wrapper($this->hasChildComponentContainerWrapper());
    }

    /**
     * @param array|Closure $attributes
     * @param bool $merge
     * @return $this
     */
    public function containerExtraAttributes(array | Closure $attributes, bool $merge = false): static
    {
        if ($merge) {
            $this->containerExtraAttributes[] = $attributes;
        } else {
            $this->containerExtraAttributes = [$attributes];
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getContainerExtraAttributes(): array
    {
        $temporaryAttributeBag = new ComponentAttributeBag;

        foreach ($this->containerExtraAttributes as $extraAttributes) {
            $temporaryAttributeBag = $temporaryAttributeBag->merge($this->evaluate($extraAttributes));
        }

        return $temporaryAttributeBag->getAttributes();
    }
}
