<?php

namespace Cabromiley\Larabook;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Cabromiley\Larabook\Skeleton\SkeletonClass
 */
class LarabookFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'larabook';
    }
}
