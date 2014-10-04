<?php

/* Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\Matchable;

use Hj\Agent;
use Hj\Engine\Engine;
use Hj\Regex\RegexMatcher;

/**
 * Define a Browser
 */
abstract class Browser implements Matchable
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
     * @var bool
     */
    private $regexStrategy;

    /**
     * @param bool $regexStrategy Set by true or false if the browser use regex
     */
    public function __construct($regexStrategy = false)
    {
        $this->regexStrategy = $regexStrategy;
    }

    /**
     * @param RegexMatcher $regex
     */
    public function addRegex(RegexMatcher $regex)
    {
        if (true === $this->regexStrategy) {
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
     * Returns the browser version.
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param Agent $agent
     *
     * @return mixed|null
     *
     * @throws \Exception
     */
    public function occur(Agent $agent)
    {
        $browser = null;

        $engines = $this->getEngines();

        if (empty($engines)) {
            throw new \Exception("You must provide engines for the browser {$this->getName()}");
        }

        foreach ($engines as $engine) {

            if (false !== stripos($agent->getHttpUserAgent(), $engine->getName())) {
                $browser = $this;
                $this->setVersion($agent, $engine);
            }
        }

        return $browser;
    }

    /**
     * The matcher set the browser version
     *
     * @param Agent  $agent
     * @param Engine $engine
     */
    public function setVersion(Agent $agent, Engine $engine)
    {
        if (true === $this->regexStrategy) {
            $this->setVersionWithRegex($agent);
        } else {
            $this->setVersionWithoutRegex($agent, $engine);
        }
    }

    /**
     * @param Agent $agent
     *
     * @throws \Exception
     */
    private function setVersionWithRegex(Agent $agent)
    {
        /**
         * @var RegexMatcher[]
         */
        $regexs = $this->getRegexs();

        if (empty($regexs)) {
            throw new \Exception("You must provide the regexs for the browser {$this->getName()}");
        }

        foreach ($regexs as $regex) {
            if (preg_match($regex->getExpression(), $agent->getHttpUserAgent(), $matches)) {
                $matched = $regex->match($matches);

                if ("" !== $matched) {
                    $this->version = $matched;
                }
            }
        }
    }

    /**
     * Behavior used by the matcher to set the version when the browser do not have regex
     *
     * @param Agent  $agent
     * @param Engine $engine
     */
    private function setVersionWithoutRegex(Agent $agent, Engine $engine)
    {
        $version = $this->matchVersionWithoutRegex($agent, $engine);

        $this->version = $version;
    }

    /**
     * @param Agent $agent
     * @param Engine $engine
     * @return mixed
     */
    abstract protected function matchVersionWithoutRegex(Agent $agent, Engine $engine);
}
