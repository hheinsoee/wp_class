<tr>
	<?php
	if (get_post_meta(get_the_id(), 'class', true)) {
		$classMeta = get_post_meta(get_the_id(), 'class', true);
	?>
		<td>
			<span><?= myDate($classMeta['startDate'], "calenda"); ?></span>
		</td>
	<?php
	}
	?>

	<td>
		<a href="<?php echo esc_url(get_permalink()); ?>">
			<h5 class="card-title"><?php the_title('<b>', '</b>'); ?></h5>
			<small class="card-text"><?php echo html_entity_decode(mb_strimwidth(get_the_excerpt(), 0, 70, ' ...'), ENT_QUOTES, 'UTF-8') ?></small>
			<div>
				<?php
				$term_obj_list = get_the_terms($post->ID, 'course');
				echo join(', ', wp_list_pluck($term_obj_list, 'name'));
				?>
			</div>
		</a>
	</td>
</tr>