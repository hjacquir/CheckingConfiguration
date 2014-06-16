<?php

/* Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\Matchable;

/**
 * interface Platform
 * @package Hj\Matchable
 */
interface Platform extends Matchable
{
    /**
     * Set the platform version.
     *
     * @param string $version
     */
    public function setVersion($version);

    /**
     * Returns the platform version.
     *
     * @return string
     */
    public function getVersion();
}