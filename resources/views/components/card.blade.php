@props([
    'title' => null,
    'padding' => true,
    'shadow' => true,
])

<div {{ $attributes->merge(['class' => 'bg-white rounded-lg border border-gray-200 overflow-hidden' . ($shadow ? ' shadow-md hover:shadow-lg transition-shadow duration-300' : '')]) }}>
    @if($title)
        <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-white">
            <h3 class="text-lg font-semibold text-gray-800">{{ $title }}</h3>
        </div>
    @endif

    <div class="{{ $padding ? 'p-6' : '' }}">
        {{ $slot }}
    </div>
</div>
