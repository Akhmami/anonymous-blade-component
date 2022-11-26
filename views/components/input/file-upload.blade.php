@props([
    'label' => false,
    'error' => false,
    'helpText' => false,
])

<div>
    @if ($label)
        <label class="block text-sm font-medium text-gray-700">
            {{ $label }}
        </label>
    @endif

    <div class="mt-1 flex items-center">
        {{ $slot }}

        <div x-data="{ focused: false }">
            <span class="ml-5 rounded-md shadow-sm">
                <input @focus="focused = true" @blur="focused = false" class="sr-only" type="file" {{ $attributes }}>
                <label for="{{ $attributes['id'] }}"
                    :class="{ 'outline-none border-blue-300 shadow-outline-blue': focused }"
                    class="cursor-pointer py-2 px-3 border border-gray-300 rounded-md text-sm leading-4 font-medium text-gray-700 hover:text-gray-500 active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                    Select File
                </label>
            </span>
        </div>
    </div>

    @if ($error)
        <div class="mt-1 text-red-500 text-sm">{{ $error }}</div>
    @endif

    @if ($helpText)
        <p class="mt-2 text-sm text-gray-500">{{ $helpText }}</p>
    @endif
</div>
