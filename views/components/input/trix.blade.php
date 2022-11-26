@props([
    'label' => false,
    'error' => false,
    'helpText' => false,
    'type' => 'text',
])

<div>
    @if ($label)
        <label class="block text-sm font-medium text-gray-700">
            {{ $label }}
        </label>
    @endif
    <div class="mt-1 rounded-md shadow-sm" x-data="{
        value: @entangle($attributes->wire('model')),
        isFocused() { return document.activeElement !== this.$refs.trix },
        setValue() { this.$refs.trix.editor.loadHTML(this.value) },
    }" x-init="setValue();
    $watch('value', () => isFocused() && setValue())"
        x-on:trix-change="value = $event.target.value" {{ $attributes->whereDoesntStartWith('wire:model') }} wire:ignore>
        <input id="x" type="hidden">
        <trix-editor x-ref="trix" input="x"
            class="trix-editor form-textarea block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
        </trix-editor>
    </div>

    @if ($error)
        <div class="mt-1 text-red-500 text-sm">{{ $error }}</div>
    @endif

    @if ($helpText)
        <p class="mt-2 text-sm text-gray-500">{{ $helpText }}</p>
    @endif
</div>
