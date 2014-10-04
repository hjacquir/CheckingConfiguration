<?php

/* Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\Matcher;

use Exception;
use Hj\Agent;
use Hj\Matchable\Matchable;

/**
 * Class BrowserMatcher
 */
class BrowserMatcher implements Matcher
{
    /**
     * @var Matchable[]
     */
    private $matchables = array();

    /**
     * @var Matchable[]
     */
    private $matched = array();

    /**
     * @param Agent $agent
     *
     * @return \Hj\Matchable\Matchable[]
     *
     * @throws \Exception
     */
    public function match(Agent $agent)
    {
        if (true === empty($this->matchables)) {
            throw new \Exception('The browser matcher is empty you must add browser');
        }

        foreach ($this->matchables as $matchable) {
            $this->matched[] = $matchable->occur($agent);
        }

        return $this->matched;
    }

    /**
     * @param Matchable $matchable
     */
    public function addMatchable(Matchable $matchable)
    {
        $this->matchables[] = $matchable;
    }
}