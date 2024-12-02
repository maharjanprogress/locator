const startButton = document.querySelector(".container2 .btn");
const cont4 = document.querySelector(".container4");
const services = document.querySelector(".navbar #services");
const cont2 = document.querySelector(".container2");
const home = document.querySelector(".navbar #home");
const openPopups = document.querySelectorAll("[data-open]");
const closePopups = document.querySelectorAll("[data-close]");
const overlay = document.getElementById("overlay");

// const doc = document.getElementById("doc-list");

if (startButton != null) {
  startButton.onclick = () => {
    // cont4.scrollIntoView({ behavior: "smooth" });
    window.location.href = "../php/content.php";
  };
}

if (cont4 != null) {
  services.onclick = () => {
    cont4.scrollIntoView({ behavior: "smooth" });
  };
}

home.onclick = () => {
window.scrollTo({ top: 0, behavior: "smooth" });
// window.location.href = "index.html";
};

openPopups.forEach((button) => {
  button.addEventListener("click", () => {
    const openP = document.querySelector(button.dataset.open);
    // popup(openP);
    console.log("clicked");
    openP.classList.add("active");
    overlay.classList.add("active");
  });
});

closePopups.forEach((button) => {
  button.addEventListener("click", () => {
    const closeP = button.closest(".pop");
    closeP.classList.remove("active");
    overlay.classList.remove("active");
  });
});

overlay.addEventListener("click", () => {
  const closeOverlay = document.querySelectorAll(".pop.active");
  closeOverlay.forEach((p) => {
    p.classList.remove("active");
  });
});

// ------------------------------------------------------------
// ---------------------- DOCTOR PAGE -------------------------

let btn = document.querySelectorAll("#docContainer .doc button");

// btn.forEach((button) => {
//   button.addEventListener("click", () => {
//     window.location.href = "../html/appointment.html";
//   });
// });
