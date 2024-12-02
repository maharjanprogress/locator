const searhPop = document.querySelectorAll("[data-open]");
const searchClosePopups = document.querySelectorAll("[data-close]");
const searhOverlay = document.getElementById("overlay");


 searhPop.forEach((button) => {
    button.addEventListener("click", () => {
      const openP = document.querySelector(button.dataset.open);
      // popup(openP);
      console.log("clicked");
      openP.classList.add("active");
      searhOverlay.classList.add("active");
    });
  });
  
  searchClosePopups.forEach((button) => {
    button.addEventListener("click", () => {
      const closeP = button.closest(".pop");
      closeP.classList.remove("active");
      searhOverlay.classList.remove("active");
    });
  });
  
  searhOverlay.addEventListener("click", () => {
    const closesearhOverlay = document.querySelectorAll(".pop.active");
    closesearhOverlay.forEach((p) => {
      p.classList.remove("active");
    });
  });