@php
    use Filament\Infolists\Components\IconEntry\IconEntrySize;
    $color = $getColor() ?? 'gray';
    $size = $getSize() ?? IconEntrySize::Large;
@endphp

@if ($icon = $getIcon())
    <x-filament::icon
        :icon="$icon"
        @class([
            'fi-in-icon-item',
            $getRoundedIcon() ? 'rounded-full' : null,
            match ($size) {
                IconEntrySize::ExtraSmall, 'xs' => 'fi-in-icon-item-size-xs h-3 w-3',
                IconEntrySize::Small, 'sm' => 'fi-in-icon-item-size-sm h-4 w-4',
                IconEntrySize::Medium, 'md' => 'fi-in-icon-item-size-md h-5 w-5',
                IconEntrySize::Large, 'lg' => 'fi-in-icon-item-size-lg h-6 w-6',
                IconEntrySize::ExtraLarge, 'xl' => 'fi-in-icon-item-size-xl h-7 w-7',
                IconEntrySize::TwoExtraLarge, '2xl' => 'fi-in-icon-item-size-2xl h-8 w-8',
                default => $size,
            },
            match ($color) {
                'gray' => 'text-gray-400 dark:text-gray-500',
                default => 'fi-color-custom text-custom-500 dark:text-custom-400',
            },
            is_string($color) ? 'fi-color-' . $color : null,
        ])
        @style([
            \Filament\Support\get_color_css_variables(
                $color,
                shades: [400, 500],
                alias: 'infolists::components.simple-icon-entry.item',
            ) => $color !== 'gray',
        ])
    />
@endif
