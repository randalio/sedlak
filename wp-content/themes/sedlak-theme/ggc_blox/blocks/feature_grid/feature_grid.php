<?php

$repeater = get_sub_field('feature_grid_repeater');

if( sizeof( $repeater ) == 2 || sizeof( $repeater ) == 4){
	$cols = 'col-md-6';
}elseif( sizeof( $repeater ) == 3 || sizeof( $repeater ) == 6 ){
	$cols = 'col-md-6 col-xl-4';
}elseif( sizeof( $repeater ) == 1 ){
	$cols = 'col-md-12';
}else{
	$cols = 'col-md-6 col-xl-4';
}

?>

<section class="row feature-grid txt_lt pad-top- pad-bot- ">


<?php foreach( $repeater as $i => $tile ): $i++; ?>
	<div class="col-12 <?php echo $cols; ?> cta-left">
		<div class="row h-100">
			<div class="col mr-0 <?php if( $i % 2 ): ?>mr-md-3<?php else: ?>mr-md-0<?php endif; ?> <?php if( $i % 3 ): ?>mr-xl-3<?php else: ?>mr-xl-0<?php endif; ?> mt-3">
				<div class="row h-100 pb-5 image" <?php if($tile['feature_grid_img'] != ''): ?>style="background-image: url(<?php echo $tile['feature_grid_img']['sizes']['large']; ?>);" <?php endif; ?>>
		      <div class="col-11 col-md-9 col-xl-8 text-background p-4 mb-5">

		        <?php if( $tile['content']['title'] != '' ): ?>
		          <h5 class="headline">
		            <a href="<?php echo $tile['content']['button_link']['url']; ?>"><?php echo $tile['content']['title']; ?></a>
		          </h5>
		        <?php endif; ?>

		        <?php if( $tile['content']['text'] ): ?>
		          <p><?php echo $tile['content']['text']; ?></p>
		        <?php endif; ?>

		        <?php if( is_array( $tile['content']['button_link'] ) &&  $tile['content']['button_text'] != '' ): ?>
		          <div class="button mt-4 mb-2">
		              <a href="<?php echo $tile['content']['button_link']['url']; ?>" class="btn btn-caret" target="<?php echo $tile['content']['button_link']['target']; ?>" title="<?php echo $tile['content']['button_link']['title']; ?>">
		              <?php echo $tile['content']['button_text']; ?>
		            </a>
		          </div>
		        <?php endif; ?>
		      </div>
		    </div>
			</div>
		</div>
	</div>
<?php endforeach; ?>
</section>
