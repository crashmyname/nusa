<?php
require 'vendor/autoload.php';

use App\Core\Queue;

while (true) {
    $job = Queue::pop('emails');

    if ($job) {
        echo "Send email to: " . $job['to'] . PHP_EOL;

        // proses disini
    }

    sleep(2);
}