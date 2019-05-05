<?php
/**
 * Web Socket Method
 *
 * A Web Socket method is an object that maps the incoming request to a PHP method.
 * Class does not do anything on its own, but just forwards the request to the PHP
 * method.
 *
 * @package   ClanWolf\CoinRitual
 * @author    Tomaz Lovrec <tomaz.lovrec@gmail.com>
 * @copyright 2016 (c) Clan Wolf
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://github.com/clanwolf/
 * @version   0.1
 */
namespace ClanWolf\Library\WebSocket;

class Method
{
    /**
     * Method Name
     *
     * @var string
     */
    protected $_name = null;

    /**
     * Method Callable
     *
     * @var callable
     */
    protected $_callable = null;

    /**
     * Method parameter list
     *
     * @var array
     */
    protected $_params = [];

    /**
     * Set method name
     *
     * Set the name of the method
     *
     * @param string $name Method name
     * @return self
     */
    public function setName($name)
    {
        $this->_name = $name;
        return $this;
    }

    /**
     * Set method callable
     *
     * @param callable $callable Method callable, this callable will be executed for this method
     * @return self
     */
    public function setCallable(callable $callable)
    {
        $this->_callable = $callable;
        return $this;
    }

    /**
     * Add parameter
     *
     * Adds a parameter that needs to be sent to the callable from the request.
     *
     * @param string $name Name of the parameter
     * @return self
     */
    public function addParam($name)
    {
        if (in_array($name, $this->_params)) {
            return $this;
        }
        $this->_params[] = $name;
        return $this;
    }

    /**
     * Execute
     *
     * Executes the callable. Ensures that all requested parameters exist in the
     * input object and forwards the parameter values to the callable.
     *
     * @param object $params Request parameters
     * @return mixed Returns what the callable returns
     * @exception \ClanWolf\Library\WebSocket\Exception\MissingParamException
     */
    public function exec(\stdClass $params)
    {
        $callParams = [];
        foreach ($this->_params as $param) {
            if (isset($params->{$param}) === false) {
                throw new Exception\MissingParamException(
                    "Method '{$this->_name}' requires parameter '{$param}' but request did not provide it."
                );
            }
            $callParams[] = $params->{$param};
        }

        return call_user_func_array($this->_callable, $callParams);
    }
}
