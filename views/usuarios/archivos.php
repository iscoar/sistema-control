<div class="col-12  mt-5 text-center">
	<h3 id="message" class="text-info"></h3>
</div>
<div class="col-12">
	<table class="table">
		<thead>
			<tr>
				<th scope="col">Nombre</th>
				<th scope="col">Tipo</th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
			<?php while($file = $files->fetch_object()): ?>
			<tr>
				<td><?=$file->name?></td>
				<td><?=$file->type?></td>
				<td class="text-right">
					<a target="_blank" href="<?=base_url?>Documento/download&archivo=<?=$file->name?>" class="btn btn-success">
						<i class="fa fa-download pr-2"></i>
						Descargar
					</a>
					<?php
						$url = base_url;
						$button = "<button class='btn btn-danger' onclick='deleteFile($file->id,\"$url\",\"$file->name\");'>"
					?>
					<?=$button ?>
						<i class="fa fa-trash pr-2"></i>
						Eliminar
					</button>
				</td>
			</tr>
			<?php endwhile; ?>
		</tbody>
	</table>
</div>