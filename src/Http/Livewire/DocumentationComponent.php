<?php


namespace Cabromiley\Larabook\Http\Livewire;


use Livewire\Component;
use \Larabook;

class DocumentationComponent extends Component
{
    public $component = null;

    public $displaySize = [ 1920, 1080 ];

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
        if ($size === 'desktop') {
            $this->displaySize = [ 1920, 1080 ];
            return;
        }

        if ($size === 'tablet') {
            $this->displaySize = [ 728, 1024 ];
            return;
        }

        $this->displaySize = [ 375, 667 ];
    }
}
