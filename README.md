# PHP Sitemap Generator

SunSitemap is a simple and fast PHP dynamic sitemap generator class.

The goal of this class is to let you; Create dynamically an XML sitemap that can be submitted to Google, Bing, Yahoo, and other search engines to help them crawl your website better.

By placing a formatted XML file with a site map on your webserver, you enable Search Engine crawlers (like Google) to find out what pages are present and which have recently changed, and to crawl your site accordingly.

The class doesn't have a limit on the number of pages included in the sitemap, although server resources required to create a sitemap depend on the website size.

Having an XML sitemap for your site is an integral part of search engine optimization (SEO). By creating and submitting XML sitemaps you are more likely to get better freshness and coverage in search engines.

<hr>

`Page Last modification` attribute: That is the time the URL was last modified. This information allows crawlers to avoid recrawling documents that haven't changed. Our generator will set this field from your server's response "Last-modified" headers when available.

`Change Frequency` attribute: This value indicates how frequently the content at a particular URL is likely to change. (always, hourly, daily, weekly, monthly, yearly, never)

`Page Priority` attribute: The priority of a particular URL is relative to other pages on the same website. The value for this attribute is a number between 0.0 (lowest) and 1.0 (highest). Our generator will gradually decrease priority depending on the "page depth", i.e. how many clicks away it is from the homepage.

<hr>

### Installation

To utilize this class, first import SunSitemap.php into your project, and require it.
SunSitemap requires PHP 5.5+ to work.

```php
require_once ('SunSitemap.php');
```

### Initialization

Simple initialization with default parameters:

```php
$sitemap = new SunSitemap();
```

or you can use inline parameters:

```php
$sitemap = new SunSitemap('http://localhost/sunsitemap', 'test', 50000, true);
```

Advanced initialization:

```php
$sitemap = new SunSitemap('http://localhost/sunsitemap', '../test'); // base url, relative path
$sitemap->createZip = true; // create gzip file
$sitemap->maxUrl = 50000; // maximum Urls Per Sitemap
```

All config parameters are optional.

It will use default parameters that are set in the class if you don't specify the parameters while creating the object.

### Adding URLs

Add URLs separately

```php
$sitemap = new SunSitemap();
$sitemap->addUrl('index.php', date('c'), 'daily', '1'); // page url, last modification, change frequency, priority
$sitemap->addUrl('pages/page1.php', date('c'), 'daily', '1');
$sitemap->addUrl('pages/page2.php', date('c'), 'daily', '1');
$sitemap->addUrl('pages/page3.php', date('c'), 'daily', '1');
```

Add URLs in an array

```php
$sitemap = new SunSitemap();
$urls[] = [
    array('index.php', date('c'), 'daily', '1'),
    array('pages/page1.php', date('c'), 'daily', '1'),
    array('pages/page2.php', date('c'), 'daily', '1'),
    array('pages/page3.php', date('c'), 'daily', '1')
];
$sitemap->addUrl($urls);
```

### Create Sitemap File

```php
$sitemap = new SunSitemap();
$sitemap->addUrl('index.php', date('c'), 'daily', '1');
$sitemap->createSitemap();
```

### Create/Update Robots.txt File

```php
$sitemap->updateRobots();
```

### Create Sitemap File and Update Robots.txt File

```php
$sitemap = new SunSitemap();
$sitemap->addUrl('index.php', date('c'), 'daily', '1');
$sitemap->createSitemap();
$sitemap->updateRobots();
```

```php
$sitemap = new SunSitemap();
$sitemap->addUrl('index.php', date('c'), 'daily', '1');
$sitemap->createSitemap()->updateRobots();
```

### Helper Methods

Show total memory usage:

```php
$memory = $sitemap->memoryUsage();
echo 'Memory Usage: '.$memory.' mb.';
```

This code will print the total memory usage to the screen.

Show total process duration:

```php
$duration = $sitemap->showDuration();
echo 'Total Duration: '.$duration.' s.';
```

This code will print the total process duration to the screen.
