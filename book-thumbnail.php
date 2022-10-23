<a href="<?php echo esc_url(get_permalink()); ?>" title="<?php echo html_entity_decode(mb_strimwidth(get_the_excerpt(), 0, 150, ' ...'), ENT_QUOTES, 'UTF-8') ?>">
	<book class="bg-primary text-light">
		<?php
		if (has_post_thumbnail()) {
		?>
			<img class="cover" src="<?php echo images()['s']; ?>" alt="">
		<?php
		}
		?>
		<div class="p-2">
			<?php the_title('<h3 class="h6">', '</h3>'); ?></h5>
			<p class="description">
				<?php
				echo html_entity_decode(mb_strimwidth(get_the_excerpt(), 0, 70, ' ...'), ENT_QUOTES, 'UTF-8')
				?>
			</p>
		</div>
	</book>
</a>


<?php

// $data[] = array(
// 	"id" => get_the_ID(),
// 	"slug" => $post->post_name,
// 	"title" => get_the_title(),
// 	"time" => date("Y-m-d H:i:s", get_post_time('U', true)),
// 	"excerpt" => html_entity_decode(get_the_excerpt(), ENT_QUOTES, 'UTF-8'),
// 	"images" => images(),
// 	"url" => esc_url(get_permalink())
// );