<!-- Template Partials used in Support Page Template -->
<?php
  $orgs = get_field($args['field_name'], $args['school_board']);
  if( $orgs ): ?>
  <div class="cards cards-org">
    <?php if (!empty($args['section_header'])): ?>
      <div class="card">
        <h4><?php echo $args['section_header']; ?></h4>
        <pre><?php echo get_the_title($args['school_board']); ?></pre>
      </div>
    <?php endif; ?>
    <?php foreach( $orgs as $org ):
      $title        = get_the_title( $org );
      $phone        = get_field_object('phone', $org->ID );
      $website      = get_field_object('website', $org->ID );
      $email        = get_field_object('email', $org->ID );
      $address      = get_field_object('address', $org->ID );
      $description  = get_field('description', $org->ID );
      $age_range    = get_field('age_range', $org->ID );
    ?>

      <div class="card card-org">
        <?php if (!empty($age_range)): ?>
          <small><?php echo $age_range; ?></small>
        <?php endif; ?>
        <h4><?php echo $title; ?></h4>

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

    <?php endforeach; ?>
  </div>
<?php endif; ?>
