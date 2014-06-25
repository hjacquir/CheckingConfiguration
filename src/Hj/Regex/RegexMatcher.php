<?php

/**
 * Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\Regex;

/**
 * Interface RegexMatcher
 * @package Hj\Regex
 */
interface RegexMatcher
{
    /**
     * @return string
     */
    public function getExpression();

    /**
     * @param array $matches
     *
     * @return string
     */
    public function match(Array $matches);
}