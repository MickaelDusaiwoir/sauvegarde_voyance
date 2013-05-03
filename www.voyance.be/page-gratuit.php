<?php get_header(); ?>

<div id="content">
	<div id="content_top">
		<div id="content_btm">
			
			<?php 
			
				$url = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
			
				if ( $url == 'http://www.voyance.be/horoscope/gratuit/' ) 
				{
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
											<?php the_content(__('lire la suite &raquo;','templatelite')); ?>
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
						
						$signes = array('Bélier', 'Taureau', 'Gémeaux', 'Cancer', 'Lion', 'Vierge', 'Balance', 'Scorpion', 'Sagittaire', 'Capricorne', 'Verseau', 'Poisson');
						
						$display = '<div id="h_gratuit" class="entry">';
						
						//$req = 'SELECT `horoscope` FROM `wp_horoscope`ORDER BY RAND() LIMIT 0 , 12 ;';
						for ( $i = 0; $i < count($signes); $i++ )
						{
							$req = 	'SELECT `horoscope` from `wp_horoscope_gratuit`'.
									' WHERE `upd_interval` > ( UNIX_TIMESTAMP() - `last_upd` )'.
									' and `signe` = \''.$signes[$i].'\';';
						
							$result = $connex->query($req);									
							$data = $result->fetchAll();
							
							if ( $data ) 
							{																	
								$display .= '<h2 id="'.$signes[$i].'">'.$signes[$i].'</h2>';
								$display .= '<p>'.$data[0]['horoscope'].'</p>';								
							}
							else
							{
								$req = 'SELECT `horoscope` FROM `wp_horoscope`ORDER BY RAND() LIMIT 0 , 1 ;';				
								$result = $connex->query($req);									
								$horoscope = $result->fetchAll();
								
								if ( $horoscope )
								{
									$last_upd = mktime(0,0,0);

									$req = 	'INSERT INTO `wp_horoscope_gratuit` (`signe`, `horoscope`, `last_upd`) '.
											'VALUES (\''.$signes[$i].'\', \''.addslashes($horoscope[0]['horoscope']).'\', \''.$last_upd.'\' ) '.
											'ON DUPLICATE KEY UPDATE `horoscope` = \''.addslashes($horoscope[0]['horoscope']).'\', `last_upd` = \''.$last_upd.'\';';
											
									$result = $connex->query($req);	
									
									if ( $data = $result->rowCount() )
									{
										$display .= '<h2 id="'.$signes[$i].'">'.$signes[$i].'</h2>';
										$display .= '<p>'.$horoscope[0]['horoscope'].'</p>';
									}
									else
									{
										echo 'erreur';
									}										
								}
							}	
						}
						
					}  
					catch (PDOException $e) 
					{
						die($e->getMessage());
					}	
					
					$display .= '</div>';
					echo $display;				
				}
				else
				{
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
										<?php the_content(__('lire la suite &raquo;','templatelite')); ?>
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
				}
			?>
			
		</div>
	</div>
</div><!-- #content_btm, #content_top, #content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>