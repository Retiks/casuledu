window.addEventListener('load', function() {
    document.getElementById('displayPass').addEventListener('click', function() {
        afficherPassword();
    });
});

function afficherPassword() {
    var input = document.getElementById("password");
    if (input.type === "password") {
        input.type = "text";
    } else {
        input.type = "password";
    }
}