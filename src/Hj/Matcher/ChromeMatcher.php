<?php

/* Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\Matcher;

use Hj\Engine\Engine;
use Hj\Agent;

/**
 * Class ChromeMatcher
 * @package Hj\Matcher
 *
 * @todo Add unit test
 */
class ChromeMatcher extends BrowserMatcher
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
        $result = explode('/', stristr($agent->getHttpUserAgent(), $engine->getName()));

        $version = explode(' ', $result[1]);

        return $version[0];
    }
}