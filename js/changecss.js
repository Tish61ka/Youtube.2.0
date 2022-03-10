function imgsrc() {
    let any = document.getElementById("image");
    any.setAttribute("href", "/css/mainblue.css");
    let any1 = document.getElementById("logo");
    any1.setAttribute("src", "/pictures/логоblue.png");
    let any2 = document.querySelectorAll("#g");
    any2.forEach(element => {
        element.setAttribute("fill", "#05d9e8");
    });
}
function imgsrc2() {
    let any = document.getElementById("image");
    any.setAttribute("href", "/css/mainyellow.css");
    let any1 = document.getElementById("logo");
    any1.setAttribute("src", "/pictures/логоyellow.png");
    let any2 = document.querySelectorAll("#g");
    any2.forEach(element => {
        element.setAttribute("fill", "#faed27");
    });
}
function imgsrc3() {
    let any = document.getElementById("image");
    any.setAttribute("href", "/css/mainpink.css");
    let any1 = document.getElementById("logo");
    any1.setAttribute("src", "/pictures/логоpink.png");
    let any2 = document.querySelectorAll("#g");
    any2.forEach(element => {
        element.setAttribute("fill", "#fe019a");
    });
}
