<div class="col-12 mx-auto text-center">
	<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
		<strong class="alert alert-success">Registro completado correctamente</strong>
	<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
		<strong class="alert alert-danger">Registro fallido</strong>
	<?php endif; ?>
	<?php Utils::deleteSession('register') ?>
	<div class="row w-100 h-100">
		<div class="col-5 mx-auto">
			<div class="card mt-5">
				<div class="card-body">
					<form action="<?=base_url?>Usuario/save" method="post">
        		<h2 class="text-center">Crear cuenta</h2>   
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
						<div class="form-group">
								<button type="submit" class="btn btn-primary login-btn btn-block">Crear</button>
						</div>
    			</form>
				</div>
			</div>
			<p class="text-center text-muted small">
				<a href="<?=base_url?>">Iniciar sesion</a>
			</p>
		</div>
	</div>
</div>
<?php Utils::deleteSession('errores') ?>