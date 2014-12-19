<?php
require __DIR__.'/vendor/autoload.php';

use Pheanstalk\Pheanstalk;

$pheanstalk = new Pheanstalk('127.0.0.1');

// producer (queues jobs)
//$pheanstalk
//  ->useTube('testtube')
//  ->put("job payload goes here\n");

// worker (performs jobs)
$pheanstalk = $pheanstalk
    ->watch('testtube')
    ->ignore('default');

while($job = $pheanstalk->reserve());
$payload = json_decode($job->getData(), true);
var_dump($payload);

$pheanstalk->delete($job);

// check server availability

$pheanstalk->getConnection()->isServiceListening(); // true or false

