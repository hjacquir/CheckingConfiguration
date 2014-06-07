<?php

/* Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj;

use Hj\Engine\FirefoxEngine;
use Hj\Matchable\Browser;
use Hj\Matchable\Firefox;
use Hj\Matchable\Platform;
use Hj\Matcher\FirefoxMatcher;
use Hj\Regex\Firefox1;
use Hj\Regex\Firefox2;

/**
 * Handler
 *
 * @todo Refactor
 */
class Handler
{
    public static function output()
    {
        //Matchables - Browser
        $firefox = new Firefox();
        $firefox->addEngine(new FirefoxEngine());
        $firefox->addRegex(new Firefox1());
        $firefox->addRegex(new Firefox2());

        //Matchers
        $firefoxMatcher = new FirefoxMatcher($firefox);

        // the http agent
        $agent = new Agent();

        // Finder
        $finder = new Finder($agent);
        $finder->addMatcher($firefoxMatcher);

        try {
            // find the matchables
            $matchables = $finder->find();
            // output informations
            foreach ($matchables as $matchable) {

                if ($matchable instanceof Browser) {
                    echo 'Browser : ';
                }

                if ($matchable instanceof Platform) {
                    echo 'Platform : ';
                }

                echo $matchable->getName();
                echo ', version : ' . $matchable->getVersion() . PHP_EOL;
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage() . PHP_EOL;
        }
    }
}
