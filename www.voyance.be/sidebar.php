<?php global $tpinfo;?>
<div id="sidebar1">
		<ul>
	<?php if(!dynamic_sidebar('sidebar-1')) : ?>
		<?php wp_list_pages('title_li=<h4 class="sb1_title">Pages</h4>'); ?>
		<?php wp_list_categories('show_count=1&title_li=<h4 class="sb1_title">Categories</h4>'); ?>
		<li id="archives">
			<h4 class="sb1_title">Archives</h4>
			<ul><?php wp_get_archives('type=monthly'); ?></ul>
		</li>
		<li class="widget_calendar"><h4 class="sb1_title">Calendar</h4><?php get_calendar(); ?></li>
	<?php	endif;?>		
		</ul>
</div>
<div id="sidebar2">
	<div style="display:none;">
		<?php theme_sb_credit();?>	
	</div>
</div>
<div id="rss_search">
	<a href="<?php echo bloginfo('rss2_url'); ?>" title="RSS Feed" class="rss">Rss</a>
	<form id="mainsearchform" action="<?php bloginfo('url'); ?>/" method="get">
		<input class="submit" value="" type="submit"/>
		<input class="input" type="text" value="" name="s" id="s" />
	</form>
</div>