<?php

/* Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\Matchable;

use Hj\Engine\Engine;
use Hj\Regex\Regex;

/**
 * Class GoogleChrome
 * @package Hj\Matchable
 *
 * @todo Add unit test
 */
class GoogleChrome implements Browser
{
    /**
     * @var string
     */
    private $version = 'Unknown';

    /**
     * @var array
     */
    private $engines;

    /**
     * Add regex to the browser
     *
     * @param Regex $regex
     */
    public function addRegex(Regex $regex)
    {
        throw new \RuntimeException(__CLASS__ . "::" . "addRegex() is not implemented.");
    }

    /**
     * Return all regexs supported by the browser
     *
     * @return array
     */
    public function getRegexs()
    {
        throw new \RuntimeException(__CLASS__ . "::" . "getRegexs() is not implemented.");
    }

    /**
     * Add engine to the browser
     *
     * @param Engine $engine
     */
    public function addEngine(Engine $engine)
    {
        $this->engines[] = $engine;
    }

    /**
     * Return all engines supported by the browser
     *
     * @return array
     */
    public function getEngines()
    {
        return $this->engines;
    }

    /**
     * Set the browser version.
     *
     * @param string $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * Returns the browser version.
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Return true if the browser use regex to match his version
     *
     * @return boolean
     */
    public function hasRegex()
    {
        return false;
    }

    /**
     * Return the matchable name
     *
     * @return string
     */
    public function getName()
    {
        return 'Google Chrome';
    }
}