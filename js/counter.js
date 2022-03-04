const textarea = document.querySelector("textarea");
const count = document.querySelector(".count");
const input = document.querySelector("input");
const count1 = document.querySelector(".count1");

    function countLetters() {
    const text = textarea.value; // #1
    const textlength = textarea.value.length; // #2
    count.innerText = `${textlength}`; // #3
}
    function countLetters1() {
    const text = input.value; // #1
    const textlength = input.value.length; // #2
    count1.innerText = `${textlength}`; // #3
}