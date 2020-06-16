<div class="col-12 mt-5">
	<div class="row w-100">
		<?php while($user = $users->fetch_object()): ?>
      <div class="col-3 mx-auto text-center folder mb-4">
				<a href="<?=base_url?>Usuario/archivos&id=<?=$user->id?>">
					<div class="ffolder small cyan">
					</div>
					<p class="text-black-50"><?= $user->name ?></p>
				</a>
			</div>
    <?php endwhile; ?>
	</div>
</div>