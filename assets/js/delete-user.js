function deleteUser(id, url) {
	let eliminar = confirm('Estas seguro de eliminar a este usuario');

	if(eliminar == true) {
		let formData = new FormData();
		formData.append("id", id);
		
		fetch(`${url}Usuario/destroy`, {
			method: 'POST',
			body: formData,
		})
		.then(respuesta => respuesta.text())
		.then(decodificado => {
			location.reload();
		});
	}
}