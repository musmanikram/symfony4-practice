<?php
/**
 * Created by PhpStorm.
 * User: usman
 * Date: 28/02/2018
 * Time: 3:13 PM
 */

namespace App\Service;


use App\Helper\LoggerTrait;
use Nexy\Slack\Client;

class SlackClient {

	use LoggerTrait;

	private $slack;


	public function __construct(Client $slack)
	{
		$this->slack = $slack;
	}


	public function sendMessage(string $from, string $message): void
	{

		$this->logInfo('Beaming a message to Slack!!!!!!!!', [
			'message' => $message
		]);

        $message = $this->slack->createMessage()
                               ->from($from)
                               ->withIcon(':ghost:')
                               ->setText($message);
        $this->slack->sendMessage($message);
    }

}