<?php


namespace Cabromiley\Larabook\Http\Controllers;


use Illuminate\Support\Facades\Storage;
use Symfony\Component\Yaml\Yaml;

class DocumentationController extends Controller
{
    public function index($component = null)
    {
        $components = collect(Storage::disk(config('larabook.storage.driver'))->allFiles(config('larabook.storage.directory')))
            ->map(fn ($file) => Yaml::parse(Storage::disk(config('larabook.storage.driver'))->get($file)));

        $currentComponent = $components->firstWhere('name', '=', $component);

        return view('larabook::documentation.index', compact('components', 'currentComponent'));
    }
}
