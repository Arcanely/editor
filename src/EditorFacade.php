<?php

namespace Arcanely\Editor;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Arcanely\Editor\Skeleton\SkeletonClass
 */
class EditorFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'editor';
    }
}
