<?php

/* Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj;

use Hj\Engine\ChromeEngine;
use Hj\Engine\FirefoxEngine;
use Hj\Matchable\Browser;
use Hj\Matchable\Firefox;
use Hj\Matchable\GoogleChrome;
use Hj\Matchable\Linux;
use Hj\Matchable\Platform;
use Hj\Matcher\ChromeMatcher;
use Hj\Matcher\FirefoxMatcher;
use Hj\Matcher\PlatformMatcher;
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
        $chrome = new GoogleChrome();
        $chrome->addEngine(new ChromeEngine());

        //Matchers
        $firefoxMatcher = new FirefoxMatcher($firefox);
        $chromeMatcher = new ChromeMatcher($chrome);

        $platformMatcher = new PlatformMatcher();
        $platformMatcher->addPlatform(new Linux());

        // the http agent
        $agent = new Agent();

        // Finder
        $finder = new Finder($agent);
        $finder->addMatcher($firefoxMatcher);
        $finder->addMatcher($chromeMatcher);
        $finder->addMatcher($platformMatcher);

        try {
            // find the matchables
            $matchables = $finder->find();

            if (empty($matchables)) {
                throw new \Exception('The browser and the platform are unknown');
            }

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
