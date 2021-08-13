<?php
	/* Template Name: School Board */
	get_header();
	$school_board = get_field('school_board'); // ID
	$static_content = wp_get_post_parent_id(get_the_ID()); // ID
  if( have_rows('general', $static_content) ):
    while( have_rows('general', $static_content) ): the_row();
      $download_icon = get_sub_field('download_icon');
    endwhile;
  endif;
?>

<!-- Wrap the entire page to prevent style leak -->
<div class="sb-wrapper">

<!-- Hero -->
<section>
	<?php if( have_rows('hero', $static_content) ): ?>
		<?php while( have_rows('hero', $static_content) ): the_row();
			// Get sub field values.
			$header = get_sub_field('header');
			$description = get_sub_field('description');
			$image = get_sub_field('img');
    ?>
      <!-- Image and text -->
			<div class="container-img">
        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
        <div>
          <pre><?php echo esc_html( $school_board->post_title ); ?></pre>
          <h1><?php echo esc_html( $header ); ?></h1>
          <p><?php echo esc_html( $description ); ?></p>
        </div>
			</div>

      <!-- Anchors -->
			<?php if( have_rows('anchor_links') ): ?>
			<div class="cards-anchor">

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

<!-- Washroom -->
<?php if( have_rows('washroom', $static_content)): ?>
  <?php while( have_rows('washroom', $static_content) ): the_row();
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
      <div class="card card-sub">
        <h3><?php echo $sub_header; ?></h3>
        <p><?php echo $sub_description; ?></p>
      </div>

      <!-- Policy Card -->
      <div class="card card-leaf">
        <h3><?php echo $policy_header; ?></h3>
        <?php if( have_rows('washroom', $school_board) ): ?>
          <?php while( have_rows('washroom', $school_board) ): the_row();
            // Get sub field values.
            $policy_excerpt = get_sub_field('policy_excerpt');
            $policy_file = get_sub_field('policy_file');
          ?>
          <div style="display: flex; margin-bottom: 20px">
            <p style="padding-right: 20px;"><?php echo $policy_description; ?></p>
            <?php if( $policy_file ): ?>
              <!-- TODO: Fix URL -->
              <a href="<?php echo $policy_file['url']; ?>">
                <?php echo $download_icon; ?>
              </a>
            <?php endif; ?>

          </div>

          <div style="display: flex;">
            <p style="font-size: 50px; color: grey; margin: -20px 20px 0 0">❝ </p>
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
      <?php if( $sheet_file ): ?>
        <a class="card card-leaf" href="<?php echo $sheet_file['url']; ?>">
          <h3><?php echo $sheet_header; ?></h3>
          <div class="container-text-icon">
            <p>
              <?php echo $sheet_description; ?>
            </p>
            <?php echo $download_icon; ?>
          </div>
        </a>
      <?php endif; ?>
    </div>

  </section>
  <?php endwhile; ?>
<?php endif; ?>

<!-- TODO: Next Button -->
<a href="<?php echo esc_url( add_query_arg( 'sb_id', $school_board, site_url( '/talk-to-someone/' ) ) )?>">Next</a>

</div>

<?php get_footer(); ?>
