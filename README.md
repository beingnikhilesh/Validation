# beingnikhilesh/validation

An Awesome Validation Engine for PHP

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

## Description

This package provides a powerful and flexible validation engine for PHP applications. It's designed to work seamlessly with PHP 7.0+ and integrates well with CodeIgniter projects. The library offers a clean, fluent syntax for validating various types of data.

## Installation

You can install the package via composer:

```bash
composer require beingnikhilesh/validation
```

## Requirements

- PHP 7.0+
- Respect/Validation library

## Usage

### Basic String Validation

```php

Validation::Category()->function('value', 'name to display', [Validator Enums], [Additional Parameters])

# Validate a simple string
Validation::String()->validateString('Dan Swarovski', 'First Name');

# Validate with Muted Errors
Validation::String(Validator::muteErrors)->validateReferenceNo('xyz-1234-@', 'Reference No', Validator::AllowNull);

# Validate reference numbers
Validation::String()->validateReferenceNo('xyz-1234-@', 'Reference No', Validator::AllowNull);

# Validate query strings
Validation::String()->isQueryString('x=1&xyz=12&yuo=me&me=you&rs=&XY=', 'Query String');

# Validate addresses (with UTF16 support)
Validation::String()->validateAddress('Sr. No. 90, AXGPM875465465*&^% Facebook Addressॐ', 'Addresses', Validator::UTF16);
```

## Features

- Fluent, chainable API for clean code
- Comprehensive validation rules
- UTF-16 support for international character sets
- Customizable error messages
- Mutable error handling
- Support for null values with the `AllowNull` flag
- Query string validation
- Address validation with multi-line support

## Integration with Respect/Validation

This package uses the Respect/Validation library for additional validation rules and flexibility.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.