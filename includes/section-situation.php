<!-- Template Partials -->
<?php if( have_rows($args['key'], $args['static_content'])): ?>
  <?php while( have_rows($args['key'], $args['static_content']) ): the_row();
    // Get sub field values.
    $anchor = get_sub_field('anchor');
    $header = get_sub_field('header');
    $description = get_sub_field('description');
    $image = get_sub_field('image');
    $sub_header = get_sub_field('sub_header');
    $sub_description = get_sub_field('sub_description');
    $policy_header = get_sub_field('policy_header');
    $policy_description = get_sub_field('policy_description');
    $no_policy_description = get_sub_field('no_policy_description');
    $no_policy_link_text = get_sub_field('no_policy_link_text');
    $no_policy_anchor = get_sub_field('no_policy_anchor');
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
        <p><?php echo $sub_description; ?></p>
      </div>

      <!-- Policy Card -->
      <div class="card">
        <h3><?php echo $policy_header; ?></h3>
        <?php if( have_rows($args['key'], $args['school_board']) ): ?>
          <?php while( have_rows($args['key'], $args['school_board']) ): the_row();
            $policy_excerpt = get_sub_field('policy_excerpt');
            $policy_file = get_sub_field('policy_file');
          ?>
          <div class="grid-twos-flex">
            <p><?php echo $policy_description; ?></p>
            <?php if( $policy_file ): ?>
              <a href="<?php echo $policy_file['url']; ?>">
                <?php echo $args['download_icon']; ?>
              </a>
            <?php endif; ?>

          </div>

          <div class="grid-twos-flex">
            <p style="font-size: 50px; color: grey; margin-top: -20px;">❝ </p>
            <?php echo $policy_excerpt; ?>
          </div>

          <?php endwhile; ?>
        <?php else: ?>
          <p><?php echo $no_policy_description; ?></p>
          <a class="btn" href="#<?php echo $no_policy_anchor; ?>">
            <?php echo $no_policy_link_text; ?>
          </a>
        <?php endif; ?>
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
