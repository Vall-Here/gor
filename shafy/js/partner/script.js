const sidebar = () => {
  document
    .querySelectorAll(
      ".sidebar__menu-list .sidebar__menu-link + .sidebar__menu-list"
    )
    .forEach((e) => {
      e.previousElementSibling.addEventListener("click", () => {
        e.previousElementSibling.classList.toggle(
          "sidebar__menu-link_collapse"
        ),
          e.classList.toggle("sidebar__menu-list_show");
      });
    });
};
document
  .querySelectorAll(
    ".sidebar__menu-list .sidebar__menu-link + .sidebar__menu-list"
  )
  .forEach((e) => {
    e.previousElementSibling.addEventListener("click", () => {
      e.previousElementSibling.classList.toggle("sidebar__menu-link_collapse"),
        e.classList.toggle("sidebar__menu-list_show");
    });
  });
const topbar = (e) => {
  e.addEventListener("click", () => {
    e.nextElementSibling.classList.toggle("topbar__profile-menu-list_show");
  });
};
topbar(document.querySelector(".topbar__profile-toggler"));


