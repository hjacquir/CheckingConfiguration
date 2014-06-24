<?php

/**
 * Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */ 

namespace Hj\Regex\Strategy;

/**
 * Class With
 * @package Hj\Regex\Strategy
 */
class WithRegex implements RegexStrategy
{
    /**
     * @return bool
     */
    public function useRegex()
    {
        return true;
    }
}