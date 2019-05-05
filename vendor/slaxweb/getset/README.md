# GetSet

GetSet component provides the **MagicGet** and **MagicSet** traits that can be
used to simplify and unify implementation of magic getter and setter.

## Installation

Installation can be done through [composer](https://getcomposer.org), just add
**slaxweb/getset** package to your *composer.json* file:
```json
{
    "require": {
        "slaxweb/getset": "0.1.*@dev"
    }
}
```

## Usage

Usage of **MagicGet** and **MagicSet** traits is pretty simple and
straightforward, you just need to **use** them in your class, and writing and
reading of your otherwise inaccessible properties is available. Both the
**MagicGet** and **MagicSet** traits will prepend an underscore *(_)* to the
name of the requested property. If you wish to alter or disable the prepend,
then your class that uses those traits must define the **_getSetPrepend**
property with the value you wish to prepend to the requested properties.

If the requested property does not exist, then both traits will throw the
**\SlaxWeb\Exception\UnknownPropertyException** exception.

Example usage:
```php
<?php

class Foo
{
    use SlaxWeb\GetSet\MagicGet;
    use SlaxWeb\GetSet\MagicSet;

    protected $__bar = "";
    protected $_getSetPrepend = "__";
}

$foo = new Foo;

$foo->bar = "baz";
echo $foo->bar;
```
