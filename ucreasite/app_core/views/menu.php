  <div id="contact_box">
    <div class="contact_icon"><?php echo cls_HTML::html_img_link(__IMG_PATH . "rss.png", __VWS_HOST_PATH . "rss.php", "_blank", "RSS", "", "", "RSS", "", ""); ?></div>
    <div class="contact_icon"><?php echo cls_HTML::html_img_link(__IMG_PATH . "chat.png", "javascript:void(window.open(\"http://ucreativa.com/livezilla/livezilla.php\",\"\",\"width=540,height=500,left=0,top=0,resizable=yes,menubar=no,location=no,status=yes,scrollbars=yes\"))", "_self", "Chat", "chat_icon", "", "Chat", "", ""); ?></div>
    <!--<div class="contact_icon"><?php echo cls_HTML::html_img_link(__IMG_PATH . "questions.png", "#", "_self", "Preguntas", "", "", "Preguntas", "", ""); ?></div>-->
    <div class="contact_icon"><?php echo cls_HTML::html_img_link(__IMG_PATH . "mail.png", "mailto:" . $array_global_settings['site_contact_email'], "_self", "Contacto", "mail_icon", "", "Contacto", "", ""); ?></div>
    <div class="contact_icon"><?php echo cls_HTML::html_img_link(__IMG_PATH . "phone.png", "", "_self", "Teléfono", "phone_icon", "", "Teléfono", "", ""); ?></div>
  </div>

  <div id="tpt_chat"><p class="tpt_text">Chat</p></div>
  <div id="tpt_mail"><p class="tpt_text">Mail</p></div>
  <div id="tpt_phones"><p class="tpt_text"><?php echo str_replace("/","<br/>",$array_global_settings['site_contact_phones']);?></p></div>

  <div id="ucreativa_logo"><?php echo cls_HTML::html_img_link(__IMG_PATH . "logo.png", "?", "_self", "Inicio", "logo_u", "", "Ucreativa", "", ""); ?></div>
  <div id="main_menu">

      <!--html_link_tag($text, $id, $class, $href, $target, $title, $event) -->
      <?php
        if(!isset($_GET['s'])){
            echo cls_HTML::html_link_tag("&nbsp;&nbsp;&nbsp;&nbsp;Quiénes Somos", "quienes_somos", "menu_item", "", "", "Quiénes Somos", "onclick=\"highlight_menu(this,1,'" . __IMG_PATH ."');\"");
            echo cls_HTML::html_link_tag("&nbsp;&nbsp;&nbsp;&nbsp;Carreras", "carreras", "menu_item", "", "", "Carreras", "onclick=\"highlight_menu(this,2,'" . __IMG_PATH ."');\"");
            echo cls_HTML::html_link_tag("&nbsp;&nbsp;&nbsp;&nbsp;Noticias", "noticias", "menu_item", "", "", "Noticias", "onclick=\"highlight_menu(this,3,'" . __IMG_PATH ."');\"");
            echo cls_HTML::html_link_tag("&nbsp;&nbsp;&nbsp;Eventos", "eventos", "menu_item_plus", "?s=".$array_microsites[1], "", "Eventos", "");
            echo cls_HTML::html_link_tag("&nbsp;&nbsp;&nbsp;Calendario", "calendario", "menu_item_plus", "?s=".$array_microsites[2], "", "Calendario", "");
            echo cls_HTML::html_link_tag("&nbsp;&nbsp;&nbsp;Prematrícula", "prematricula", "menu_item_plus", "?s=".$array_microsites[3], "", "Prematrícula", "");
            
            //echo cls_HTML::html_link_tag("&nbsp;&nbsp;&nbsp;&nbsp;Acción Social", "accion social", "menu_item_inactive", "", "", "Acción Social", "'");
            //echo cls_HTML::html_link_tag("&nbsp;&nbsp;&nbsp;&nbsp;Vocacionales", "vocacioles", "menu_item_inactive", "", "", "Vocacionales", "");
            //echo cls_HTML::html_link_tag("&nbsp;&nbsp;&nbsp;&nbsp;Empresariales", "empresariales", "menu_item_inactive", "", "", "Empresariales", "");
        }else{
            echo cls_HTML::html_link_tag("&nbsp;&nbsp;&nbsp;&nbsp;Quiénes Somos", "quienes_somos", "menu_item", "?s=".$array_sections[1], "", "Quiénes Somos", "");
            echo cls_HTML::html_link_tag("&nbsp;&nbsp;&nbsp;&nbsp;Carreras", "carreras", "menu_item", "?s=".$array_sections[2], "", "Carreras", "");
            echo cls_HTML::html_link_tag("&nbsp;&nbsp;&nbsp;&nbsp;Noticias", "noticias", "menu_item", "?s=".$array_sections[3], "", "Noticias", "");
            echo cls_HTML::html_link_tag("&nbsp;&nbsp;&nbsp;Eventos", "eventos", "menu_item_plus", "?s=".$array_microsites[1], "", "Eventos", "");
            echo cls_HTML::html_link_tag("&nbsp;&nbsp;&nbsp;Calendario", "calendario", "menu_item_plus", "?s=".$array_microsites[2], "", "Calendario", "");
            echo cls_HTML::html_link_tag("&nbsp;&nbsp;&nbsp;Prematrícula", "prematricula", "menu_item_plus", "?s=".$array_microsites[3], "", "Prematrícula", "");
            //echo cls_HTML::html_link_tag("&nbsp;&nbsp;&nbsp;&nbsp;Acción Social", "accion social", "menu_item_inactive", "", "", "Acción Social", "'");
            //echo cls_HTML::html_link_tag("&nbsp;&nbsp;&nbsp;&nbsp;Vocacionales", "vocacioles", "menu_item_inactive", "", "", "Vocacionales", "");
            //echo cls_HTML::html_link_tag("&nbsp;&nbsp;&nbsp;&nbsp;Empresariales", "empresariales", "menu_item_inactive", "", "", "Empresariales", "");
        }
      ?>
  </div>