<x-layouts.app.header :title="$title ?? null">
    <flux:main>
        @if (config('app.announcement.enabled') && config('app.announcement.message'))
            <flux:callout variant="{{ config('app.announcement.type') }}" icon="exclamation-circle" heading="{{ config('app.announcement.message') }}" />
        @endif

        {{ $slot }}
    </flux:main>
</x-layouts.app.header>
