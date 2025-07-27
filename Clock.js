const second=document.getElementById('sec-hand');// Get the second hand element from the HTML
const minute=document.getElementById('min-hand');// Get the minute hand element from the HTML
const hour=document.getElementById('hour-hand');// Get the hour hand element from the HTML

function clocktick()
{
    const date=new Date();// Get the current date and time
    const seco=date.getSeconds()/60;// Get the current seconds and divide by 60 to get a fraction number
    const minu=(seco + date.getMinutes())/60;// Get the current minutes and add the seconds divided by 60, then divide by 60 to get a fraction number, we add the seconds to the minutes to get a smoot rotation
    const hr=(minu + date.getHours())/12;// Get the current hours and add the minutes divided by 60, then divide by 12 to get a fraction number, we add the minutes to the hours to get a smoot rotation
    //call the rotateclock function to rotate the clock hands  
    rotateclock(second,seco);
    rotateclock(minute,minu);
    rotateclock(hour,hr);
}

function rotateclock(element,rotation)
{
    //mutiply the rotation by 360 to get the degree of rotation
    element.style.setProperty('--rotate',rotation*360);
}

setInterval(clocktick,1000);