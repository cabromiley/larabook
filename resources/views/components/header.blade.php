@props([
    'title' => 'Dashboard',
    'component' => ''
])
<div class="mx-4 md:mx-8 mb-4">
    <div>
        <nav class="sm:hidden">
            <a href="{{ route(config('larabook.routes.alias').'index') }}" class="flex items-center text-sm leading-5 font-medium text-gray-500 hover:text-gray-700 transition duration-150 ease-in-out">
                <!-- Heroicon name: chevron-left -->
                <svg class="flex-shrink-0 -ml-1 mr-1 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                Back
            </a>
        </nav>
        <nav class="hidden sm:flex items-center text-sm leading-5 font-medium">
            <a href="{{ route(config('larabook.routes.alias').'index') }}" class="text-gray-500 hover:text-gray-700 transition duration-150 ease-in-out">Dashboard</a>
            @if($component !== '')
                <svg class="flex-shrink-0 mx-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
                <a href="{{ route(config('larabook.routes.alias').'index', [ 'component' => $component ]) }}" class="text-gray-500 hover:text-gray-700 transition duration-150 ease-in-out">{{ $title }}</a>
            @endif
        </nav>
    </div>
    <div class="mt-2 md:flex md:items-center md:justify-between">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate">
                {{ $title }}
            </h2>
        </div>
        <div class="mt-4 flex-shrink-0 flex md:mt-0 md:ml-4">
          {{ $slot }}
        </div>
    </div>
</div>
