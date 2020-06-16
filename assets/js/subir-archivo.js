const btnEnviar = document.querySelector('#upload');

function readUrl(input) {
  
  if (input.files && input.files[0]) {
    let reader = new FileReader();
    reader.onload = function(e) {
      let imgData = e.target.result;
      let imgName = input.files[0].name;
      input.setAttribute("data-title", imgName);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

btnEnviar.addEventListener("click", () => {
  const inputFile = document.querySelector('#inputFile');
  if (inputFile.files.length > 0) {
      let formData = new FormData();
      formData.append("archivo", inputFile.files[0]);
      formData.append("submit", btnEnviar);
      fetch("/Documento/upload", {
        method: 'POST',
        body: formData,
      })
      .then(respuesta => respuesta.text())
      .then(decodificado => {
        document.getElementById("error").textContent=decodificado;
        setTimeout(function() {
          document.getElementById("error").textContent="";
          location.reload();
        }, 3000);
      });
  } else {
      // El usuario no ha seleccionado archivos
      alert("Selecciona un archivo");
  }
});