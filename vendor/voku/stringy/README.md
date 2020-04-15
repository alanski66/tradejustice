[![Build Status](https://api.travis-ci.org/voku/Stringy.svg?branch=master)](https://travis-ci.org/voku/Stringy)
[![codecov.io](https://codecov.io/github/voku/Stringy/coverage.svg?branch=master)](https://codecov.io/github/voku/Stringy?branch=master)
[![Codacy Badge](https://api.codacy.com/project/badge/grade/97c46467e585467d884bac1130cb45e5)](https://www.codacy.com/app/voku/Stringy)
[![Latest Stable Version](https://poser.pugx.org/voku/stringy/v/stable)](https://packagist.org/packages/voku/stringy)
[![Total Downloads](https://poser.pugx.org/voku/stringy/downloads)](https://packagist.org/packages/voku/stringy) 
[![License](https://poser.pugx.org/voku/stringy/license)](https://packagist.org/packages/voku/stringy)
[![Donate to this project using Paypal](https://img.shields.io/badge/paypal-donate-yellow.svg)](https://www.paypal.me/moelleken)
[![Donate to this project using Patreon](https://img.shields.io/badge/patreon-donate-yellow.svg)](https://www.patreon.com/voku)

## :accept: Stringy 

A PHP string manipulation library with multibyte support. Compatible with PHP 7+

100% compatible with the original "[Stringy](https://github.com/danielstjules/Stringy)" library, but this fork is optimized 
for performance and is using PHP 7+ features. 

``` php
s('string')->toTitleCase()->ensureRight('y') == 'Stringy'
```

* [Why?](#why)
* [Alternative](#alternative)
* [Installation](#installation-via-composer-require)
* [OO and Chaining](#oo-and-chaining)
* [Implemented Interfaces](#implemented-interfaces)
* [PHP Class Call Creation](#php-class-call-creation)
* [StaticStringy](#staticstringy)
* [Class methods](#class-methods)
    * [create](#createmixed-str--encoding-)
* [Instance methods](#instance-methods)
    * [append](#appendstring-string)
    * [appendPassword](#appendpasswordint-length)
    * [appendUniqueIdentifier](#appenduniqueidentifierstring-extraprefix)
    * [appendRandomString](#appendrandomstringint-length-string-possiblechars)
    * [at](#atint-index)
    * [between](#betweenstring-start-string-end--int-offset)
    * [camelize](#camelize)
    * [capitalizePersonName](#capitalizePersonName)
    * [chars](#chars)
    * [collapseWhitespace](#collapsewhitespace)
    * [contains](#containsstring-needle--boolean-casesensitive--true-)
    * [containsAll](#containsallarray-needles--boolean-casesensitive--true-)
    * [containsAny](#containsanyarray-needles--boolean-casesensitive--true-)
    * [countSubstr](#countsubstrstring-substring--boolean-casesensitive--true-)
    * [dasherize](#dasherize)
    * [delimit](#delimitint-delimiter)
    * [endsWith](#endswithstring-substring--boolean-casesensitive--true-)
    * [endsWithAny](#endsWithAnystring-substrings--boolean-casesensitive--true-)
    * [ensureLeft](#ensureleftstring-substring)
    * [ensureRight](#ensurerightstring-substring)
    * [extractText](#extracttextint-length--200-string-search---string-ellipsis--)
    * [first](#firstint-n)
    * [escape](#escape)
    * [getEncoding](#getencoding)
    * [hasLowerCase](#haslowercase)
    * [hasUpperCase](#hasuppercase)
    * [htmlDecode](#htmldecode)
    * [htmlEncode](#htmlencode)
    * [humanize](#humanize)
    * [indexOf](#indexofstring-needle--offset--0-)
    * [indexOfLast](#indexoflaststring-needle--offset--0-)
    * [insert](#insertint-index-string-substring)
    * [is](#is)
    * [isAlpha](#isalpha)
    * [isAlphanumeric](#isalphanumeric)
    * [isBase64](#isbase64)
    * [isBlank](#isblank)
    * [isHexadecimal](#ishexadecimal)
    * [isJson](#isjson)
    * [isLowerCase](#islowercase)
    * [isSerialized](#isserialized)
    * [isUpperCase](#isuppercase)
    * [last](#last)
    * [length](#length)
    * [lines](#lines)
    * [longestCommonPrefix](#longestcommonprefixstring-otherstr)
    * [longestCommonSuffix](#longestcommonsuffixstring-otherstr)
    * [longestCommonSubstring](#longestcommonsubstringstring-otherstr)
    * [lowerCaseFirst](#lowercasefirst)
    * [pad](#padint-length--string-padstr-----string-padtype--right-)
    * [padBoth](#padbothint-length--string-padstr----)
    * [padLeft](#padleftint-length--string-padstr----)
    * [padRight](#padrightint-length--string-padstr----)
    * [prepend](#prependstring-string)
    * [regexReplace](#regexreplacestring-pattern-string-replacement--string-options--msr)
    * [removeLeft](#removeleftstring-substring)
    * [removeRight](#removerightstring-substring)
    * [removeHtml](#removehtmlstring-allowabletags)
    * [removeHtmlBreak](#removehtmlbreakstring-replacement)
    * [removeXss](#removexss)
    * [repeat](#repeatmultiplier)
    * [replace](#replacestring-search-string-replacement)
    * [reverse](#reverse)
    * [safeTruncate](#safetruncateint-length--string-substring---)
    * [shuffle](#shuffle)
    * [slugify](#slugify-string-replacement----)
    * [stripeCssMediaQueries](#stripecssmediaqueries)
    * [stripeEmptyHtmlTags](#stripeemptyhtmltags)
    * [stripWhitespace](#stripWhitespace)
    * [startsWith](#startswithstring-substring--boolean-casesensitive--true-)
    * [startsWithAny](#startswithstring-substrings--boolean-casesensitive--true-)
    * [slice](#sliceint-start--int-end-)
    * [split](#splitstring-pattern--int-limit-)
    * [substr](#substrint-start--int-length-)
    * [surround](#surroundstring-substring)
    * [swapCase](#swapcase)
    * [tidy](#tidy)
    * [titleize](#titleize-array-ignore)
    * [toAscii](#toascii)
    * [toBoolean](#toboolean)
    * [toLowerCase](#tolowercase)
    * [toSpaces](#tospaces-tablength--4-)
    * [toTabs](#totabs-tablength--4-)
    * [toTitleCase](#totitlecase)
    * [toUpperCase](#touppercase)
    * [trim](#trim-string-chars)
    * [trimLeft](#trimleft-string-chars)
    * [trimRight](#trimright-string-chars)
    * [truncate](#truncateint-length--string-substring---)
    * [underscored](#underscored)
    * [upperCamelize](#uppercamelize)
    * [upperCaseFirst](#uppercasefirst)
    * [utf8ify](#utf8ify)
* [Extensions](#extensions)
* [Tests](#tests)
* [License](#license)

## Why?

In part due to a lack of multibyte support (including UTF-8) across many of
PHP's standard string functions. But also to offer an OO wrapper around the
`mbstring` module's multibyte-compatible functions. Stringy handles some quirks,
provides additional functionality, and hopefully makes strings a little easier
to work with!

```php
// Standard library
strtoupper('fòôbàř');       // 'FòôBàř'
strlen('fòôbàř');           // 10

// mbstring
mb_strtoupper('fòôbàř');    // 'FÒÔBÀŘ'
mb_strlen('fòôbàř');        // '6'

// Stringy
$stringy = Stringy\Stringy::create('fòôbàř');
$stringy->toUpperCase();    // 'FÒÔBÀŘ'
$stringy->length();         // '6'
```

## Alternative

If you like a more Functional Way to edit strings, then you can take a look at [voku/portable-utf8](https://github.com/voku/portable-utf8), also "voku/Stringy" used the functions from the "Portable UTF-8"-Class but in a more Object Oriented Way.

```php
// Portable UTF-8
use voku\helper\UTF8;
UTF8::strtoupper('fòôbàř');    // 'FÒÔBÀŘ'
UTF8::strlen('fòôbàř');        // '6'
```

## Installation via "composer require"
```shell
composer require voku/stringy
```

## Installation via composer (manually)

If you're using Composer to manage dependencies, you can include the following
in your composer.json file:

```json
"require": {
    "voku/stringy": "~5.0"
}
```

Then, after running `composer update` or `php composer.phar update`, you can
load the class using Composer's autoloading:

```php
require 'vendor/autoload.php';
```

Otherwise, you can simply require the file directly:

```php
require_once 'path/to/Stringy/src/Stringy.php';
```

And in either case, I'd suggest using an alias.

```php
use Stringy\Stringy as S;
```

## OO and Chaining

The library offers OO method chaining, as seen below:

```php
use Stringy\Stringy as S;
echo S::create('fòô     bàř')->collapseWhitespace()->swapCase(); // 'FÒÔ BÀŘ'
```

`Stringy\Stringy` has a __toString() method, which returns the current string
when the object is used in a string context, ie:
`(string) S::create('foo')  // 'foo'`

## Implemented Interfaces

`Stringy\Stringy` implements the `IteratorAggregate` interface, meaning that
`foreach` can be used with an instance of the class:

``` php
$stringy = S::create('fòôbàř');
foreach ($stringy as $char) {
    echo $char;
}
// 'fòôbàř'
```

It implements the `Countable` interface, enabling the use of `count()` to
retrieve the number of characters in the string:

``` php
$stringy = S::create('fòô');
count($stringy);  // 3
```

Furthermore, the `ArrayAccess` interface has been implemented. As a result,
`isset()` can be used to check if a character at a specific index exists. And
since `Stringy\Stringy` is immutable, any call to `offsetSet` or `offsetUnset`
will throw an exception. `offsetGet` has been implemented, however, and accepts
both positive and negative indexes. Invalid indexes result in an
`OutOfBoundsException`.

``` php
$stringy = S::create('bàř');
echo $stringy[2];     // 'ř'
echo $stringy[-2];    // 'à'
isset($stringy[-4]);  // false

$stringy[3];          // OutOfBoundsException
$stringy[2] = 'a';    // Exception
```

## PHP Class Call Creation

As of PHP 5.6+, [`use function`](https://wiki.php.net/rfc/use_function) is
available for importing functions. Stringy exposes a namespaced function,
`Stringy\create`, which emits the same behaviour as `Stringy\Stringy::create()`.

``` php
use function Stringy\create as s;

// Instead of: S::create('fòô     bàř')
s('fòô     bàř')->collapseWhitespace()->swapCase();
```

## StaticStringy

All methods listed under "Instance methods" are available as part of a static
wrapper. For StaticStringy methods, the optional encoding is expected to be the
last argument. The return value is not cast, and may thus be of type Stringy,
integer, boolean, etc.

```php
use Stringy\StaticStringy as S;

// Translates to Stringy::create('fòôbàř', 'UTF-8')->slice(0, 3);
// Returns a Stringy object with the string "fòô"
S::slice('fòôbàř', 0, 3, 'UTF-8');
```

## Class methods

##### create(mixed $str [, $encoding ])

Creates a Stringy object and assigns both str and encoding properties
the supplied values. $str is cast to a string prior to assignment, and if
$encoding is not specified, it defaults to mb_internal_encoding(). It
then returns the initialized object. Throws an InvalidArgumentException
if the first argument is an array or object without a __toString method.

```php
$stringy = S::create('fòôbàř', 'UTF-8'); // 'fòôbàř'
```

If you need a collection of Stringy objects you can use the S::collection()
method. 

```php
$stringyCollection = S::collection(['fòôbàř', 'lall', 'öäü']);
```

## Instance Methods

Stringy objects are immutable. All examples below make use of PHP 5.6
function importing, and PHP 5.4 short array syntax. They also assume the
encoding returned by mb_internal_encoding() is UTF-8. For further details,
see the documentation for the create method above, as well as the notes
on PHP 5.6 creation.

##### afterFirst(string $separator): Stringy

Gets the substring after the first occurrence of a separator.

```php
s('</b></b>')->afterFirst('b'); // '></b>'
```

##### afterFirstIgnoreCase(string $separator): Stringy

Gets the substring after the first occurrence of a separator.

```php
s('</B></B>')->afterFirstIgnoreCase('b'); // '></B>'
```

##### afterLast(string $separator): Stringy

Gets the substring after the last occurrence of a separator.

```php
s('</b></b>')->afterLast('b'); // '>'
```

##### afterLastIgnoreCase(string $separator): Stringy

Gets the substring after the last occurrence of a separator.

```php
s('</B></B>')->afterLastIgnoreCase('b'); // '>'
```

##### append(string $string)

Returns a new string with $string appended.

```php
s('fòô')->append('bàř'); // 'fòôbàř'
// [OR]
StaticStringy::append('fòô', 'bàř'); // e.g.: 'fòôbàř'
```

##### appendPassword(int $length)

Append an password (limited to chars that are good readable).

```php
s('')->appendPassword(8); // e.g.: '89bcdfgh'
// [OR]
StaticStringy::appendPassword(8); // e.g.: '89bcdfgh'
```

##### appendUniqueIdentifier(string $extraPrefix)

Append an unique identifier.

```php
s('')->appendUniqueIdentifier(); // e.g.: '1f3870be274f6c49b3e31a0c6728957f'
// [OR]
StaticStringy::appendUniqueIdentifier(''); // e.g.: '1f3870be274f6c49b3e31a0c6728957f'
```

##### appendRandomString(int $length, string $possibleChars)

Append an random string.

```php
s('')->appendUniqueIdentifier(5, 'ABCDEFGHI'); // e.g.: 'CDEHI'
// [OR]
StaticStringy::appendUniqueIdentifier('', 5, 'ABCDEFGHI'); // e.g.: 'CDEHI'
```

##### at(int $index)

Returns the character at $index, with indexes starting at 0.

```php
s('fòôbàř')->at(3); // 'b'
// [OR]
StaticStringy::at('fòôbàř', 3); // e.g.: 'b'
```

##### beforeFirst(string $separator): Stringy

Gets the substring before the first occurrence of a separator.

```php
s('</b></b>')->beforeFirst('b'); // '</'
```

##### beforeFirstIgnoreCase(string $separator): Stringy

Gets the substring before the first occurrence of a separator.

```php
s('</B></B>')->beforeFirstIgnoreCase('b'); // '</'
```

##### beforeLast(string $separator): Stringy

Gets the substring before the last occurrence of a separator.

```php
s('</b></b>')->beforeLast('b'); // '</b></'
```

##### beforeLastIgnoreCase(string $separator): Stringy

Gets the substring before the last occurrence of a separator.

```php
s('</B></B>')->beforeLastIgnoreCase('b'); // '</B></'
```

##### between(string $start, string $end [, int $offset])

Returns the substring between $start and $end, if found, or an empty
string. An optional offset may be supplied from which to begin the
search for the start string.

```php
s('{foo} and {bar}')->between('{', '}'); // 'foo'
```

##### camelize()

Returns a camelCase version of the string. Trims surrounding spaces,
capitalizes letters following digits, spaces, dashes and underscores,
and removes spaces, dashes, as well as underscores.

```php
s('Camel-Case')->camelize(); // 'camelCase'
```

##### capitalizePersonName()

Returns the string with the first letter of each word capitalized,
except for when the word is a name which shouldn't be capitalized.

```php
s('jaap de hoop scheffer')->capitalizePersonName(); // 'Jaap de Hoop Scheffer'
```

##### chars()

Returns an array consisting of the characters in the string.

```php
s('fòôbàř')->chars(); // ['f', 'ò', 'ô', 'b', 'à', 'ř']
```

##### collapseWhitespace()

Trims the string and replaces consecutive whitespace characters with a
single space. This includes tabs and newline characters, as well as
multibyte whitespace such as the thin space and ideographic space.

```php
s('   Ο     συγγραφέας  ')->collapseWhitespace(); // 'Ο συγγραφέας'
```

##### contains(string $needle [, boolean $caseSensitive = true ])

Returns true if the string contains $needle, false otherwise. By default,
the comparison is case-sensitive, but can be made insensitive
by setting $caseSensitive to false.

```php
s('Ο συγγραφέας είπε')->contains('συγγραφέας'); // true
```

##### containsAll(array $needles [, boolean $caseSensitive = true ])

Returns true if the string contains all $needles, false otherwise. By
default the comparison is case-sensitive, but can be made insensitive by
setting $caseSensitive to false.

```php
s('foo & bar')->containsAll(['foo', 'bar']); // true
```

##### containsAny(array $needles [, boolean $caseSensitive = true ])

Returns true if the string contains any $needles, false otherwise. By
default the comparison is case-sensitive, but can be made insensitive by
setting $caseSensitive to false.

```php
s('str contains foo')->containsAny(['foo', 'bar']); // true
```

##### countSubstr(string $substring [, boolean $caseSensitive = true ])

Returns the number of occurrences of $substring in the given string.
By default, the comparison is case-sensitive, but can be made insensitive
by setting $caseSensitive to false.

```php
s('Ο συγγραφέας είπε')->countSubstr('α'); // 2
```

##### dasherize()

Returns a lowercase and trimmed string separated by dashes. Dashes are
inserted before uppercase characters (with the exception of the first
character of the string), and in place of spaces as well as underscores.

```php
s('fooBar')->dasherize(); // 'foo-bar'
```

##### delimit(int $delimiter)

Returns a lowercase and trimmed string separated by the given delimiter.
Delimiters are inserted before uppercase characters (with the exception
of the first character of the string), and in place of spaces, dashes,
and underscores. Alpha delimiters are not converted to lowercase.

```php
s('fooBar')->delimit('::'); // 'foo::bar'
```

##### endsWith(string $substring [, boolean $caseSensitive = true ])

Returns true if the string ends with $substring, false otherwise. By
default, the comparison is case-sensitive, but can be made insensitive by
setting $caseSensitive to false.

```php
s('fòôbàř')->endsWith('bàř', true); // true
```

##### endsWithAny(string[] $substrings [, boolean $caseSensitive = true ])

Returns true if the string ends with any of $substrings, false otherwise. By 
default, the comparison is case-sensitive, but can be made insensitive by 
setting $caseSensitive to false.

```php
s('fòôbàř')->endsWith(['bàř', 'baz'], true); // true
```

##### ensureLeft(string $substring)

Ensures that the string begins with $substring. If it doesn't, it's prepended.

```php
s('foobar')->ensureLeft('http://'); // 'http://foobar'
```

##### ensureRight(string $substring)

Ensures that the string ends with $substring. If it doesn't, it's appended.

```php
s('foobar')->ensureRight('.com'); // 'foobar.com'
```

##### escape()

Escape html via UTF8::htmlspecialchars(), so we can use this data in our templates.

```php
s('<∂∆ onerror="alert(xss)">')->escape(); // '&lt;∂∆ onerror=&quot;alert(xss)&quot;&gt;'
```

##### extractText(string $search = '', int $length = null, string $ellipsis = '...')

Create an extract from a sentence, so if the search-string was found, it try to centered in the output.

```php
$sentence = 'This is only a Fork of Stringy, take a look at the new features.';
s($sentence)->extractText('Stringy'); // '...Fork of Stringy...'
```

##### first(int $n)

Returns the first $n characters of the string.

```php
s('fòôbàř')->first(3); // 'fòô'
```

##### getEncoding()

Returns the encoding used by the Stringy object.

```php
s('fòôbàř', 'UTF-8')->getEncoding(); // 'UTF-8'
```

##### hasLowerCase()

Returns true if the string contains a lower case char, false otherwise.

```php
s('fòôbàř')->hasLowerCase(); // true
```

##### hasUpperCase()

Returns true if the string contains an upper case char, false otherwise.

```php
s('fòôbàř')->hasUpperCase(); // false
```

##### htmlDecode()

Convert all HTML entities to their applicable characters. An alias of
html_entity_decode. For a list of flags, refer to
http://php.net/manual/en/function.html-entity-decode.php

```php
s('&amp;')->htmlDecode(); // '&'
```

##### htmlEncode()

Convert all applicable characters to HTML entities. An alias of
htmlentities. Refer to http://php.net/manual/en/function.htmlentities.php
for a list of flags.

```php
s('&')->htmlEncode(); // '&amp;'
```

##### humanize()

Capitalizes the first word of the string, replaces underscores with
spaces, and strips '_id'.

```php
s('author_id')->humanize(); // 'Author'
```

##### indexOf(string $needle [, $offset = 0 ]);

Returns the index of the first occurrence of $needle in the string,
and false if not found. Accepts an optional offset from which to begin
the search. A negative index searches from the end

```php
s('string')->indexOf('ing'); // 3
```

##### indexOfLast(string $needle [, $offset = 0 ]);

Returns the index of the last occurrence of $needle in the string,
and false if not found. Accepts an optional offset from which to begin
the search. Offsets may be negative to count from the last character
in the string.

```php
s('foobarfoo')->indexOfLast('foo'); // 10
```

##### insert(int $index, string $substring)

Inserts $substring into the string at the $index provided.

```php
s('fòôbř')->insert('à', 4); // 'fòôbàř'
```

##### is(string $pattern) : bool

Returns true if the string contains the $pattern.

WARNING: Asterisks ("\*") are translated into (".\*") zero-or-more regular expression wildcards.

```php
s('Foo\\Bar\\Lall')->is('*\\Bar\\*'); // true
```

##### isAlpha() : bool

Returns true if the string contains only alphabetic chars, false otherwise.

```php
s('丹尼爾')->isAlpha(); // true
```

##### isAlphanumeric() : bool

Returns true if the string contains only alphabetic and numeric chars, false
otherwise.

```php
s('دانيال1')->isAlphanumeric(); // true
```

##### isBase64() : bool

Returns true if the string is base64 encoded, false
otherwise.

```php
s('Zm9vYmFy')->isBase64(); // true
```

##### isBlank() : bool

Returns true if the string contains only whitespace chars, false otherwise.

```php
s("\n\t  \v\f")->isBlank(); // true
```

##### isEmail() : bool

Returns true if the string contains a valid E-Mail address, false otherwise.

```php
s('lars@moelleken.org')->isEmail(); // true
```

##### isHexadecimal() : bool

Returns true if the string contains only hexadecimal chars, false otherwise.

```php
s('A102F')->isHexadecimal(); // true
```

##### isHtml() : bool

Returns true if the string contains HTML-Tags, false otherwise.

```php
s('<h1>foo</h1>')->isHtml(); // true
```

##### isJson() : bool

Returns true if the string is JSON, false otherwise. Unlike json_decode
in PHP 5.x, this method is consistent with PHP 7 and other JSON parsers,
in that an empty string is not considered valid JSON.

```php
s('{"foo":"bar"}')->isJson(); // true
```

##### isLowerCase() : bool

Returns true if the string contains only lower case chars, false otherwise.

```php
s('fòôbàř')->isLowerCase(); // true
```

##### isSerialized() : bool

Returns true if the string is serialized, false otherwise.

```php
s('a:1:{s:3:"foo";s:3:"bar";}')->isSerialized(); // true
```

##### isUpperCase() : bool

Returns true if the string contains only upper case chars, false otherwise.

```php
s('FÒÔBÀŘ')->isUpperCase(); // true
```

##### last(int $n)

Returns the last $n characters of the string.

```php
s('fòôbàř')->last(3); // 'bàř'
```

##### length()

Returns the length of the string.

```php
s('fòôbàř')->length(); // 6
```

##### lines()

Splits on newlines and carriage returns, returning an array of Stringy
objects corresponding to the lines in the string.

```php
s("fòô\r\nbàř\n")->lines(); // ['fòô', 'bàř', '']
```

##### longestCommonPrefix(string $otherStr)

Returns the longest common prefix between the string and $otherStr.

```php
s('foobar')->longestCommonPrefix('foobaz'); // 'fooba'
```

##### longestCommonSuffix(string $otherStr)

Returns the longest common suffix between the string and $otherStr.

```php
s('fòôbàř')->longestCommonSuffix('fòrbàř'); // 'bàř'
```

##### longestCommonSubstring(string $otherStr)

Returns the longest common substring between the string and $otherStr. In the
case of ties, it returns that which occurs first.

```php
s('foobar')->longestCommonSubstring('boofar'); // 'oo'
```

##### lowerCaseFirst()

Converts the first character of the supplied string to lower case.

```php
s('Σ foo')->lowerCaseFirst(); // 'σ foo'
```

##### pad(int $length [, string $padStr = ' ' [, string $padType = 'right' ]])

Pads the string to a given length with $padStr. If length is less than
or equal to the length of the string, no padding takes places. The default
string used for padding is a space, and the default type (one of 'left',
'right', 'both') is 'right'. Throws an InvalidArgumentException if
$padType isn't one of those 3 values.

```php
s('fòôbàř')->pad(9, '-/', 'left'); // '-/-fòôbàř'
```

##### padBoth(int $length [, string $padStr = ' ' ])

Returns a new string of a given length such that both sides of the string
string are padded. Alias for pad() with a $padType of 'both'.

```php
s('foo bar')->padBoth(9, ' '); // ' foo bar '
```

##### padLeft(int $length [, string $padStr = ' ' ])

Returns a new string of a given length such that the beginning of the
string is padded. Alias for pad() with a $padType of 'left'.

```php
s('foo bar')->padLeft(9, ' '); // '  foo bar'
```

##### padRight(int $length [, string $padStr = ' ' ])

Returns a new string of a given length such that the end of the string is
padded. Alias for pad() with a $padType of 'right'.

```php
s('foo bar')->padRight(10, '_*'); // 'foo bar_*_'
```

##### prepend(string $string)

Returns a new string starting with $string.

```php
s('bàř')->prepend('fòô'); // 'fòôbàř'
```

##### regexReplace(string $pattern, string $replacement [, string $options = 'msr'])

Replaces all occurrences of $pattern in $str by $replacement. An alias
for mb_ereg_replace(). Note that the 'i' option with multibyte patterns
in mb_ereg_replace() requires PHP 5.6+ for correct results. This is due
to a lack of support in the bundled version of Oniguruma in PHP < 5.6,
and current versions of HHVM (3.8 and below).

```php
s('fòô ')->regexReplace('f[òô]+\s', 'bàř'); // 'bàř'
s('fò')->regexReplace('(ò)', '\\1ô'); // 'fòô'
```

##### removeLeft(string $substring)

Returns a new string with the prefix $substring removed, if present.

```php
s('fòôbàř')->removeLeft('fòô'); // 'bàř'
```

##### removeRight(string $substring)

Returns a new string with the suffix $substring removed, if present.

```php
s('fòôbàř')->removeRight('bàř'); // 'fòô'
```

##### removeHtmlBreak(string $replacement)

Returns a new string without "breaks" (<br .*>, \n, \r\n, ...).

```php
s('řàb <ô>òf\', ô<br/>foo <a href="#">lall</a>')->removeHtml(' '); // 'řàb <ô>òf\', ô< foo <a href="#">lall</a>'
```

##### removeHtml(string $allowableTags)

Returns a new string without HTML-Tags.

```php
s('řàb <ô>òf\', ô<br/>foo <a href="#">lall</a>')->removeHtml('<br><br/>'); // 'řàb òf\', ô<br/>foo lall'
```

##### removeXss()

Returns a new string without XSS.

```php
s('<IMG SRC=&#x6A&#x61&#x76&#x61&#x73&#x63&#x72&#x69&#x70&#x74&#x3A&#x61&#x6C&#x65&#x72&#x74&#x28&#x27&#x58&#x53&#x53&#x27&#x29>')->removeXss(); // '<IMG >'
```

##### repeat(int $multiplier)

Returns a repeated string given a multiplier. An alias for str_repeat.

```php
s('α')->repeat(3); // 'ααα'
```

##### shortenAfterWord(int $length, string $strAddOn)

shorten the string after $length, but also after the next word

```php
s('this is a test')->shorten(5, '...'); // 'this...'
```

##### replace(string $search, string $replacement, bool(true) $caseSensitive)

Replaces all occurrences of $search in $str by $replacement.

```php
s('fòô bàř fòô bàř')->replace('fòô ', ''); // 'bàř bàř'
```

##### replaceAll(array $search, string|array $replacement, bool(true) $caseSensitive)

Replaces all occurrences of elements from $search in $str by $replacement.

```php
s('fòô bàř lall bàř')->replace(['fòÔ ', 'lall'], '', false); // 'bàř bàř'
```

##### replaceBeginning(string $search, string $replacement)

Replaces all occurrences of $search in $str by $replacement.

```php
s('fòô bàř fòô bàř')->replaceBeginning('fòô', ''); // ' bàř bàř'
```

##### replaceEnding(string $search, string $replacement)

Replaces all occurrences of $search in $str by $replacement.

```php
s('fòô bàř fòô bàř')->replaceEnding('bàř', ''); // 'fòô bàř fòô '
```

##### reverse()

Returns a reversed string. A multibyte version of strrev().

```php
s('fòôbàř')->reverse(); // 'řàbôòf'
```

##### safeTruncate(int $length [, string $substring = '' ])

Truncates the string to a given length, while ensuring that it does not
split words. If $substring is provided, and truncating occurs, the
string is further truncated so that the substring may be appended without
exceeding the desired length.

```php
s('What are your plans today?')->safeTruncate(22, '...');
// 'What are your plans...'
```

##### shuffle()

A multibyte str_shuffle() function. It returns a string with its characters in
random order.

```php
s('fòôbàř')->shuffle(); // 'àôřbòf'
```

##### slugify([, string $replacement = '-' ])

Converts the string into an URL slug. This includes replacing non-ASCII
characters with their closest ASCII equivalents, removing remaining
non-ASCII and non-alphanumeric characters, and replacing whitespace with
$replacement. The replacement defaults to a single dash, and the string
is also converted to lowercase.

```php
s('Using strings like fòô bàř')->slugify(); // 'using-strings-like-foo-bar'
```

##### stripeCssMediaQueries()

Remove css media-queries.

```php
s('test @media (min-width:660px){ .des-cla #mv-tiles{width:480px} } test ')->stripeCssMediaQueries(); // 'test  test '
```

##### stripeEmptyHtmlTags()

Remove empty html-tag. e.g.: <tag></tag>

```php
s('foo<h1></h1>bar')->stripeEmptyHtmlTags(); // 'foobar'
```

##### strip_whitespace()

Strip all whitespace characters. This includes tabs and newline characters, 
as well as multibyte whitespace such as the thin space and ideographic space.

```php
s('   Ο     συγγραφέας  ')->stripWhitespace(); // 'Οσυγγραφέας'
```

##### startsWith(string $substring [, boolean $caseSensitive = true ])

Returns true if the string begins with $substring, false otherwise.
By default, the comparison is case-sensitive, but can be made insensitive
by setting $caseSensitive to false.

```php
s('FÒÔbàřbaz')->startsWith('fòôbàř', false); // true
```

##### startsWithAny(string[] $substrings [, boolean $caseSensitive = true ])

Returns true if the string begins with any of $substrings, false
otherwise. By default the comparison is case-sensitive, but can be made
insensitive by setting $caseSensitive to false.

```php
s('FÒÔbàřbaz')->startsWith(['fòô', 'bàř'], false); // true
```

##### slice(int $start [, int $end ])

Returns the substring beginning at $start, and up to, but not including
the index specified by $end. If $end is omitted, the function extracts
the remaining string. If $end is negative, it is computed from the end
of the string.

```php
s('fòôbàř')->slice(3, -1); // 'bà'
```

##### snakeize()

Returns a lowercase string with underscore, the convention traditionally had no specific name: the Python style guide refers to it simply as "lower_case_with_underscores". The name "snake_case" comes from the Ruby community.

```php
s('foo1 Bar')->snakeize(); // 'foo_1_bar'
```

##### split(string $pattern [, int $limit ])

Splits the string with the provided regular expression, returning an
array of Stringy objects. An optional integer $limit will truncate the
results.

```php
s('foo,bar,baz')->split(',', 2); // ['foo', 'bar']
```

##### substr(int $start [, int $length ])

Returns the substring beginning at $start with the specified $length.
It differs from the mb_substr() function in that providing a $length of
null will return the rest of the string, rather than an empty string.

```php
s('fòôbàř')->substr(2, 3); // 'ôbà'
```

##### surround(string $substring)

Surrounds a string with the given substring.

```php
s(' ͜ ')->surround('ʘ'); // 'ʘ ͜ ʘ'
```

##### swapCase()

Returns a case swapped version of the string.

```php
s('Ντανιλ')->swapCase(); // 'νΤΑΝΙΛ'
```

##### tidy()

Returns a string with smart quotes, ellipsis characters, and dashes from
Windows-1252 (commonly used in Word documents) replaced by their ASCII equivalents.

```php
s('“I see…”')->tidy(); // '"I see..."'
```

##### titleize([, array $ignore])

Returns a trimmed string with the first letter of each word capitalized.
Also accepts an array, $ignore, allowing you to list words not to be
capitalized.

```php
$ignore = ['at', 'by', 'for', 'in', 'of', 'on', 'out', 'to', 'the'];
s('i like to watch television')->titleize($ignore);
// 'I Like to Watch Television'
```

##### toAscii()

Returns an ASCII version of the string. A set of non-ASCII characters are
replaced with their closest ASCII counterparts, and the rest are removed
unless instructed otherwise.

```php
s('fòôbàř')->toAscii(); // 'foobar'
```

##### toBoolean()

Returns a boolean representation of the given logical string value.
For example, 'true', '1', 'on' and 'yes' will return true. 'false', '0',
'off', and 'no' will return false. In all instances, case is ignored.
For other numeric strings, their sign will determine the return value.
In addition, blank strings consisting of only whitespace will return
false. For all other strings, the return value is a result of a
boolean cast.

```php
s('OFF')->toBoolean(); // false
```

##### toString()

Return Stringy object as string, but you can also use (string) for automatically casting the object into a string.

```php
s('fòôbàř')->toString(); // 'fòôbàř'
```

##### toLowerCase()

Converts all characters in the string to lowercase.

```php
s('FÒÔBÀŘ')->toLowerCase(); // 'fòôbàř'
```

##### toSpaces([, tabLength = 4 ])

Converts each tab in the string to some number of spaces, as defined by
$tabLength. By default, each tab is converted to 4 consecutive spaces.

```php
s(' String speech = "Hi"')->toSpaces(); // '    String speech = "Hi"'
```

##### toTabs([, tabLength = 4 ])

Converts each occurrence of some consecutive number of spaces, as defined
by $tabLength, to a tab. By default, each 4 consecutive spaces are
converted to a tab.

```php
s('    fòô    bàř')->toTabs();
// '   fòô bàř'
```

##### toTitleCase()

Converts the first character of each word in the string to uppercase.

```php
s('fòô bàř')->toTitleCase(); // 'Fòô Bàř'
```

##### toUpperCase()

Converts all characters in the string to uppercase.

```php
s('fòôbàř')->toUpperCase(); // 'FÒÔBÀŘ'
```

##### trim([, string $chars])

Returns a string with whitespace removed from the start and end of the
string. Supports the removal of unicode whitespace. Accepts an optional
string of characters to strip instead of the defaults.

```php
s('  fòôbàř  ')->trim(); // 'fòôbàř'
```

##### trimLeft([, string $chars])

Returns a string with whitespace removed from the start of the string.
Supports the removal of unicode whitespace. Accepts an optional
string of characters to strip instead of the defaults.

```php
s('  fòôbàř  ')->trimLeft(); // 'fòôbàř  '
```

##### trimRight([, string $chars])

Returns a string with whitespace removed from the end of the string.
Supports the removal of unicode whitespace. Accepts an optional
string of characters to strip instead of the defaults.

```php
s('  fòôbàř  ')->trimRight(); // '  fòôbàř'
```

##### truncate(int $length [, string $substring = '' ])

Truncates the string to a given length. If $substring is provided, and
truncating occurs, the string is further truncated so that the substring
may be appended without exceeding the desired length.

```php
s('What are your plans today?')->truncate(19, '...'); // 'What are your pl...'
```

##### underscored()

Returns a lowercase and trimmed string separated by underscores.
Underscores are inserted before uppercase characters (with the exception
of the first character of the string), and in place of spaces as well as dashes.

```php
s('TestUCase')->underscored(); // 'test_u_case'
```

##### upperCamelize()

Returns an UpperCamelCase version of the supplied string. It trims
surrounding spaces, capitalizes letters following digits, spaces, dashes
and underscores, and removes spaces, dashes, underscores.

```php
s('Upper Camel-Case')->upperCamelize(); // 'UpperCamelCase'
```

##### upperCaseFirst()

Converts the first character of the supplied string to upper case.

```php
s('σ foo')->upperCaseFirst(); // 'Σ foo'
```

##### utf8ify()

Converts the string into an valid UTF-8 string.

```php
s('DÃ¼sseldorf')->utf8ify(); // 'Düsseldorf'
```

## Extensions

The following is a list of libraries that extend Stringy:

 * [SliceableStringy](https://github.com/danielstjules/SliceableStringy):
Python-like string slices in PHP
 * [SubStringy](https://github.com/TCB13/SubStringy):
Advanced substring methods

## Tests

From the project directory, tests can be ran using `phpunit`

## Support

For support and donations please visit [Github](https://github.com/voku/Stringy/) | [Issues](https://github.com/voku/Stringy/issues) | [PayPal](https://paypal.me/moelleken) | [Patreon](https://www.patreon.com/voku).

For status updates and release announcements please visit [Releases](https://github.com/voku/Stringy/releases) | [Twitter](https://twitter.com/suckup_de) | [Patreon](https://www.patreon.com/voku/posts).

For professional support please contact [me](https://about.me/voku).

## Thanks

- Thanks to [GitHub](https://github.com) (Microsoft) for hosting the code and a good infrastructure including Issues-Managment, etc.
- Thanks to [IntelliJ](https://www.jetbrains.com) as they make the best IDEs for PHP and they gave me an open source license for PhpStorm!
- Thanks to [Travis CI](https://travis-ci.com/) for being the most awesome, easiest continous integration tool out there!
- Thanks to [StyleCI](https://styleci.io/) for the simple but powerfull code style check.
- Thanks to [PHPStan](https://github.com/phpstan/phpstan) && [Psalm](https://github.com/vimeo/psalm) for relly great Static analysis tools and for discover bugs in the code!

## License

Released under the MIT License - see `LICENSE.txt` for details.
