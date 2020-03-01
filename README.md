![tests](https://github.com/webhappens/conditional-methods/workflows/tests/badge.svg)

# Conditional methods

Make method calls conditional by simply appending If or Unless when you call them. Conditional methods allow you to pass a condition to determine whether they should be run or not, removing the need to wrap them inside logic. This is especially useful when you are chaining.

 - [Installation](#installation)
 - [If](#if)
 - [Unless](#unless)

## Installation

Install via composer:

```shell
composer require webhappens/conditional-methods
```

Insert the `ConditionalMethods` trait into your class:

```php
use \WebHappens\ConditionalMethods\ConditionalMethods;
```

If your class is already using the `__call` method, add the following to it:

```php
public function __call($method, $arguments)
{
    if ($type = static::matchConditionalMethod($method)) {
        return $this->callConditionalMethod($type, $method, $arguments);
    }

    // ...

    // throw new \BadMethodCallException();
}
```

## If

Append `If` to the end of any method call and pass your condition as the first argument.

```php
$insurer->renewIf($car->insuranceIsDue(), $car);
```

This replaces the need to do something like:

```php
if ($car->insuranceIsDue()) {
    $insurer->renew($car);
}
```

## Unless

`Unless` works in the same way as `If` except the condition is inverted.

Append `Unless` to the end of any method call and pass your condition as the first argument.

```php
$insurer->renewUnless($car->insuranceIsValid(), $car);
```

## Credits

- Sam Leicester: sam@webhappens.co.uk
- Ben Gurney: ben@webhappens.co.uk
- Big thanks to the guys over at [Spatie](https://spatie.be) for the inspiration on this through their [laravel-html](https://github.com/spatie/laravel-html) package ❤️
- [All Contributors](../../contributors)

Our `Str` class is just a copy of some functions from Laravel's `Str` helper.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
