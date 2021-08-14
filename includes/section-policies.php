<!-- Template Partials -->
<?php if( have_rows('policies', $args['static_content'])): ?>
  <?php while( have_rows('policies', $args['static_content']) ): the_row();
    // Get sub field values.
    $anchor = get_sub_field('anchor');
    $header = get_sub_field('header');
    $description = get_sub_field('description');
    $image = get_sub_field('image');
    $sub_header = get_sub_field('sub_header');
    $sub_description = get_sub_field('sub_description');
    $no_policy_header = get_sub_field('no_policy_header');
    $no_policy_description = get_sub_field('no_policy_description');
    $cta_header = get_sub_field('cta_header');
    $cta_description = get_sub_field('cta_description');
    $cta_link_text = get_sub_field('cta_link_text');
    $cta_link = get_sub_field('cta_link');
    $sheet_header = get_sub_field('sheet_header');
    $sheet_description = get_sub_field('sheet_description');
    $sheet_file = get_sub_field('sheet_file');
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

      <!-- Gegi's blurb -->
      <div class="card card-sub">
        <h3><?php echo $sub_header; ?></h3>
        <?php echo $sub_description; ?>
      </div>
    </div>

    <!-- Display All Policies -->
    <?php if( have_rows('policies_student', $args['school_board']) ): ?>
      <div class="grid-twos" style="margin: 5vmin 0">
        <?php while( have_rows('policies_student', $args['school_board']) ): the_row();
          $file = get_sub_field('file');
        ?>
          <div class="card card grid-twos-flex" >
            <h3><?php echo $file['filename']; ?></h3>
            <?php if( $file ): ?>
              <a href="<?php echo $file['url']; ?>">
                <?php echo $args['download_icon']; ?>
              </a>
            <?php endif; ?>
          </div>
        <?php endwhile; ?>
      </div>
    <?php else: ?>
      <!-- Display No policy message -->
      <div class="section-header">
        <h3><?php echo $no_policy_header; ?></h3>
        <p><?php echo $no_policy_description; ?></p>
      </div>
    <?php endif; ?>

    <!-- Displays as possible actions at the end of page -->
    <div class="grid-twos" style="align-items: stretch;">
      <!-- Call to action -->
      <div class="card">
        <h3><?php echo $cta_header; ?></h3>
        <p><?php echo $cta_description; ?></p>
        <a class="btn" href="<?php echo esc_url( add_query_arg( 'sb_id', $args['school_board'], $cta_link ) ); ?>">
          <?php echo $cta_link_text; ?>
        </a>
      </div>

      <!-- Sheet Card -->
      <div class="card">
        <h3><?php echo $sheet_header; ?></h3>
        <div class="grid-twos-flex">
          <p>
            <?php echo $sheet_description; ?>
          </p>
          <?php if( $sheet_file ): ?>
            <a href="<?php echo $sheet_file['url']; ?>">
              <?php echo $args['download_icon']; ?>
            </a>
          <?php endif; ?>
        </div>
      </div>

    </div>
  </section>
  <?php endwhile; ?>
<?php endif; ?>
