<?php
function groupByOwners(array $files)
{
    $temp_array = array();
    foreach ($files as $file => $owner) {
        $temp_array[$owner][] = $file;
    }
    return $temp_array;
}

$files = array(
    "Input.txt" => "Randy",
    "Code.py" => "Stan",
    "Output.txt" => "Randy"
);

echo "<pre>";
print_r(groupByOwners($files));
