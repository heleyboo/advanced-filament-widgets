@php
    use Filament\Support\Enums\MaxWidth;
    $tag = $isList() ? 'ul' : 'div';
    $color = $getColor();
//    $attributes = $attributes
//            ->merge([
//                'id' => $getId(),
//            ], escape: false)
//            ->merge($getExtraAttributes(), escape: false);
//    $attributes['class'] = $attributes['class'] . ' ccc';
@endphp
<{{ $tag }}
    {{
        $attributes
        ->merge($getExtraAttributes(), escape: false)
        ->class([
            match ($color) {
                'gray' => 'bg-gray-600 dark:bg-gray-400',
                default => 'bg-custom-100 dark:bg-custom-200',
            },
        ])
        ->style([
            \Filament\Support\get_color_css_variables($color, [100, 200]) => $color !== 'gray',
        ])
    }}
>
    {{ $getChildComponentContainer() }}
</{{ $tag }}>
