<?php
/**
 * Coin Ritual Connection Handler
 *
 * All requests for the Coin Ritual need to be routed through this file, making it
 * the only entry point of the "sub-application".
 *
 * @package   ClanWolf\CoinRitual
 * @author    Tomaz Lovrec <tomaz.lovrec@gmail.com>
 * @copyright 2017 (c) Clan Wolf
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://github.com/clanwolf/
 * @version   0.2
 */
$app = require_once __DIR__ . "/../../../bootstrap/framework.php";

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use App\Controller\WebSocket\Match;

IoServer::factory(
    new HttpServer(
        new WsServer(
            new Match($app["logger.service"]("WebSocket"))
        )
    ),
    $app["config.service"]["websocket.port"]
)->run();
