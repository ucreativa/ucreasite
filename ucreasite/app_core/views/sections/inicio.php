<?php
//  Inicializamos el llamado a la info de la BD de la sección
    $section_key=$array_sections[0];
    $section_data=$section_core->get_sectiondata($section_key);
    $section_files=$section_core->get_sectionfiles($section_key);

//  Seteamos el título de cada página por sección
    echo "<script type='text/javascript'> set_title('" . $section_data['name'] . "');</script>";
    echo "<script>setOrCreateMetaTag('name','title','".$section_data['title']."');</script>";
    echo "<script>setOrCreateMetaTag('name','description','".$section_data['description']."');</script>";
    echo "<script>
        $(document).ready(function() {
           if ($.browser.safari){
               $('#link_layer').css('display','block');
               $('li.panel').html('');
               $('li.panel').html('<img src=\"".__RSC_FLE_HOST_PATH . "sections/section_".$section_key."/flash.jpg\" width=800 height=298 alt=\"Ucreativa\" />');
           }
         });
         </script> ";
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
                        $i=0;
                        foreach($section_files as $value){

                            $src="app_core/resources/files/sections/section_".$section_key."/" . $value[1];
			    //$src="http://www.bernethe.com/revisar/ucreativa/ucreativa_website.swf";

                            //$tam=" width='".$size[0]."' height='".$size[1] ."'";
                            $tam=" width='800' height='298'";

                            echo "<li class='panel'>"
                                    // . cls_HTML::html_img_tag($src, "", "section_banner", $value[2], $tam) .
                                    . "<embed src='".$src."' type='application/x-shockwave-flash' quality='high' ".$tam." />" .
                                 "</li>";
                            $i++;
                        }
                    ?>
    			</ul>
    			<!-- END AnythingSlider  -->
                <div style="display:none;" id="link_layer">
                  <?php echo cls_HTML::html_link_tag("", "link_arquitectura", "link_banner", "?s=carreras&idc=1", "_self", "Arquitectura", ""); ?>
                  <?php echo cls_HTML::html_link_tag("", "link_espacio", "link_banner", "?s=carreras&idc=3", "_self", "Diseño del espacio interno", ""); ?>
                  <?php echo cls_HTML::html_link_tag("", "link_dibujo", "link_banner", "?s=carreras&idc=4", "_self", "Dibujo arquitectónico", ""); ?>
                  <?php echo cls_HTML::html_link_tag("", "link_medios", "link_banner", "?s=carreras&idc=13", "_self", "Producción de medios digitales", ""); ?>
                  <?php echo cls_HTML::html_link_tag("", "link_animacion", "link_banner", "?s=carreras&idc=10", "_self", "Animación", ""); ?>
                  <?php echo cls_HTML::html_link_tag("", "link_joyas", "link_banner", "?s=carreras&idc=7", "_self", "Joyería y Accesorios", ""); ?>
                  <?php echo cls_HTML::html_link_tag("", "link_textil", "link_banner", "?s=carreras&idc=8", "_self", "Producción Textil", ""); ?>
                  <?php echo cls_HTML::html_link_tag("", "link_web", "link_banner", "?s=carreras&idc=11", "_self", "Desarrollo Web", ""); ?>
                  <?php echo cls_HTML::html_link_tag("", "link_3d", "link_banner", "?s=carreras&idc=12", "_self", "Modelo digital en 3D", ""); ?>
                  <?php echo cls_HTML::html_link_tag("", "link_grafico", "link_banner", "?s=carreras&idc=9", "_self", "Diseño gráfico", ""); ?>
                  <?php echo cls_HTML::html_link_tag("", "link_foto", "link_banner", "?s=carreras&idc=14", "_self", "Fotografía digital", ""); ?>
                  <?php echo cls_HTML::html_link_tag("", "link_publicidad", "link_banner", "", "?s=carreras&idc=19", "Creatividad Publicitaria", ""); ?>
                  <?php echo cls_HTML::html_link_tag("", "link_modas", "link_banner", "?s=carreras&idc=6", "_self", "Diseño de modas", ""); ?>
                  <?php echo cls_HTML::html_link_tag("", "link_comunicacion", "link_banner", "?s=carreras&idc=20", "_self", "Comunicación digital", ""); ?> 
                </div>
          </div>

		  <div id="welcome_title">
                <span id="welcome_message"><?php echo $section_data['subtitle']; ?></span><br/>
                <span id="text_message"><?php echo $section_data['text']; ?></span>
          </div>

          <div id="sections_tabs">

          <?php

            require_once(__CTR_PATH . "ctr_new.php");
            $new_core=new ctr_New();

            for($i=1;$i<=count($array_sections)-1;$i++){
              $section_data=$section_core->get_sectiondata($array_sections[$i]);
              if($array_sections[$i]!=$array_sections[3]){ //si es diferente a noticias
                  $content_base=$section_data['description']."</p><br/><a href='?s=" . $array_sections[$i] . "' class='see_more' title='ver más'>[+]</a>";
                  $content_news="";
              }else{
                  $content_base=$section_data['text']."</p><a href='?s=" . $array_sections[$i] . "' class='see_more' title='ver todas'><br/>[ver todas]</a>";
                  $content_news="<div id='news_gallery'>
                                    <div id='left_arrow'></div>
                             		<div id='right_arrow'></div>
                                 <div id='content_gallery_box'>";

                  $row=$new_core->get_lastnews(5);

                  foreach($row as $value){
                      $new_first_file="";
                      
                      if($new_core->get_newfiles($value[0],true)!=null){
                         $new_first_file=$new_core->get_newfiles($value[0],true);
                      }else{
                         $new_first_file=null;
                      }

                      $content_news.= "<div class='new_box'>
                             				<p class='new_title'>". $value[1] ."</p>
                             				<a href='?s=".$array_sections[3]."&idn=".$value[0]."' title='".$value[1]."'><img class='new_photo' src='" . __RSC_FLE_HOST_PATH . "news/new_" . $value[0] . "/thumbs/" . $new_first_file[0][1] . "' width='205' height='115' alt='".$value[1]."'/></a>
                                            <p class='new_description'>" . $value[3] . " </p> <a href='?s=".$array_sections[3]."&idn=".$value[0]."' class='see_more' title='ver más'>[+]</a>
                             				<div class='more_icon'></div>
                          			   </div>";
                  }

                  $content_news.= "</div></div>";
              }

                  echo "<div class='section_tab'>
                          <div class='icon_tab' id='icon_tab_".$i."' onclick=\"openclose_tabs(this,".$i.",'".__IMG_PATH."');\"></div><span onclick=\"openclose_tabs(document.getElementById('icon_tab_".$i."'),".$i.",'".__IMG_PATH."');\" class='section_title' id='section_".$i."'>".$section_data['title']."</span>
                          <div id='content_tab_".$i."' title='close' class='content_tab'>
                           <p class='section_text' id='section_text_".$i."'><br/>" . $content_base . $content_news . "
                           <br/>
                         </div>
                       </div>";
              }

           ?>

         </div>
