<?php

$menu_id = get_sub_field('sidebar_menu');

$pad_bot = get_sub_field('padding_bot');
$pad_top = get_sub_field('padding_top');


?>
<section class="row sidebar-menu pad-top-<?php echo $pad_top;?> pad-bot-<?php echo $pad_bot;?>">
  <div class="col pl-md-0">
    <?php wp_nav_menu( array(
      'menu' 		  	=> $menu_id,
      'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
      'container'       => '',
      'container_class' => '',
      'container_id'    => '',
      'menu_class'      => 'p-0',
      // 'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
      // 'walker'          => new WP_Bootstrap_Navwalker(),
    )); ?>
  </div>
</section>
