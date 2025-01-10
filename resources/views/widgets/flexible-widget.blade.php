<x-filament-widgets::widget class="fi-wi-stats-list-item-stat relative rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
    <div
        @if ($pollingInterval = $this->getPollingInterval())
            wire:poll.{{ $pollingInterval }}
        @endif
    >
        {{ $this->infolist }}
    </div>
</x-filament-widgets::widget>
