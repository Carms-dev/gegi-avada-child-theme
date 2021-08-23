<!-- Template Partials used in Policy Page Template -->
<?php if( have_rows( 'general', $args['static_content']) ): ?>
  <?php while( have_rows( 'general', $args['static_content']) ): the_row();
    $description_prev = get_sub_field( 'description_prev' );
    $link_text_prev   = get_sub_field( 'link_text_prev' );
    $page_link_prev   = get_sub_field( 'page_link_prev' );
    $link_text_next   = get_sub_field( 'link_text_next' );
    $page_link_next   = get_sub_field( 'page_link_next' );
    $description_next = get_sub_field( 'description_next' );
  ?>
  <div class="sb-nav">
    <!-- Prev -->
    <div>
      <p><?php echo $description_prev; ?></p>

      <a class="btn" href="<?php echo $page_link_prev; ?>">
        <?php echo $link_text_prev; ?>
      </a>
    </div>

    <!-- Next -->
    <div>
      <p><?php echo $description_next; ?></p>

      <?php if ( !is_null($args['school_board']) ): ?>
        <a
          id="btn-next"
          class="btn"
          href="<?php echo esc_url( add_query_arg( 'sb_id', $args['school_board'], $page_link_next ) ); ?>"
        >
          <?php echo $link_text_next; ?>
        </a>
      <?php else: ?>
        <a
          id="btn-next"
          class="btn"
          href="<?php echo esc_url( $page_link_next ); ?>"
        >
          <?php echo $link_text_next; ?>
        </a>
      <?php endif; ?>
    </div>
  </div>

  <?php endwhile; ?>
<?php endif; ?>
