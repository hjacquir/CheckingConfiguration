<?php

/* Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj;

/**
 * Create an http user agent
 */
class Agent
{
    const CLASS_NAME = __CLASS__;
    const UNKNOWN    = null;

    /**
     * @var null|string
     */
    private $httpUserAgent = self::UNKNOWN;

    public function __construct()
    {
        if (isset($_SERVER['HTTP_USER_AGENT'])) {
            $this->httpUserAgent = $_SERVER['HTTP_USER_AGENT'];
        }
    }

    /**
     * @return string
     */
    public function getHttpUserAgent()
    {
        return $this->httpUserAgent;
    }
}
