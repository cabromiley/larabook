<?php


namespace Cabromiley\Larabook\Console;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class LaraBookGenerate extends Command
{
    /**
     * @var string
     */
    protected $signature = "larabook:generate";

    /**
     * @var string
     */
    protected $description = "Generate yaml for your components";

    public function handle()
    {
        $this->info("Starting for:" . base_path('resources/views/components'));
        $this->getFiles(base_path('resources/views/components'))
            ->each(function ($dir) {
                $componentPath = str_replace('.blade.php', '', $dir);
                $componentName = str_replace(DIRECTORY_SEPARATOR, '.', $componentPath);
                $storagePath = config('larabook.storage.directory').DIRECTORY_SEPARATOR.$componentPath.'.yaml';
                $storage = Storage::disk(config('larabook.storage.driver'));
                $yaml = <<<YAML
name: $componentName
view: $componentName
description: ''
YAML;

                if (!$storage->exists($storagePath)) {
                    $storage->put($storagePath, $yaml);
                }
            });


    }

    private function getFiles($directory)
    {
        $rii = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($directory));

        $files = array();

        foreach ($rii as $file) {

            if ($file->isDir()){
                continue;
            }

            $files[] = $file->getPathname();

        }

        return collect($files)
            ->map(fn ($dir) => str_replace($directory . DIRECTORY_SEPARATOR, '', $dir));
    }
}
