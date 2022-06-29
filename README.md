Doctrine binary functions and bitwise operators
==================

The set of extensions to Doctrine 2 that add support for binary functions and bitwise operators available in
MySQL, Oracle, PostgreSQL and SQLite.

Installation
------------

To install with composer:

```shell
composer require jurysosnovsky/doctrine-binary
```

Usage
-----

For the Symfony please read [How to Register custom DQL Functions](https://symfony.com/doc/current/doctrine/custom_dql_functions.html).

For the standalone usage check out the documentation of [Doctrine DQL User Defined Functions](https://www.doctrine-project.org/projects/doctrine-orm/en/latest/cookbook/dql-user-defined-functions.html).

Most of databases uses common bitwise operators like AND (&) OR (|) NOT(~) etc. All available functions present in [config](config).  

MySQL
-----

There are list of the available bitwise operators:

Bitwise AND (a & b) *DoctrineBinary\Common\BitAnd*

Bitwise OR (a | b) *DoctrineBinary\Common\BitOr*

Bitwise XOR (a ^ b) *DoctrineBinary\Common\BitXor* 

Bitwise inversion (~a) *DoctrineBinary\Common\BitInversion*

Right shift (a >> b) D*octrineBinary\Common\LeftShift*

Left shift (a << b) *DoctrineBinary\Common\RightShift*


There are list of the available binary functions:

BIT_COUNT(expr) *DoctrineBinary\Mysql\BitCount*

BIT_AND(expr) *DoctrineBinary\Mysql\BitAnd*

BIT_OR(expr) *DoctrineBinary\Mysql\BitOr*

BIT_XOR(expr) *DoctrineBinary\Mysql\BitXor*


PostgreSQL
-----

There are list of the available bitwise operators:

Bitwise AND (a & b) *DoctrineBinary\Common\BitAnd*

Bitwise OR (a | b) *DoctrineBinary\Common\BitOr*

Bitwise exclusive OR (a # b) *DoctrineBinary\Postgresql\BitXor*

Bitwise NOT (~a) *DoctrineBinary\Common\BitInversion*

Right shift (a >> b) D*octrineBinary\Common\LeftShift*

Left shift (a << b) *DoctrineBinary\Common\RightShift*


Oracle
-----

There are list of the available bitwise operators:

Bitwise AND (a & b) *DoctrineBinary\Common\BitAnd*

Bitwise OR (a | b) *DoctrineBinary\Common\BitOr*

Bitwise XOR (a ^ b) *DoctrineBinary\Common\BitXor*

Bitwise NOT (~a) *DoctrineBinary\Common\BitInversion*

Right shift (a >> b) D*octrineBinary\Common\LeftShift*

Left shift (a << b) *DoctrineBinary\Common\RightShift*

Zero-fill right shift (a >>> b) *DoctrineBinary\Oracle\ZeroFill*


There are list of the available binary functions:

BitAnd *DoctrineBinary\Oracle\BitAnd*

BitClear *DoctrineBinary\Oracle\BitClear*

BitNot *DoctrineBinary\Oracle\BitNot*

BitOr *DoctrineBinary\Oracle\BitOr*

BitRotate *DoctrineBinary\Oracle\BitRotate*

BitSet *DoctrineBinary\Oracle\BitSet*

BitShift *DoctrineBinary\Oracle\BitShift*

BitTest *DoctrineBinary\Oracle\BitTest*

BitXor *DoctrineBinary\Oracle\BitXor*


SQLite
-----

There are list of the available bitwise operators:

Bitwise AND (a & b) *DoctrineBinary\Common\BitAnd*

Bitwise OR (a | b) *DoctrineBinary\Common\BitOr*

Bitwise NOT (~a) *DoctrineBinary\Common\BitInversion*

Right shift (a >> b) D*octrineBinary\Common\LeftShift*

Left shift (a << b) *DoctrineBinary\Common\RightShift*


Other things
------------

Run tests

```shell
composer run test
```

Code style fixes

```shell
composer run lint
```


Troubleshooting
---------------

If you want add something please send pull request.
