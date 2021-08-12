<?php
  /* Template Name: School Board */
  get_header();
  $school_board = get_field('school_board'); // ID
  $static_content = wp_get_post_parent_id(get_the_ID()); // ID
?>

<!-- TODO: Next Button -->
<a href="<?php echo esc_url( add_query_arg( 'sb_id', $school_board, site_url( '/talk-to-someone/' ) ) )?>">Next</a>

<!-- Hero -->
<section class="sb-hero">
  <?php if( have_rows('hero', $static_content) ): ?>
    <?php while( have_rows('hero', $static_content) ): the_row();
      // Get sub field values.
      $image = get_sub_field('img');
      $header = get_sub_field('header');
      ?>

      <div>
        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
        <h2><?php echo esc_html( $header ); ?></h2>
      </div>

      <?php if( have_rows('anchor_links') ): ?>
      <ul>

        <?php while( have_rows('anchor_links') ): the_row();
          // Get sub field values.
            $anchor = get_sub_field('anchor');
            $anchor_icon = get_sub_field('icon');
            $anchor_header = get_sub_field('header');
            $anchor_description = get_sub_field('description');
          ?>
          <li>
              <a href="#<?php echo esc_html( $anchor ); ?>">
                <?php echo $anchor_icon; ?>

                <h3><?php echo esc_html( $anchor_header ); ?></h3>
                <p><?php echo esc_html( $anchor_description ); ?></p>
              </a>
          </li>
        <?php endwhile; ?>

      </ul>
      <?php endif; ?>


    <?php endwhile; ?>
  <?php endif; ?>

</section>


<section>

</section>
<?php
if( $school_board ): ?>
  <h3><?php echo esc_html( $school_board->post_title ); ?></h3>
  <?php the_field('washroom_policy_excerpt', $school_board); ?>
<?php endif; ?>

<?php
  // Check rows exists.
  if( have_rows('policies', $school_board) ):

    echo '<ul class="sb-policy">';
    // Loop through rows.
    while( have_rows('policies', $school_board) ) : the_row();

    // Load sub field value.
      $policy_title = get_sub_field('policy_title');
      $policy_file = get_sub_field('policy_file');

      echo "<li><a href=$policy_file>";
      echo $policy_title;
      echo '</a></li>';

    endwhile;

    echo '</ul>';

  // No value.
  else :
    echo '<p>No Policies</p>';
    echo $school_board->ID;
  endif;
?>
<?php get_footer(); ?>
