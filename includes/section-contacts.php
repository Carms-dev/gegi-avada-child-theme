<?php if( have_rows('section_two', $args['static_content'])): ?>
  <?php while( have_rows('section_two', $args['static_content']) ): the_row();
    // Get sub field values.
    $anchor = get_sub_field('anchor');
    $header = get_sub_field('header');
    $sub_header = get_sub_field('sub_header');
    $description = get_sub_field('description');
    $image = get_sub_field('image');
    $asp_id = $args['asp_id'];
  ?>
  <section id="<?php echo $anchor ?>">

    <div class="grid-twos">
      <div>
        <div class="section-header">
          <h2><?php echo $header; ?></h2>
          <?php if(!is_null($args['school_board'])): ?>
            <pre><?php echo get_the_title($args['school_board']); ?></pre>
          <?php else: ?>
            <p><?php echo $sub_header; ?></p>
          <?php endif; ?>
        </div>
        <?php echo $description; ?>

        <?php if(!is_null($args['school_board'])): ?>
          <!-- Display School Board Contacts' Info -->
          <?php if( have_rows('school_board_contacts', $args['school_board']) ): ?>
            <?php while( have_rows('school_board_contacts', $args['school_board']) ) : the_row();
              $contact_name = get_sub_field('contact_name');
              $contact_info = get_sub_field('contact_info');
            ?>

            <div class="card" style="margin-top: 5vmin;">
              <h3><?php echo $contact_name; ?></h3>

              <?php echo $contact_info; ?>
            </div>

            <?php endwhile; ?>
          <?php else: ?>
            <!-- TODO: no contact ? -->
          <?php endif; ?>
        <?php else: ?>
          <!-- Display AJAX Search Pro -->
          <?php echo do_shortcode("[wpdreams_ajaxsearchpro id=$asp_id]"); ?>
        <?php endif; ?>

      </div>

      <?php if( !empty( $image ) ): ?>
        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
      <?php endif; ?>

    </div>
  </section>

  <?php endwhile; ?>
<?php endif; ?>
