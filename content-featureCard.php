<div class="featureCard" style="padding:0;background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);background-position:center;background-size:cover;">
	<div class="p-3 py-4 d-flex justify-content-between flex-column" title="<?php echo html_entity_decode(mb_strimwidth(get_the_excerpt(), 0, 150, ' ...'), ENT_QUOTES, 'UTF-8') ?>">

		<div></div>
		<div class=" d-flex justify-content-between flex-column">

			<a href="<?php echo esc_url(get_permalink()); ?>">
				<h5 class="card-title"><?php the_title('<b>', '</b>'); ?></h5>
			</a>
			<div class="small">
				<i class="fa-sharp fa-solid fa-calendar-days"></i>
				<?= date("d-m-Y", get_post_time('U', true)); ?>
			</div>
			<small class="card-text"><?php echo html_entity_decode(mb_strimwidth(get_the_excerpt(), 0, 70, ' ...'), ENT_QUOTES, 'UTF-8') ?></small>
		</div>

	</div>
</div>