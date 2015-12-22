php-crowi
=========

PHP Library for [Crowi](http://crowi.wiki)


Usage
-----

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

$crowi = new Crowi\Crowi([
    'mongodb_url' => getenv('MONGO_URL'),
]);

$md = new Parsedown();

$pages = $crowi->Page->findBy([
    'path' => new \MongoRegex('/^\/user\/riaf/'),
    'grant' => Crowi\Document\Page::GRANT_PUBLIC,
], null, 5);

foreach ($pages as $page) {
    var_dump($page->getPath());
    var_dump($md->text($page->getRevision()->getBody()));
}
```
