function refreshTime(){
    const refresh=1000; // Refresh rate in milli seconds
    mytime=setTimeout('timeDate()',refresh)
    }

function timeDate(){
    const date = new Date();
    var amPm = date.getHours() >= 12 ? ' PM ' : ' AM ';
    var date1 = date.getMonth() + 1+ "/" + date.getDate() +"/" + date.getFullYear();
    var min = date.getMinutes()
    if(min < 10){
        min1 = `0${min}`;
    }else{
        min1 = min;
    }
    
    date1 = date1 + " - " + date.getHours() + ":" + min1 + ":" + date.getSeconds() + ":" + amPm;
    document.getElementById("timeDate").innerHTML = date1;
    refreshTime();
}

// focus on the todo name
document.getElementById("name").focus();
// submitting with the enter key
var input = document.getElementById("todo");

input.addEventListener("keyup", function(event) {
    // 13 = enter
  if (event.keyCode === 13) {
    event.preventDefault();
    document.getElementById("focusSubmit").click();
  }
});
