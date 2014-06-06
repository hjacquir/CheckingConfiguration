<?php

/* Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\Engine;

/**
 * Engine Firefox, Camino, K-Meleon, SeaMonkey, Netscape, and other Gecko-based browsers
 */
class Gecko implements Engine
{
    /**
     * The engine name
     *
     * @return string
     */
    public function getName()
    {
        return 'Gecko';
    }
}
