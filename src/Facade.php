<?php

namespace PixelPenguin\PixelPenguinDemo;

use PixelPenguin\PixelPenguinDemo\Http\Controllers\DemoController;

class Facade
{
    /**
     * {@inheritDoc}
     */
    public static function aFunction()
    {
        return DemoController::functionInController();
    }
}