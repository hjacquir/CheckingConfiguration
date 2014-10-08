<?php

/**
 * Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\Regex;

/**
 * Class FirefoxRegexMatcher1
 * @package Hj\Regex
 */
class FirefoxRegexMatcher1 implements RegexMatcher
{
    /**
     * @return string
     */
    public function getExpression()
    {
        return '/Firefox[\/ \(]([^ ;\)]+)/i';
    }

    /**
     * @param array $matches
     *
     * @return string
     */
    public function match(Array $matches)
    {
        return $matches[1];
    }
}