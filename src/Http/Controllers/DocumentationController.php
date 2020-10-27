<?php


namespace Cabromiley\Larabook\Http\Controllers;

use \Larabook;

class DocumentationController extends Controller
{
    public function index($component = null)
    {
        $components = Larabook::getComponents();

        $currentComponent = $components->firstWhere('name', '=', $component);

        return view('larabook::documentation.index', compact('components', 'currentComponent'));
    }

    public function show($component)
    {
        $components = Larabook::getComponents();

        $component = $components->firstWhere('name', '=', $component);

        return view('larabook::documentation.show', compact('component'));
    }
}
