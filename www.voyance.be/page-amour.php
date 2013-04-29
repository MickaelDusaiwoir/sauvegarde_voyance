<?php get_header(); ?>
<div id="content">
	<div id="content_top">
		<div id="content_btm">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class("postbox"); ?>>
				<div class="postbox2">
					<div class="postbox3">
						<div class="page_title">
							<h1><?php the_title(); ?></h1>
						</div>
						<div class="clear"></div>
						<div class="entry">
							<?php the_content(__('lira la suite &raquo;','templatelite')); ?>
							<?php edit_post_link(__('Editer ce post','templatelite'), '<p>', '</p>'); ?>
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</div><!-- #postbox3, #postbox2,#postbox -->
		<?php 
				endwhile; 
			endif;
		?>
		
		<?php 
			$arg = array('category_name' => 'tarot-amour');
			$loop = new WP_query($arg);

			if ( $loop->have_posts() ):
				while ( $loop->have_posts() ):
					$loop->the_post();
			?>
			<div id="post-<?php the_ID(); ?>" <?php post_class("postbox"); ?>>
				<div class="postbox2">
					<div class="postbox3">
						<div class="page_title">
							<h1>
								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
							</h1>
						</div>
						<div class="clear"></div>
						<div class="entry">
							<?php the_content(__('lira la suite &raquo;','templatelite')); ?>
							<div class="clear"></div>
							<?php edit_post_link(__('Editer ce post','templatelite'), '<p>', '</p>'); ?>
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</div><!-- #postbox3, #postbox2,#postbox -->
		<?php 
				endwhile; 
			endif;
		?>
		</div>
	</div>
</div><!-- #content_btm, #content_top, #content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>