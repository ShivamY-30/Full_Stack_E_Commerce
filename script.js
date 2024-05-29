document.addEventListener("DOMContentLoaded", function() {
    const hamburgerMenu = document.querySelector('.hamburger-menu');
    const navMenu = document.getElementById('navbar');
    
    // Toggle navigation menu on hamburger menu click
    hamburgerMenu.addEventListener('click', function() {
      navMenu.classList.toggle('active');
    });
  });



