<?php
$res_datas = array();

$url = array(
    "https://v6.exchangerate-api.com/v6/e2fabf0cf5b77f023c133dcb/latest/LAK", // exchange rate api
    "https://openexchangerates.org/api/currencies.json" // fullname api
);

for ($i = 0; $i < count($url); $i++) {
    $response = json_decode(file_get_contents($url[$i]));
    if (isset($response)) {
        switch ($i) {
            case 0:
                foreach ($response->conversion_rates as $currency => $value) {
                    $res_datas[$currency]['rate'] = $value;
                }
                break;
            case 1:
                foreach ($response as $shortname => $fullname) {
                    $res_datas[$shortname]['fullname'] = $fullname;
                }
                break;
        }
    }
}
// clear 'key' if 'rate' key is null
foreach ($res_datas as $key => $val) {
    if (!isset($val['rate']) || !isset($val['fullname'])) {
        unset($res_datas[$key]);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $decodedData = json_decode(file_get_contents("php://input"), true);

    if ($decodedData) {
        $amount = htmlspecialchars($decodedData['amount']);
        $from_currency = htmlspecialchars($decodedData['from_currency']);
        $to_currency = htmlspecialchars($decodedData['to_currency']);

        echo json_encode($amount * ($to_currency / $from_currency));
    }

    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Converter</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * {
            font-family: "Noto Sans Lao";
        }

        body {
            background-color: #f4f6f9;
        }
    </style>
</head>

<body>
    <div class="rounded-lg border-2 border-teal-300 w-1/3 h-300 mx-auto my-10 bg-white drop-shadow-md p-5">
        <h1 class="flex text-3xl justify-center mb-5">ເຄື່ອງຄໍານວນແລກປ່ຽນເງິນຕາ</h1>
        <div class="grid grid-cols-1 mb-7">
            <label for="amount" class="text-1xl mb-2">ຈໍານວນເງິນ:</label>
            <input type="number" name="amount" id="amount" placeholder="Enter amount" class="rounded-lg border-2 border-teal-300 p-1" require>
        </div>

        <div class="grid grid-cols-1 mb-7">
            <label for="from-currency" class="text-1xl mb-2">ຈາກສະກຸນເງິນ</label>
            <select name="from-currency" id="from-currency" class="rounded-lg border-2 border-teal-300 p-1">
                <?php
                foreach ($res_datas as $key => $val) {
                    if ($key == "LAK") {
                        echo "<option value=\"$val[rate]\" selected> $key - $val[fullname] </option>";
                    } else {
                        echo "<option value=\"$val[rate]\"> $key - $val[fullname] </option>";
                    }
                }
                ?>
            </select>
        </div>

        <div class="grid grid-cols-1 mb-7">
            <label for="to-currency" class="text-1xl mb-2">ເປັນສະກຸນເງິນ</label>
            <select name="to-currency" id="to-currency" class="rounded-lg border-2 border-teal-300 p-1" value>
                <?php
                foreach ($res_datas as $key => $val) {
                    if ($key == "USD") {
                        echo "<option value=\"$val[rate]\" selected> $key - $val[fullname] </option>";
                    } else {
                        echo "<option value=\"$val[rate]\"> $key - $val[fullname] </option>";
                    }
                }
                ?>
            </select>
        </div>

        <div class="grid grid-cols-1 mb-7">
            <label for="convert-amount" class="text-1xl mb-2">ມູນຄ່າແລກປ່ຽນ:</label>
            <input type="number" name="convert-amount" id="convert-amount" class="rounded-lg border-2 border-teal-300 p-1" readonly>
        </div>

        <button class="flex mx-auto p-3 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-full text-white"
            value="ດໍາເນີນການແລກປ່ຽນ"
            onclick=calculate()>
            ດໍາເນີນການແລກປ່ຽນ
        </button>
    </div>
    <script>
        const calculate = async () => {
            let amount = document.getElementById("amount").value;
            let from_currency = document.getElementById("from-currency").value
            let to_currency = document.getElementById("to-currency").value

            const response = await fetch(window.location.href, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    amount,
                    from_currency,
                    to_currency
                })
            });

            result = await response.json();
            console.log(result);
            document.getElementById('convert-amount').value = result;
        };
    </script>
</body>

</html>