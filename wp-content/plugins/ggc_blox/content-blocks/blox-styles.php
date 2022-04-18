<?php
$plugin_url = plugin_dir_url( __FILE__ );
$theme_dir = get_template_directory() . '/ggc_blox/';
$theme_dir_uri = get_template_directory_uri() . '/ggc_blox/';
global $ggc_blox_new_blocks;

function blox_styles() {
    //Plugin Script
    wp_enqueue_script('ggc_blox_js', plugin_dir_url( __FILE__ ) . 'ggc_blox.js', array( 'jquery' ));
    wp_enqueue_style('ggc_blox_styles', plugin_dir_url( __DIR__ ) . 'css/style.css');


    if( is_file( get_template_directory() . '/ggc_blox/animate.css' ) ){
      wp_enqueue_style('ggc_blox_animate_child_css', get_template_directory_uri() . '/ggc_blox/animate.css');
    }else{
      wp_enqueue_style('ggc_blox_animate_css', plugin_dir_url(__DIR__ ) . 'css/animate.min.css');
    }


    $theme_dir = get_template_directory() . '/ggc_blox/';

    //ADD CUSTOM 'NEW BLOCKS' to content blocks template
    if( is_dir(  $theme_dir. 'blocks' )  ):
      global $ggc_blox_new_blocks;
      $ggc_blox_new_blocks = array();
      $block_directories = glob($theme_dir. 'blocks' . '/*' , GLOB_ONLYDIR);
      foreach($block_directories as $dir):
        $path = $dir;
        $basename = basename($path);
        $basename = str_replace('-', '_', $basename);
        $ggc_blox_new_blocks[$basename]['name'] = $basename;
        $ggc_blox_new_blocks[$basename]['path'] = $path;
        if( file_exists( $path .'/'.$basename.'.php') ):
          $ggc_blox_new_blocks[$basename]['template'] = $basename.'.php';
        endif;
        if( file_exists( $path .'/style.css') ):
          $ggc_blox_new_blocks[$basename]['stylesheet'] = 'style.css';
        endif;
        if( file_exists( $path .'/fields.php') ):
          $ggc_blox_new_blocks[$basename]['fields'] = 'fields.php';
        endif;
      endforeach;
    endif;

    //print_r($ggc_blox_new_blocks);
    if( sizeof($ggc_blox_new_blocks) > 0 ):
      foreach($ggc_blox_new_blocks as $block):
        if( array_key_exists( 'stylesheet', $block )  ):
          if( is_file( get_template_directory().'/ggc_blox/blocks/'.$block['name'].'/'.$block['stylesheet'] ) ):
            wp_enqueue_style( $block['name'], get_template_directory_uri() .'/ggc_blox/blocks/'.$block['name'].'/'.$block['stylesheet'] );
          endif;
        endif;
      endforeach;
    endif;

}
add_action( 'wp_enqueue_scripts', 'blox_styles');

function blox_admin_style() {
    wp_enqueue_style( 'blox_admin_css', plugin_dir_url(__DIR__) . 'css/admin.css' );
}
add_action( 'admin_enqueue_scripts', 'blox_admin_style' );
?>
