function submitForm() {
    var form = document.getElementById("myForm");
    var formData = new FormData(form);
    fetch('../backend/datosfinales.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            console.log(data)
            if (data.Respuesta) {
                window.location.href = "../webs/sensores.php";
            }
        })
        .catch(error => console.error(error));
}