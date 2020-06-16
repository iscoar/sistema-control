<div class="col-12 mt-5">
	<h2>Crear Usuario</h2>
</div>
<div class="col-12 mt-2">
	<form action="<?=base_url?>Usuario/save" method="post">
		<input type="hidden" name="admin" value="1">  
		<div class="row w100">
			<div class="col-6">
				<div class="form-group">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="fa fa-at"></i>
							</span>
						</div>
						<input type="text" name="username" class="form-control" placeholder="Usuario" aria-label="Username" required>
					</div>
				</div>
				<?php if(isset($_SESSION['errores']) && isset($_SESSION['errores']['username'])): ?>
					<span class="text-danger"><?=$_SESSION['errores']['username']?></span>
				<?php endif; ?>
				<div class="form-group">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="fa fa-lock"></i>
							</span>
						</div>
						<input 
							type="password" 
							name="password" 
							id="pass" 
							class="form-control" 
							placeholder="Contraseña" 
							aria-label="Contraseña" 
							pattern="[A-Z]{2}[a-z]{2}\d{4}" 
							title="Contrasena debe tener dos mayusculas, dos minusculas y cuatro numeros e.g. AAaa1111"
							required>
					</div>
				</div>
				<?php if(isset($_SESSION['errores']) && isset($_SESSION['errores']['password'])): ?>
					<span class="text-danger"><?=$_SESSION['errores']['password']?></span>
				<?php endif; ?>
				<div class="form-group">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="fa fa-user"></i>
							</span>
						</div>
						<input type="text" name="name" class="form-control" placeholder="Nombre" aria-label="Nombre" required>
					</div>
				</div>
				<?php if(isset($_SESSION['errores']) && isset($_SESSION['errores']['name'])): ?>
					<span class="text-danger"><?=$_SESSION['errores']['name']?></span>
				<?php endif; ?>
			</div>
			<div class="col-6">
				<div class="form-group">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="fa fa-map-marker"></i>
							</span>
						</div>
						<input type="text" name="address" class="form-control" placeholder="Dirección" aria-label="address" required>
					</div>
				</div>
				<?php if(isset($_SESSION['errores']) && isset($_SESSION['errores']['address'])): ?>
					<span class="text-danger"><?=$_SESSION['errores']['address']?></span>
				<?php endif; ?>
				<div class="form-group">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="fa fa-phone"></i>
							</span>
						</div>
						<input type="text" name="phone" class="form-control" placeholder="Teléfono" aria-label="phone" required>
					</div>
				</div>
				<?php if(isset($_SESSION['errores']) && isset($_SESSION['errores']['phone'])): ?>
					<span class="text-danger"><?=$_SESSION['errores']['phone']?></span>
				<?php endif; ?>
				<div class="form-group">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="fa fa-building"></i>
							</span>
						</div>
						<input type="text" name="work_area" class="form-control" placeholder="Área de trabajo" aria-label="work_area" required>
					</div>
				</div>    
				<?php if(isset($_SESSION['errores']) && isset($_SESSION['errores']['work_area'])): ?>
					<span class="text-danger"><?=$_SESSION['errores']['work_area']?></span>
				<?php endif; ?>
			</div>
			<div class="col-12 text-right">
				<div class="form-group">
					<button type="submit" class="btn btn-primary">
						<i class="fa fa-save pr-2"></i>
						Crear
					</button>
				</div>
			</div>
		</div>
	</form>
</div>
<?php Utils::deleteSession('errores') ?>