<?php

    require_once ('SunSitemap.php'); // Call 'SunSitemap' class

    $sitemap = new SunSitemap('http://localhost/sunsitemap', '../test', null, true, true, true);

    /*
    // Example with Additional Settings
    $sitemap = new SunSitemap('', '', 1000, true, true, true); // base_url, relative_path, max_url_per_sitemap, create_gzip, create_robots_file, create_llms_file
    */

    /*
    $sitemap->createZip = true; // create gzip file
    $sitemap->maxUrl = 50000; // maximum Urls Per Sitemap
    $sitemap->robots = true; // create robots.txt file
    $sitemap->llms = true; // create llms.txt file
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


    $sitemap->createSitemap()->updateRobots(['/admin/', '/config/', '/page.php']); // create sitemap and update robots.txt file, disallowing the given paths (chained methods)


    /*
    // Example for Calling Methods Separately
    $sitemap->createSitemap(); // create sitemap
    $sitemap->updateRobots(['/admin/', '/config/', '/page.php']); // update robots.txt file, disallowing the given paths
    */


    /*
    // Example for Updating Robots.txt with No Disallow Rules
    $sitemap->createSitemap();
    $sitemap->updateRobots(); // no arguments - "Disallow:" stays empty, every path stays crawlable
    */


    $memory = $sitemap->memoryUsage(); // total memory usage
    $duration = $sitemap->showDuration(); // total process duration

    echo "Memory Usage: $memory mb.<br>Total Duration: $duration s.";

?>
