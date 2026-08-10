document.addEventListener("DOMContentLoaded", function () {

},false);

async function save(e) {
    e.preventDefault();
    
   let frmRegister = new FormData(document.querySelector("#frmRegister"));
    try {
        const url = base_url + "/Register/save";

        const respuesta = await fetch(url, {
            method: "POST",
            body: frmRegister,
        });

        const resultado = await respuesta.json();

        console.log(resultado);
    } catch (err) {
        console.log(err);
    }
}