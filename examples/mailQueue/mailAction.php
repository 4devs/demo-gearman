<?php

// Some action to invite friends

$mailList = $_POST['mail_list'];

// Email validation goes here

$client = new GearmanClient();
$client->addServer(); // Default settings are 127.0.0.1 4730

foreach ($mailList as $receiver) {
    $client->doBackground('mail_queue', serialize([
                'to' => $receiver,
                'subject' => 'Invite to 4devs.io',
                'message' => 'Hello my dear friend, please visit 4devs.io',
            ]));
}

// Then we can very fast return user friendly message back