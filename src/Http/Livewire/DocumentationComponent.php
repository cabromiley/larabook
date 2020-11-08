<?php


namespace Cabromiley\Larabook\Http\Livewire;


use Illuminate\Support\Collection;
use Livewire\Component;
use \Larabook;

/**
 * Class DocumentationComponent
 * @package Cabromiley\Larabook\Http\Livewire
 * @property Collection components
 */
class DocumentationComponent extends Component
{
    public string $openTab = '';

    public ?string $componentName = null;

    public array $displaySize = [null, null];

    protected $queryString = ['componentName', 'displaySize'];

    public array $props = [];


    public function render()
    {
        $componentName = $this->componentName;
        $this->updateIframe();

        return view('larabook::livewire.documentation', compact('componentName'));
    }

    public function setComponent($name)
    {
        $this->reset();
        $this->componentName = $name;

        $props = $this->component['props'] ?? [];

        foreach($props as $key => $prop) {
            if (empty($prop['default'])) {
                $type = strtolower($prop['type'] ?? 'string');
                if ($type === 'string') {
                    $this->setProps($key, '');
                    continue;
                }

                if ($type === 'number') {
                    $this->setProps($key, 0);
                    continue;
                }

                $this->setProps($key, null);
                continue;
            }
            $this->setProps($key, $prop['default']);
        }

        $this->updateIframe();
    }

    public function setDisplaySize($size)
    {
        $this->displaySize = $size;
    }

    public function setProps($key, $value)
    {
        $this->props[$key] = $value;
    }

    public function toggleTab($tab)
    {
        if ($this->openTab === $tab) {
            $this->openTab = '';
            return;
        }

        $this->openTab = $tab;
    }

    public function getViewportCssProperty()
    {
        $css = '';

        if ($this->displaySize[0]) {
            $css .= "width: {$this->displaySize[0]}px; ";
        }
        if ($this->displaySize[1]) {
            $css .= "height: {$this->displaySize[1]}px";
        }

        return $css;
    }

    public function getComponentsProperty(): Collection
    {
        return Larabook::getComponents();
    }

    public function getComponentProperty()
    {
        return $this->components->firstWhere('name', '=', $this->componentName) ?? [];
    }

    public function updateIframe()
    {
        $componentPropsKey = config('larabook.session.component_props_key', 'larabook::current_component');
        session()->put($componentPropsKey, $this->props);
        $this->dispatchBrowserEvent('refresh-frame');
    }

    public function mount()
    {
        if (! empty($this->componentName)) {
            $this->setComponent($this->componentName);
        }
    }
}
