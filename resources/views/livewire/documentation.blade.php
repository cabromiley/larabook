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
            <x-larabook::tabs.item :active="$openTab === 'props'" wire:click="toggleTab('props')">
                Props
            </x-larabook::tabs.item>

            <x-larabook::tabs.item :active="$openTab === 'actions'" wire:click="toggleTab('actions')">
                Actions
            </x-larabook::tabs.item>

            @if($openTab !== '')
                <x-slot name="content">
                    <div>
                        @if($openTab === 'props')
                            <h3 class="text-gray-700 font-semibold text-xl">Props</h3>

                            <div class="mt-3 bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
                                <form action="#" method="POST">
                                    <div class="grid grid-cols-9 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="first_name" class="block text-sm font-medium leading-5 text-gray-700">First name</label>
                                            <input id="first_name" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="last_name" class="block text-sm font-medium leading-5 text-gray-700">Last name</label>
                                            <input id="last_name" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="email_address" class="block text-sm font-medium leading-5 text-gray-700">Email address</label>
                                            <input id="email_address" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="country" class="block text-sm font-medium leading-5 text-gray-700">Country / Region</label>
                                            <select id="country" class="mt-1 block form-select w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                                <option>United States</option>
                                                <option>Canada</option>
                                                <option>Mexico</option>
                                            </select>
                                        </div>

                                        <div class="col-span-6">
                                            <label for="street_address" class="block text-sm font-medium leading-5 text-gray-700">Street address</label>
                                            <input id="street_address" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                        </div>

                                        <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                                            <label for="city" class="block text-sm font-medium leading-5 text-gray-700">City</label>
                                            <input id="city" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                                            <label for="state" class="block text-sm font-medium leading-5 text-gray-700">State / Province</label>
                                            <input id="state" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                                            <label for="postal_code" class="block text-sm font-medium leading-5 text-gray-700">ZIP / Postal</label>
                                            <input id="postal_code" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endif
                    </div>
                </x-slot>
            @endif
        </x-larabook::bottom-bar>
    </div>
</div>
