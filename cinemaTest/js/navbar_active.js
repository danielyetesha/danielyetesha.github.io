const page = window.location.pathname;
const activePage = page.slice(18);
const navLink = document.querySelectorAll(".nav-act a").forEach((link) => {
  if (link.href.includes(`${activePage}`)) {
    console.log(`active page is ${activePage}`);
    link.classList.add("active");
  }
});
