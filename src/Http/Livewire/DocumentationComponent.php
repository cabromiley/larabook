<?php


namespace Cabromiley\Larabook\Http\Livewire;


use Livewire\Component;
use \Larabook;

class DocumentationComponent extends Component
{
    public ?string $component = null;

    public array $displaySize = [null, null];

    public function render()
    {
        $components = Larabook::getComponents();

        $componentName = $this->component;

        return view('larabook::livewire.documentation', compact('components', 'componentName'));
    }

    public function setComponent($name)
    {
        $this->component = $name;
    }

    public function setDisplaySize($size)
    {
        $this->displaySize = $size;
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
}
