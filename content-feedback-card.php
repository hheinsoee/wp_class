<a href="<?php echo esc_url(get_permalink()); ?>" title="<?php echo html_entity_decode(mb_strimwidth(get_the_excerpt(), 0, 150, ' ...'), ENT_QUOTES, 'UTF-8') ?>" class="feedback">
	<div class="d-flex">
		<?php
		if (has_post_thumbnail()) {
		?>
			<div>
				<img class="image" src="<?php echo images()['m']; ?>" alt="">
			</div>
		<?php
			// if (get_post_format()) {
			// 	wn_post_format(get_post_format());  
			// }
		}
		?>
		<div>
			<h5 class="card-title"><?php the_title('<b>', '</b>'); ?></h5>
			<div class="card-body glass">
				<p class="card-text">
					<?php
					echo html_entity_decode(mb_strimwidth(get_the_excerpt(), 0, 70, ' ...'), ENT_QUOTES, 'UTF-8')
					?>
				</p>
			</div>
		</div>
	</div>
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