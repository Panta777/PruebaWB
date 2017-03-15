<style type="text/css">
.pnSection{
	
	text-align:center;
}
.no_container{
	padding-top:180px;
	padding-bottom:180px;
}
.min-height {
    min-height: 366px!important;
}
.vc_row .vc_column_container {
    padding-left: 0px;
    padding-right: 0px;
}

#pnSection1{
	background-image: url(http://localhost/pronetweb/PronetWebPayVisa/assets/uploadimg/inner3.jpg);
    height: 400px;
    padding-top: 100px;
    margin-top: 185px;


}

</style>

<!-- title page -->
<section id="pnSection1" class="vc_row wpb_row vc_row-fluid pnSection" style="background-image: url(<?php echo base_url().$images[0]["url"]; ?>); height: 400px;padding-top: 100px;">
      <div class="wpb_column vc_column_container vc_col-sm-12">
         <div class="wpb_wrapper">
            <div class="wpb_text_column wpb_content_element">
               <div class="wpb_wrapper">
			   	
                  <h1 style="text-align: center;">
						<strong>
							<span style="color: #ffffff;"><?php echo $images[0]["title"]; ?></span>
							
						</strong>
					</h1>
					<?php
						if(isset($images[0]["paragraph"])){
							echo "<p>".$images[0]["paragraph"]."</p>";
						}
					?>
               </div>
            </div>
         </div>
      </div>
</section>
<!-- title page -->
<!-- title area -->
<section id="pnSection2" class="pnSection">
	<div class="vc_row wpb_row vc_row-fluid">
		<div class="container">
			<div class="row">
				<div class="wpb_column vc_column_container vc_col-sm-12 vc_custom_1487032083669 wpb_animate_when_almost_visible wpb_top-to-bottom wpb_start_animation animated">
					<div class="wpb_wrapper">
						<div class="tzElement-title tz-title-type-3">
							<?php echo $title[0]["content"];?>
						</div>
						<div class="wpb_single_image wpb_content_element vc_align_center  vc_custom_1485023807641">
							<figure class="wpb_wrapper vc_figure">
								<div class="vc_single_image-wrapper   vc_box_border_grey">
								<img src='<?php echo base_url().$title[0]["icon"];?>' class="vc_single_image-img attachment-full" alt="" width="299" height="28"></div>
							</figure>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- title area -->



