<div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
    <div {{ $attributes }}>
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            {{ $slot }}
        </svg>
    </div>
    <div>
        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            {{ $title }}
        </p>
        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            {{ $total }}
        </p>
    </div>
</div>