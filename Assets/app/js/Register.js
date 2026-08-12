

document.addEventListener("DOMContentLoaded", function () {
 
}, false);

async function save(e) {
    e.preventDefault();
    const frmRegister = document.querySelector("#frmRegister");
    let datos = new FormData(frmRegister);
    try {
        const url = base_url + "/Register/save";

        const respuesta = await fetch(url, {
            method: "POST",
            body: datos,
        });

        const resultado = await respuesta.json();
        
        if (resultado.status === true) {
            new Noty({
                type: 'success',
                text: `${resultado.msg}`,
                layout: "topCenter",
                theme: "metroui",
                timeout: 1500
            }).show();
            frmRegister.reset();
        } else {
            new Noty({
                type: 'error',
                text: `${resultado.error}`,
                layout: "topCenter",
                theme: "metroui",
                timeout: 1500
            }).show();
        }
    } catch (err) {
        console.log(err);
    }
}