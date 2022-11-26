@props([
    'label' => false,
    'error' => false,
    'helpText' => false,
])

<div>
    <div class="relative flex items-start">
        <div class="flex h-5 items-center">
            <input {{ $attributes }} type="checkbox"
                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
        </div>
        <div class="ml-3 text-sm">
            <label class="font-medium text-gray-700">{{ $label }}</label>
        </div>
    </div>
    @if ($error)
        <div class="mt-1 text-red-500 text-sm">{{ $error }}</div>
    @endif

    @if ($helpText)
        <p class="mt-2 text-sm text-gray-500">{{ $helpText }}</p>
    @endif
</div>
