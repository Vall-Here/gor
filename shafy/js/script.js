const FAVORITES_KEY = "favorites",
addFavorite = (t) => {
    const e = getFavorites();
    e.push(t);
    const a = JSON.stringify(e);
    localStorage.setItem("favorites", a);
},
  getFavorites = () => {
    let t = localStorage.getItem("favorites");
    return t ? JSON.parse(t) : [];
  },
  deleteFavorite = (t) => {
    const e = getFavorites();
    var a = e.indexOf(t);
    -1 !== a && e.splice(a, 1);
    const o = JSON.stringify(e);
    localStorage.setItem("favorites", o);
  },
animateOnScroll = () => {
    document.querySelectorAll("[data-animated]").forEach((t) => {
    const e = t.getBoundingClientRect(),
        a = window.innerHeight;
      e.top <= 0.75 * a
        ? ((t.style.opacity = 1), (t.style.transform = "translateY(0)"))
        : e.top >= a &&
        ((t.style.opacity = 0), (t.style.transform = "translateY(50px)"));
    });
};
window.addEventListener("scroll", animateOnScroll), animateOnScroll();
