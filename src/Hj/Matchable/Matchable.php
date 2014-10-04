<?php

/* Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\Matchable;

use Hj\Agent;

/**
 * Matchable
 */
interface Matchable
{
    /**
     * @return string
     */
    public function getName();

    /**
     * Returns the matchable version.
     *
     * @return string
     */
    public function getVersion();

    /**
     * @param Agent $agent
     * @return mixed
     */
    public function occur(Agent $agent);
}
