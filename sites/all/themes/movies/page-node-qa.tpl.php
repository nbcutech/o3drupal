<?php require_once("/var/www/html/sites/all/themes/oxygen/global_head.inc"); ?>
<?php require_once("showsite_head.inc"); ?>

    <?php if ($header): ?>
      <?php print $header ?>

    <?php endif; ?>
    <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block" style="background-color;white;">'. $tabs .'</div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>   
	
	<script type="text/javascript" src="http://www.mathias-bank.de/jQuery/jquery.getParams.js"></script> 
	
<div id="container" class="qa">
    <div id="wrapper">
		<div id="wideLeft" >
			<div id="wideLeftContent">

				<div class="copy">
					<div class="pageHeaderTXT"><img class="png" src="<?php print $pot;?>/images/bios/qa_TXT_header/<?php print $node->field_image_qa_name[0]['value'];?>_qa_header.png" width="300" height="50"></div>
					<div id="sub_left_col">
						<div class="qaPic png"><img src="<?php print $pot;?>/images/bios/166x235/<?php print $node->field_image_qa_name[0]['value'];?>_166x235.jpg"></div>
						<div class="bio_link"><a href="/meet-the-cast-atb/<?php print $node->field_image_qa_name[0]['value'];?>">back to bio page</a></div>
					</div>
					<div id="sub_right_col">
						<?php print $content; ?>

<script type="text/javascript">
qaSections = $(".qaSection");
currentPage = ($.getURLParam("page") <= qaSections.length) ? $.getURLParam("page") : -1;
qaMenu =$("#eggSubNav").children("ul").children("li");

if ( ($.getURLParam("page")== null))
{
   
    targetIndex = 0;
	$(qaSections).hide();
    $(qaSections[targetIndex]).show();
    
}
else
{
    $(qaSections).hide();
    targetIndex = currentPage-1;
    $(qaSections[targetIndex]).show();
}

    $(qaMenu[targetIndex]).addClass("selected");
</script>
					<div id="paginateNav">
						<ul>
							<li>&#9654; <a href="?page=1">1</a></li>
							<li>&#9654; <a href="?page=2">2</a></li>
							<li>&#9654; <a href="?page=3">3</a></li>
							<li>&#9654; <a href="?page=4">4</a></li>
							<li>&#9654; <a href="?page=5">5</a></li>
							<li>&#9654; <a href="?page=6">6</a></li>

						</ul>
					</div>
					</div>

				</div>

					
			
				<div style="clear:both;"></div>
			</div>
			
			<div id="wideLeftFooter"></div>
		</div>
		
	    <div id="right"><?php print $right; ?>
	    </div>
    </div>
    <div style="clear:both;"></div>
</div>
<div class="png"><img src="<?php print $pot;?>/images/bottom_spacer.png" style="clear:both;"/>
<?php require_once "/var/www/html/sites/all/themes/oxygen/global_footer.inc"; ?>
