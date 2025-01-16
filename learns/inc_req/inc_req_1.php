<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Include Require</title>
    <style>
        body {
            border: 2px;
            background-color: #aaa;
        }

        .head-section {
            width: 100%;
            background-color: #ccc;
            box-shadow: 10px;
            height: 100px;
        }
    </style>
</head>

<body>
    <?php include "header.php" ?>
    <div class="contents">
        <h1>Content</h1>
        <a href="inc_req_2.php"> page 2</a>
    </div>
</body>

</html>