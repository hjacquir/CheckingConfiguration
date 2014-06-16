<?php

/* Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\Matchable;

/**
 * Class Linux
 * @package Hj\Matchable
 *
 * @todo add unit tests
 */
class Linux implements Platform
{
    private $version = 'Unknown';

    /**
     * Return the matchable name
     *
     * @return string
     */
    public function getName()
    {
        return 'Linux';
    }

    /**
     * Set the platform version.
     *
     * @param string $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * Returns the platform version.
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }
}