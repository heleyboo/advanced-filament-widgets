@php
    use Filament\Support\Enums\ActionSize;
    use Filament\Support\Enums\IconSize;
@endphp
@php
    $iconSize = IconSize::Large;
    $iconClasses = \Illuminate\Support\Arr::toCssClasses([
            'fi-icon-btn-icon',
            match ($iconSize) {
                IconSize::Small => 'h-4 w-4',
                IconSize::Medium => 'h-5 w-5',
                IconSize::Large => 'h-6 w-6',
                default => $iconSize,
            },
        ]);
@endphp
<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex items-center space-x-3">
            <!-- Icon -->
            <div class="bg-red-100 text-red-500 p-2 rounded-full">
                <x-filament::icon
                    :icon="$this->icon"
                    :class="$iconClasses"
                />
            </div>
            <div>
                <h2 class="text-lg font-medium">Total Profit</h2>
                <p class="text-sm text-gray-500">Last week</p>
            </div>
        </div>
        <!-- Profit Data -->
        <div class="mt-4">
            <p class="text-2xl font-semibold">1.28k</p>
            <span class="text-sm text-red-500 mt-1 bg-gray-400">-12.2%</span>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
