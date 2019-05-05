<?php
namespace App\Command\WebSocket;

use SlaxWeb\Bootstrap\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Server extends Command
{
    protected $app = null;
    protected $input = null;
    protected $output = null;
    protected $logger = null;
    protected $pidFile = "";

    public function init(Application $app)
    {
        $this->app = $app;
        $this->logger = $app["logger.service"]("Slaxer");
        $this->pidFile = $this->app["appDir"] . "/Cache/websocket.pid";

        $this->logger->info("Command '" . get_class($this) . "' has been initialized");
    }

    protected function configure()
    {
        $this->setName("websocket:server")
            ->setDescription("Control the websocket server")
            ->addArgument(
                "action",
                InputArgument::REQUIRED,
                "Action required: start|stop|restart"
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->input = $input;
        $this->output = $output;

        $action = $this->input->getArgument("action");
        switch ($action) {
        case "start":
            $this->logger->info("Starting websocket server");
            $this->start();
            break;

        case "stop":
            $this->logger->info("Stopping websocket server");
            $this->stop();
            break;

        case "restart":
            $this->logger->info("Re-starting websocket server");
            $this->stop();
            $this->start();
            break;

        default:
            $this->logger->error("Unknown action received", ["action" => $action]);
            $this->output->writeln(
                "<error>Unknown action '{$action}', available: start|stop|restart</>"
            );
            return;
        }
    }

    protected function start()
    {
        if (file_exists($this->pidFile)) {
            $this->logger->error("WebSocket PID file exists. Aborting start");
            $this->output->writeln("<error>WebSocket PID file exists. Aborting start</>");
            return;
        }
        exec("php " . __DIR__ . "/starter.php > /dev/null 2>&1 & echo $! >> {$this->pidFile}");
        $this->output->writeln("<comment>WebSocket Server started</>");
    }

    protected function stop()
    {
        if (file_exists($this->pidFile) === false) {
            $this->logger->error("WebSocket PID file not found. Considering WebSocket server not running");
            $this->output->writeln("<comment>WebSocket PID file not found. Considering WebSocket server not running</>");
            return;
        }
        exec("kill -9 " . file_get_contents($this->pidFile) . " > /dev/null 2>&1");
        unlink($this->pidFile);
        $this->output->writeln("<comment>WebSocket Server stoped</>");
    }
}
