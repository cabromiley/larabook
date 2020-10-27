<?php

namespace Cabromiley\Larabook\Tests;

use Orchestra\Testbench\TestCase;
use Cabromiley\Larabook\LarabookServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [LarabookServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
