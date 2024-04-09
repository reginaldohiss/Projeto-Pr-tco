document.addEventListener("DOMContentLoaded", function() {
    const token = localStorage.getItem('token');
    const user = localStorage.getItem('user');

    document.getElementById('nome-nav').innerText = user;

    document.getElementById('sair').addEventListener('click', function () {
       localStorage.clear();
       window.location.reload();
    });
    if (!token && window.location.pathname !== '/') {
        window.location.href = '/';
    }
});
