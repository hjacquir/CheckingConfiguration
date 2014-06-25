<?php

/* Created by Hatim Jacquir
 * @author : Hatim Jacquir <hatimjacquir@gmail.com>
 */

namespace Hj\Regex;

use Hj\Matchable\Browser;

/**
 * Firefox1 regex
 *
 * @deprecated
 * @todo remove
 */
class Firefox1 implements Regex
{
    /**
     * The expression used in the preg_match function
     *
     * @return string
     */
    public function getExpression()
    {
        return '/Firefox[\/ \(]([^ ;\)]+)/i';
    }

    /**
     * Set the browser version if the right expression is matched
     *
     * @param Browser $browser
     * @param array $matches
     */
    public function setBrowserVersion(Browser $browser, Array $matches)
    {
        $browser->setVersion($matches[1]);
    }
}
