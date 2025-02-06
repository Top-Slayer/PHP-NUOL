<?php
// $data = array(5, 2.3, "asds", true);
$data = [200 => 5, 2.3, "asds", true];
$friends = [
    [
        "name" => "Khamchan Keomixay",
        "phone" => "12345678",
    ],
    [
        "name" => "Somsy Chanthavily",
        "phone" => "25235099",
    ],
    [
        "name" => "Lee Chandavong",
        "phone" => "91274247",
        "family" => ["Sai", "Thongdam", "Kham"],
    ]
];

echo "Element:";
echo "<pre>";
print_r($friends);
echo "</pre>";

echo "<br>";

echo "Data type:";
echo "<pre>";
var_dump($friends);
echo "</pre>";

echo "Output: " . shell_exec('');
