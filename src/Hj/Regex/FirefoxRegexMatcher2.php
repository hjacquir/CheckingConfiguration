<?php

/**
 * Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */ 

namespace Hj\Regex;

/**
 * Class FirefoxRegexMatcher2
 * @package Hj\Regex
 */
class FirefoxRegexMatcher2 implements RegexMatcher
{
    /**
     * @return string
     */
    public function getExpression()
    {
        return '/Firefox$/i';
    }

    /**
     * @param array $matches
     *
     * @return string
     */
    public function match(Array $matches)
    {
        return '';
    }
}