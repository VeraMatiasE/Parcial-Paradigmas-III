$(document).ready(
async () => {
    let comentario_html = "<div class='comentario'><div class='comentario'></div></div>";

    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get("id");

    let boton_comentario = $("#insertar-comentario button");
    boton_comentario.click(mv_agregar_comentario); 

    async  function mv_agregar_comentario() {
        let lista_comentarios = $("lista-comentarios");
        let textarea_comentario = $("#insertar-comentario textarea");
        let contenido_comentario = textarea_comentario.val();

        let formData = new FormData();
        formData.append('contenido', contenido_comentario);

        await fetch("http://localhost/mv_paginas/mv_agregar_comentario.php?id_post=" + id , {
            method: "POST",
            body: formData
          }).then(async resultado => {
            if (resultado.status == 200) {
                let result = await resultado.json();

                let nuevo_comentario_html = `
                    <hr>
                    <div class="comentario">
                        <div class="datos-comentario">
                            <p>Usuario: ${result.nombre_usuario ? result.nombre_usuario : "Anónimo"}</p>
                            <p>Fecha: ${result.fecha}</p>
                        </div>
                        <p>${result.contenido}</p>
                    </div>
                `;

                $(".lista-comentarios").append(nuevo_comentario_html);
                
                textarea_comentario.val('');
            }
          });
    }
});
