const payment = () => {
  const e = document.querySelectorAll(".payment__select-box label");
  let t = !0;
  e.forEach((e) => {
    e.addEventListener("click", () => {
      if (t) return (t = !1), void e.classList.toggle("active");
      t = !0;
    });
  });
};
payment();
