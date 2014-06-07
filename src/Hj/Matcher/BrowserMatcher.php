<?php

/* Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\Matcher;

use Exception;
use Hj\Agent;
use Hj\Engine\Engine;
use Hj\Matchable\Browser;
use Hj\Matchable\Matchable;

/**
 * Class BrowserMatcher
 *
 * @todo Refactor
 */
abstract class BrowserMatcher implements Matcher
{
    /**
     * The Browser
     *
     * @var Browser
     */
    protected $browser;

    /**
     * @param Browser $browser
     */
    public function __construct(Browser $browser)
    {
        $this->browser = $browser;
    }

    /**
     * @param Agent $agent
     *
     * @return Matchable|null
     *
     * @throws \Exception
     */
    public function match(Agent $agent)
    {
        $browser = null;

        $engines = $this->browser->getEngines();

        if (empty($engines)) {
            throw new \Exception("You must provide engines for the browser {$this->browser->getName()}");
        }

        foreach ($engines as $engine) {

            if (false !== stripos($agent->getHttpUserAgent(), $engine->getName())) {
                $browser = $this->browser;
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
    private function setVersion(Agent $agent, Engine $engine)
    {
        if ($this->browser->hasRegex()) {
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
        $regexs = $this->browser->getRegexs();

        if (empty($regexs)) {
            throw new \Exception("You must provide the regexs for the browser {$this->browser->getName()}");
        }

        foreach ($regexs as $regex) {

            if (preg_match($regex->getExpression(), $agent->getHttpUserAgent(), $matches)) {
                $regex->setBrowserVersion($this->browser, $matches);
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

        $this->browser->setVersion($version);
    }

    /**
     * Behavior used by the matcher to return the version when the browser do not use regex
     *
     * @param Agent  $agent
     * @param Engine $engine
     *
     * @return string
     */
    abstract protected function matchVersionWithoutRegex(Agent $agent, Engine $engine);
}
