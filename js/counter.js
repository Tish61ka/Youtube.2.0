const textarea = document.querySelector("textarea");
const count = document.querySelector(".count");

    function countLetters() {
    const text = textarea.value; // #1
    const textlength = textarea.value.length; // #2
    count.innerText = `${textlength}`; // #3
}