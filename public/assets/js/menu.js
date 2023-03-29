const menu = document.getElementById("menu");
const menuBtn = document.getElementById("menuBtn");

if (menu && menuBtn) {
  const toggleMenu = () => {
    document.body.classList.toggle("active");
    menu.classList.toggle("active");
    menuBtn.classList.toggle("active");
  };
  menuBtn.onclick = () => toggleMenu();
  menu.onclick = (e) => {
    if (e.currentTarget === e.srcElement) {
      toggleMenu();
    }
  };
}

const howMenu = document.getElementById("howMenu");
const howMenuBtn = document.getElementById("howMenuBtn");

if (howMenu && howMenuBtn)
  howMenuBtn.onclick = () => howMenu.classList?.toggle("active");

const tabBtnFunc = (btn) => {
  btn.onclick = () => {
    const parentSelector = btn.getAttribute("data-parent");
    const parent = document.querySelector(parentSelector);
    btn.classList.add("active");
    parent.querySelectorAll('[data-event="tabBtn"]').forEach((tabBtn) => {
      if (btn !== tabBtn) {
        tabBtn.classList.remove("active");
      }
    });
  };
};

const eventBtns = document.querySelectorAll("[data-event]");
eventBtns.forEach((btn) => {
  if (btn.getAttribute("data-event") === "tabBtn") {
    tabBtnFunc(btn);
  }
});
