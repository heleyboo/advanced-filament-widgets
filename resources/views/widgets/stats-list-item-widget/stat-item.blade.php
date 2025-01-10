@php
    use Filament\Support\Enums\IconPosition;
    use Filament\Support\Facades\FilamentView;

    $descriptionColor = $getDescriptionColor() ?? 'gray';
    $descriptionIcon = $getDescriptionIcon();
    $descriptionIconPosition = $getDescriptionIconPosition();
    $ratioIcon = $getRatioIcon();
    $ratioColor = $getRatioColor() ?? 'gray';
    $showProgress = $getShowProgress();
    $progressColor = $getProgressColor() ?? 'gray';
    $ratioIconPosition = $getRatioIconPosition();
    $descriptionIconPosition = $getDescriptionIconPosition();
    $tag = 'li';

    $ratioIconClasses = \Illuminate\Support\Arr::toCssClasses([
        'fi-wi-stats-list-item-stat-item-ratio-icon h-5 w-5',
        match ($ratioColor) {
            'gray' => 'text-gray-400 dark:text-gray-500',
            default => 'text-custom-500',
        },
    ]);

    $ratioIconStyles = \Illuminate\Support\Arr::toCssStyles([
        \Filament\Support\get_color_css_variables(
            $ratioColor,
            shades: [500],
            alias: 'widgets::stats-list-item-widget.stat-item.ratio.icon',
        ) => $ratioColor !== 'gray',
    ]);

    $progressClasses = \Illuminate\Support\Arr::toCssClasses([
        'h-full',
        match ($ratioColor) {
            'gray' => 'bg-gray-400 dark:bg-gray-500',
            default => 'text-custom-500',
        },
    ]);

    $descriptionIconClasses = \Illuminate\Support\Arr::toCssClasses([
        'fi-wi-stats-overview-stat-description-icon h-5 w-5',
        match ($descriptionColor) {
            'gray' => 'text-gray-400 dark:text-gray-500',
            default => 'text-custom-500',
        },
    ]);

    $descriptionIconStyles = \Illuminate\Support\Arr::toCssStyles([
        \Filament\Support\get_color_css_variables(
            $descriptionColor,
            shades: [500],
            alias: 'widgets::stats-overview-widget.stat.description.icon',
        ) => $descriptionColor !== 'gray',
    ]);
@endphp

<{!! $tag !!}
{{
    $getExtraAttributeBag()
        ->class([
            'fi-wi-stats-list-item-stat flex justify-between items-center',
        ])
}}
>
    <div class="flex w-1/2 items-center space-x-3 gap-2">
        @if ($icon = $getIcon())
            <x-filament::icon
                :icon="$icon"
                class="fi-wi-stats-overview-stat-icon h-10 w-10 text-gray-400 dark:text-gray-500"
                @class([
                    'fi-wi-stats-overview-stat-icon h-10 w-10 text-gray-400 dark:text-gray-500',
                    $getRoundedIcon() ? 'rounded-full' : null,
                ])
            />
        @endif
        <div>
            <p class="text-lg font-medium">{{ $getValue() }}</p>
            @if ($description = $getDescription())
                <div class="flex items-center gap-x-1">
                    @if ($descriptionIcon && in_array($descriptionIconPosition, [IconPosition::Before, 'before']))
                        <x-filament::icon
                            :icon="$descriptionIcon"
                            :class="$descriptionIconClasses"
                            :style="$descriptionIconStyles"
                        />
                    @endif

                    <span
                    @class([
                        'fi-wi-stats-overview-stat-description text-sm',
                        match ($descriptionColor) {
                            'gray' => 'text-gray-500 dark:text-gray-400',
                            default => 'fi-color-custom text-custom-600 dark:text-custom-400',
                        },
                        is_string($descriptionColor) ? "fi-color-{$descriptionColor}" : null,
                    ])
                        @style([
                            \Filament\Support\get_color_css_variables(
                                $descriptionColor,
                                shades: [400, 600],
                                alias: 'widgets::stats-overview-widget.stat.description',
                            ) => $descriptionColor !== 'gray',
                        ])
                >
                    {{ $description }}
                </span>

                    @if ($descriptionIcon && in_array($descriptionIconPosition, [IconPosition::After, 'after']))
                        <x-filament::icon
                            :icon="$descriptionIcon"
                            :class="$descriptionIconClasses"
                            :style="$descriptionIconStyles"
                        />
                    @endif
                </div>
            @endif
        </div>
    </div>
    @if($showProgress)
        <div class="flex-grow rounded-lg bg-gray-200 me-4" style="height: 8px;">
            <div
                class="rounded-lg bg-custom-600 dark:bg-custom-400 shadow-lg"
                @style([
                    'height:8px;',
                    'width: ' . $getRatio() . '%;',
                    'box-shadow: 0 .125rem .375rem 0 rgba(0, 186, 209, .3);',
                    \Filament\Support\get_color_css_variables(
                        $progressColor,
                        shades: [400, 600],
                        alias: 'widgets::stats-overview-widget.stat.progress',
                    ) => $progressColor !== 'gray',
                ])
                role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100">
            </div>
        </div>
    @endif

    @if ($ratio = $getRatio())
        <div class="flex items-center gap-x-1">
            @if (!$showProgress && $ratioIcon && in_array($ratioIconPosition, [IconPosition::Before, 'before']))
                <x-filament::icon
                    :icon="$ratioIcon"
                    :class="$ratioIconClasses"
                    :style="$ratioIconStyles"
                />
            @endif

            <span
                @class([
                    'fi-wi-stats-overview-stat-description text-sm',
                    match ($ratioColor) {
                        'gray' => 'text-gray-500 dark:text-gray-400',
                        default => 'fi-color-custom text-custom-600 dark:text-custom-400',
                    },
                    is_string($ratioColor) ? "fi-color-{$ratioColor}" : null,
                ])
                @style([
                    \Filament\Support\get_color_css_variables(
                        $ratioColor,
                        shades: [400, 600],
                        alias: 'widgets::stats-overview-widget.stat.ratio',
                    ) => $ratioColor !== 'gray',
                ])
                    >
                        {{ $ratio }}@if($showProgress)<span>%</span>@endif
                    </span>

                @if (!$showProgress && $ratioIcon && in_array($ratioIconPosition, [IconPosition::After, 'after']))
                    <x-filament::icon
                        :icon="$ratioIcon"
                        :class="$ratioIconClasses"
                        :style="$ratioIconStyles"
                    />
                @endif
        </div>
    @endif
</{!! $tag !!}>
