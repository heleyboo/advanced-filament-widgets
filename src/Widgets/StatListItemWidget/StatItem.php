<?php

namespace Heleyboo\AdvancedFilamentWidgets\Widgets\StatListItemWidget;

use Closure;
use Filament\Support\Concerns\Macroable;
use Filament\Support\Enums\IconPosition;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\View\ComponentAttributeBag;

class StatItem extends Component implements Htmlable
{
    use Macroable;

    /**
     * @var string | array{50: string, 100: string, 200: string, 300: string, 400: string, 500: string, 600: string, 700: string, 800: string, 900: string, 950: string} | null
     */
    protected string | array | null $color = null;

    protected ?string $icon = null;

    protected string | Htmlable | null $description = null;

    protected ?string $descriptionIcon = null;

    protected ?string $ratioIcon = null;

    protected IconPosition | string | null $descriptionIconPosition = null;

    protected IconPosition | string | null $ratioIconPosition = null;

    /**
     * @var string | array{50: string, 100: string, 200: string, 300: string, 400: string, 500: string, 600: string, 700: string, 800: string, 900: string, 950: string} | null
     */
    protected string | array | null $descriptionColor = null;

    protected string | array | null $ratioColor = null;

    protected string | array | null $progressColor = null;

    protected bool $roundedIcon = false;

    protected bool $showProgress = false;

    /**
     * @var array<string, scalar>
     */
    protected array $extraAttributes = [];

    protected bool $shouldOpenUrlInNewTab = false;

    protected ?string $url = null;

    protected ?string $id = null;

    /**
     * @var scalar | Htmlable | Closure
     */
    protected Closure | string | int | bool | Htmlable | float $value;

    protected Closure | string | int | bool | Htmlable | float $ratio;

    /**
     * @param  scalar | Closure | Htmlable  $value
     */
    final public function __construct(string | Htmlable $description, float | Htmlable | bool | int | Closure | string $value, float | Htmlable | bool | int | Closure | string $ratio)
    {
        $this->description($description);
        $this->value($value);
        $this->ratio($ratio);
    }

    /**
     * @param  scalar | Closure | Htmlable  $value
     */
    public static function make(string | Htmlable $description, float | Htmlable | bool | int | Closure | string $value, float | Htmlable | bool | int | Closure | string $ratio): static
    {
        return app(static::class, ['description' => $description, 'value' => $value, 'ratio' => $ratio]);
    }

    /**
     * @param  string | array{50: string, 100: string, 200: string, 300: string, 400: string, 500: string, 600: string, 700: string, 800: string, 900: string, 950: string} | null  $color
     */
    public function color(string | array | null $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function icon(?string $icon): static
    {
        $this->icon = $icon;

        return $this;
    }

    public function roundedIcon(bool | Closure $rounded = true): static
    {
        $this->roundedIcon = $rounded;

        return $this;
    }

    public function showProgress(bool | Closure $showProgress = true): static
    {
        $this->showProgress = $showProgress;

        return $this;
    }

    public function description(string | Htmlable | null $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param  string | array{50: string, 100: string, 200: string, 300: string, 400: string, 500: string, 600: string, 700: string, 800: string, 900: string, 950: string} | null  $color
     */
    public function descriptionColor(string | array | null $color): static
    {
        $this->descriptionColor = $color;

        return $this;
    }

    public function descriptionIcon(?string $icon, IconPosition | string | null $position = null): static
    {
        $this->descriptionIcon = $icon;
        $this->descriptionIconPosition = $position;

        return $this;
    }

    /**
     * @param  string | array{50: string, 100: string, 200: string, 300: string, 400: string, 500: string, 600: string, 700: string, 800: string, 900: string, 950: string} | null  $color
     */
    public function ratioColor(string | array | null $color): static
    {
        $this->ratioColor = $color;

        return $this;
    }

    public function ratioIcon(?string $icon, IconPosition | string | null $position = null): static
    {
        $this->ratioIcon = $icon;
        $this->ratioIconPosition = $position;

        return $this;
    }

    /**
     * @param  string | array{50: string, 100: string, 200: string, 300: string, 400: string, 500: string, 600: string, 700: string, 800: string, 900: string, 950: string} | null  $color
     */
    public function progressColor(string | array | null $color): static
    {
        $this->progressColor = $color;

        return $this;
    }

    /**
     * @param  array<string, scalar>  $attributes
     */
    public function extraAttributes(array $attributes): static
    {
        $this->extraAttributes = $attributes;

        return $this;
    }

    public function id(string $id): static
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param  scalar | Closure | Htmlable  $value
     */
    public function value(float | Htmlable | bool | int | Closure | string $value): static
    {
        $this->value = $value;

        return $this;
    }

    public function ratio(float | Htmlable | bool | int | Closure | string $ratio): static
    {
        $this->ratio = $ratio;

        return $this;
    }

    /**
     * @return string | array{50: string, 100: string, 200: string, 300: string, 400: string, 500: string, 600: string, 700: string, 800: string, 900: string, 950: string} | null
     */
    public function getColor(): string | array | null
    {
        return $this->color;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function getDescription(): string | Htmlable | null
    {
        return $this->description;
    }

    /**
     * @return string | array{50: string, 100: string, 200: string, 300: string, 400: string, 500: string, 600: string, 700: string, 800: string, 900: string, 950: string} | null
     */
    public function getDescriptionColor(): string | array | null
    {
        return $this->descriptionColor ?? $this->color;
    }

    public function getDescriptionIcon(): ?string
    {
        return $this->descriptionIcon;
    }

    public function getRatioIcon(): ?string
    {
        return $this->ratioIcon;
    }

    /**
     * @return string | array{50: string, 100: string, 200: string, 300: string, 400: string, 500: string, 600: string, 700: string, 800: string, 900: string, 950: string} | null
     */
    public function getRatioColor(): string | array | null
    {
        return $this->ratioColor ?? $this->color;
    }

    /**
     * @return string | array{50: string, 100: string, 200: string, 300: string, 400: string, 500: string, 600: string, 700: string, 800: string, 900: string, 950: string} | null
     */
    public function getProgressColor(): string | array | null
    {
        return $this->progressColor ?? $this->ratioColor;
    }

    public function getDescriptionIconPosition(): IconPosition | string
    {
        return $this->descriptionIconPosition ?? IconPosition::After;
    }

    public function getRatioIconPosition(): IconPosition | string
    {
        return $this->ratioIconPosition ?? IconPosition::After;
    }

    /**
     * @return array<string, scalar>
     */
    public function getExtraAttributes(): array
    {
        return $this->extraAttributes;
    }

    public function getExtraAttributeBag(): ComponentAttributeBag
    {
        return new ComponentAttributeBag($this->getExtraAttributes());
    }

    public function getId(): string
    {
        return $this->id ?? Str::slug($this->getDescription());
    }

    /**
     * @return scalar | Htmlable | Closure
     */
    public function getValue(): float | Closure | Htmlable | bool | int | string
    {
        return value($this->value);
    }

    public function getRatio(): float | Htmlable | bool | int | string | Closure
    {
        return value($this->ratio);
    }

    public function getRoundedIcon(): bool
    {
        return value($this->roundedIcon);
    }

    public function getShowProgress(): bool
    {
        // check ratio is float or int
        if (is_float($this->getRatio()) || is_int($this->getRatio())) {
            return value($this->showProgress);
        }

        return false;
    }

    public function toHtml(): string
    {
        return $this->render()->render();
    }

    public function render(): View
    {
        return view('advanced-filament-widgets::widgets.stats-list-item-widget.stat-item', $this->data());
    }
}
