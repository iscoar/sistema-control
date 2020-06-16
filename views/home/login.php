<div class="col-12 mx-auto text-center">
	<?php if(isset($_SESSION['error_login'])): ?>
		<strong class="alert alert-danger"><?=$_SESSION['error_login']?></strong>
	<?php endif; ?>
	<?php Utils::deleteSession('error_login') ?>
	<div class="row w-100 h-100">
		<div class="col-5 mx-auto">
			<div class="card mt-5">
				<div class="card-body">
					<form action="<?=base_url?>Usuario/login" method="post">
        		<h2 class="text-center">Iniciar sesión</h2>   
						<div class="form-group">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="fa fa-at"></i>
									</span>
								</div>
								<input type="text" name="username" class="form-control" placeholder="Usuario" aria-label="Username">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="fa fa-lock"></i>
									</span>
								</div>
								<input type="password" name="password" class="form-control" placeholder="Contraseña" aria-label="Contrasena">
							</div>
						</div>    
						<div class="form-group">
								<button type="submit" class="btn btn-primary login-btn btn-block">Entrar</button>
						</div>
    			</form>
				</div>
			</div>
		</div>
	</div>
</div>