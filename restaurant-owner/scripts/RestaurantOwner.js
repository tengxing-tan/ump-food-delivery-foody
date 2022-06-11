function activeNav(navId) {
  const activeNav = document.getElementById('nav-'.concat(navId));

  activeNav.style.backgroundColor = 'var(--primary-bg)';
  activeNav.style.color = 'white';
}
