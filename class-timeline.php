<div class="d-flex m-2">

	<div>
		<div class="text-primary sticky-top offsetNav">
			<center><small>starts</small></center>
			<?php
			if (get_post_meta(get_the_id(), 'class', true)) {
				$classMeta = get_post_meta(get_the_id(), 'class', true);
			?>
				<span><?php myDate($classMeta['startDate'], "calenda"); ?></span>

			<?php
			} else {
			}
			?>
		</div>
	</div>

	<a href="<?php echo esc_url(get_permalink()); ?>" style="flex:1" class="m-2">
		<div class="bg-primary text-light class" <?php if (has_post_thumbnail()) {
													?> style="background:url(<?php echo images()['m']; ?>)" <?php
																										} ?>>

			<div class="px-3 pb-3 class-info">
				<h5 class="class-title px-2">
					<i class="fa-solid fa-users-rectangle"></i>
					<?php the_title('<b>', '</b>'); ?>
				</h5>
				<div>
					<i class="fa-solid fa-graduation-cap"></i>
					<?php
					$term_obj_list = get_the_terms($post->ID, 'course');
					echo join(', <i class="fa-solid fa-graduation-cap"></i> ', wp_list_pluck($term_obj_list, 'name'));
					?>
				</div>
			</div>
			<div class="bg-dark text-light px-3 ">
				<i class="fa-solid fa-location-dot"></i>
				<?php
				$term_obj_list = get_the_terms($post->ID, 'branch');
				echo join(', ', wp_list_pluck($term_obj_list, 'name'));
				?>
			</div>
		</div>
	</a>
</div>