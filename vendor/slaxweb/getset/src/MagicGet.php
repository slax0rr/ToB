<?php
/**
 * Magic Get Trait
 *
 * The Magic Get trait provides only the magic '__get' method, to simplify and
 * unify protected property retrieval.
 *
 * @package   SlaxWeb\GetSet
 * @author    Tomaz Lovrec <tomaz.lovrec@gmail.com>
 * @copyright 2016 (c) Tomaz Lovrec
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://github.com/slaxweb/
 * @version   0.1
 */
namespace SlaxWeb\GetSet;

trait MagicGet
{
    /**
     * Get magic method
     *
     * Used to retrieved protected class properties.
     *
     * @param string $param Name of the protected parameter, without the
     *                      underscore.
     * @exception \SlaxWeb\Exception\UnknownPropertyException Thrown if access
     *                                                        to unknown
     *                                                        property is made.
     * @return mixed
     */
    public function __get(string $param)
    {
        $prepend = isset($this->_getSetPrepend) ? $this->_getSetPrepend : "_";
        $property = "{$prepend}{$param}";
        if (isset($this->{$property}) === false) {
            throw new \SlaxWeb\Exception\UnknownPropertyException(
                "Property '{$param}' does not exist in " . __CLASS__
                . ", unable to get value."
            );
        }

        return $this->{$property};
    }
}
