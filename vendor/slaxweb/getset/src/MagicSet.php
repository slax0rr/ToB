<?php
/**
 * Magic Set Trait
 *
 * The Magic Set trait provides only the magic '__set' method, to simplify and
 * unify setting of values to protected properties.
 *
 * @package   SlaxWeb\GetSet
 * @author    Tomaz Lovrec <tomaz.lovrec@gmail.com>
 * @copyright 2016 (c) Tomaz Lovrec
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://github.com/slaxweb/
 * @version   0.1
 */
namespace SlaxWeb\GetSet;

trait MagicSet
{
    /**
     * Set magic method
     *
     * Used to set protected class properties.
     *
     * @param string $param Name of the protected parameter, without the
     *                      underscore.
     * @param mixed $value Value of the property
     * @exception \SlaxWeb\Exception\UnknownPropertyException Thrown if access to unknown property is made
     * @return void
     */
    public function __set(string $param, $value)
    {
        $prepend = isset($this->_getSetPrepend) ? $this->_getSetPrepend : "_";
        $property = "{$prepend}{$param}";
        if (isset($this->{$property}) === false) {
            throw new \SlaxWeb\Exception\UnknownPropertyException(
                "Property '{$param}' does not exist in " . __CLASS__ . ", "
                . "unable to get value."
            );
        }

        $this->{$property} = $value;
    }
}
