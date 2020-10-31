<div class="flex flex-col bg-white shadow">
    <x-larabook::tabs>
        {{ $slot }}
    </x-larabook::tabs>
    <div>
        @isset($content)
            <div class="bg-gray-100 p-4">
                {{ $content ?? '' }}
            </div>
        @endisset
    </div>
</div>
