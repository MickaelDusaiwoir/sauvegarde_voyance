<?php get_header(); ?>
<div id="content">
	<div id="content_top">
		<div id="content_btm">			
			<!--<?php /*if (have_posts()) : while (have_posts()) : the_post(); ?>
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
								<?php wp_link_pages(array('Précédent' => '<div><center><strong>Pages: ', 'Suivant' => '</strong></center></div>', 'next_or_number' => 'numéro')); ?>
								<div class="clear"></div>
							</div>
						</div>
					</div>
				</div><!-- #postbox3, #postbox2,#postbox -->
			<?php 
					endwhile; 
				endif;
			*/?>-->
			
			<?php 
			
				$arg = array('category_name' => 'horoscope-jour');
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
									
									$showHoroscope = true;
									switch ( $signe[0] ) 
									{
										case 'bélier':
											$horoscope_signe = 'belier';
											$hSignID = 0;
											break;
											
										case 'taureau':
											$horoscope_signe = 'taureau';
											$hSignID = 1;
											break;
											
										case 'gémeaux' :
											$horoscope_signe = 'gemeaux';
											$hSignID = 2;
											break;
											
										case 'cancer':
											$horoscope_signe = 'cancer';
											$hSignID = 3;
											break;
											
										case 'lion' :
											$horoscope_signe = 'lion';
											$hSignID = 4;
											break;
											
										case 'vierge' :
											$horoscope_signe = 'vierge';
											$hSignID = 5;
											break;
											
										case 'balance' :
											$horoscope_signe = 'balance';
											$hSignID = 6;
											break;
											
										case 'scorpion' :
											$horoscope_signe = 'scorpion';
											$hSignID = 7;
											break;
											
										case 'sagittaire' :
											$horoscope_signe = 'sagittaire';
											$hSignID = 8;
											break;
											
										case 'capicorne' :
											$horoscope_signe = 'capricorne';
											$hSignID = 9;
											break;
											
										case 'verseau' :
											$horoscope_signe = 'verseau';
											$hSignID = 10;
											break;
											
										case 'poisson' :
											$horoscope_signe = 'poissons';
											$hSignID = 11;
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

										$req = 	'SELECT `extrait` from `wp_horoscope_jour`'.
												' WHERE `upd_interval` > ( UNIX_TIMESTAMP() - `last_upd` )'.
												' and `signe` = \''.$signe[0].'\';';
										
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
											// on récupere l'horoscope 
											
											if ( $ch = curl_init('http://www.horoscope.fr/rss/horoscope/jour/') )
											{
												curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
												$buffer = curl_exec($ch);
												curl_close($ch);
												
												if ( $buffer )
												{
													$currentSign = 0;
													$currentPosition = 0;
													
													while ( true )
													{
														// On recherche la balise ITEM correspondant à un signe
														$start = 0;
														if ( ($currentPosition = strpos($buffer, '<item>', $currentPosition)) !== false )
															$start = $currentPosition + strlen('<item>');
														else
															break;
														
														$end = 0;
														if ( ($currentPosition = strpos($buffer, '</item>', $currentPosition)) !== false )
															$end = $currentPosition;
														else
															break;
														
														// On extrait uniquement la balise pour faciliter l'analyse
														if ( $item = substr($buffer, $start, $end - $start) )
														{
															// On recherche la balise de la description
															if ( ($dStart = strpos($item, '<description><![CDATA[')) !== false )
																$dStart += strlen('<description><![CDATA[');
															else
																break;
															
															if ( ($dEnd = strpos($item, ']]></description>', $dStart)) === false )
																break;
															
															// On extrait la description
															if ( $rawDescription = substr($item, $dStart, $dEnd - $dStart) )
															{
																$hData[$currentSign] = array();
																
																// On split par <br> pour obtenir les différents themes (amour, travail, ...)
																$themes = preg_split('#(<br>|<br />)#', $rawDescription);
																
																foreach ( $themes as $theme )
																{
																	// On vire la publicité
																	if ( strstr($theme, '<a') !== false )
																	{
																		continue;
																	}
																	else
																	{
																		// On sépare le titre du theme du contenu
																		$tmp = explode(':', $theme);
																		
																		if ( count($tmp) > 1 )
																		{
																			$title = array_shift($tmp);
																			$descr = implode(':', $tmp);
																			
																			$hData[$currentSign][] = array(
																				'title' => trim($title),
																				'content' => trim($descr)
																			);
																		}
																	}
																} // end foreach()
															} 
														}
														 
														$currentSign++;
													}  // end while()

													// Check le nombre de signes
													if ( count($hData) !== 12 )
													{
														echo 'Les 12 signes n\'ont pas été trouvés dans le xml!';
														$showHoroscope = false;
													}
												}
												else
												{
													echo 'La page de l\'horoscope est vide !';
													$showHoroscope = false;
												}
											}
											else
											{
												echo('cURL indisponible pour l\'horoscope !');
												$showHoroscope = false;
											}
											
											if ( $showHoroscope && $hData )
											{
												if ( isset($hData[$hSignID]) )
												{												
													$extrait = '<p>'.$hData[$hSignID][3]['content'].'</p>';

													$complet = '';

													for ( $i = 0; $i < count($hData[$hSignID]); $i++ )
													{
														$complet .= '<h3>Horoscope '.$hData[$hSignID][$i]['title'].'</h3>';
														$complet .= '<p>'.$hData[$hSignID][$i]['content'].'</p>';
													}
												}	
											}

											// mise a jour ou insertion  

											if ( $extrait && $complet )
											{
												$last_upd = mktime(0,0,0);

												$req = 'INSERT INTO `wp_horoscope_jour` (`signe`, `extrait`, `complet`,`last_upd`) '.
													'VALUES (\''.$signe[0].'\', \''.addslashes($extrait).'\', \''.addslashes($complet).'\', \''.$last_upd.'\' ) '.
													'ON DUPLICATE KEY UPDATE `extrait` = \''.addslashes($extrait).'\', `complet` = \''.addslashes($complet).'\', `last_upd` = \''.$last_upd.'\';';

												$result = $connex->query($req);	
											
												// affichage

												if ( $data = $result->rowCount() )
												{
													print_r( $extrait );
													?>
														<a href="<?php the_permalink() ?>" title="Lire la suite de ce signe" class="more">lire la suite</a>
													<?php
												} 
												else 
												{
													echo 'ERREUR DB';
												}
											}
										}
									}
									catch (PDOException $e) 
									{
										die($e->getMessage());

										echo 'ERROR:NO_DATABASE';
									}
								}
								else 
								{
									the_content(__('lire la suite &raquo;','templatelite'));
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
			<?php
				echo '<p id="lien_externe">Nos remerciements à <a href="http://www.horoscope.fr/" title="Découvrir leur site" target="_blank">http://www.horoscope.fr/</a> pour l\'horoscope du jour</p>'; 
			?>
		</div>
	</div>
</div><!-- #content_btm, #content_top, #content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>