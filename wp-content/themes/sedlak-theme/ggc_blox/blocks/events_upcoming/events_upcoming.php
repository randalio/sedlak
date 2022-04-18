<?php

$events_headline = get_sub_field('events_upcoming_headline');

$events_query = get_posts(
  array(
    'numberposts' => 10,
    'orderby'     => 'date',
    'order'       => 'DESC',
    'fields'      => 'ids',
    'post_type'   => 'event'
  )
);
$events = array();

foreach( $events_query as $event_id ){
  //$events                = array();
  $timestamp = strtotime( get_field('event_date', $event_id) );
  $events[$timestamp]['timestamp']   = $timestamp;
  $events[$timestamp]['title']       = get_the_title($event_id);
  $events[$timestamp]['start_date']  = get_field('event_date', $event_id);
  $events[$timestamp]['end_date']    = get_field('event_end_date', $event_id);
  $events[$timestamp]['description'] = get_field('description', $event_id);
  $events[$timestamp]['website']     = get_field('website', $event_id);
  $events[$timestamp]['image']       = get_field('image', $event_id);
  //array_push($events, $event);
}
ksort($events);

?>
<pre>
  <?php //print_r($events); ?>
</pre>
<section class="events-upcoming">
  <div class="row headline">
    <div class="col text-center mb-5">
      <h2><?php echo $events_headline; ?></h2>
    </div>
  </div>

  <div class="row">
    <div class="col px-5">

      <?php foreach( $events as $event ): ?>
        <div class="row mb-5 pb-4 pt-4">
          <div class="col-3 col-md-2">
            <?php

            $originalDate = $event['start_date'];
            $date['day'] = date("j", strtotime($originalDate));
            $date['month'] = date("F", strtotime($originalDate));
            $date['year'] = date("Y", strtotime($originalDate));


            $originaEndlDate = $event['end_date'];
            $end_date['day'] = date("j", strtotime($originaEndlDate));
            $end_date['month'] = date("F", strtotime($originaEndlDate));
            $end_date['year'] = date("Y", strtotime($originaEndlDate));

            ?>
            <div class="row month">
              <div class="col-12 text-center">
                <?php echo $date['month']; ?>
              </div>
            </div>
            <div class="row day">
              <div class="col-12 text-center py-2 ">
                <?php echo $date['day']; ?>
              </div>
            </div>
          </div>

          <div class="col-9 col-md-7">

            <div class="row title pl-4">
              <div class="col-12">
                <h5><?php echo $event['title']; ?></h5>
              </div>
            </div>

            <div class="row date-time pl-4 pt-2">
              <div class="col-12">
                <?php echo $date['month']. ' ' . $date['day']; ?><?php if( $end_date['year'] == '1970' ): ?>, <?php echo $date['year']; ?> <?php endif; ?>

                <?php if( is_array( $end_date ) && $end_date['year'] != '1970' ): ?>
                  <?php echo '-'; ?>
                  <?php if( $end_date['month'] != $date['month'] ): echo $end_date['month']; endif;?> <?php echo $end_date['day']; ?><?php echo ', '.$end_date['year']; ?>
                <?php endif; ?>
              </div>
            </div>

            <div class="row description pl-4 pr-5">
              <div class="col">
                <?php echo $event['description']; ?>
              </div>
            </div>

            <div class="row website pl-4 pt-4">
              <div class="col">
                <a href="<?php echo $event['website']; ?>" target="_blank">Event Website</a>
              </div>
            </div>

          </div>



          <?php if( is_array($event['image']) ): ?>
            <div class="col-md-3">
              <img src="<?php echo $event['image']['sizes']['grid-four-items']; ?>" class="img-fluid float-right pt-5" />
            </div>
          <?php endif; ?>




        </div>
            <hr/>
      <?php endforeach; ?>

    </div>
  </div>
</section>
