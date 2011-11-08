<?php
 require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreasite/global.php");
 require_once(__CLS_PATH . "cls_html.php");
 require_once(__CTR_PATH . "ctr_event.php");
 $event_core=new ctr_Event();

 if(isset($_GET['param'])){
    $row=$event_core->get_lastevents($_GET['param']);
 }else{
    $row=$event_core->get_lastevents(5);
 }

 $i=1;
 $content_events="";

 foreach($row as $value){

      $event_first_file="";
      if($event_core->get_eventfiles($value[0],false)!=null){
         $event_first_file=$event_core->get_eventfiles($value[0],false);
      }else{
         $event_first_file=null;
      }

      $content_events.= "<div class='new_block'>
                            <span class='section_text' id='section_text'><div class='published_date'><span>Publicado:&nbsp;" . $value[4] . "</span></div></span> 
                            <div class='icon_new_tab' id='icon_new_".$i."' onclick=\"openclose_news(this,".$i.",'".__IMG_PATH."');\">
                              <p class='new_title'>". $value[1] ."</p>
                            </div>
                            <div id='content_new_".$i."' title='close'>
                                <a href='".$value[3]."' target='_blank' title='".$value[1]."'><img class='new_image' src='" . __RSC_FLE_HOST_PATH . "events/event_" . $value[0] . "/thumbs/" . $event_first_file[0][1] . "' width='205' height='115'/></a>
                                <div class='section_text'>" . $value[2] . " </div><br/><a href='".$value[3]."' class='see_more' target='_blank' title='ver más'>[+]</a>
                 				<div class='more_icon'></div>
                            </div>
          			   </div>";
      $i++;
 }
 echo $content_events;
?>