@props([
'list' => [],
'label' => false,
'error' => false,
'helpText' => false,
'selected' => '',
])

<div>
    @if ($label)
    <label for="location" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    @endif
    <select {{ $attributes->merge(['class' => 'mt-1 block w-full text-base border-gray-300 focus:outline-none focus:ring-indigo-500
    focus:border-indigo-500 sm:text-sm rounded-md']) }}>
        <option value="">Pilih item</option>
        @forelse ($list as $key => $value)
        <option value="{{ $key }}" @if($selected==$key) selected @endif>{{ $value }}</option>
        @empty

        @endforelse
    </select>

    @if ($error)
    <div class="mt-1 text-red-500 text-sm">{{ $error }}</div>
    @endif

    @if ($helpText)
    <p class="mt-2 text-sm text-gray-500">{{ $helpText }}</p>
    @endif
</div>
