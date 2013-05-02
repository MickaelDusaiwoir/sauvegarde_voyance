<?php get_header(); ?>
<div id="content"><div id="content_top"><div id="content_btm">
	<?php if (have_posts()) : 
			while (have_posts()) : 
				the_post(); 
	?>
			<div id="post-<?php the_ID(); ?>" <?php post_class("postbox"); ?>>
				<div class="postbox2">
					<div class="postbox3">
						<div class="post_title">
							<h1><?php the_title(); ?><span><?php edit_post_link(__('Éditer','templatelite'),'(',') '); ?></span></h1>
						</div>
						<div class="clear"></div>
						<div class="entry">
						
							<?php 
							
							if ( get_post_custom_values('signe', $post_id) ) 
							{		
								$categories = get_the_category();							
								$signe =  get_post_custom_values('signe', $post_id); 
								$showHoroscope = true;
								$url_img_signe = 'http://www.voyance.be/wp-content/uploads/2013/04/';
								
								switch ( $signe[0] ) 
								{
									case 'bélier':
										$horoscope_signe = 'belier';
										$hSignID = 0;
										$img_signe = 'belier.jpg';
										$url = 'http://www.asiaflash.com/horoscope/rss_horo_occ_2013_belier.xml';
										break;
										
									case 'taureau':
										$horoscope_signe = 'taureau';
										$hSignID = 1;
										$img_signe = 'taureau.jpg';
										$url = 'http://www.asiaflash.com/horoscope/rss_horo_occ_2013_taureau.xml';
										break;
										
									case 'gémeaux' :
										$horoscope_signe = 'gemeaux';
										$hSignID = 2;
										$img_signe = 'gemeaux.jpg';
										$url = 'http://www.asiaflash.com/horoscope/rss_horo_occ_2013_gemeaux.xml';
										break;
										
									case 'cancer':
										$horoscope_signe = 'cancer';
										$hSignID = 3;
										$img_signe = 'cancer.jpg';
										$url = 'http://www.asiaflash.com/horoscope/rss_horo_occ_2013_cancer.xml';
										break;
										
									case 'lion' :
										$horoscope_signe = 'lion';
										$hSignID = 4;
										$img_signe = 'lion.jpg';
										$url = 'http://www.asiaflash.com/horoscope/rss_horo_occ_2013_lion.xml';
										break;
										
									case 'vierge' :
										$horoscope_signe = 'vierge';
										$hSignID = 5;
										$img_signe = 'vierge.jpg';
										$url = 'http://www.asiaflash.com/horoscope/rss_horo_occ_2013_vierge.xml';
										break;
										
									case 'balance' :
										$horoscope_signe = 'balance';
										$hSignID = 6;
										$img_signe = 'balance.jpg';
										$url = 'http://www.asiaflash.com/horoscope/rss_horo_occ_2013_balance.xml';
										break;
										
									case 'scorpion' :
										$horoscope_signe = 'scorpion';
										$hSignID = 7;
										$img_signe = 'scorpion.jpg';
										$url = 'http://www.asiaflash.com/horoscope/rss_horo_occ_2013_scorpion.xml';
										break;
										
									case 'sagittaire' :
										$horoscope_signe = 'sagittaire';
										$hSignID = 8;
										$img_signe = 'sagi.jpg';
										$url = 'http://www.asiaflash.com/horoscope/rss_horo_occ_2013_sagittaire.xml';
										break;
										
									case 'capricorne' :
										$horoscope_signe = 'capricorne';
										$hSignID = 9;
										$img_signe = 'capri.jpg';
										$url = 'http://www.asiaflash.com/horoscope/rss_horo_occ_2013_capricorne.xml';
										break;
										
									case 'verseau' :
										$horoscope_signe = 'verseau';
										$hSignID = 10;
										$img_signe = 'verseau.jpg';
										$url = 'http://www.asiaflash.com/horoscope/rss_horo_occ_2013_verseau.xml';
										break;
										
									case 'poisson' :
										$horoscope_signe = 'poissons';
										$hSignID = 11;
										$img_signe = 'poisson.jpg';
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
								
								if ( $categories[0]->category_nicename == 'horoscope-jour' )
								{							
									try 
									{
										$connex = new PDO(DSN, USER, PASS, $options);
										$connex->query('SET CHARACTER SET UTF8');
										$connex->query('SET NAMES UTF8');

										$req = 	'SELECT `complet` from `wp_horoscope_jour`'.
												' WHERE `upd_interval` > ( UNIX_TIMESTAMP() - `last_upd` )'.
												' and `signe` = \''.$signe[0].'\';';
										
										$result = $connex->query($req);	
										$data = $result->fetchAll();

										
										if ( $data )
										{
											$display = '<div class="horoscope">';
											$display .= '<img src="'.$url_img_signe.$img_signe.'" title="'.$signe[0].'" title="'.$signe[0].'" />';
											$display .= $data[0]['complet']; 
											$display .= '</div>';
											$display .= '<p id="lien_externe">Nos remerciements à <a href="http://www.horoscope.fr/" title="Découvrir leur site" target="_blank">http://www.horoscope.fr/</a> pour l\'horoscope du jour</p>';
											
											echo $display;
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
														$complet .= '<h3>'.$hData[$hSignID][$i]['title'].'</h3>';
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
													$display = '<div class="horoscope">';
													$display .= '<img src="'.$url_img_signe.$img_signe.'" title="'.$signe[0].'" title="'.$signe[0].'" />';
													$display .= $complet;
													$display .= '</div>';
													//print_r( $complet );
													
													$display .= '<p id="lien_externe">Nos remerciements à <a href="http://www.horoscope.fr/" title="Découvrir leur site" target="_blank">http://www.horoscope.fr/</a> pour l\'horoscope du jour</p>';
													
													echo $display;
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
								elseif ( $categories[0]->category_nicename == 'horoscope-2013')
								{
									try 
									{
										$connex = new PDO(DSN, USER, PASS, $options);
										$connex->query('SET CHARACTER SET UTF8');
										$connex->query('SET NAMES UTF8');

										$req = 	'SELECT `complet` from `wp_horoscope_2013`'.
												' WHERE `signe` = \''.$signe[0].'\';';
										
										$result = $connex->query($req);	
										$data = $result->fetchAll();

										if ( $data )
										{
											echo '<div class="horoscope-2013">'.$data[0]['complet'].'</div>'; 
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
																							echo '<div class="horoscope-2013">'.$complet.'</div>';
																						else 
																							echo 'ERREUR DB';
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
							}
							else 
							{
								the_content(__('more &raquo;','templatelite')); 
							}	
						?>
							
						<div class="clear"></div>
							
						<?php wp_link_pages(array('before' => '<div><center><strong>Pages: ', 'after' => '</strong></center></div>', 'next_or_number' => 'number')); ?>
						</div>
						<div class="info">
							<?php the_tags('&nbsp;<span class="info_tag">'.__('Tags:','templatelite').' ', ', ', '</span>'); ?>
						</div>
					</div>
				</div>
			</div><!-- #postbox3, #postbox2,#postbox -->
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