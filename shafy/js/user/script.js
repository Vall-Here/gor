const navbarAddFavorite = () => {
    document.querySelector("[data-favorite] span").textContent++;
  },
  navbarRemoveFavorite = () => {
    const e = document.querySelector("[data-favorite] span");
    e.textContent > 0 && e.textContent--;
  },
  navbarLoadFavorites = () => {
    const e = document.querySelector("[data-favorite] span"),
      t = getFavorites();
    e.textContent = t.length;
  };
window.addEventListener("load", navbarLoadFavorites);
const subscribe = async (e) => {
    var t = new URLSearchParams();
    t.append("email", e);
    try {
      const e = await fetch("https://dpw.shafygunawan.my.id/subscribe.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: t,
      });
      if (e.ok) {
        return 200 === (await e.json()).status;
      }
      return !1;
    } catch (e) {
      return !1;
    }
  },
  footer = () => {
    const e = document.querySelector("form.footer__header-right");
    e.addEventListener("submit", async (t) => {
      t.preventDefault();
      const a = e.querySelector("input"),
        r = e.querySelector("button");
      (r.disabled = !0),
        (r.textContent = "Loading..."),
        r.classList.add("footer__newsletter-button_disabled");
      (await subscribe(a.value))
        ? alert("Thank you for subscribing to our newsletter!")
        : alert("Internal server error."),
        (r.disabled = !1),
        (r.textContent = "Subscribe"),
        r.classList.remove("footer__newsletter-button_disabled");
    });
  };
footer();
