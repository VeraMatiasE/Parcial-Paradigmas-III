$(document).ready(async () => {
  const urlParams = new URLSearchParams(window.location.search);
  const id = urlParams.get("id");

  let boton_comentario = $("#insertar-comentario button");
  boton_comentario.click(mv_agregar_comentario);

  async function mv_agregar_comentario() {
    let lista_comentarios = $(".lista-comentarios");
    let textarea_comentario = $("#insertar-comentario textarea");
    let contenido_comentario = textarea_comentario.val().trim();

    if (!contenido_comentario) {
      alert("El comentario no puede estar vacío");
      return;
    }

    let formData = new FormData();
    formData.append("contenido", contenido_comentario);

    try {
      let response = await fetch(`mv_agregar_comentario.php?id_post=${id}`, {
        method: "POST",
        body: formData,
      });

      if (response.ok) {
        let result = await response.json();

        let nuevo_comentario_html = `
                    <div class="comentario">
                        <div class="datos-comentario">
                            <p class="usuario">
                                ${
                                  result.nombre_usuario
                                    ? result.nombre_usuario
                                    : "Anónimo"
                                }
                            </p>
                            <p class="fecha-comentario">${result.fecha}</p>
                        </div>
                        <p class="contenido-comentario">${result.contenido.replace(
                          /\n/g,
                          "<br>"
                        )}</p>
                    </div>
                `;

        lista_comentarios.append(nuevo_comentario_html);
        textarea_comentario.val("");
      } else {
        alert("Hubo un error al agregar el comentario.");
      }
    } catch (error) {
      console.error("Error al agregar comentario:", error);
      alert("No se pudo conectar con el servidor.");
    }
  }
});
