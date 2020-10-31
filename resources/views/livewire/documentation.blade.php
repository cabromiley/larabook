<div class="h-screen flex overflow-hidden bg-gray-100">
    <x-larabook::sidebar :items="$components" />
    <div class="flex flex-col w-0 flex-1 h-screen overflow-hidden relative">
        <x-larabook::topbar>
            @isset($componentName)
                <a href="{{ route(config('larabook.routes.alias').'show', $componentName) }}" target="_blank" class="p-1 mx-4 text-gray-400 rounded-full hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:shadow-outline focus:text-gray-500" aria-label="Notifications">
                    <x-larabook::icons.eye />
                </a>
            @endisset

            <x-larabook::dropdown title="Viewport">
                <x-larabook::dropdown.item
                    wire:click="setDisplaySize([ null, null ])"
                    @click="open = false"
                >
                    Reset
                </x-larabook::dropdown.item>

                <x-larabook::dropdown.item
                    wire:click="setDisplaySize([ 375, 667 ])"
                    @click="open = false"
                >
                    <x-larabook::icons.device-mobile class="inline-block"/>
                    375x667
                </x-larabook::dropdown.item>

                <x-larabook::dropdown.item
                    wire:click="setDisplaySize([ 728, 1024 ])"
                    @click="open = false"
                >
                    <x-larabook::icons.device-tablet class="inline-block"/>
                    728x1024
                </x-larabook::dropdown.item>

                <x-larabook::dropdown.item
                    wire:click="setDisplaySize([ 1920, 1080 ])"
                    @click="open = false"
                >
                    <x-larabook::icons.device-desktop class="inline-block"/>
                    1920x1080
                </x-larabook::dropdown.item>
            </x-larabook::dropdown>
        </x-larabook::topbar>

        <x-larabook::main-panel>
            <x-larabook::header :title="$componentName ?? 'Dashboard'" :component="$componentName ?? ''"></x-larabook::header>
            <div class="w-full h-full mx-auto" style="{{ $this->viewportCss }}">
                @isset($componentName)
                    <div>
                        @if($displaySize[0])
                            <span>{{$displaySize[0]}}x{{ $displaySize[1] }}</span>
                        @endif
                    </div>
                    <iframe class="{{ $displaySize[0] ? 'border-2' : '' }} w-full h-full border-gray-400 mx-auto" src="{{ route(config('larabook.routes.alias').'show', $componentName) }}" frameborder="0"></iframe>
                @endisset
            </div>
        </x-larabook::main-panel>

        <x-larabook::bottom-bar>
            <x-larabook::tabs.item :active="false">
                Props
            </x-larabook::tabs.item>

            <x-larabook::tabs.item :active="false">
                Actions
            </x-larabook::tabs.item>
        </x-larabook::bottom-bar>
    </div>
</div>
