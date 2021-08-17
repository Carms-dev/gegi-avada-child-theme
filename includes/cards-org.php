<!-- Template Partials used in Support Page Template -->
<?php
  query_posts(array(
    'post_type' => 'organizations',
    'category_name' => $args['category_name'],
  ) );
?>
<?php if ( have_posts() ) : ?>
  <div class="cards cards-org">
    <?php if (!empty($args['section_header'])): ?>
      <div class="card">
        <h4><?php echo $args['section_header']; ?></h4>
      </div>
    <?php endif; ?>
    <?php while (have_posts()) : the_post();
      $phone        = get_field_object('phone');
      $website      = get_field_object('website');
      $email        = get_field_object('email');
      $address      = get_field_object('address');
      $description  = get_field('description');
      $age_range    = get_field('age_range');
    ?>
      <div class="card card-org">
        <?php if (!empty($age_range)): ?>
          <small><?php echo $age_range; ?></small>
        <?php endif; ?>
        <h4><?php the_title(); ?></h4>

        <?php if (!empty($description)): ?>
          <p><?php echo $description; ?></p>
        <?php endif; ?>

        <div>
          <?php if (!empty($website['value'])): ?>
            <a href="<?php echo $website['value']; ?>"><?php echo $website['label']; ?></a>
          <?php endif; ?>
          <?php if (!empty($phone['value'])): ?>
            <a href="tel:<?php echo $phone['value']; ?>"><?php echo $phone['label']; ?></a>
          <?php endif; ?>
          <?php if (!empty($email['value'])): ?>
            <a href="mailto:<?php echo $email['value']; ?>"><?php echo $email['label']; ?></a>
          <?php endif; ?>
        </div>
      </div>
    <?php endwhile;?>
  </div>
<?php endif?>
