<?php get_header(); ?>

<div id="content">
	<div id="content_top">
		<div id="content_btm">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class("postbox"); ?>>
					<div class="postbox2">
						<div class="postbox3">
							<div class="page_title">
								<h1>
									<?php the_title(); ?>
								</h1>
							</div>
							<div class="clear"></div>
							<div class="entry">
								<?php the_content(__('lira la suite &raquo;','templatelite')); ?>
								<?php wp_link_pages(array('Précédent' => '<div><center><strong>Pages: ', 'Suivant' => '</strong></center></div>', 'next_or_number' => 'numéro')); ?>
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
			
			$url = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
			
			if ( $url == 'http://www.voyance.be/horoscope/gratuit/' ):
				$arg = array('category_name' => 'horoscope-gratuit');
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
								<?php the_title(); ?>
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
				
				define('DSN', 'mysql:host=sql_server;dbname=voyance'); 
				define('USER', 'voyance');
				define('PASS', '2tuPYzYwc1fIjB62');
				$options = array (
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
				);
				try 
				{
					$connex = new PDO(DSN, USER, PASS, $options);
					$connex->query('SET CHARACTER SET UTF8');
					$connex->query('SET NAMES UTF8');
					
					$req = 'SELECT `horoscope` FROM `wp_horoscope`ORDER BY RAND() LIMIT 0 , 12 ;';
				
					$result = $connex->query($req);									
					$data = $result->fetchAll();
				}  
				catch (PDOException $e) 
				{
					die($e->getMessage());
				}
						
				$signes = array('Bélier', 'Taureau', 'Gémeaux', 'Cancer', 'Lion', 'Vierge', 'Balance', 'Scorpion', 'Sagittaire', 'Capricorne', 'Verseau', 'Poisson');

					if ( $data ) 
					{
						$display = '<div id="h_gratuit" class="entry">';
															
						for ( $i = 0; $i < count($data); $i++ )
						{
							$display .= '<h2>'.$signes[$i].'</h2>';
							$display .= '<p>'.$data[$i]['horoscope'].'</p>';
						}
						
						$display .= '</div>';
						echo $display;
					}
					else
					{
						echo '<p>Une erreur est survenue, veuillez réessayer ultérieurement</p>';
					}	
				
				else :
			
					$arg = array('category_name' => 'tarot-gratuit');
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
										<a href="<?php the_permalink() ?>" title="Lire la suite de ce signe" >lire la suite</a>
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
				endif;
			?>
			
		</div>
	</div>
</div><!-- #content_btm, #content_top, #content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>