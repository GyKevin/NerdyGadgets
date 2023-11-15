// import navbar
fetch('/navbar/navbar.php')
    .then(response => response.text())
    .then(data => {
        document.getElementById('navbar').innerHTML = data;
});

// import footer
fetch('/navbar/footer.php')
    .then(response => response.text())
    .then(data => {
        document.getElementById('footer').innerHTML = data;
});