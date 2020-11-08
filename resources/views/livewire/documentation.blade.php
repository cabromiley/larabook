<div class="h-screen flex overflow-hidden bg-gray-100">
    <x-larabook::sidebar :items="$this->components" />
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
                    <iframe x-data x-on:refresh-frame.window="document.querySelector('#component-frame').src += ''; console.log('reloading')" id="component-frame" class="{{ $displaySize[0] ? 'border-2' : '' }} w-full h-full border-gray-400 mx-auto" src="{{ route(config('larabook.routes.alias').'show', $componentName) }}" frameborder="0"></iframe>
                @endisset
            </div>
        </x-larabook::main-panel>

        <x-larabook::bottom-bar>
            <x-larabook::tabs.item :active="$openTab === 'props'" wire:click="toggleTab('props')">
                Props
            </x-larabook::tabs.item>

            <x-larabook::tabs.item :active="$openTab === 'prop_types'" wire:click="toggleTab('prop_types')">
                Prop Types
            </x-larabook::tabs.item>

            <x-larabook::tabs.item :active="$openTab === 'description'" wire:click="toggleTab('description')">
                Description
            </x-larabook::tabs.item>

            @if($openTab !== '')
                <x-slot name="content">
                    <div>
                        @if($openTab === 'props')
                            <div class="mt-3 bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
                                <form @submit.pevent action="#" method="POST">
                                    <x-larabook::grid.row :rows="4" :gap="6">
                                        @if(is_array($this->component) && isset($this->component['props']) && count($this->component['props']) > 0)
                                            @foreach($this->component['props'] as $key => $prop)
                                                <x-larabook::grid.col :key="$key" :col="$prop['cols'] ?? 1">
                                                    @if($prop['type'] === 'String')
                                                        <x-larabook::form.label :for="$key" :label="$key">
                                                            <x-larabook::form.input :id="$key" :value="$this->props[$key] ?? ''" wire:change="setProps('{{ $key }}', $event.target.value)" />
                                                        </x-larabook::form.label>
                                                    @endif

                                                    @if($prop['type'] === 'Enum')
                                                        <x-larabook::form.label :for="$key" :label="$key">
                                                            <x-larabook::form.select :id="$key" :value="$this->props[$key] ?? ''" wire:change="setProps('{{ $key }}', $event.target.value)">
                                                                @foreach($prop['options'] as $option)
                                                                    <option value="{{ $option }}" @if(isset($this->props[$key]) && $option === $this->props[$key]) selected @endif>{{ $option }}</option>
                                                                @endforeach
                                                            </x-larabook::form.select>
                                                        </x-larabook::form.label>
                                                    @endif
                                                </x-larabook::grid.col>
                                            @endforeach
                                        @else
                                            <x-larabook::grid.col :col="4">
                                                Oops there is no props available for this component
                                            </x-larabook::grid.col>
                                        @endif
                                    </x-larabook::grid.row>
                                </form>
                            </div>
                        @endif
                    </div>
                </x-slot>
            @endif
        </x-larabook::bottom-bar>
    </div>
</div>
