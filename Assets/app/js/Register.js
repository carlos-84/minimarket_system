document.addEventListener("DOMContentLoaded", function () {

},false);

async function save(e) {
    e.preventDefault();
    
   let frmRegister = new FormData(document.querySelector("#frmRegister"));

    const url = "http://localhost/minimarket/Register/save";

    const respuesta = await fetch(url, {
        method: "POST",
        body: frmRegister,
    });

    const resultado = await respuesta.json();

    console.log(resultado);
   
 
}