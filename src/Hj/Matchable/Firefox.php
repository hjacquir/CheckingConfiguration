<?php

/* Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\Matchable;

use Hj\Regex\Regex;
use Hj\Engine\Engine;

/**
 * The Firefox Browser
 */
class Firefox implements Browser
{
    /**
     * @var array
     */
    private $regexs = array();

    /**
     * @var array
     */
    private $engines = array();

    /**
     * @var string
     */
    private $version = 'Unknown';

    /**
     * Return the browser name
     *
     * @return string
     */
    public function getName()
    {
        return 'Firefox';
    }

    /**
     * Return true if the browser use regex to match his version
     *
     * @return boolean
     */
    public function hasRegex()
    {
        return true;
    }

    /**
     * Add regex to the browser
     *
     * @param Regex $regex
     */
    public function addRegex(Regex $regex)
    {
        if ($this->hasRegex()) {
            $this->regexs[] = $regex;
        }

    }

    /**
     * Return all regexs supported by the browser
     *
     * @return array
     */
    public function getRegexs()
    {
        return $this->regexs;
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
}
