<?php
require __DIR__.'/vendor/autoload.php';

use Pheanstalk\Pheanstalk;

$pheanstalk = new Pheanstalk('127.0.0.1');

// producer (queues jobs)
$pheanstalk
  ->useTube('testtube')
  ->put("job payload goes here\n");

// worker (performs jobs)
$job = $pheanstalk
  ->watch('testtube')
  ->ignore('default')
  ->reserve();

echo $job->getData();

$pheanstalk->delete($job);

// check server availability

$pheanstalk->getConnection()->isServiceListening(); // true or false

