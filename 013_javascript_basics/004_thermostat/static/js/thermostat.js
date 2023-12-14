let temp = 24;
let display = document.getElementById("display");

display.innerHTML = temp;

let change_textcolor = function (color) {
    document.getElementById("display").style.color = color;
    sleep(2);
    document.getElementById("display").style.color = black;
};

let change_temp = function (direction) {
    if (direction == "up") {
        temp++;
    }

    if (direction == "down") {
        temp--;
    }
    console.log(temp);

    return (display.innerHTML = temp);
};
