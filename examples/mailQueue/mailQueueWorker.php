<?php

$worker = new GearmanWorker();
$worker->addServer();

$worker->addFunction('mail_queue', 'emailHandler');

while ($worker->work());

function emailHandler(GearmanJob $job)
{
    $workload = unserialize($job->workload());

    if (is_array($workload)) {
        mail($workload['to'], $workload['subject'], $workload['message']);
    }
}