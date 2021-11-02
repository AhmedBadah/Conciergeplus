  <header>
    <div class="container flex space-between">
      <div class="logo-container">
        <a href="https://concierge-staging.riizmlw6-liquidwebsites.com/">
          <img src="<?php the_field('header_logo','option'); ?>" alt="">
        </a>
      </div>
      <nav class="main-nav flex center">
        <a class="mobile-nav-icon" href="javascript:;"></a>
        <?php
        $desktop_menu_items = get_field('desktop_menu_items','option');

        if(isset($desktop_menu_items)){ ?>
        <ul class="desktop-main-menu flex">
          <?php for($i=0;$i<count($desktop_menu_items);$i++){
            $submenu=$desktop_menu_items[$i]['submenu'];
            if(is_array($submenu) && count($submenu)){
              $parent='parent-menu featured-mega-menu-list-item';
            }else if($desktop_menu_items[$i]['display_mega_menu']){
              $parent='parent-menu featured-mega-menu-list-item';
            }else{
              $parent='';
            }
          ?>

            <li class="<?php echo $parent ?> ">
              <?php 
              if($desktop_menu_items[$i]['open_in_a_new_window']){
                $target='target="_blank"';
              }else{
                $target='target="_self"';
              } ?>
              <a <?php echo $target; ?> href="<?php echo $desktop_menu_items[$i]['url']; ?>"><?php echo $desktop_menu_items[$i]['label']; ?> </a>
              <?php if($desktop_menu_items[$i]['display_mega_menu']){ ?>
                <ul class="desktop-sub-menu">
              <li>
                <div class="mega-menu-container flex space-between">
                  <div class="first-menu">
                    <h3><?php the_field('manage_menu_title','option'); ?></h3>
                    <?php $manage_menu=get_field('manage_menu_items','option');
                    if(is_array($manage_menu)){ ?>
                    <ul>
                      <?php for($j=0;$j<count($manage_menu);$j++){ ?>
                        <?php $mark_as_new=$manage_menu[$j]['mark_as_new'];
                        if($mark_as_new){
                          $mark_as_new='new';
                        }else{
                          $mark_as_new='';
                        }
                        $mark_as_update=$manage_menu[$j]['mark_as_update'];
                        if($mark_as_update){
                          $mark_as_update='update';
                        }else{
                          $mark_as_update='';
                        } ?>
                      <li><div class="men-icon-container"><img class="menu-icon" src="<?php echo $manage_menu[$j]['item_icon']; ?>"/></div><div class="menu-link-container"><a class="<?php echo $mark_as_new.' '.$mark_as_update; ?>" href="<?php echo $manage_menu[$j]['item_url']; ?>"><?php echo $manage_menu[$j]['item_label']; ?></a></div></li>
                      <?php } ?>
                    </ul>
                  <?php } ?>
                  </div>

                  <div class="first-menu second-menu">
                    <h3><?php the_field('communicate_menu_title','option'); ?></h3>
                    <?php $manage_menu=get_field('communicate_menu_items','option');
                    if(is_array($manage_menu)){ ?>
                    <ul>
                      <?php for($j=0;$j<count($manage_menu);$j++){ ?>
                        <?php $mark_as_new=$manage_menu[$j]['mark_as_new'];
                        if($mark_as_new){
                          $mark_as_new='new';
                        }else{
                          $mark_as_new='';
                        }
                        $mark_as_update=$manage_menu[$j]['mark_as_update'];
                        if($mark_as_update){
                          $mark_as_update='new';
                        }else{
                          $mark_as_update='';
                        } ?>
                      <li><div class="men-icon-container"><img class="menu-icon" src="<?php echo $manage_menu[$j]['item_icon']; ?>"/></div><div class="menu-link-container"><a class="<?php echo $mark_as_new.' '.$mark_as_update; ?>" href="<?php echo $manage_menu[$j]['item_url']; ?>"><?php echo $manage_menu[$j]['item_label']; ?></a></div></li>
                      <?php } ?>
                    </ul>
                  <?php } ?>
                  </div>


                  <div class="first-menu second-menu third-menu">
                    <h3><?php the_field('integrate_menu_title','option'); ?></h3>
                    <?php $manage_menu=get_field('integrate_menu_items','option');
                    if(is_array($manage_menu)){ ?>
                    <ul>
                      <?php for($j=0;$j<count($manage_menu);$j++){ ?>
                        <?php $mark_as_new=$manage_menu[$j]['mark_as_new'];
                        if($mark_as_new){
                          $mark_as_new='new';
                        }else{
                          $mark_as_new='';
                        }
                        $mark_as_update=$manage_menu[$j]['mark_as_update'];
                        if($mark_as_update){
                          $mark_as_update='new';
                        }else{
                          $mark_as_update='';
                        } ?>
                      <li><div class="men-icon-container"><img class="menu-icon" src="<?php echo $manage_menu[$j]['item_icon']; ?>"/></div><div class="menu-link-container"><a class="<?php echo $mark_as_new.' '.$mark_as_update; ?>" href="<?php echo $manage_menu[$j]['item_url']; ?>"><?php echo $manage_menu[$j]['item_label']; ?></a></div></li>
                      <?php } ?>
                    </ul>
                  <?php } ?>
                  </div>


                </div>
              </li>
            </ul>
              <?php }else{ ?>
              <?php  if(is_array($submenu) && count($submenu)){ ?>
              <ul class="desktop-sub-menu not-mega">
                <li class="view-all-list-item">
                  <a <?php echo $target; ?> href="<?php echo $desktop_menu_items[$i]['url']; ?>"><?php echo $desktop_menu_items[$i]['label']; ?></a>
                </li>
                <?php for($j=0; $j<count($submenu);$j++){ 
                  if($submenu[$j]['open_in_a_new_window']){
                    $target='target="_blank"';
                  }else{
                    $target='target="_self"';
                  }
                  ?>
                  <li>
                    <div class="men-icon-container">
                      <img class="menu-icon" src="<?php echo $submenu[$j]['icon']; ?>">
                    </div>
                    <div class="menu-link-container">
                      <a <?php echo $target; ?> href="<?php echo $submenu[$j]['url']; ?>"><?php echo $submenu[$j]['label']; ?></a>
                    </div>
                  </li>
                <?php } ?>
              </ul>
            <?php }} ?>
          </li>
          <?php } ?>
        </ul>
        <?php } ?>
        <?php 
        $menu_items=get_field('menu_items','option');
        if(is_array($menu_items)){ ?>
        <ul class="flex mobile-main-menu">
          <li class="flex space-between center">
            <div><img src="<?php echo get_template_directory_uri(); ?>/assets/img/menu-logo.png"></div>
            <div><a class="close-menu" href="javascript:;"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/x-button.png"></a></div>
          </li>
          <?php for($i=0;$i<count($menu_items);$i++){
          $submenu=$menu_items[$i]['sub-menu'];
            if(is_array($submenu) && count($submenu)){
              $parent='parent-menu featured-mega-menu-list-item';
            }else{
              $parent='';
            } ?>
          <li class="<?php echo $parent; ?>">
            <a href="<?php echo $menu_items[$i]['menu_item_url'] ?>"><?php echo $menu_items[$i]['menu_item_label'] ?></a>
            <?php if(is_array($submenu) && count($submenu)){ ?>
          <a class="mobile-menu-subminu-button visible-mobile" href="javascript:;">
              <img class="plus-button" src="<?php echo get_template_directory_uri(); ?>/assets/img/plus-button.png">
              <img class="minus-button" src="<?php echo get_template_directory_uri(); ?>/assets/img/minus-button.png">
            </a>
            <ul>
              <?php for($j=0;$j<count($submenu);$j++){ 

                ?>
              <li><a href="<?php echo $submenu[$j]['url'] ?>"><?php echo $submenu[$j]['label'] ?></a></li>
            <?php } ?>
              
            </ul>
          <?php } ?>
          </li>
          
        <?php } ?>
          <li><a class="btn-main" href="<?php the_field('header_button_url','option'); ?>"><?php the_field('header_button_label','option'); ?></a>
          </li>
        </ul>
      <?php } ?>
        <a class="btn-main" href="<?php the_field('header_button_url','option'); ?>"><?php the_field('header_button_label','option'); ?></a> 
      </nav>
    </div>
  </header>