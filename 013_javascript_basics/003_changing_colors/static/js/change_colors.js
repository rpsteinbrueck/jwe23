let change_backgroundcolor = function (color) {
    document.getElementById("bodycolor").style.backgroundColor = color;
};

let change_textcolor = function (color) {
    document.getElementById("bodycolor").style.color = color;
};

let gen_random_color = function () {
    const randomColor = Math.floor(Math.random() * 16777215).toString(16);
    return "#" + randomColor;
};
