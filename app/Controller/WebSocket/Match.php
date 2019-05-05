<?php
/**
 * Trial Of Bloodright Match Controller
 *
 * Match controller handles communication between the match Oathmaster, two combatants,
 * and the Match audience.
 *
 * @package   ClanWolf\CoinRitual
 * @author    Tomaz Lovrec <tomaz.lovrec@gmail.com>
 * @copyright 2016 (c) Clan Wolf
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://github.com/clanwolf/
 * @version   0.1
 */
namespace App\Controller\WebSocket;

use ClanWolf\Library\WebSocket\Method as WSMethod;
use ClanWolf\Library\WebSocket\Handler as WSHandler;

class Match extends WSHandler
{
    protected $_partyMach = [];

    public function newConnection($partyId, $type, $matchId)
    {
        $this->_partyMach[$matchId][$partyId] = ["partyId" => $partyId, "oathmaster" => false];
        if ($type === "oathmaster") {
            $msg = [
                "motd"      =>  "Welcome to the Clan Wolf Trial of Bloodright Systems Honorable Oathmaster. "
                    . "The ritual is yours to command",
                "methods"   =>  ["updateField", "moveToStep"]
            ];
            $this->_logger->info(
                "Added party to match mapping as oathmaster",
                ["partyId" => $partyId, "matchId" => $matchId]
            );
            $this->_partyMach[$matchId][$partyId]["oathmaster"] = true;
        } else {
            $msg = [
                "motd"      =>  "Welcome to Clan Wolf Trial of Bloodright Systems. Sit tight and await for updates",
                "methods"   =>  []
            ];
            $this->_logger->info(
                "Added party to match mapping",
                ["partyId" => $partyId, "matchId" => $matchId]
            );
        }
        $this->_sendArray($partyId, $msg);
    }

    public function updateField($partyId, $matchId, $field, $value)
    {
        $this->_sendToAudience("updateField", $partyId, $matchId, ["field" => $field, "value" => $value]);
    }

    public function moveToStep($partyId, $matchId, $step)
    {
        $this->_sendToAudience("moveToStep", $partyId, $matchId, ["step" => $step]);
    }

    public function setResultImage($partyId, $matchId, $img)
    {
        $this->_sendToAudience("setResultImg", $partyId, $matchId, ["img" => $img]);
    }

    protected function _sendToAudience($method, $partyId, $matchId, array $data)
    {
        if (isset($this->_partyMach[$matchId]) === false) {
            $this->_sendError($partyId, "MATCH_NOT_FOUND", "Requested match was not found");
        }

        $sendTo = [];
        foreach ($this->_partyMach[$matchId] as $party) {
            if ($partyId === $party["partyId"]) {
                if ($party["oathmaster"] === false) {
                    $this->_sendError($partyId, "NOT_PERMITTED", "This is only permitted to an oathamster.", true);
                    break;
                }
                continue;
            }
            if (isset($this->_connContainer[$party["partyId"]])) {
                $sendTo[] = $party["partyId"];
            }
        }

        foreach ($sendTo as $id) {
            $this->_send(
                $id,
                json_encode(["method" => $method, "params" => $data])
            );
        }

    }

    protected function _init()
    {
        // add hello method
        $method = new WSMethod;
        $method->setName("hello")
            ->setCallable([$this, "newConnection"])
            ->addParam("partyId")
            ->addParam("type")
            ->addParam("matchId");
        $this->_methodContainer["hello"] = $method;

        // add updateField method
        $method = new WSMethod;
        $method->setName("updateField")
            ->setCallable([$this, "updateField"])
            ->addParam("partyId")
            ->addParam("matchId")
            ->addParam("field")
            ->addParam("value");
        $this->_methodContainer["updateField"] = $method;

        // add moveToStep method
        $method = new WSMethod;
        $method->setName("moveToStep")
            ->setCallable([$this, "moveToStep"])
            ->addParam("partyId")
            ->addParam("matchId")
            ->addParam("step");
        $this->_methodContainer["moveToStep"] = $method;

        // set ritual result image
        $method = new WSMethod;
        $method->setName("setResultImage")
            ->setCallable([$this, "setResultImage"])
            ->addParam("partyId")
            ->addParam("matchId")
            ->addParam("results");
        $this->_methodContainer["setResultImage"] = $method;
    }
}
