@props([
    'variant' => 'primary',
    'icon' => null,
    'href' => null,
])

@php
    $classes = match($variant) {
        'primary' => 'bg-indigo-600 hover:bg-indigo-700 text-white border-transparent',
        'secondary' => 'bg-white hover:bg-gray-50 text-gray-700 border-gray-300',
        'danger' => 'bg-red-600 hover:bg-red-700 text-white border-transparent',
        'success' => 'bg-green-600 hover:bg-green-700 text-white border-transparent',
        'warning' => 'bg-yellow-500 hover:bg-yellow-600 text-white border-transparent',
        default => 'bg-indigo-600 hover:bg-indigo-700 text-white border-transparent',
    };

    $iconPaths = [
        'add' => 'M12 4v16m8-8H4',
        'edit' => 'M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z',
        'delete' => 'M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16',
        'view' => 'M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z',
        'save' => 'M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4',
        'back' => 'M10 19l-7-7m0 0l7-7m-7 7h18',
    ];

    $baseClasses = 'inline-flex items-center gap-2 px-4 py-2 border rounded-lg font-medium text-sm transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-sm hover:shadow';
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => "{$baseClasses} {$classes}"]) }}>
        @if($icon && isset($iconPaths[$icon]))
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $iconPaths[$icon] }}"></path>
            </svg>
        @endif
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['type' => 'button', 'class' => "{$baseClasses} {$classes}"]) }}>
        @if($icon && isset($iconPaths[$icon]))
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $iconPaths[$icon] }}"></path>
            </svg>
        @endif
        {{ $slot }}
    </button>
@endif
