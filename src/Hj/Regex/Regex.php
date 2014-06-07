<?php

/* Created by Hatim Jacquir
 * @author : Hatim Jacquir <hatimjacquir@gmail.com>
 */

namespace Hj\Regex;

use Hj\Matchable\Browser;

/**
 * The Regex will set browser version from the expression searching the term when it is defined in the agent
 */
interface Regex
{
    /**
     * The expression used in the preg_match function
     *
     * @return string
     */
    public function getExpression();

    /**
     * Set the browser version if the right expression is matched
     *
     * @param Browser $browser
     * @param array   $matches
     */
    public function setBrowserVersion(Browser $browser, Array $matches);
}
