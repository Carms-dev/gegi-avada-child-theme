<?php if( have_rows('section_three', $args['static_content'])): ?>
  <?php while( have_rows('section_three', $args['static_content']) ): the_row();
    // Get sub field values.
    $anchor = get_sub_field('anchor');
    $header = get_sub_field('header');
    $sub_header = get_sub_field('sub_header');
    $description = get_sub_field('description');
    $image = get_sub_field('image');
    $sub_section_one = get_sub_field('sub_section_one');
    $sub_section_two = get_sub_field('sub_section_two');
    $asp_id = $args['asp_id'];
  ?>
  <section id="<?php echo $anchor ?>">
    <div class="grid-twos">
      <div>
        <div class="section-header">
          <h2><?php echo $header; ?></h2>
          <p>
            <?php echo $sub_header; ?>

            <?php if(!is_null($args['school_board'])): ?>
              <span> - <?php echo get_the_title($args['school_board']); ?></span>
            <?php endif; ?>
          </p>
        </div>
        <?php echo $description; ?>

        <?php if(is_null($args['school_board'])): ?>
          <!-- Display AJAX Search Pro -->
          <?php echo do_shortcode("[wpdreams_ajaxsearchpro id=$asp_id]"); ?>
        <?php endif; ?>
      </div>

      <?php if( !empty( $image ) ): ?>
        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
      <?php endif; ?>

    </div>

    <div>
      <!-- Organizations -->
      <?php if( !is_null($args['school_board']) ) : ?>
        <!-- Display associated Youth orgs -->
        <?php get_template_part( 'includes/cards', 'sb_org', array(
          'field_name' => 'youth_orgs',
          'school_board' => $args['school_board'],
          'section_header' => $sub_section_one,
        ) ); ?>

        <!-- Display associated All ages orgs -->
        <?php get_template_part( 'includes/cards', 'sb_org', array(
          'field_name' => 'all_ages_org',
          'school_board' => $args['school_board'],
          'section_header' => $sub_section_two,
        ) ); ?>

      <?php else : ?>
        <!-- Display all Youth orgs -->
        <?php get_template_part( 'includes/cards', 'org', array(
          'category_name' => 'youth',
          'section_header' => $sub_section_one,
        ) ); ?>

        <!-- Display all All ages orgs -->
        <?php get_template_part( 'includes/cards', 'org', array(
          'category_name' => 'all-ages',
          'section_header' => $sub_section_two,
        ) ); ?>
      <?php endif;  ?>

    </div>
  </section>

  <?php endwhile; ?>
<?php endif; ?>
