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
<?php get_template_part( 'includes/section', 'hero', array(
  'static_content'  => $static_content,
  'school_board'    => $school_board,
) ); ?>

<!-- Washroom -->
<?php get_template_part( 'includes/section', 'situation', array(
  'key'             => 'washroom',
  'static_content'  => $static_content,
  'school_board'    => $school_board,
  'download_icon'   => $download_icon,
) ); ?>

<!-- sports -->
<?php get_template_part( 'includes/section', 'situation', array(
  'key'             => 'sports',
  'static_content'  => $static_content,
  'school_board'    => $school_board,
  'download_icon'   => $download_icon,
) ); ?>

<!-- trips -->
<?php get_template_part( 'includes/section', 'situation', array(
  'key'             => 'trips',
  'static_content'  => $static_content,
  'school_board'    => $school_board,
  'download_icon'   => $download_icon,
) ); ?>

<!-- TODO: Next Button -->
<a href="<?php echo esc_url( add_query_arg( 'sb_id', $school_board, site_url( '/talk-to-someone/' ) ) )?>">Next</a>

</div>

<?php get_footer(); ?>
