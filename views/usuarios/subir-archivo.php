<div class="col-12">
	<div class="row w-100">
		<div class="col-12 mx-auto">
			<h1 class="text-center">Subir archivo</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6 offset-sm-3 text-center">
			<button type="button" class="btn btn-primary btn-block" onclick="document.getElementById('inputFile').click()">Elegir archivo</button>
			<span class="font-weight-bold">ó</span>
      <div class="form-group inputDnD">
        <label class="sr-only" for="inputFile">File Upload</label>
        <input type="file" class="form-control-file text-primary font-weight-bold" id="inputFile" accept="application/pdf" onchange="readUrl(this)" data-title="Arrastra y suelta tu archivo aquí">
			</div>
			<button id="upload" type="button" class="btn btn-primary btn-block">Subir archivo</button>
			<span class="text-info" id="error"></span>
    </div>
	</div>
</div>