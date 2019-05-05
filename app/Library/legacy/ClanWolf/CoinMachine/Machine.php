<?php
namespace ClanWolf\Library\CoinMachine;

use Exception;

class Machine
{
    protected $_imageDir = "";
    protected $_image = "";
    protected $_pilots = [];

    public function setImageDir(string $imgDir): self
    {
        if (file_exists($imgDir) === false) {
            throw new Exception("Image Directory '{$imgDir}' does not exists. Aborting");
        }
        $this->_imageDir = rtrim($imgDir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
        return $this;
    }

    public function setResultImage(string $img): self
    {
        if (file_exists($this->_imageDir . $img) === false) {
            throw new Exception("Blank result image '{$this->_imageDir}{$img}' does not exists. Aborting");
        }
        $this->_image = $img;
        return $this;
    }

    public function addPilot(Pilot $pilot): self
    {
        $this->_pilots[rand(0,50000)] = $pilot;

        return $this;
    }

    public function getResultImage(): string
    {
        $results = $this->getResult();

        $this->_prepareTexts($results["hunter"], $results["hunted"]);
        return $this->_resultImage($results["hunter"], $results["hunted"]);
    }

    public function getResult(): array
    {
        $hunter = $this->_getHunter();
        $hunted = null;
        foreach ($this->_pilots as $pilot) {
            if ($pilot !== $hunter) {
                $hunted = $pilot;
            }
        }
        if ($hunted === null) {
            throw new Exception("Unable to determine hunted. Machine was not set up correctly.");
        }

        return ["hunter" => $hunter, "hunted" => $hunted];
    }

    protected function _getHunter(): Pilot
    {
        $rand = rand(0,50000);
        $result = [];
        foreach ($this->_pilots as $number => $pilot) {
            $result[abs($number - $rand)] = $number;
        }
        ksort($result);
        return $this->_pilots[array_values($result)[0]];
    }

    protected function _prepareTexts(Pilot $hunter, Pilot $hunted)
    {
        if (file_exists($this->_imageDir . "{$hunter->bloodname}.png") === false) {
            $lenght = strlen($hunter->bloodname);
            // engraving text for bloodname doesn't exist, create it
            $cmd = "-size 95x17 -background none -fill black -pointsize 17 "
                . "-gravity center caption:\"". strtoupper($hunter->bloodname) . "\"";
            exec("convert {$cmd} {$this->_imageDir}{$hunter->bloodname}.png");
        }

        if (file_exists($this->_imageDir . "hunter_{$hunter->name}.png") === false) {
            $lenght = strlen($hunter->bloodname);
            // engraving text for bloodname doesn't exist, create it
            $cmd = "-size 95x17 -background none -fill black -pointsize 12 "
                . "-gravity center caption:\"". strtoupper($hunter->name) . "\"";
            exec("convert {$cmd} {$this->_imageDir}hunter_{$hunter->name}.png");
        }

        if (file_exists($this->_imageDir . "date_{$hunter->name}.png") === false) {
            $lenght = strlen($hunter->bloodname);
            // engraving text for bloodname doesn't exist, create it
            $cmd = "-size 95x17 -background none -fill black -pointsize 12 "
                . "-gravity center caption:\"". strtoupper($hunter->date) . "\"";
            exec("convert {$cmd} {$this->_imageDir}date_{$hunter->name}.png");
        }

        if (file_exists($this->_imageDir . "{$hunter->rank}{$hunter->name}.png") === false) {
            // engraving text for bloodname doesn't exist, create it
            $cmd = "-size 220x32 -background none -fill white -gravity northeast "
                . "caption:\"{$hunter->rank} {$hunter->name}\"";
            exec("convert {$cmd} {$this->_imageDir}{$hunter->rank}{$hunter->name}.png");
        }

        if (file_exists($this->_imageDir . "{$hunted->rank}{$hunted->name}.png") === false) {
            // engraving text for bloodname doesn't exist, create it
            $cmd = "-size 220x32 -background none -fill white -gravity northeast "
                . "caption:\"{$hunted->rank} {$hunted->name}\"";
            exec("convert {$cmd} {$this->_imageDir}{$hunted->rank}{$hunted->name}.png");
        }
    }

    protected function _resultImage(Pilot $hunter, Pilot $hunted): string
    {
        $coin = "{$this->_imageDir}{$hunter->bloodname}.png";
        $hunterImg = "{$this->_imageDir}{$hunter->rank}{$hunter->name}.png";
        $hunterName = "{$this->_imageDir}hunter_{$hunter->name}.png";
        $hunterDate = "{$this->_imageDir}date_{$hunter->name}.png";
        $huntedImg = "{$this->_imageDir}{$hunted->rank}{$hunted->name}.png";

        $result = "{$this->_imageDir}{$hunter->name}_vs_{$hunted->name}.png";

        // engrave the coin
        $cmd = "-watermark 100% -geometry +117+217";
        exec("composite {$cmd} {$coin} {$this->_imageDir}{$this->_image} {$result}");
        $cmd = "-watermark 100% -geometry +117+240";
        exec("composite {$cmd} {$hunterName} {$result} {$result}");
        $cmd = "-watermark 100% -geometry +117+260";
        exec("composite {$cmd} {$hunterDate} {$result} {$result}");

        $cmd = "-watermark 100% -geometry +302+65";
        exec("composite {$cmd} {$huntedImg} {$result} {$result}");

        $cmd = "-watermark 100% -geometry +367+188";
        exec("composite {$cmd} {$hunterImg} {$result} {$result}");

        return $result;
    }
}
