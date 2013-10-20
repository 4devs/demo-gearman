<?php
 
// Check account balance or reponse from third party payment gateway
// Add premium status

// Log this important event
$client = new GearmanClient();
$client->addServer();
 
$data = [
    'table' => 'activity_log',
    'data' => [
      'user_id' => 3, // Just for example
      'action' => 'premium_status',
      'created_at' => date('Y-m-d H:i:s'),
    ],
];
 
$client->doBackground('log_queue', serialize($data));

// Return response back to user without delays