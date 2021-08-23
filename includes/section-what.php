<!-- Template Partials used in Support Page Template -->
<?php if( have_rows('section_what', $args['static_content'])): ?>
  <?php while( have_rows('section_what', $args['static_content']) ): the_row();
    // Get sub field values.
    $anchor       = get_sub_field('anchor');
    $header       = get_sub_field('header');
    $sub_header   = get_sub_field('sub_header');
    $description  = get_sub_field('description');
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

      <!-- items -->
      <?php if( have_rows('items')): ?>
        <div class="grid-singles">

          <?php while( have_rows('items') ): the_row();
            // Get sub field values.
            $item = get_sub_field('item');
          ?>
            <h3 class="card card-sub"><?php echo $item; ?></>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>

    </div>
  </section>

  <?php endwhile; ?>
<?php endif; ?>
