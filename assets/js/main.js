let linksNavbar = document.querySelectorAll(".nav-item");

// linksNavbar.forEach((link) => {
//     link.onclick = function () {
//         linksNavbar.forEach((link) => {
//             link.classList.remove("active");
//         });
//         link.classList.add("active");
//     };
// });


let span = document.querySelector(".go-to-up");
window.onscroll = function () {
  this.scrollY >= 100 ? span.classList.add("go-to-up-show") : span.classList.remove("go-to-up-show");
};
span.onclick = function () {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
}


const heroHandle = (id) => {
    let extraText = document.querySelector(`.extra-${id}`)
    let originalText = document.querySelector(`.original-${id}`)
    let readMore = document.querySelector(`.readmore-${id}`)
    let readLess = document.querySelector(`.readless-${id}`)
    readMore.onclick = function () {
        readLess.classList.toggle("d-none")
        extraText.classList.toggle("d-none")
        originalText.classList.toggle("d-none")
        readMore.classList.toggle("d-none")
    }
    readLess.onclick = function () {
        readLess.classList.toggle("d-none")
        extraText.classList.toggle("d-none")

        originalText.classList.toggle("d-none")
        readMore.classList.toggle("d-none")
    }
}



