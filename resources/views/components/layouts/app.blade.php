<x-layouts.app.header :title="$title ?? null">
    <flux:main>
        <flux:callout variant="warning" icon="exclamation-circle" heading="Test announcement" />

        {{ $slot }}
    </flux:main>
</x-layouts.app.header>
