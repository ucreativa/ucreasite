<?php
//  Inicializamos el llamado a la info de la BD de la sección
    $section_key=$array_sections[4];
    $section_data=$section_core->get_sectiondata($section_key);
    $section_files=$section_core->get_sectionfiles($section_key);

    echo cls_HTML::html_css_header(__JS_PATH . "jquery_plugins/googlemap_slider/css/style.css","screen");
    echo cls_HTML::html_js_header("http://maps.google.com/maps/api/js?sensor=true");

    //  Seteamos el título de cada página por sección
    echo "<script> set_title('" . $section_data['name'] . "');</script>";
?>

   <script type='text/javascript'>

    $(function() {

      var locat = new google.maps.LatLng(9.927533, -84.054685),
          pointToMoveTo,
          first = true,
          curMarker = new google.maps.Marker({}),
          $el;

      var myOptions = {
          zoom: 15,
          center: locat,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };

      var map = new google.maps.Map($("#map_canvas")[0], myOptions);

      $("#locations li").mouseenter(function() {

        $el = $(this);

        if (!$el.hasClass("hover")) {

          $("#locations li").removeClass("hover");
          $el.addClass("hover");

          if (!first) {

            // Clear current marker
            curMarker.setMap();

            // Set zoom back to Chicago level
            // map.setZoom(10);
          }

          // Move (pan) map to new location
          pointToMoveTo = new google.maps.LatLng($el.attr("data-geo-lat"), $el.attr("data-geo-long"));
          map.panTo(pointToMoveTo);

          // Add new marker
          curMarker = new google.maps.Marker({
              position: pointToMoveTo,
              map: map,
              icon: "http://www.ucreativa.com/ucreasite/app_design/js/jquery_plugins/googlemap_slider/images/marker.png"
          });

          // On click, zoom map
          google.maps.event.addListener(curMarker, 'click', function() {
             map.setZoom(16);
          });

          // Fill more info area
          $("#more-info")
            .find("h2")
              .html($el.find("h3").html())
              .end()
            .find("p")
              .html($el.find(".longdesc").html());

          // No longer the first time through (re: marker clearing)
          first = false;
        }

      });

      $("#locations li:first").trigger("mouseenter");

    });

  </script>
	    <div class="section_tab">
             <div class="icon_section_tab" id="icon_new_1" onclick=""><p class="section_title"><?php echo $section_data['title']; ?></p></div>
             <div title="open" class="content_tab">
                 <span class="section_text" id="section_text"><br/></span>
                 <div id="sections_blocks">
                     <div id="sections_content_box">
                  	   <div class='section_block'>
                           	<div id="page-wrap">
                               <h1><?php echo $section_data['subtitle']; ?></h1>
                               <ul id="locations">
                                  <?php

                                      $array_titles=get_all_strings_between("." . $section_data['text'],$array_global_settings['title_char_open'],$array_global_settings['title_char_close']);
                                      $array_texts=get_all_strings_between($section_data['text'],$array_global_settings['title_char_close'],$array_global_settings['title_char_open']);

                                      $array_locations=array();
                                      //san pedro
                                      $array_locations[$array_titles[0]][0]="9.927533"; $array_locations[$array_titles[0]][1]="-84.054685";
                                      //zapote
                                      $array_locations[$array_titles[1]][0]="9.926204"; $array_locations[$array_titles[1]][1]="-84.054168";
                                      //sabanilla
                                      $array_locations[$array_titles[2]][0]="9.942658"; $array_locations[$array_titles[2]][1]="-84.048685";

                                      for($i=1;$i<=substr_count($section_data['text'],$array_global_settings['title_char_close']);$i++){
                                    	   echo "<li data-geo-lat='".$array_locations[$array_titles[$i-1]][0]."' data-geo-long='".$array_locations[$array_titles[$i-1]][1]."'>
                                   				   <h3>".$array_titles[$i-1]."</h3>
                                                   <p class='longdesc'>".$array_texts[$i-1]."</p>
                                                 </li>";
                                      }
                                  ?>
                              </ul>
                              <div id="map_canvas"></div> <div id="icon_map"></div>
                              <div id="more-info"><div>
                              <h2></h2>
                              <p class="section_text"></p>
                              </div></div>
                          </div>
                       </div>
	             	</div>
                   </div>
              </div>
          </div>
