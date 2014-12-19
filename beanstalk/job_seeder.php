<?php
require __DIR__.'/vendor/autoload.php';

use Pheanstalk\Pheanstalk;

$pheanstalk = new Pheanstalk('127.0.0.1');

$faker = Faker\Factory::create('zh_CN');

for($i=0; $i<1000; $i++) {
    $payload = [
        "name" => $faker->name,
        "address" => $faker->address,
        "desc" => $faker->text(),
        "phone" => $faker->phoneNumber
    ];

    $pheanstalk
        ->useTube('default')
        ->put(json_encode($payload));
}

// producer (queues jobs)
