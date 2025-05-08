document.addEventListener('DOMContentLoaded', function () {
  const menuTitle = document.querySelector('.menu-title');
  const dropdown = document.querySelector('.dropdown-content');

  menuTitle.addEventListener('click', function (e) {
    e.stopPropagation();
    dropdown.classList.toggle('show');
    menuTitle.classList.toggle('active');
  });

  document.addEventListener('click', function (e) {
    if (!dropdown.contains(e.target) && !menuTitle.contains(e.target)) {
      dropdown.classList.remove('show');
      menuTitle.classList.remove('active');
    }
  });
});
