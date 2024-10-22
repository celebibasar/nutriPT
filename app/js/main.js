document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('#toggleMenu').addEventListener('click', function() {
        document.querySelector('.menu').classList.toggle('active');
    });
});
