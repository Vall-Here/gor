const sidebar=()=>{document.querySelectorAll(".sidebar__menu-list .sidebar__menu-link + .sidebar__menu-list").forEach((e=>{e.previousElementSibling.addEventListener("click",(()=>{e.previousElementSibling.classList.toggle("sidebar__menu-link_collapse"),e.classList.toggle("sidebar__menu-list_show")}))}))};document.querySelectorAll(".sidebar__menu-list .sidebar__menu-link + .sidebar__menu-list").forEach((e=>{e.previousElementSibling.addEventListener("click",(()=>{e.previousElementSibling.classList.toggle("sidebar__menu-link_collapse"),e.classList.toggle("sidebar__menu-list_show")}))}));