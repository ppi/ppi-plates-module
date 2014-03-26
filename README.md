PPI Plates Module
=================

[@php]:     http://php.net/         "PHP: Hypertext Preprocessor"
[@ppi]:     http://ppi.io/          "PPI Framework - The PHP Meta Framework!"
[@plates]:  http://platesphp.com/  "The compiling PHP template engine"

Plates template engine module for PPI2.

[![Build Status](https://secure.travis-ci.org/ppi/ppi-mustache-module.png)](http://travis-ci.org/ppi/ppi-mustache-module)

Requirements
------------

* [PHP][@php] 5.3.3 and up
* [PPI Framework 2][@ppi] (2.1.x)

Installation (Composer)
-----------------------

### 0. Install Composer

If you don't have Composer yet, download it following the instructions on
http://getcomposer.org/ or just run the following command:

``` bash
curl -s http://getcomposer.org/installer | php
```

### 1. Add this package to your composer.json

```js
{
    "require": {
        "ppi/plates-module": "dev-master"
    }
}
```

Now tell composer to download the module by running the command:

``` bash
$ php composer.phar update ppi/plates-module
```

Composer will install the module to your project's `vendor/ppi` directory.

### 2. Enable the module

Enable this module by editing `app/config/modules.yml`:

``` yml
modules:
    - PPI\PlatesModule
    # ...
```

License
-------

This module is licensed under the MIT License. See the [LICENSE file](https://github.com/ppi/ppi-plates-module/blob/master/LICENSE) for details.

Authors
-------

* Paul Dragoonis - <paul@ppi.io> ~ [twitter.com/dr4goonis](http://twitter.com/dr4goonis)
* Vítor Brandão - <vitor@ppi.io> ~ [twitter.com/noiselabs](http://twitter.com/noiselabs)

See also the list of [contributors](https://github.com/ppi/ppi-plates-module/contributors) who participated in this project.

Submitting bugs and feature requests
------------------------------------

Bugs and feature requests are tracked on [GitHub](https://github.com/ppi/ppi-plates-module/issues).
