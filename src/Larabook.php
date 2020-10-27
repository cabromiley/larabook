<?php

namespace Cabromiley\Larabook;

use \Storage;
use Symfony\Component\Yaml\Yaml;

class Larabook
{
    public function getComponents()
    {
        $isCacheEnabled = config('larabook.cache.enabled');
        $cacheKey = config('larabook.cache.key');

        if (cache()->has($cacheKey) && $isCacheEnabled) {
            return cache()->get($cacheKey);
        }

        $disk = Storage::disk(config('larabook.storage.driver'));
        $directory = config('larabook.storage.directory');

        $components = collect($disk->allFiles($directory))
            ->map(fn ($file) => Yaml::parse($disk->get($file)));

        if ($isCacheEnabled) {
            cache()->put($cacheKey, $components);
        }

        return $components;
    }
}
