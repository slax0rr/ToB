<?php
/**
 * Abstract WebSocket Handler
 *
 * Web Socket Handler hanles communication between connected parties.
 *
 * This class is intended to be extended by a controller, as it must define additional
 * communication handling, that is specific for each different use case.
 *
 * @package   ClanWolf\CoinRitual
 * @author    Tomaz Lovrec <tomaz.lovrec@gmail.com>
 * @copyright 2016 (c) Clan Wolf
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://github.com/clanwolf/
 * @version   0.1
 */
namespace ClanWolf\Library\WebSocket;

use Exception;
use Psr\Log\LoggerInterface;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;
use ClanWolf\Library\WebSocket\Exception\MissingParamException;

abstract class Handler implements MessageComponentInterface
{
    /**
     * Logger
     *
     * @var \Psr\Log\LoggerInterface
     */
    protected $_logger = null;

    /**
     * Connection container
     *
     * @var array
     */
    protected $_connContainer = [];

    /**
     * Check Method
     *
     * @var bool
     */
    protected $_checkMethod = false;

    /**
     * Method container
     *
     * @var array
     */
    protected $_methodContainer = [];

    /**
     * Class constructor
     *
     * Prepares the class by assigning retrieved object references to class properties.
     * After initialization it calls the child classes '_init' method, if it exists.
     *
     * @param \Psr\Log\LoggerInterface $logger PSR4 compatible logger object
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->_logger = $logger;
        $this->_logger->info("WebSocket Handler Initialized");

        if (method_exists($this, "_init")) {
            $this->_init();
        }
    }

    /**
     * New connection
     *
     * Handles new connections by attaching the connection to the Connection Container,
     * and logging the new connection. After it tries to call the child controller
     * '_newConnection' method if it exists.
     *
     * @param \Ratchet\ConnectionInterface $conn Connection object
     * @return void
     */
    public function onOpen(ConnectionInterface $conn)
    {
        $this->_connContainer[$conn->resourceId] = $conn;
        $this->_logger->info("New connection from party attached", ["partyId" => $conn->resourceId]);

        if (method_exists($this, "_newConnection")) {
            $this->_newConnection($conn->resourceId);
        }
    }

    /**
     * Connection closed
     *
     * When a connection is closed, its reference is removed from the local connection
     * container.
     *
     * @param \Ratchet\ConnectionInterface $conn Connection object
     * @return void
     */
    public function onClose(ConnectionInterface $conn)
    {
        unset($this->_connContainer[$conn->resourceId]);
        $this->_logger->info("Party disconnected", ["partyId" => $conn->resourceId]);
    }

    /**
     * Message received
     *
     * Handler ensures that a proper request has been made and calls the method
     * handler. If no appropriate method is found, or the connected party can not
     * call that method, an error is logged and the connected party is disconnected.
     *
     * @param \Ratchet\ConnectionInterface $conn Connection object
     * @param string $msg Received message
     * @return void
     */
    public function onMessage(ConnectionInterface $conn, $msg)
    {
        $this->_logger->debug("Received message from party", ["partyId" => $conn->resourceId, "message" => $msg]);
        if (($data = json_decode($msg)) === null) {
            $this->_logger->error(
                "Received message is not in JSON format. Aborting connection",
                ["partyId" => $conn->resourceId, "message" => $msg]
            );
            $this->_sendError(
                $conn->resourceId,
                "REQ_NOT_JSON",
                "Request is not in valid JSON format. Do not attempt to manually connect to this web socket!",
                true
            );
            return;
        }
        if (isset($data->method) === false || array_key_exists($data->method, $this->_methodContainer) === false) {
            $this->_logger->error(
                "Requested method does not exists, or invalid request. Aborting connection",
                ["partyId" => $conn->resourceId, "message" => $data, "availMethods" => $this->_methodContainer]
            );
            $this->_sendError(
                $conn->resourceId,
                "REQ_METHOD_NOT_FOUND",
                "Requested method does not exists, or invalid request. Do not attempt to "
                    . "manually connect to this web socket!",
                true
            );
            return;
        }

        $params = isset($data->params) ? $data->params : new \stdClass;
        $params->partyId = $conn->resourceId;
        try {
            $this->_methodContainer[$data->method]->exec($params);
        } catch (MissingParamException $e) {
            $this->_logger->error("Requested method parameter(s) missing", ["exceptionMessage" => $e->getMessage()]);
            $this->_sendError(
                $conn->resourceId,
                "REQ_METHOD_MISSING_PARAM",
                "Requested method parameter(s) missing. {$e->getMessage()} Do not attempt to "
                    . "manually connect to this web socket!",
                true
            );
            return;
        }
    }

    /**
     * Connection error
     *
     * When an error occurs it is logged and connection is closed.
     *
     * @param \Ratchet\ConnectionInterface $conn Connection object
     * @return void
     */
    public function onError(ConnectionInterface $conn, Exception $ex)
    {
        $this->_logger->error(
            "Connection error. Closing connection.",
            ["partyId" => $conn->resourceId, "exception" => $ex]
        );
        $conn->close();
    }

    /**
     * Add method definition
     *
     * Adds a method to the method container
     *
     * @param \ClanWolf\Library\WebSocket\Method $method Method object
     * @return self
     */
    protected function _addMethod(Method $method)
    {
        $this->_methodContainer[] = $method;
    }

    /**
     * Send message
     *
     * Check if party ID is connected, and sends ti the retrieved string message.
     * Returns bool(false) if party ID not found, and bool(true) if message sent.
     *
     * @param int $partyId ID of connected party
     * @param string $msg Message to be sent
     * @return bool
     */
    protected function _send($partyId, $msg)
    {
        if (isset($this->_connContainer[$partyId]) === false) {
            $this->_logger->error(
                "Can not send message to party. Not found",
                ["partyId" => $partyId, "message" => $msg]
            );
            return false;
        }

        $this->_connContainer[$partyId]->send("{$msg}\r\n");
        $this->_logger->info("Message sent to party", ["partyId" => $partyId]);
        return true;
    }

    /**
     * Send data array
     *
     * Encodes the retrieved data array as JSON and sends it to the connected party.
     * Returns bool(false) if party ID not found, and bool(true) if message sent.
     *
     * @param int $partyId ID of connected party
     * @param array $data Data array to be sent
     * @return bool
     */
    protected function _sendArray($partyId, array $data)
    {
        return $this->_send($partyId, json_encode($data));
    }

    /**
     * Send error
     *
     * Sends the error to the connected party, and disconnects on request. If a disconnect
     * is requested, this message is then auto appended to the error message.
     *
     * @param int $partyId ID of connected party
     * @param string $code Error Code
     * @param string $msg Error message
     * @param bool $disconnect Diconnect the party after error message sent. Default false
     * @return bool
     */
    protected function _sendError($partyId, $code, $msg, $disconnect = false)
    {
        if ($disconnect) {
            $msg .= " Disconnecting...";
        }
        $status = $this->_sendArray(
            $partyId,
            [
                "success"   =>  false,
                "data"      =>  [],
                "error"     =>  [
                    "code"      =>  $code,
                    "message"   =>  $msg
                ]
            ]
        );
        if ($disconnect) {
            $this->_connContainer[$partyId]->close();
        }
    }
}
