<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lucky Dice</title>
</head>
<body>
    <div class="container">
        <h1>Lucky Dice</h1>
        <div class="message" id="message">Press SPIN to try your luck!</div>
        <div class="slots">
            <div class="slot" id="slot1">-</div>
            <div class="slot" id="slot2">-</div>
            <div class="slot" id="slot3">-</div>
        </div>
        <form method="POST">
            <button type="submit" name="spin">SPIN</button>
        </form>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['spin'])) {
        $slot1 = rand(0, 9);
        $slot2 = rand(0, 9);
        $slot3 = rand(0, 9);

        echo "<script>
            document.getElementById('slot1').textContent = '$slot1';
            document.getElementById('slot2').textContent = '$slot2';
            document.getElementById('slot3').textContent = '$slot3';
        </script>";

        if ($slot1 === $slot2 && $slot2 === $slot3) {
            echo "<script>document.getElementById('message').textContent = '🎉 JACKPOT! All numbers match!';</script>";
        } else {
            echo "<script>document.getElementById('message').textContent = 'Try again!';</script>";
        }
    }
    ?>
</body>
</html>