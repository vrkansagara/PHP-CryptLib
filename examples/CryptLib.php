<?php
/**
 * An example file demonstrating the use of the wrapper class CryptLib
 *
 * PHP version 5.3
 *
 * @category   PHPCryptLib-Examples
 * @package    Core
 * @author     Anthony Ferrara <ircmaxell@ircmaxell.com>
 * @copyright  2011 The Authors
 * @license    http://opensource.org/licenses/bsd-license.php New BSD License
 * @license    http://www.gnu.org/licenses/lgpl-2.1.html LGPL v 2.1
 */

/**
 * Note, you do not need to use namespaces in your code to make use of the library.
 * Namespaces are used here for separation separation only.
 */
namespace CryptLibExamples;

/**
 * Since we're using the wrapper class, it will automatically instantiate the
 * library without having to manually bootstrap the framework.  Either way will
 * work just fine.  Even if you call both, it's smart enough to not double
 * initialize the framework.
 */
require_once dirname(__DIR__) . '/lib/CryptLib/CryptLib.php';

/**
 * There's no parameters to instantiate the class.  Just instantiate it.  Note the
 * namespace prefix.  You can import the class using a `use CryptLib\CryptLib`
 * declaration at the top of the file, but this works just as well.
 */
$cryptLib = new \CryptLib\CryptLib;

/**
 * Now we can do all sorts of things with the library.  Let's start off by
 * generating a random token.  This could be a temporary password, a CSRF token, etc
 *
 * Note that the number in the input is the number of desired characters in the
 * random output.  So if you want 16 random characters, pass in 16.  If you want
 * 300, pass in 300.
 *
 * Also note that this generates medium strength random numbers.  If you are using
 * the generated numbers for encryption or for other sensitive needs, use the
 * random generator class itself (see the Random/strings.php example).
 */
$token = $cryptLib->getRandomToken(16);

printf("\nHere's our token: %s\n", $token);

/**
 * Now, let's generate a random number.  This works just like `rand()` in that you
 * can provide a min and a max to the function to put boundaries on the generated
 * number's range.
 */
$number = $cryptLib->getRandomNumber();

printf("\nHere's a random number from 0 to PHP_INT_MAX: %d\n", $number);

/**
 * Let's bound that to between 10 and 100...
 */
$number = $cryptLib->getRandomNumber(10, 100);

printf("\nHere's a random number from 10 to 100: %d\n", $number);

/**
 * And we can also pick a random element from an array
 *
 * This is similar to array_rand, except that it uses a cryptographic secure RNG
 * (which is likely overkill for most applications)
 */
$array = array('ab', 'bc', 'cd', 'de', 'ef', 'fg', 'gh');
$element = $cryptLib->getRandomArrayElement($array);

printf("\nHere's a random array element: %s\n", $element);