<?php

/**
 * Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */ 

namespace Hj\Regex\Strategy;

/**
 * Class WithoutRegex
 * @package Hj\Regex\Strategy
 */
class WithoutRegex implements RegexStrategy
{
    /**
     * @return bool
     */
    public function useRegex()
    {
        return false;
    }
}