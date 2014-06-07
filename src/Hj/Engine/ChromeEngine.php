<?php

/* Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\Engine;

/**
 * Class ChromeEngine
 * @package Hj\Engine
 *
 * @todo Add unit test
 */
class ChromeEngine implements Engine
{
    /**
     * The engine name
     *
     * @return string
     */
    public function getName()
    {
        return 'Chrome';
    }
}