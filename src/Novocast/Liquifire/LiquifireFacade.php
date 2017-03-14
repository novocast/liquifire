<?php

namespace Novocast\Liquifire;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Illuminate\Html\HtmlBuilder
 */
class LiquifireFacade extends Facade
{

    /**
     * Get the registered name of the component.
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Liquifire';

    }
}
