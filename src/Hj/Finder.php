<?php

/* Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj;

use Hj\Matcher\Matcher;

/**
 * Finder
 */
class Finder
{
    /**
     * @var array
     */
    private $matchers = array();

    /**
     * @var Agent
     */
    private $agent;

    /**
     * @var array
     */
    private $matchables = array();

    /**
     * @param Agent $agent
     */
    public function __construct(Agent $agent)
    {
        $this->agent = $agent;
    }

    /**
     * @param Matcher $matcher
     */
    public function addMatcher(Matcher $matcher)
    {
        $this->matchers[] = $matcher;
    }

    /**
     * @return array
     *
     * @throws \Exception
     */
    public function find()
    {
        if (null === $this->agent->getHttpUserAgent()) {
            throw new \Exception('The http user agent is not defined.');
        }

        if (true === empty($this->matchers)) {
            throw new \Exception('The finder is empty. You must add matcher.');
        }

        foreach ($this->matchers as $matcher) {
            $matchable = $matcher->match($this->agent);

            if (null !== $matchable) {
                $this->matchables[] = $matchable;
            }
        }

        return $this->matchables;
    }
}
