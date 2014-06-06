<?php

/* Created by Hatim Jacquir
 * @author : Hatim Jacquir <hatimjacquir@gmail.com>
 */

namespace Hj\Regex;

use Hj\Matchable\Browser;

/**
 * The Regex will set browser version from the expression searching the term when it is defined in the agent
 */
abstract class Regex
{
    /**
     * The expression used in the preg_match function
     *
     * @return string
     */
    abstract public function getExpression();

    /**
     * Set the browser version if the right expression is matched
     *
     * @param Browser $browser
     * @param array   $matches
     */
    abstract public function setBrowserVersion(Browser $browser, Array $matches);
}
