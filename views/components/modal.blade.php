@props(['formAction' => false])

<div>
    @if ($formAction)
        <form wire:submit.prevent="{{ $formAction }}">
    @endif
    <div class="px-6 py-4">
        <div class="text-lg">
            {{ $title }}
        </div>

        <div class="mt-4 overflow-y-auto max-h-fit">
            {{ $content }}
        </div>
    </div>

    @if (isset($footer))
        <div class="px-6 py-4 bg-gray-100 text-right">
            {{ $footer }}
        </div>
    @endif
    @if ($formAction)
        </form>
    @endif
</div>
