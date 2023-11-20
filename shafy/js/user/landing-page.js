const landingPage = () => {
  const e = document.querySelectorAll(".featured-fields__card-favorite"),
    a = document.querySelectorAll(".fields__card-favorite"),
    t = getFavorites();
  e.forEach((e) => {
    const a = e.dataset.fieldId;
    -1 !== t.indexOf(a)
      ? e.classList.add("featured-fields__card-favorite_active")
      : e.classList.remove("featured-fields__card-favorite_active"),
      e.addEventListener("click", () => {
        if (e.classList.contains("featured-fields__card-favorite_active"))
          return (
            e.classList.remove("featured-fields__card-favorite_active"),
            navbarRemoveFavorite(),
            void deleteFavorite(a)
          );
        e.classList.add("featured-fields__card-favorite_active"),
          navbarAddFavorite(),
          addFavorite(a);
      });
  }),
    a.forEach((e) => {
      const a = e.dataset.fieldId;
      -1 !== t.indexOf(a)
        ? e.classList.add("fields__card-favorite_active")
        : e.classList.remove("fields__card-favorite_active"),
        e.addEventListener("click", () => {
          if (e.classList.contains("fields__card-favorite_active"))
            return (
              e.classList.remove("fields__card-favorite_active"),
              navbarRemoveFavorite(),
              void deleteFavorite(a)
            );
          e.classList.add("fields__card-favorite_active"),
            navbarAddFavorite(),
            addFavorite(a);
        });
    });
  const i = document.querySelector("form.filter"),
    d = i.querySelector("button"),
    r = i.querySelectorAll("select"),
    c = i.querySelectorAll("input[type='date']");
  r.forEach((e) => {
    e.addEventListener("change", () => {
      d.click();
    });
  }),
    c.forEach((e) => {
      e.addEventListener("input", () => {
        d.click();
      });
    });
};
window.addEventListener("load", landingPage);
