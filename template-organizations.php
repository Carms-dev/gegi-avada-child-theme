<?php
  /* Template Name: Organizations */
  get_header();
  $sb_id = $_GET['sb_id'];
  // Validate school board presense and of type school-board
  $validated = get_post_type($sb_id) == 'school-board';
?>

<!-- TODO: AJAX Select Form to select School Board
returns school board ID -->

<!-- Static Content -->
<section>
  <h1><?php the_title(); ?></h1>
  <?php if($validated): ?>
    <h3><?php echo get_the_title($sb_id); ?></h3>
  <?php endif; ?>
</section>


<!-- Check if $sb_id is valid, display content associated to #sb_id -->
<?php if($validated) : ?>
  <!-- Display School Board Contact -->
  <?php
    // Check rows exists.
    if( have_rows('school_board_contacts', $sb_id) ):

      echo '<ul class="sb-contact">';
      // Loop through rows.
      while( have_rows('school_board_contacts', $sb_id) ) : the_row();

      // Load sub field value.
        $contact_name = get_sub_field('contact_name');
        $contact_info = get_sub_field('contact_info');

        echo "<li><a href=$policy_file>";
        echo $contact_name;
        echo $contact_info;
        echo '</a></li>';

      endwhile;

      echo '</ul>';

      else :
        // No value.
      echo '<p>No Contacts found</p>';
    endif;
  ?>

  <hr>

  <!-- Display associated Youth orgs -->
  <?php
    $youth_orgs = get_field('youth_orgs', $sb_id);
    if( $youth_orgs ): ?>
      <ul>
      <?php foreach( $youth_orgs as $org ):
        $title = get_the_title( $org );
        ?>
        <li>
            <?php echo esc_html( $title ); ?>
        </li>
      <?php endforeach; ?>
      </ul>
    <?php endif; ?>

  <hr>

  <!-- Display associated All ages orgs -->
  <?php
    $all_ages_org = get_field('all_ages_org', $sb_id);
    if( $all_ages_org ): ?>
      <ul>
      <?php foreach( $all_ages_org as $org ):
        $title = get_the_title( $org );
        ?>
        <li>
            <?php echo esc_html( $title ); ?>
        </li>
      <?php endforeach; ?>
      </ul>
    <?php endif; ?>
  <?php else : ?>
    <!-- Display Find your school board -->
    <?php echo do_shortcode('[wpdreams_ajaxsearchpro id=1]'); ?>
    <!-- Display all Youth orgs -->
    <section>
      <?php
        query_posts(array(
          'post_type' => 'organizations',
          'category_name' => 'youth',
          // 'showposts' => 10
        ) );
      ?>
      <?php while (have_posts()) : the_post();
        $website = get_field('website') == "" ? "#" : get_field('website');
      ?>

        <h2><a href="<?php echo $website; ?>"><?php the_title(); ?></a></h2>
        <p><?php echo $website; ?></p>
      <?php endwhile;?>
    </section>

    <hr>

    <!-- Display all All ages orgs -->
    <section>
      <?php
        query_posts(array(
          'post_type' => 'organizations',
          'category_name' => 'all-ages',
          // 'showposts' => 10
        ) );
      ?>
      <?php while (have_posts()) : the_post();
        $website = get_field('website') == "" ? "#" : get_field('website');
      ?>

        <h2><a href="<?php echo $website; ?>"><?php the_title(); ?></a></h2>
        <p><?php echo $website; ?></p>
      <?php endwhile;?>
    </section>
  <?php endif;  ?>



<hr>

<!-- Query All Organizations under category: general -->
<section>
  <?php
    query_posts(array(
      'post_type' => 'organizations',
      'category_name' => 'general',
      // 'showposts' => 10
    ) );
  ?>
  <?php while (have_posts()) : the_post();
    $website = get_field('website') == "" ? "#" : get_field('website');
  ?>

    <h2><a href="<?php echo $website; ?>"><?php the_title(); ?></a></h2>
    <p><?php echo $website; ?></p>
  <?php endwhile;?>
</section>

<?php get_footer(); ?>
