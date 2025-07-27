<?php
$abc = "";
$filename = "Text.txt";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];

    if ($action === "set") {
        $alarmTime = $_POST['alarmTime'];
        if (!empty($alarmTime)) {
            file_put_contents($filename, $alarmTime . PHP_EOL, FILE_APPEND);
            exec("taskkill /F /IM Work.exe >nul 2>&1");
            pclose(popen("start /B C:\\xampp\\cgi-bin\\Work.exe", "r"));

        } else {
            $abc .= "Please select a valid time.<br>";
        }
    } elseif ($action === "clear") {
        if (file_exists($filename)) {
            $alarms = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            if (!empty($alarms)) {
                array_shift($alarms);
                file_put_contents($filename, implode(PHP_EOL, $alarms) . PHP_EOL);
                exec("taskkill /F /IM Work.exe >nul 2>&1");
                pclose(popen("start /B C:\\xampp\\cgi-bin\\Work.exe", "r"));

            } else {
                $abc .= "No alarms to clear <br>";
                exec("taskkill /F /IM Work.exe >nul 2>&1");
            }
        }
    }
}

if (file_exists($filename)) {
    $allAlarms = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if (!empty($allAlarms)) {
        foreach ($allAlarms as $time) {
            $abc .= "Alarm set for $time<br>";
        }
    }
}
?>

<!DOCTYPE html>                                                                    
<html lang="en">
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Alarm Clock</title>  
    <link rel="stylesheet" href="Style.css">
</head>
<body>
    <div class="clock">
        <div class="number" style="--n:1"><b>1</b></div>
        <div class="number" style="--n:2"><b>2</b></div>
        <div class="number" style="--n:3"><b>3</b></div>
        <div class="number" style="--n:4"><b>4</b></div>
        <div class="number" style="--n:5"><b>5</b></div>
        <div class="number" style="--n:6"><b>6</b></div>
        <div class="number" style="--n:7"><b>7</b></div>
        <div class="number" style="--n:8"><b>8</b></div>
        <div class="number" style="--n:9"><b>9</b></div>
        <div class="number" style="--n:10"><b>10</b></div>
        <div class="number" style="--n:11"><b>11</b></div>
        <div class="number" style="--n:12"><b>12</b></div>
        <div class="min" id="min-hand"></div>
        <div class="hour" id="hour-hand"></div>
        <div class="sec" id="sec-hand"></div>
        <div class="dot"></div>
    </div>
    
    <div class="container">
        <h1>Alarm Clock</h1>
        <div class="alarm-container">
            <form method="post" action="">
                <label for="alarm-time"><h2>Set Alarm</h2></label>
                <input type="time" name="alarmTime">
                <button type="submit" name="action" value="set">Set Alarm</button>
                <button type="submit" name="action" value="clear">Clear Alarm</button>
            </form>
        </div>
        <div id="alarm-status"><?php if (!empty($abc)) echo $abc; ?></div>
    </div>
    
    <script type="text/javascript" src="Clock.js"></script>
</body>  
</html>
