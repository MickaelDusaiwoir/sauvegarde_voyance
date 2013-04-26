<?php get_header(); ?>
<div id="content"><div id="content_top"><div id="content_btm">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class("postbox"); ?>><div class="postbox2"><div class="postbox3">
				<div class="post_title">
					<h1><?php the_title(); ?></h1><?php edit_post_link(__('Éditer','templatelite'),'(',') '); ?>
				</div>
				<div class="clear"></div>
				<div class="entry">
					<?php the_content(__('more &raquo;','templatelite')); ?><div class="clear"></div>
					<?php wp_link_pages(array('before' => '<div><center><strong>Pages: ', 'after' => '</strong></center></div>', 'next_or_number' => 'number')); ?>
				</div>
				<div class="info">
					<?php the_tags('&nbsp;<span class="info_tag">'.__('Tags:','templatelite').' ', ', ', '</span>'); ?>
				</div>
			</div></div></div><!-- #postbox3, #postbox2,#postbox -->

<?php 
		endwhile; 
?>
		<div class="navigation">
				<div class="alignleft"><?php previous_post_link(__('&laquo; %link','templatelite'));?></div>
				<div class="alignright"><?php next_post_link(__('%link &raquo;','templatelite'));?></div>
		</div>
<?php 
	else : ?>
		<h3 class="archivetitle"><?php _e('Aucun résultat','templatelite');?></h3>
		<p class="sorry"><?php _e("Désolé, mais vous cherchez quelque chose qui n'est pas ici. Essayer autre chose.",'templatelite');?></p>
<?php
	endif;
?>
</div></div></div><!-- #content_btm, #content_top, #content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>