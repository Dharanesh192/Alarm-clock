<?php
$abc = "";//display the text on the page
$alarms = array();
$filename = "Text.txt";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $action = $_POST['action'];

    if ($action === "set") //activate when the user clicks on the set alarm button
        {
        $alarmTime = $_POST['alarmTime'];//get the time entered by the user
        if (!empty($alarmTime)) //check if the user has entered a time
            {
            file_put_contents($filename, $alarmTime . PHP_EOL, FILE_APPEND);//append the time one by one to the text file
            exec("taskkill /F /IM Work.exe >nul 2>&1");//kill the previous instance of Work.exe if it is running
            pclose(popen("start /B C:\\xampp\\cgi-bin\\Work.exe", "r"));//execute the Work.exe file in the background

            }
        else 
            {
            $abc .= "Please select a valid time.<br>";//if the user has not entered a time, display an error message
            }
        }
     elseif ($action === "clear")//activate when the user clicks on the clear alarm button
        {
        if (file_exists($filename))//check if the text file exists 
            {
            $alarms = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);//convert the contents of the text file into an array
            if (!empty($alarms)) 
                {
                array_shift($alarms);//remove the first element from the array (the first alarm)
                file_put_contents($filename, implode(PHP_EOL, $alarms) . PHP_EOL);//write the remaining alarms back to the text file
                exec("taskkill /F /IM Work.exe >nul 2>&1");
                pclose(popen("start /B C:\\xampp\\cgi-bin\\Work.exe", "r"));

                }
             else
                {
                $abc .= "No alarms to clear <br>";//if there are no alarms to clear, display a message
                exec("taskkill /F /IM Work.exe >nul 2>&1");
                }
            }
        }
}

if (file_exists($filename))
{
    $allAlarms = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);//read the contents of the text file into an array
    if (!empty($allAlarms))//if the text file is not empty
    {
        foreach ($allAlarms as $time) //iterate through each alarm time
        {
            $abc .= "Alarm set for $time<br>";//display the alarm time on the page
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
