<!-- Template Partials used in Policy & Support Page Template -->
<section>
  <?php if( have_rows('hero', $args['static_content']) ): ?>
    <?php while( have_rows('hero', $args['static_content']) ): the_row();
      // Get sub field values.
      $header       = get_sub_field('header');
      $description  = get_sub_field('description');
      $image        = get_sub_field('img');
      $asp_id       = $args['asp_id'];
    ?>

      <!-- Image and text -->
      <div class="container-img">
          <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
          <div>
            <?php if(!is_null($args['school_board'])): ?>
              <pre><?php echo esc_html( get_the_title( $args['school_board'] ) ); ?></pre>
            <?php endif; ?>
            <h1><?php echo esc_html( $header ); ?></h1>
            <p><?php echo esc_html( $description ); ?></p>
            <?php if(is_null($args['school_board'])): ?>
              <?php echo do_shortcode("[wpdreams_ajaxsearchpro id=$asp_id]"); ?>
            <?php endif; ?>
          </div>
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

    <?php endwhile; ?>
  <?php endif; ?>
</section>
