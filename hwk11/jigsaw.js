/*
 Define variables for the values computed by the grabber event 
 handler but needed by mover event handler
*/
var diffX, diffY, theElement;
var img1, img2, img3, img4, img5, img6, img7, img8, img9, img10, img11, img12;
var seconds, minutes, hours;
var active = false;
var counter = 0;

//generate puzzle
function generatePuzzle(event){
    img1, img2, img3, img4, img5, img6, img7, img8, img9, img10, img11, img12 = 0;
    pieces = document.getElementById("pieces");
    pieces.innerHTML = '';
    let puzzle = (Math.floor(Math.random() * 3)) + 1;
    let path = "./images" + puzzle.toString();
    let images = new Array();
    for (let i = 1; i < 13; i++){
        images.push(path + "/img" + puzzle.toString() + "-" + i);
    }
    let pieces_html = new Array();
    for (let i = 0; i < 12; i++){
        pieces_html.push('<img src="' + images[i] + '.jpg" alt=' + i + ' onmousedown = "grabber(event);"');
    }
    pieces_html.sort(function() {return 0.5 - Math.random() });
    for (let i = 0; i < 12; i++){
        let left = i * 100;
        left = left.toString();
        addition = ' style="position: absolute; top: 0px;' + ' left: ' + left + 'px;">';
        pieces_html[i] += addition;
        pieces.innerHTML += pieces_html[i];
    }
    active = true;
    start();
    event.stopPropagation();
}

function start(){
    if (counter > 0){
        clearInterval(x);
    }
    counter++;
    result = document.getElementById("result");
    result.innerHTML = "";
    timer_element = document.getElementById("time");
    seconds = 0;
    minutes = 0;
    hours = 0;
    timer_element.innerHTML = "0:00:00";
    x = setInterval(timer, 1000);
}

function stop(){
    clearInterval(x);
    seconds = 0;
    minutes = 0;
    hours = 0;
    active = false;
    result = document.getElementById("result");
    if (img1 == 0 && img2 == 1 && img3 == 2 && img4 == 3 && img5 == 4 && img6 == 5 && img7 == 6 && img8 == 7 && img9 == 8 && img10 == 9 && img11 == 10 && img12 == 11){
        result.innerHTML = "<strong>Congratulations! You got it!</strong>";
    }
    else{
        result.innerHTML = "<strong>Better luck next time</strong>";
    }
}

function timer(){
    let minute_str, second_str;
    seconds++;
    if (seconds == 60){
        minutes++;
        seconds = 0;
    }
    if (minutes == 60){
        hours++;
        minutes = 0;
    }
    if (seconds < 10){
        second_str = "0" + seconds.toString();
    }
    else{
        second_str = seconds.toString();
    }
    if (minutes < 10){
        minute_str = "0" + minutes.toString();
    }
    else{
        minute_str = minutes.toString();
    }

    timer_element.innerHTML = hours + ":" + minute_str + ":" + second_str;
}
//finished
function finish(event){
    stop();
}

// The event handler function for grabbing the word
function grabber(event) {
    if (active){
        // Set the global variable for the element to be moved

        theElement = event.currentTarget;

        // Determine the position of the word to be grabbed,
        //  first removing the units from left and top

        var posX = parseInt(theElement.style.left);
        var posY = parseInt(theElement.style.top);

        // Compute the difference between where it is and
        // where the mouse click occurred

        diffX = event.clientX - posX;
        diffY = event.clientY - posY;

        // Now register the event handlers for moving and
        // dropping the word

        document.addEventListener("mousemove", mover, true);
        document.addEventListener("mouseup", dropper, true);

        // Stop propagation of the event and stop any default
        // browser action

        event.stopPropagation();
        event.preventDefault();
    }
}  //** end of grabber

// *******************************************************

// The event handler function for moving the word

function mover(event) {
// Compute the new position, add the units, and move the word

  theElement.style.left = (event.clientX - diffX) + "px";
  theElement.style.top = (event.clientY - diffY) + "px";
// Prevent propagation of the event

  event.stopPropagation();
}  //** end of mover

// *********************************************************
// The event handler function for dropping the word

function dropper(event) {
// Pop image into place
let currentX = event.clientX - diffX + 50;
let currentY = event.clientY - diffY + 50;
if ((400 <= currentX && currentX <= 500) && (-320 <= currentY && currentY <= -220)){
    theElement.style.left = "400px";
    theElement.style.top = "-320px";
    img1 = theElement.alt;
}
else if ((500 <= currentX && currentX <= 600) && (-320 <= currentY && currentY <= -220)){
    theElement.style.left = "500px";
    theElement.style.top = "-320px";
    img2 = theElement.alt;
}
else if ((600 <= currentX && currentX <= 700) && (-320 <= currentY && currentY <= -220)){
    theElement.style.left = "600px";
    theElement.style.top = "-320px";
    img3 = theElement.alt;
}
else if ((700 <= currentX && currentX <= 800) && (-320 <= currentY && currentY <= -220)){
    theElement.style.left = "700px";
    theElement.style.top = "-320px";
    img4 = theElement.alt;
}
else if ((400 <= currentX && currentX <= 500) && (-220 <= currentY && currentY <= -120)){
    theElement.style.left = "400px";
    theElement.style.top = "-220px";
    img5 = theElement.alt;
}
else if ((500 <= currentX && currentX <= 600) && (-220 <= currentY && currentY <= -120)){
    theElement.style.left = "500px";
    theElement.style.top = "-220px";
    img6 = theElement.alt;
}
else if ((600 <= currentX && currentX <= 700) && (-220 <= currentY && currentY <= -120)){
    theElement.style.left = "600px";
    theElement.style.top = "-220px";
    img7 = theElement.alt;
}
else if ((700 <= currentX && currentX <= 800) && (-220 <= currentY && currentY <= -120)){
    theElement.style.left = "700px";
    theElement.style.top = "-220px";
    img8 = theElement.alt;
}
else if ((400 <= currentX && currentX <= 500) && (-120 <= currentY && currentY <= -20)){
    theElement.style.left = "400px";
    theElement.style.top = "-120px";
    img9 = theElement.alt;
}
else if ((500 <= currentX && currentX <= 600) && (-120 <= currentY && currentY <= -20)){
    theElement.style.left = "500px";
    theElement.style.top = "-120px";
    img10 = theElement.alt;
}
else if ((600 <= currentX && currentX <= 700) && (-120 <= currentY && currentY <= -20)){
    theElement.style.left = "600px";
    theElement.style.top = "-120px";
    img11 = theElement.alt;
}
else if ((700 <= currentX && currentX <= 800) && (-120 <= currentY && currentY <= -20)){
    theElement.style.left = "700px";
    theElement.style.top = "-120px";
    img12 = theElement.alt;
}

// Unregister the event handlers for mouseup and mousemove

  document.removeEventListener("mouseup", dropper, true);
  document.removeEventListener("mousemove", mover, true);

// Prevent propagation of the event

  event.stopPropagation();
}  //** end of dropper

//top-left on puzzle: top: -320px; left: 400px;