<?php

/* Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\Matchable;

use Hj\Agent;
use Hj\Engine\Engine;
use Hj\Regex\Regex;

/**
 * Class GoogleChrome
 * @package Hj\Matchable
 *
 * @todo Add unit test
 */
class GoogleChrome extends Browser
{
    const NAME = 'Google chrome';

    /**
     * @param Agent $agent
     * @param Engine $engine
     *
     * @return string
     */
    protected function matchVersionWithoutRegex(Agent $agent, Engine $engine)
    {
        $version = array(
            $this->getVersion(),
        );

        $result = explode('/', stristr($agent->getHttpUserAgent(), $engine->getName()));

        if (isset($result[1])) {
            $version = explode(' ', $result[1]);
        }

        return $version[0];
    }

    /**
     * @return string
     */
    public function getName()
    {
        return self::NAME;
    }
}