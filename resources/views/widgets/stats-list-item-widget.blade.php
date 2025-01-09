@php
    $heading = $this->getHeading();
    $description = $this->getDescription();
    $hasHeading = filled($heading);
    $hasDescription = filled($description);
@endphp

<x-filament-widgets::widget class="fi-wi-stats-list-item-stat relative rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
    @if ($hasHeading || $hasDescription)
        <div class="fi-wi-stats-list-item-header grid gap-y-1">
            @if ($hasHeading)
                <h3
                    class="fi-wi-stats-list-item-header-heading col-span-full text-base font-semibold leading-6 text-gray-950 dark:text-white"
                >
                    {{ $heading }}
                </h3>
            @endif

            @if ($hasDescription)
                <p
                    class="fi-wi-stats-list-item-header-description overflow-hidden break-words text-sm text-gray-500 dark:text-gray-400"
                >
                    {{ $description }}
                </p>
            @endif
        </div>
    @endif

        <!-- Country Sales List -->
        <ul class="mt-6 space-y-4">
            @foreach ($this->getCachedStats() as $stat)
                {{ $stat }}
            @endforeach
        </ul>
</x-filament-widgets::widget>
