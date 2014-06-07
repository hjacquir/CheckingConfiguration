<?php

/* Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\Matchable;

use Hj\Engine\Engine;
use Hj\Regex\Regex;

/**
 * Define a Browser
 */
interface Browser extends Matchable
{
    /**
     * Add regex to the browser
     *
     * @param Regex $regex
     */
    public function addRegex(Regex $regex);

    /**
     * Return all regexs supported by the browser
     *
     * @return array
     */
    public function getRegexs();

    /**
     * Add engine to the browser
     *
     * @param Engine $engine
     */
    public function addEngine(Engine $engine);

    /**
     * Return all engines supported by the browser
     *
     * @return array
     */
    public function getEngines();

    /**
     * Set the browser version.
     *
     * @param string $version
     */
    public function setVersion($version);

    /**
     * Returns the browser version.
     *
     * @return string
     */
    public function getVersion();

    /**
     * Return true if the browser use regex to match his version
     *
     * @return boolean
     */
    public function hasRegex();
}
