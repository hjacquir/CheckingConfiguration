<?php

/* Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\Matcher;

use Hj\Agent;
use Hj\Engine\Engine;

/**
 * Class FirefoxMatcher
 */
class FirefoxMatcher extends BrowserMatcher
{
    /**
     * Behavior used by the matcher to return the version when the browser do not use regex
     *
     * @param Agent $agent
     * @param Engine $engine
     *
     * @return string
     */
    protected function matchVersionWithoutRegex(Agent $agent, Engine $engine)
    {
        throw new \RuntimeException(__CLASS__ . "::" . "matchVersionWithoutRegex() is not implemented.");
    }
}
