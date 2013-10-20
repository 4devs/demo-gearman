<?php

$worker = new GearmanWorker();
$worker->addServer();

$worker->addFunction('log_queue', 'logHandler');

while ($worker->work());

function logHandler(GearmanJob $job)
{
    $workload = unserialize($job->workload());

    // Just extract all needed data and insert into DB
}