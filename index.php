<?php

include 'vendor/autoload.php';

$collection = new InfoContact\IcFwk\Library\Collection([
    "key1" => "value1",
    "key2" => "value2",
    "key3" => [
        "subkey1" => "subvalue1",
        "subkey2" => "subvalue2"
    ]
]);

print_r($collection->get("key3"));
