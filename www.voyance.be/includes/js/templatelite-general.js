var t_height,t_gap, container_height=0;
jQuery(document).ready(function(){

//drop-down menu
	jQuery("div.menu ul ul li:has(ul)").find("a:first").append(" &raquo;");

//check height, make sure the background showing
	if(jQuery("#container").height()<583) jQuery("#container").height(583);

//resize
	jQuery(window).resize();

//check repeat background
	checkheight();
	setInterval("checkheight()",2000);
	
});

jQuery(window).resize(
function(){
	if(jQuery("body").width()%2 ==0){
		if(jQuery.browser.safari || jQuery.browser.mozilla){
			jQuery("body").css("margin-left","-1px");
		}else if(jQuery.browser.opera){
			jQuery("body").css("margin-left","1px");
		}
	}else{
		jQuery("body").css("margin-left","0px");
	};
});
function checkheight(){
	if(container_height!=jQuery("#container").height()){
		jQuery("#container").css({"padding-bottom":"0px","margin-bottom":"0px"});
		t_height=jQuery("#container").height()-82;
		t_gap=Math.ceil(t_height/167)*167-t_height;
		
		//jQuery("#container").css({"padding-bottom":t_gap+"px"});
		//container_height=jQuery("#container").height();
	}
}