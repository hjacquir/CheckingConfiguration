<?php

/* Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\Matchable;

use Hj\Agent;
use Hj\Engine\Engine;

/**
 * The Firefox Browser
 */
class Firefox extends Browser
{
    const NAME = 'Firefox';

    /**
     * @param Agent $agent
     * @param Engine $engine
     * @return mixed|void
     *
     * @throws \RuntimeException
     */
    protected function matchVersionWithoutRegex(Agent $agent, Engine $engine)
    {
        throw new \RuntimeException(__CLASS__ . "::" . "matchVersionWithoutRegex() is not implemented.");
    }

    /**
     * @return string
     */
    public function getName()
    {
        return self::NAME;
    }
}
