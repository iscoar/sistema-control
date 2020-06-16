function deleteFile(id, url, file) {
	let eliminar = confirm('Estas seguro de eliminar este archivo');

	if(eliminar == true) {
		let formData = new FormData();
		formData.append("id", id);
		formData.append("archivo", file);
		fetch(`${url}Documento/destroy`, {
			method: 'POST',
			body: formData,
		})
		.then(respuesta => respuesta.text())
		.then(decodificado => {
			document.getElementById("message").textContent=decodificado;
			setTimeout(function() {
				document.getElementById("message").textContent="";
				location.reload();
			}, 1500);
		});
	}
}