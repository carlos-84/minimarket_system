document.querySelector("#loginForm").addEventListener("submit", function(event) {
    event.preventDefault();
    login();
});

async function login() {
   const loginForm = document.querySelector("#loginForm");
    let datos = new FormData(loginForm);

    try {
        const url = `${base_url}/Login/ingresar`;
        const respuesta = await fetch(url, {
            method: "POST",
            body: datos,
        })

        const resultado = await respuesta.json();
        
        if (resultado.error) {
          new Noty({
                type: 'error',
                text: `${resultado.error}`,
                layout: "topCenter",
                theme: "metroui",
                timeout: 1500
            }).show();  
        }else {
            window.location.href = `${base_url}/Perfil`;
        }

    } catch (err) {
        console.error("Ocurrio un error al iniciar sesión:", err);
    }

} 