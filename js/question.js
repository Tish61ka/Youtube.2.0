let box = document.querySelector('#close');
let box2 = document.querySelector('#close2');
let box3 = document.querySelector('#close3');
let box4 = document.querySelector('#qu');
let box5 = document.querySelector('#qu2');
let box6 = document.querySelector('#qu3');
box.addEventListener("click", function() {
  box.classList.add('box_animate_1');
  box4.classList.add('box_animate_2');
  box2.classList.add('box_animate_1');
  box5.classList.add('box_animate_2');
  box3.classList.add('box_animate_1');
  box6.classList.add('box_animate_2');
});


