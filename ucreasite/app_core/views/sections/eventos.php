﻿<?php
//  Inicializamos el llamado a la info de la BD de la sección
    $section_key=$array_microsites[1];
    $section_data=$section_core->get_sectiondata($section_key);
    $section_files=$section_core->get_sectionfiles($section_key);
    echo cls_HTML::html_css_header(__CSS_PATH . "news.css","screen");

    require_once(__CTR_PATH . "ctr_event.php");
    $event_core=new ctr_Event();
    $event_files=$event_core->get_lasteventfile();

    //  Seteamos el título de cada página por sección
    echo "<script> set_title('" . $section_data['name'] . "');</script>";
?>
<script>
  // Set up Sliders
  // **************
  $(function(){
    $('#section_slider').anythingSlider({resizeContents: false, // If true, solitary images/objects in the panel will expand to fit the viewport
      navigationFormatter : function(index, panel){ // Format navigation labels with text
     }});
  });
</script>

       <div id="banner">
        	<!-- AnythingSlider -->
			<ul id="section_slider">
                <?php
                            $src=__RSC_FLE_HOST_PATH . "events/event_" . $event_files['id'] . "/" . $event_files['filename'];
                            $size=getimagesize($src);
                            $tam=" width='".$size[0]."' height='".$size[1] ."'";

                            echo "<li class='panel'>"
                                     . cls_HTML::html_img_tag($src, "", "section_banner", $event_files['description'], $tam) .
                                  "</li>";
                ?>
			</ul>
			<!-- END AnythingSlider  -->
       </div>

	    <div class="section_tab">
             <div class="icon_tab" id="icon_tab" onclick=""></div><span class="section_title"><?php echo $section_data['title']; ?></span>
             <div title="open" class="content_tab">
               <span class="section_text" id="section_text"></span>
               <div id="news_blocks">
                 <div id="news_content_box">
                       <?php include_once(__VWS_PATH . "sections/events_loadcore.php"); ?>
                 </div>
               </div>
             </div>
             <div id="older_post"><div id="icon_more_news" onclick="load_old_posts('http://www.ucreativa.com/ucreasite/app_core/views/sections/events_loadcore.php?s=eventos&param=5','news_content_box');">&nbsp;&nbsp;Ver más&nbsp;&nbsp;<span id="loading"></span></div></div>
		</div>
