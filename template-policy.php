<?php
	/* Template Name: Policy Page */
	get_header();
  $static_content = get_the_ID(); // ID
  $sb_id = $_GET['sb_id'];
  // Validate school board presense and of type school-board
  $school_board = get_post_type($sb_id) == 'school-board' ? $sb_id : NULL;
  if( have_rows( 'general', $static_content) ):
    while( have_rows( 'general', $static_content) ): the_row();
      $download_icon = get_sub_field( 'download_icon' );
      $asp_id = get_sub_field( 'asp_id' );
    endwhile;
  endif;
?>

<!-- Wrap the entire page to prevent style leak -->
<div class="sb-wrapper" id="page-policy">
  <!-- Hero -->
  <?php get_template_part( 'includes/section', 'hero', array(
    'static_content'  => $static_content,
    'school_board'    => $school_board,
    'asp_id'          => $asp_id,
  ) ); ?>

  <!-- ONLY RENDER IF SCHOOL BOARD IS FOUND -->
    <!-- Washroom -->
    <?php get_template_part( 'includes/section', 'situation', array(
      'key'             => 'washroom',
      'static_content'  => $static_content,
      'school_board'    => $school_board,
      'download_icon'   => $download_icon,
    ) ); ?>

    <!-- Sports -->
    <?php get_template_part( 'includes/section', 'situation', array(
      'key'             => 'sports',
      'static_content'  => $static_content,
      'school_board'    => $school_board,
      'download_icon'   => $download_icon,
    ) ); ?>

    <!-- Trips -->
    <?php get_template_part( 'includes/section', 'situation', array(
      'key'             => 'trips',
      'static_content'  => $static_content,
      'school_board'    => $school_board,
      'download_icon'   => $download_icon,
    ) ); ?>

    <!-- Names & Pronouns -->
    <?php get_template_part( 'includes/section', 'pronouns', array(
      'static_content'  => $static_content,
    ) ); ?>

    <!-- General Policy -->
    <?php get_template_part( 'includes/section', 'policies', array(
      'static_content'  => $static_content,
      'school_board'    => $school_board,
      'download_icon'   => $download_icon,
    ) ); ?>

    <!-- Step Nav Buttons -->
    <?php get_template_part( 'includes/nav', 'steps', array(
      'static_content'  => $static_content,
      'school_board'    => $school_board,
    ) ); ?>


</div>
<?php get_footer(); ?>
