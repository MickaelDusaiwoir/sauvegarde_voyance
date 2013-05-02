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
									<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
								</h1>
							</div>
							<div class="clear"></div>
							<div class="entry">
								<?php the_content(__('lire la suite &raquo;','templatelite')); ?>
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
				$arg = array('category_name' => 'horoscope-2013');
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
									$showHoroscope = true;
									
									switch ( $signe[0] ) 
									{
										case 'bélier':
											$url = 'http://www.asiaflash.com/horoscope/rss_horo_occ_2013_belier.xml';
											break;
											
											case 'taureau':
											$url = 'http://www.asiaflash.com/horoscope/rss_horo_occ_2013_taureau.xml';
											break;
											
										case 'gémeaux' :
											$url = 'http://www.asiaflash.com/horoscope/rss_horo_occ_2013_gemeaux.xml';
											break;
											
										case 'cancer':
											$url = 'http://www.asiaflash.com/horoscope/rss_horo_occ_2013_cancer.xml';
											break;
											
										case 'lion' :
											$url = 'http://www.asiaflash.com/horoscope/rss_horo_occ_2013_lion.xml';
											break;
											
										case 'vierge' :
											$url = 'http://www.asiaflash.com/horoscope/rss_horo_occ_2013_vierge.xml';
											break;
											
										case 'balance' :
											$url = 'http://www.asiaflash.com/horoscope/rss_horo_occ_2013_balance.xml';
											break;
											
										case 'scorpion' :
											$url = 'http://www.asiaflash.com/horoscope/rss_horo_occ_2013_scorpion.xml';
											break;
											
										case 'sagittaire' :
											$url = 'http://www.asiaflash.com/horoscope/rss_horo_occ_2013_sagittaire.xml';
											break;
											
										case 'capicorne' :
											$url = 'http://www.asiaflash.com/horoscope/rss_horo_occ_2013_capricorne.xml';
											break;
											
										case 'verseau' :
											$url = 'http://www.asiaflash.com/horoscope/rss_horo_occ_2013_verseau.xml';
											break;
											
										case 'poisson' :
											$url = 'http://www.asiaflash.com/horoscope/rss_horo_occ_2013_poissons.xml';
											break;
									}
									
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

										$req = 	'SELECT `extrait` from `wp_horoscope_2013`'.
												' WHERE `signe` = \''.$signe[0].'\';';
										
										$result = $connex->query($req);	
										$data = $result->fetchAll();

										
										if ( $data )
										{
											echo $data[0]['extrait']; 
											?>
												<a href="<?php the_permalink() ?>" title="Lire la suite de ce signe" class="more">lire la suite</a>
											<?php
										}	
										else
										{
											if ( $ch = curl_init($url) )
											{
												curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
												$buffer = curl_exec($ch);
												curl_close($ch);

												if ( $buffer )
												{			
													$buffer = utf8_encode($buffer);
													$buffer = html_entity_decode($buffer);										
													$start = 0;

													if ( ($start = strpos($buffer, '<item>', 0)) !== false )
													{
														$end = 0;
														if ( ($end = strpos($buffer, '</item>', $start)) !== false ) 
														{
															if ( $item = substr($buffer, $start, $end - $start) ) // on recupere le contenu dans item
															{
																// on cherche la description pour en extraire un partie 
																if ( ($dStart = strpos($item, '<description>', 0)) !== false )
																{
																	if  ( ($dEnd = strpos($item, '</description>', $dStart)) !== false )
																	{
																		if ( $descri = substr($item, $dStart, $dEnd - $dStart) ) // on extrait la description
																		{
																			$complet = $descri;
																			// on prend une partie du texte																	
																			if ( ($extStart = strpos($descri, '</em>', 0)) !== false )
																			{
																				$extStart += strlen('</em>');
																				if ( ($extEnd = strpos($descri, '<br><br>', $extStart)) !== false )
																				{
																					if ( $extrait = substr($descri, $extStart, $extEnd - $extStart) )
																					{
																						$extrait = '<p>' . $extrait . '</p>';

																						$req = 'INSERT INTO `wp_horoscope_2013` (`signe`, `extrait`, `complet`) '.
																								'VALUES (\''.$signe[0].'\', \''.addslashes($extrait).'\', \''.addslashes($complet).'\' ) '.
																								'ON DUPLICATE KEY UPDATE `extrait` = \''.addslashes($extrait).'\', `complet` = \''.addslashes($complet).'\';';

																						$result = $connex->query($req);	
																					
																						// affichage

																						if ( $data = $result->rowCount() )
																						{
																							echo( $extrait );
																							?>
																								<a href="<?php the_permalink() ?>" title="Lire la suite de ce signe" class="more">lire la suite</a>
																							<?php
																						}
																						else 
																						{
																							echo 'ERREUR DB';
																						}
																					}
																					else
																					{
																						echo "Extrait indisponnible";
																					}
																				}
																			}
																			else
																			{
																				echo 'Erreur de balise';
																			}
																		}
																	}
																}
																else
																{
																	echo 'La balise description n\'a pas été trouvée';
																}
															}												
														}
													}
													else
													{
														echo 'La balise item n\'a pas été trouvée';
													}											
												}
												else
												{
													echo 'La page de l\'horoscope est vide !';
												}
											}
											else
											{
												echo('cURL indisponible pour l\'horoscope !');
											}
										}
									}
									catch (PDOException $e) 
									{
										die($e->getMessage());
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