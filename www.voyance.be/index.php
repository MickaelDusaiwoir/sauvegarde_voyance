<?php get_header(); ?>
<div id="content"><div id="content_top"><div id="content_btm">
<?php
	if((is_home()||is_front_page()) && $paged<2 && function_exists('get_a_post')){//detect if FCG is active
		include (ABSPATH . '/wp-content/plugins/featured-content-gallery/gallery.php'); 
	}

	if (have_posts()) :
		$post = $posts[0]; // Hack. Set $post so that the_date() works.
		if(is_category()){
			echo '<h3 class="archivetitle">'.sprintf(__('Archive for the Category &raquo; %s &laquo;','templatelite'),single_cat_title('',FALSE)).'</h3>';
		}elseif(is_day()){
			echo '<h3 class="archivetitle">'.sprintf(__('Archive for &raquo; %s &laquo;','templatelite'),get_the_time('F jS, Y')).'</h3>';
		}elseif(is_month()){
			echo '<h3 class="archivetitle">'.sprintf(__('Archive for &raquo; %s &laquo;','templatelite'),get_the_time('F, Y')).'</h3>';
		}elseif(is_year()){
			echo '<h3 class="archivetitle">'.sprintf(__('Archive for &raquo; %s &laquo;','templatelite'),get_the_time('Y')).'</h3>';
		} elseif(is_search()){
			echo '<h3 class="archivetitle">'.__('Résultat de la recherche','templatelite').'</h3>';
		}elseif(is_author()){
			echo '<h3 class="archivetitle">'.__('Author Archive','templatelite').'</h3>';
		}elseif(is_tag()){
			echo '<h3 class="archivetitle">'.sprintf(__('Tag-Archive for &raquo; %s &laquo;','templatelite'),single_tag_title('',FALSE)).'</h3>';
		}elseif((is_home()||is_front_page()) && $paged>1){ // If this is a paged archive
			echo '<h3 class="archivetitle">'.__('Blog Archives','templatelite').'</h3>';
		}else{
			echo '<div class="spacer">&nbsp;</div>';
		}

		while (have_posts()) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class("postbox"); ?>><div class="postbox2"><div class="postbox3">
				<div class="post_title">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a><?php edit_post_link(__('Éditer','templatelite'),'<span>(',')</span>'); ?></h2>
				</div>
				<div class="clear"></div>
				<div class="entry"><?php echo templatelite_get_postthumb($post->ID,$tpinfo[$tpinfo['tb_prefix'].'_postthumb_width'],$tpinfo[$tpinfo['tb_prefix'].'_postthumb_height'],'img','post_thumb');?>
				<?php
					if($tpinfo[$tpinfo['tb_prefix'].'_postthumb_show']=='true' || is_search()){
						templatelite_excerpt('',"..."," [ "," ] ");
					}else{
						the_content(__('Lire la suite &raquo;','templatelite'));
					}
				?>
					<div class="clear"></div>
				</div>
			</div></div></div><!-- #postbox3, #postbox2,#postbox -->
<?php 
		endwhile;
		if($wp_query->max_num_pages > 1):
?>
			<div class="navigation">
				<div class="alignleft"><?php next_posts_link(__('&laquo; Précédent','templatelite')) ?></div>
				<div class="alignright"><?php previous_posts_link(__('Suivant &raquo;','templatelite')) ?></div>
			</div>
<?php endif;
	else :
?>
		<h3 class="archivetitle"><?php _e('Aucun résultat','templatelite');?></h3>
		<p class="sorry"><?php _e("Désolé, mais vous cherchez quelque chose qui n'est pas ici. Essayer autre chose.",'templatelite');?></p>
<?php
	endif;
?>

</div></div></div><!-- #content_btm, #content_top, #content-->
<?php get_sidebar(); ?>
<?php get_footer();?>
