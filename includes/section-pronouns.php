<!-- Template Partials used in Policy Page Template-->
<!-- This section is newly added. Dynamic content to be added -->
<?php if( have_rows('pronouns', $args['static_content'])): ?>
  <?php while( have_rows('pronouns', $args['static_content']) ): the_row();
    // Get sub field values.
    $anchor           = get_sub_field('anchor');
    $header           = get_sub_field('header');
    $description      = get_sub_field('description');
    $image            = get_sub_field('image');
    $sub_header       = get_sub_field('sub_header');
    $sub_description  = get_sub_field('sub_description');
    $sub_link_text    = get_sub_field('sub_link_text');
    $sub_anchor       = get_sub_field('sub_anchor');
  ?>

  <section id="<?php echo $anchor; ?>">
    <div class="section-header">
      <h2><?php echo $header; ?></h2>
      <p><?php echo $description; ?></p>
    </div>

    <div class="grid-twos">
      <?php if( !empty( $image ) ): ?>
        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
      <?php endif; ?>

      <!-- Gegi's Blurb -->
      <div class="card card-sub">
        <h3><?php echo $sub_header; ?></h3>
        <?php echo $sub_description; ?>
        <a class="btn" href="#<?php echo $sub_anchor; ?>">
          <?php echo $sub_link_text; ?>
        </a>
      </div>
    </div>
  </section>

  <?php endwhile; ?>
<?php endif; ?>
