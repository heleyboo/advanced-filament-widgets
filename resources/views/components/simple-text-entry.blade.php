@php
    $level = $getLevel();
    $state = $getState();
    $color = $getColor($state);
@endphp

<{{ $level }}
{{
    $attributes
        ->merge($getExtraAttributes(), escape: false)
        ->class([
            match ($color) {
                'gray' => 'text-gray-600 dark:text-gray-400',
                default => 'fi-color-custom text-custom-600 dark:text-custom-400',
            },
        ])
        ->style([
            \Filament\Support\get_color_css_variables(
                $color,
                shades: [400, 600],
            ) => $color !== 'gray',
        ])
}}

>
{{ $formatState($state) }}
</{{ $level }}>
