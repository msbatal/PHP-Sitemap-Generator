<?php

    require_once ('SunSitemap.php'); // Call 'SunSitemap' class

    $sitemap = new SunSitemap('http://localhost/sunsitemap', '../test', null, true);

    /*
    // Example with Additional Settings
    $sitemap = new SunSitemap('', '', 1000, true); // base_url, relative_path, max_url_per_sitemap, create_gzip
    $sitemap->createZip = true; // create gzip file
    $sitemap->maxUrl = 50000; // maximum Urls Per Sitemap
    */


    /*
    // Example for Adding URLs Separately
    $sitemap->addUrl('index.php', date('c'), 'daily', '1');
    $sitemap->addUrl('pages/page1.php', date('c'), 'daily', '1');
    $sitemap->addUrl('pages/page2.php', date('c'), 'daily', '1');
    $sitemap->addUrl('pages/page3.php', date('c'), 'daily', '1');
    */


    /*
    // Example for Adding URLs as an Array
    $urls[] = [
        array('index.php', date('c'), 'daily', '1'),
        array('pages/page1.php', date('c'), 'daily', '1'),
        array('pages/page2.php', date('c'), 'daily', '1'),
        array('pages/page3.php', date('c'), 'daily', '1'),
    ];
    $sitemap->addUrl($urls);
    */


    $sitemap->createSitemap()->updateRobots(); // create sitemap and update robots.txt file (chained methods)


    /*
    // Example for Calling Methods Separately
    $sitemap->createSitemap(); // create sitemap
    $sitemap->updateRobots(); // update robots.txt file
    */
    
    
    $memory = $sitemap->memoryUsage(); // total memory usage
    $duration = $sitemap->showDuration(); // total process duration

    echo "Memory Usage: $memory mb.<br>Total Duration: $duration s.";

?>
