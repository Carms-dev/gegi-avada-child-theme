<?php
  /* Template Name: Support Page */
  get_header();
  $static_content = get_the_ID(); // ID
  $sb_id = $_GET['sb_id'];
  // Validate school board presense and of type school-board
  $school_board = get_post_type($sb_id) == 'school-board' ? $sb_id : NULL;
  if( have_rows( 'general', $static_content) ):
    while( have_rows( 'general', $static_content) ): the_row();
      $asp_id = get_sub_field( 'asp_id' );
    endwhile;
  endif;
?>

<div class="sb-wrapper">
  <!-- Hero -->
  <?php get_template_part( 'includes/section', 'hero', array(
    'static_content'  => $static_content,
    'school_board'    => $school_board,
  ) ); ?>

  <!-- Section 1 -->
  <?php get_template_part( 'includes/section', 'network', array(
    'static_content'  => $static_content,
  ) ); ?>

  <!-- Section 2 -->
  <?php get_template_part( 'includes/section', 'contacts', array(
    'static_content'  => $static_content,
    'school_board'    => $school_board,
    'asp_id'          => $asp_id,
  ) ); ?>

  <!-- Section 3 -->
  <?php get_template_part( 'includes/section', 'other_orgs', array(
    'static_content'  => $static_content,
    'school_board'    => $school_board,
    'asp_id'          => $asp_id,
  ) ); ?>

  <!-- Section 4 -->
  <?php get_template_part( 'includes/section', 'general_orgs', array(
    'static_content' => $static_content,
  ) ); ?>

</div>

<?php get_footer(); ?>
