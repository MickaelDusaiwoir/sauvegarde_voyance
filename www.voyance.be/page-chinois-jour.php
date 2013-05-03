<?php get_header(); ?>
<div id="content">
	<div id="content_top">
		<div id="content_btm">
		
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

							// on regarde s'il y a un champ personnalisé nommé signe 
							
							if ( get_post_custom_values('signe', $post_id) ) 
							{
								$signe =  get_post_custom_values('signe', $post_id);
							
								// on récupère l'URL du flux Rss du signe 
							
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

									// on récupére le signe si celui-ci existe et n'est pas dépassé de 24 heures
									
									$req = 	'SELECT `extrait` from `wp_horoscope-chinois`'.
											' WHERE `upd_interval` > ( UNIX_TIMESTAMP() - `last_upd` )'.
											' and `signe` = \''.$signe[0].'\';';
											
									$result = $connex->query($req);	
									$data = $result->fetchAll();
									
									// si on a récupére un extrait on l'affiche sinon on utilise curl pour le récupérer
									
									if ( $data )
									{
										echo $data[0]['extrait']; 
										?>
											<a href="<?php the_permalink() ?>" title="Lire la suite de ce signe" class="more">lire la suite</a>
										<?php
									}	
									else
									{
										// on teste si curl est disponnible
										
										if ( $ch = curl_init($url) )
										{
											curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
											$buffer = curl_exec($ch);
											curl_close($ch);

											// on teste si on a un contenu
											
											if ( $buffer )
											{	
												$buffer = utf8_encode($buffer);	
												$start = 0;
												
												if ( ($start = strpos($buffer, '<item>', 0)) !== false )
												{
													$end = 0;
													if ( ($end = strpos($buffer, '</item>', $start)) !== false ) 
													{
														if ( $item = substr($buffer, $start, $end - $start) ) // on extrait la balise item 
														{
															if ( ($dStart = strpos($item, '<description>', 0)) !== false )
															{
																if  ( ($dEnd = strpos($item, '</description>', $dStart)) !== false )
																{
																	if ( $descri = substr($item, $dStart, $dEnd - $dStart) ) // on extrait la description
																	{
																		$complet = html_entity_decode($descri);
																		// on prend une partie du texte																	
																		if ( ($extStart = strpos($complet, '</b><br>', 0)) !== false )
																		{
																			$extStart += strlen('</b><br>');
																			if ( ($extEnd = strpos($complet, '<br><br>', $extStart)) !== false )
																			{
																				if ( $extrait = substr($complet, $extStart, $extEnd - $extStart) )
																				{
																					$extrait = '<p>' . $extrait . '</p>';

																					$last_upd = mktime(0,0,0);
																					
																					// on ajoute à la db sauf si il existe déjà alors on met à jour
																					
																					$req = 	'INSERT INTO `wp_horoscope-chinois` (`signe`, `extrait`, `complet`,`last_upd`) '.
																							'VALUES (\''.$signe[0].'\', \''.addslashes($extrait).'\', \''.addslashes($complet).'\', \''.$last_upd.'\' ) '.
																							'ON DUPLICATE KEY UPDATE `extrait` = \''.addslashes($extrait).'\', `complet` = \''.addslashes($complet).'\', `last_upd` = \''.$last_upd.'\';';

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
													echo 'Balise item non trouvée';
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
								the_content(__('lire la suite &raquo;','templatelite')); 
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