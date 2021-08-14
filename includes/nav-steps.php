<?php
	/* Template Partials */
  if( have_rows( 'general', $args['static_content']) ):
?>
  <?php while( have_rows( 'general', $args['static_content']) ): the_row();
    $header_prev = get_sub_field( 'header_prev' );
    $description_prev = get_sub_field( 'description_prev' );
    $page_prev = get_sub_field( 'page_prev' );
    $header_next = get_sub_field( 'header_next' );
    $page_next = get_sub_field( 'page_next' );
    $description_next = get_sub_field( 'description_next' );
  ?>
  <div class="sb-nav">
    <!-- Prev -->
    <div>
      <h3><?php echo $header_prev; ?></h3>
      <p><?php echo $description_prev; ?></p>

      <?php if( $page_prev ): ?>
        <a class="btn" href="<?php echo get_permalink( $page_prev->ID ); ?>">
          <?php echo get_the_title( $page_prev->ID ); ?>
        </a>
      <?php endif ?>
    </div>

    <!-- Next -->
    <div>
      <h3><?php echo $header_next; ?></h3>
      <p><?php echo $description_next; ?></p>

      <?php if( $page_next ): ?>
        <a class="btn" href="<?php echo get_permalink( $page_next->ID ); ?>">
          <?php echo get_the_title( $page_next->ID ); ?>
        </a>
      <?php endif ?>
    </div>
  </div>

  <?php endwhile; ?>
<?php endif; ?>
