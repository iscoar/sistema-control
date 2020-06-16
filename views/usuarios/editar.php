<div class="col-12 mt-5">
	<h2>Editar Usuario</h2>
</div>
<div class="col-12 mt-2">
	<form action="<?=base_url?>Usuario/update" method="post"> 
		<input type="hidden" name="id" value="<?=$edit->id?>">  
		<div class="row w100">
			<div class="col-6">
				<div class="form-group">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="fa fa-at"></i>
							</span>
						</div>
						<input type="text" name="username" class="form-control" placeholder="Usuario" aria-label="Username" required value="<?=$edit->username?>">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="fa fa-user"></i>
							</span>
						</div>
						<input type="text" name="name" class="form-control" placeholder="Nombre" aria-label="Nombre" required value="<?=$edit->name?>">
					</div>
				</div>
			</div>
			<div class="col-6">
				<div class="form-group">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="fa fa-map-marker"></i>
							</span>
						</div>
						<input type="text" name="address" class="form-control" placeholder="Dirección" aria-label="address" required value="<?=$edit->address?>">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="fa fa-phone"></i>
							</span>
						</div>
						<input type="text" name="phone" class="form-control" placeholder="Teléfono" aria-label="phone" required value="<?=$edit->phone?>">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="fa fa-building"></i>
							</span>
						</div>
						<input type="text" name="work_area" class="form-control" placeholder="Área de trabajo" aria-label="work_area" required value="<?=$edit->work_area?>">
					</div>
				</div>    
			</div>
			<div class="col-12 text-right">
				<div class="form-group">
					<button type="submit" class="btn btn-primary">
						<i class="fa fa-save pr-2"></i>
						Guardar
					</button>
				</div>
			</div>
		</div>
	</form>
</div>