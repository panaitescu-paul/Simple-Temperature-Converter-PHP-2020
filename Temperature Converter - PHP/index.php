<!DOCTYPE html> 
<html lang="en"> 
    <head>
        <title>Temperature Converter - PHP</title>
        <meta charset="utf-8"> 
        <link rel="stylesheet" href="css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    </head>
<body>

    <!-- PHP code -->
    <?php
        $resultFrom = "";
        $resultTo = "";
        $result = "";

        // Check if the "Calculate" button was pressed, then get the 3 input values
        if (isset($_POST['temperature']) && isset($_POST['listFrom']) && isset($_POST['listTo'])) {
            $temperature = (float) $_POST['temperature'];
            $from = $_POST['listFrom'];
            $to = $_POST['listTo'];

            // Make the conversion
            if($from === "C" && $to === "C") {
                $result = $temperature;
            } else  if($from === "C" && $to === "F") {
                $result = ($temperature * 1.8) + 32;
            } else if ($from === "C" && $to === "K") {
                $result = $temperature + 273.15;
            } else if ($from === "F" && $to === "C") {
                $result = ($temperature - 32) / 1.8;
            } else if ($from === "F" && $to === "F") {
                $result = $temperature;
            } else if ($from === "F" && $to === "K") {
                $result = ($temperature + 459.67) * (5 / 9);
            } else if ($from === "K" && $to === "C") {
                $result = $temperature - 273.15;
            } else if ($from === "K" && $to === "F") {
                $result = ($temperature * (5 / 9)) - 459.67;
            } else if ($from === "K" && $to === "K") {
                $result = $temperature;
            }

            // Build the result strings
            if($result === "") {
                $resultFrom = $temperature . "°" . $from . "=";
                $resultTo = $temperature . "°" . $to;
            } else {
                $resultFrom = $temperature . "°" . $from . "=";
                $resultTo = round($result, 2) . "°" . $to;
            }
        }
    ?>

    <div class="content">
        <h1>Temperature Converter - PHP</h1>
        <form action="" method="POST" id="myForm">
            <label for="monetary">Convert</label>
            <br>
            <input type="number" id="temperature" name="temperature" value="<?=$temperature ?>" placeholder="0.00" step="0.01" required>
            <br>
            <div class="from">
                <label for="listFrom">From</label>
                <br>
                <select name="listFrom" size="3" id="list-from">
                    <option value="C" selected>Celsius</option>
                    <option value="F">Fahrenheit</option>
                    <option value="K">Kelvin</option>
                </select>
            </div>
            <div class="to">
                <label for="listTo">To</label>
                <br>
                <select name="listTo" size="3" id="list-to">
                    <option value="C">Celsius</option>
                    <option value="F" selected>Fahrenheit</option>
                    <option value="K">Kelvin</option>
                </select>
            </div>
            <input type="Submit" value="Calculate" id="calculateBtn">
            <br>
        </form>
        <div id="summary">
            <p>Result: 
                <span id="result-from">
                    <?=$resultFrom?>
                </span>
                <span id="result-to">
                    <?=$resultTo?>
                </span>
            </p>
        </div>
    </div>
</body>
</html>