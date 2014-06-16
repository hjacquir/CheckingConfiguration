<?php

/* Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\Matcher;

use Hj\Agent;
use Hj\Matchable\Matchable;
use Hj\Matchable\Platform;

/**
 * Class PlatformMatcher
 * @package Hj\Matcher
 *
 * @todo add unit tests
 */
class PlatformMatcher implements Matcher
{
    /**
     * @var array
     */
    private $platforms = array();

    public function addPlatform(Platform $platform)
    {
        $this->platforms[] = $platform;
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
        $platform = null;

        if (empty($this->platforms)) {
            throw new \Exception("You must add platform to the matcher");
        }

        foreach ($this->platforms as $value) {

            if (false !== stripos($agent->getHttpUserAgent(), $value->getName())) {
                $platform = $value;
            }
        }

        return $platform;
    }
}