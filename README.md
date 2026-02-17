## ⏰ Basic alarm clock

An alarm clock program but instead of using **JS** as backend I done it with **C** programming. It is task given for me to creat a code that use **C programming** ,so I struggle a lot at first so I tell you how finish this task in this **README**.

## 🧾 Requirements 
- Xampp for Apache
- GCC compiler to compile your C code
- A `.WAV` format audio for the alarm

| Purpose | Languages used |
|----------|----------------|
| Frontend | PHP HTML CSS |
| Backend | JS(For an analog clock)<br> and C(For the alarm) |
| Additional<br>things | A music for our<br> alarm in WAV format and<br> a `.txt` to store the alarms |


## 🎯 Steps to check
- ✅️ Your `Xampp folder` should be in C disk
- ✅️ Alarm sound should be in `same folder` and in `.WAV` format
- ✅️ When you upload the code in your system `change the file path in the code to your file path`
- ✅️ Change the file names to your file name
- ✅️ Install the required extension in VS code
- ✅️ Put your program folder to the `htdocs folder in Xampp folder`
- ✅️ The compiled c program to the `cgi-bin folder in Xampp folder`

---

## 🧐 How it works
- First you want to **start the apache from the Xampp**
- Then go to your browser and type `http://localhost/Your fliename` and run it
- Click the PHP file it should open without any issues in that set your alarm time.
- When you press the **set button** the PHP program take that alarm time and stored it in the `text file` and call the **compiled C**.
- Then the C program will check the `current time` with the `alarm time` if it match it trigger's the alarm sound.
- You can set multiple alarms. You can delete alarm by pressing the **Clear button** it will clear the last alarm time you set and reset the compiled c program to check it again. 

## ⚠️ Errors may occurs 
- Struggle to start the apache
- The sound may not trigger
- The page may loading for too long and will not display the text

## 🛠️ Suggestion/Fixes 
- Run the Xampp as administrator then **uncheck the apache to unintall and reinstall it again** or get help from youtube.
- Check the audio file is in the **.WAV format** if not convert it in any website.
- The `third error` is occurs because of the `PHP program is waiting for the compiled c program to call`, So it make the `PHP file` to load for too long and not display the text. To prevent this **you can give the actual path of the compiled c program to the PHP code** it may solve the error.

## 🤔 Why I use PHP and JS 
- The **HTMl can't call the c program during the runtime but PHP can call the compiled c** in the runtime and PHP is so similar to HTMl
- I use the JS for the analog clock because unlike JS, **C can't change the CSS values in runtime**
