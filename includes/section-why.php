<!-- Template Partials used in Support Page Template -->
<?php if( have_rows('section_why', $args['static_content'])): ?>
  <?php while( have_rows('section_why', $args['static_content']) ): the_row();
    // Get sub field values.
    $anchor       = get_sub_field('anchor');
    $header       = get_sub_field('header');
    $sub_header   = get_sub_field('sub_header');
    $description  = get_sub_field('description');
    $image        = get_sub_field('image');
  ?>
  <section id="<?php echo $anchor ?>">
    <div class="grid-twos">
      <div>
        <div class="section-header">
          <h2><?php echo $header; ?></h2>
          <p><?php echo $sub_header; ?></p>
        </div>
        <?php echo $description; ?>
      </div>

      <!-- Image -->
      <?php if( !empty( $image ) ): ?>
        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
      <?php endif; ?>
    </div>
  </section>

  <?php endwhile; ?>
<?php endif; ?>
