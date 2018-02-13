<!-- Add date/time script to external JS script -->

//Basic clock
  function ampm() {
    var now = new Date();
    var hours = now.getHours();
    if(hours > 12) {
      return "pm";
    }else {
      return "am";
    }
  }
  // If hours, minutes or seconds hits 0, change to 00
  function secondsZero() {
    var now = new Date();
    var seconds = now.getSeconds();
    if(seconds < 10){
      return '0'+seconds;
    }else {
      return seconds;
    }
  }
  function hoursZero() {
    var now = new Date();
    var hours = now.getHours();
    if(hours < 10){
      return '0'+hours;
    }else {
      return hours;
    }
  }
  function minutesZero() {
    var now = new Date();
    var minutes = now.getMinutes();
    if(minutes < 10){
      return '0'+minutes;
    }else {
      return minutes;
    }
  }
  function days() {
    var now = new Date();
    var day = now.getDate();
    if(day < 10) {
      return '0'+day;
    }else {
      return day;
    }
  }
  function months() {
    var now = new Date();
    var month = now.getMonth();
    if(month < 10) {
      return '0'+(month+1);
    }else {
      return month;
    }
  }
  function printTime() {
    //Grabs current date/time
    var now = new Date();
    var day = now.getDate();
    var month = now.getMonth();
    var year = now.getFullYear();
    //Format data
    document.getElementById("time").innerHTML = days() + "/" + months() + "/" + year + " - " +
                          hoursZero() + ":" + minutesZero() + ":" + secondsZero() + " " + ampm();
  }
  setInterval("printTime()");
  setInterval("printTime()", 1000);
