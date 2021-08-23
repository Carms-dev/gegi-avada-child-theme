<!-- Template Partials used in Support Page Template -->
<?php if( have_rows('section_who', $args['static_content'])): ?>
  <?php while( have_rows('section_who', $args['static_content']) ): the_row();
    // Get sub field values.
    $anchor       = get_sub_field('anchor');
    $header       = get_sub_field('header');
    $description  = get_sub_field('description');
  ?>
    <section id="<?php echo $anchor ?>">
      <div class="section-header">
        <h2><?php echo $header; ?></h2>
        <p><?php echo $description; ?></p>
      </div>

      <!-- Anchors -->
      <?php if( have_rows('anchor_links') ): ?>
        <div class="cards cards-anchor">
          <?php while( have_rows('anchor_links') ): the_row();
                // Get sub field values.
                $anchor = get_sub_field('anchor');
                $anchor_icon = get_sub_field('icon');
                $anchor_header = get_sub_field('header');
                $anchor_description = get_sub_field('description');
              ?>
            <div class="card card-leaf">
                  <a href="#<?php echo esc_html( $anchor ); ?>">
                    <?php echo $anchor_icon; ?>
                    <h3><?php echo esc_html( $anchor_header ); ?></h3>
                    <p><?php echo esc_html( $anchor_description ); ?></p>
                  </a>
            </div>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>

    </section>

  <?php endwhile; ?>
<?php endif; ?>
