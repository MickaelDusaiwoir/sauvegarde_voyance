<!-- footer.php -->		
<?php global $tpinfo;?>
		<div class="clear"></div>
	</div></div><!--  #container_btm, #container -->
	<div id="footer">
		<div id="copyright">
			<p>
				<?php echo date("Y");?> &#169; Copyrighted <a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a> 
			</p>
			<?php /*Please leave 1 credit line to the theme designer. Thanks.*/ theme_credit();?>
		</div>
	</div><!-- footer -->
</div></div></div><!-- #base_btm ,#base_top, #base -->
</div></div><!-- #bg_btm, #bg_top -->
<?php wp_footer();?>
<script type="text/javascript">

   var _gaq = _gaq || [];
   _gaq.push(['_setAccount', 'UA-2347532-45']);
   _gaq.push(['_trackPageview']);

   (function() {
     var ga = document.createElement('script'); ga.type = 
'text/javascript'; ga.async = true;
     ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 
'http://www') + '.google-analytics.com/ga.js';
     var s = document.getElementsByTagName('script')[0]; 
s.parentNode.insertBefore(ga, s);
   })();

</script>
</body>
</html>