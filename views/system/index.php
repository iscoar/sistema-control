<div class="col-6 offset-3 mt-3 text-center">
	<h1>Habilitar sistema</h1>
	<form action="<?=base_url?>Sistema/up" method="post" class="mt-4">
		<div class="form-group">
			<label for="stopDate">Fecha de cierre</label>
			<input type="datetime-local" class="form-control" id="stopDate" name="stop_date" min="<?=date('Y-m-d\TH:i')?>" required>
		</div>
		<button class="btn btn-success btn-block" type="submit">
			<i class="fa fa-check pr-2"></i>
			Habilitar
		</button>
	</form>
</div>