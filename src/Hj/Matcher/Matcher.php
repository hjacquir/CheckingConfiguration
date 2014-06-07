<?php

/* Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\Matcher;

use Hj\Agent;
use Hj\Matchable\Matchable;

/**
 * Matcher
 */
interface Matcher
{
    /**
     * @param Agent $agent
     *
     * @return Matchable
     */
     public function match(Agent $agent);
}
