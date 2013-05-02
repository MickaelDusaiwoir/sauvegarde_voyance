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
			$arg = array('category_name' => 'horoscope-chinois');
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
						<?php 								
							if ( get_post_custom_values('signe', $post_id) ) 
							{
								$signe =  get_post_custom_values('signe', $post_id);
							
								switch ( $signe[0] ) 
								{
									case 'rat':
										$url = 'http://www.asiaflash.com/horoscope/rss_horochinjour_rat.xml';
										break;
										
									case 'buffle':
										$url = 'http://www.asiaflash.com/horoscope/rss_horochinjour_buffle.xml';
										break;
									
									case 'tigre':
										$url = 'http://www.asiaflash.com/horoscope/rss_horochinjour_tigre.xml';
										break;
										
									case 'chat':
										$url = 'http://www.asiaflash.com/horoscope/rss_horochinjour_chat.xml';
										break;
										
									case 'dragon':
										$url = 'http://www.asiaflash.com/horoscope/rss_horochinjour_dragon.xml';
										break;
										
									case 'serpent':
										$url = 'http://www.asiaflash.com/horoscope/rss_horochinjour_serpent.xml';
										break;
										
									case 'cheval':
										$url = 'http://www.asiaflash.com/horoscope/rss_horochinjour_cheval.xml';
										break;
										
									case 'bouc':
										$url = 'http://www.asiaflash.com/horoscope/rss_horochinjour_bouc.xml';
										break;
										
									case 'singe':
										$url = 'http://www.asiaflash.com/horoscope/rss_horochinjour_singe.xml';
										break;
										
									case 'coq':
										$url = 'http://www.asiaflash.com/horoscope/rss_horochinjour_coq.xml';
										break;
										
									case 'chien':
										$url = 'http://www.asiaflash.com/horoscope/rss_horochinjour_chien.xml';
										break;
										
									case 'cochon':
										$url = 'http://www.asiaflash.com/horoscope/rss_horochinjour_cochon.xml';
										break;
								}
							}
							else 
							{
								the_excerpt(); 
								?>
								<a href="<?php the_permalink(); ?>" title="Lire la suite de ce signe" class="more">lire la suite</a>
								<?php
							}
							?>
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