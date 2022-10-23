<article class="card my-3">
	<div class="card-body">

		<h5 class="card-title"><?php the_title('<center>', '</center>'); ?></h5>
		<center>
			<div class="post-time">date</div>
		</center>
		<p class="card-text">
			<?php
			echo html_entity_decode(mb_strimwidth(get_the_excerpt(), 0, 270, '<a href="' . esc_url(get_permalink()) . '">..more..</a>'), ENT_QUOTES, 'UTF-8')
			?>
		</p>
	</div>
	<div>
		<?php
		if (has_post_thumbnail()) {
		?>
			<a href="<?php echo esc_url(get_permalink()); ?>" title="<?php echo html_entity_decode(mb_strimwidth(get_the_excerpt(), 0, 150, ' ...'), ENT_QUOTES, 'UTF-8') ?>">
				<img class="card-img-top" src="<?php echo images()['m']; ?>" alt="">
			</a>
		<?php
		}
		?>
	</div>
	<div class="d-flex card-footer">
		<?php get_template_part("author", "chip"); ?>
		<div style="flex:1"></div>
		<span>Share</span>
	</div>
</article>