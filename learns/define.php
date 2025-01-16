<?php
// Check if 'lng' parameter is set in the URL and then define the constants
if (isset($_GET['lng'])) {
    if ($_GET['lng'] == 'en') {
        define("Surname_Name", "Top");
        define("Full_Name", "SITTHIPHONE");
    } elseif ($_GET['lng'] == 'la') {
        define("Surname_Name", "ທ໋ອບ");
        define("Full_Name", "ສິດທິພອນ");
    } else {
        echo "Invalid language selection.";
    }
} else {
    echo "Select language: ";
}

if (defined("Surname_Name") && defined("Full_Name")) {
    echo Surname_Name . " " . Full_Name;
}
?>

<p>
    <a href="define.php?lng=en">English</a>
    <a href="define.php?lng=la">Lao</a>
</p>
