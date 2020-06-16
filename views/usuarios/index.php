<div class="col-12 text-center">
	<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
		<strong class="alert alert-success">Registro completado correctamente</strong>
	<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
		<strong class="alert alert-danger">Registro fallido</strong>
	<?php endif; ?>
	<?php Utils::deleteSession('register') ?>
</div>
<div class="col-12 mt-4 text-right">
	<a href="<?=base_url?>Usuario/nuevo" class="btn btn-primary">
		<i class="fa fa-plus pr-2"></i>
		Nuevo
	</a>
</div>
<div class="col-12 mt-2">
	<table class="table">
		<thead>
			<tr>
				<th scope="col">Nombre</th>
				<th scope="col">Usuario</th>
				<th scope="col">Contraseña</th>
				<th scope="col">Teléfono</th>
				<th scope="col">Área</th>
				<th scope="col">Dirección</th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
			<?php while($user = $users->fetch_object()): ?>
			<tr>
				<td><?=$user->name?></td>
				<td><?=$user->username?></td>
				<td><?=$user->password?></td>
				<td><?=$user->phone?></td>
				<td><?=$user->work_area?></td>
				<td><?=$user->address?></td>
				<td class="text-right">
					<a href="<?=base_url?>Usuario/edit&id=<?=$user->id?>" class="btn btn-info" aria-labelledby="Editar">
						<i class="fa fa-edit"></i>
					</a>
					<?php
						$url = base_url;
						$button = "<button class='btn btn-danger' aria-labelledby='Eliminar' onclick='deleteUser($user->id,\"$url\");'>"
					?>
					<?=$button ?>
						<i class="fa fa-trash"></i>
					</button>
				</td>
			</tr>
			<?php endwhile; ?>
		</tbody>
	</table>
</div>