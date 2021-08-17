<!-- Template Partials used in Support Page Template -->
<?php if( have_rows('section_one', $args['static_content'])): ?>
  <?php while( have_rows('section_one', $args['static_content']) ): the_row();
    // Get sub field values.
    $anchor       = get_sub_field('anchor');
    $header       = get_sub_field('header');
    $description  = get_sub_field('description');
    $content      = get_sub_field('content');
  ?>
  <section id="<?php echo $anchor ?>">
    <div class="grid-twos">
      <div>
        <div class="section-header">
          <h2><?php echo $header; ?></h2>
          <p><?php echo $description; ?></p>
        </div>
        <?php echo $content; ?>
      </div>

      <!-- Priority of who should they reach out to first -->
      <div class="ranks">
        <?php if( have_rows('contacts')): ?>
          <?php while( have_rows('contacts') ): the_row();
            $title = get_sub_field('title');
          ?>
          <div class="rank">
            <div class="rank-num">
              <h6><?php echo get_row_index(); ?></h6>
            </div>
            <div class="rank-title">
              <p><?php echo $title; ?></p>
            </div>
          </div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <?php endwhile; ?>
<?php endif; ?>
