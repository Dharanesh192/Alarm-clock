## ⏰ Basic alarm clock

An alarm clock program but instead of using **Python and JS** as backend I done it with **C** programming. It is a task given for me to create a code that use **C programming** ,so I struggle a lot at first so decide to tell how I finish this project. In this **Readme** file

---

## 🧾 Requirements 
- Xampp for Apache
- GCC compiler to compile your C code
- A `.WAV` format audio for the alarm

| Purpose | Languages used |
|----------|----------------|
| Frontend | HTML, CSS |
| Bridge | PHP |
| Analog Clock logic | JS |
| Backend logic | C |
| Storage | alarm.txt |
| Trigger Sound | alarm.wav |

## 📁 Project Structure 
      xampp/
       ├── htdocs/
       │    └── your_project/
       │         ├── index.php
       │         ├── style.css
       │         ├── alarm.txt
       │         └── alarm.wav
       │
       └── cgi-bin/
            └── alarm.exe

---

## 🎯 Setup Checklist
- ✅️ `Xampp folder` must be in `C:` disk
- ✅️ Alarm sound should be in `.WAV` format
- ✅️ Update file paths inside the code according to your system
- ✅️ Install the required extension in VS code
- ✅️ Put your program folder to the `htdocs folder in Xampp folder`
- ✅️ The compiled c program to the `cgi-bin folder in Xampp folder`

---

## 🧐 How it works
- First you want to **start the apache from the Xampp**
- Then open the browser --> `http://localhost/Your fliename` and run it
- Set alarm time using the web interface.
- When you press the **set button** the PHP program take that alarm time and stored it in the `text file` and call the **compiled C**.
- Then the C program will continuously check the `System time` with the `alarm time` if it match it trigger the alarm sound.
- You can set multiple alarms. You can delete alarm by pressing the **Clear button** it will clear the last alarm time you set and reset the compiled c program to check it again.

## 🤔 How To Run
- First install the required tools to run the program
- `Tutorial video` to install GCC Compiler to compile the C code --> [Video link](https://youtu.be/GxFiUEO_3zM)
- Link to install `xampp for apache server` --> [Download XAMPP 8.2.12](https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/8.2.12/xampp-windows-x64-8.2.12-0-VS16-installer.exe)
- Then import the code to your system and create a `Environmental variable` for the `GCC compiler`
- Compile the C code in `cmd`
   ```
     gcc alarm.c -o alarm.exe
- Move the project folder to the `htdocs folder in Xampp folder` and the `alarm.exe` to the `cgi-bin folder in Xampp folder`
- Start the `apache server` from xampp
- then run the `PHP` code in VS code or go to your browser run the `locahost\port that shown in the apache server running`

---

## 🚫 Technical Limitation

- C programs must be compiled and executed by the operating system
- So that's why it can't run inside the browser environment
- Therefore, it cannot directly access or modify HTML or CSS elements at runtime
- `JavaScript` is used for dynamic UI updates such as the analog clock because it runs inside the browser and can manipulate the HTML and CSS
- `HTML` can't access the compiled `C` code directly
- Therefore, PHP is used as a bridge between browser and C

---

## ⚠️ Errors may occurs 
- Struggle to start the apache
- The sound may not trigger
- The page may loading for too long and will not display the text

## 🛠️ Suggestion/Fixes 
- Run the Xampp as administrator then **uncheck the apache to uninstall and reinstall it again** or get help from youtube.
- Check the audio file is in the **.WAV format** if not convert it in any website.
- The `third error` is occurs because of the `PHP program is waiting for the compiled c program to call`, So it make the `PHP file` to load for too long and not display the text. To prevent this **you can give the actual path of the compiled c program to the PHP code** it may solve the error.
