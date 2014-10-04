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
use Hj\Matchable\Platform;
use Hj\Matcher\BrowserMatcher;
use Hj\Regex\FirefoxRegexMatcher1;
use Hj\Regex\FirefoxRegexMatcher2;

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
        $firefox = new Firefox(true);
        $firefox->addEngine(new FirefoxEngine());
        $firefox->addRegex(new FirefoxRegexMatcher1());
        $firefox->addRegex(new FirefoxRegexMatcher2());

        $chrome = new GoogleChrome();
        $chrome->addEngine(new ChromeEngine());

        //Matchers
        $browserMatcher = new BrowserMatcher();
        $browserMatcher->addMatchable($firefox);
        $browserMatcher->addMatchable($chrome);

        // the http agent
        $agent = new Agent();

        // Finder
        $finder = new Finder($agent);
        $finder->addMatcher($browserMatcher);


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

                echo $matchable->getName();
                echo ', version : ' . $matchable->getVersion() . PHP_EOL;
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage() . PHP_EOL;
        }
    }
}
