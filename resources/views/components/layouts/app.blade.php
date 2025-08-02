<x-layouts.app.header :title="$title ?? null">
    <flux:main>
        @if (config('app.website_announcement'))
            <flux:callout variant="warning" icon="exclamation-circle" heading="{{ config('app.website_announcement') }}" />
        @endif

        {{ $slot }}
    </flux:main>
</x-layouts.app.header>
