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


    public function render()
    {
        $componentName = $this->componentName;

        return view('larabook::livewire.documentation', compact('componentName'));
    }

    public function setComponent($name)
    {
        $this->componentName = $name;
    }

    public function setDisplaySize($size)
    {
        $this->displaySize = $size;
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
}
