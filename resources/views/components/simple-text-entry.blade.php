@php
    $level = $getLevel();
    $color = $getColor();
@endphp

<{{ $level }}
{{
    $attributes
        ->class([
            'headings-component',
            match ($color) {
                'gray' => 'text-gray-600 dark:text-gray-400',
                default => 'text-custom-500',
            },
        ])
        ->style([
            \Filament\Support\get_color_css_variables($color, [500]) => $color !== 'gray',
        ])
}}

>
{{ $getContent() }}
</{{ $level }}>
