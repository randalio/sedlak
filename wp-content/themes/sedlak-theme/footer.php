<?php

$company_name   = get_field( 'company_name', 'option' );
$address_line_1 = get_field( 'address_line_1', 'option' );
$address_line_2 = get_field( 'address_line_2', 'option' );
$city_state_zip = get_field( 'city_state_zip', 'option' );
$phone_number   = get_field( 'phone_number', 'option' );

?>

    <?php $year = date("Y"); ?>
    <div class="footer-border"></div>
    <footer class="py-5">
        <div class="container">
          <div class="row text-center">
            <div class="col">

              <div class="row">
                  <div class="col py-1">
                    &copy; <?php echo $year; ?> <?php if( $company_name != ''): ?><span class="company_name"><?php echo $company_name; ?></span><?php endif; ?> All Rights Reserved.
                </div>
              </div>

              <div class="row">
                  <div class="col py-1">
                    <?php if( $address_line_1 != ''): ?><span class="address_line px-1"><?php echo $address_line_1; ?></span><?php endif; ?>
                    <?php if( $address_line_2 != ''): ?><span class="address_line px-1"><?php echo $address_line_2; ?></span><?php endif; ?>
                    <?php if( $city_state_zip != ''): ?><span class="address_line px-1"><?php echo $city_state_zip; ?></span><?php endif; ?>
                    <?php if( $phone_number != ''): ?><span class="address_line px-1"><?php echo $phone_number; ?></span><?php endif; ?>
                </div>
              </div>

              <div class="row">
                  <div class="col">
                    <!-- Footer Navigation -->
                    <?php wp_nav_menu( array(
                      'menu' 						=> 'footer_nav',
                      'depth'	          => 1, // 1 = no dropdowns, 2 = with dropdowns.
                      'container'       => 'div',
                      'container_class' => '',
                      'container_id'    => 'footer_navigation',
                      'menu_class'      => 'footer_nav',
                      'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                      'theme_location'	=> 'footer_nav',
                      'walker'          => new WP_Bootstrap_Navwalker(),
                    )); ?>
                </div>
              </div>




            </div>
          </div>
        </div>
    </footer>


     <?php wp_footer(); ?>
  </div> <!-- #site_wrapper -->
</body>
</html>
