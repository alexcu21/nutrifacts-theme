<?php

/*
* function for products queries
 */

function ap_query_projects($cant = -1){
  $args = array(
    'post_type' => 'featured_projects',
    'posts_per_page' => $cant
  );

  $projects = new WP_Query($args);

  while($projects->have_posts()): $projects->the_post();
    $start_date = get_post_meta( get_the_ID(),'start_date', true );
    $end_date = get_post_meta( get_the_ID(),'end_date', true );
    $url = get_post_meta( get_the_ID(),'url', true );
    $tech = get_post_meta( get_the_ID(),'ap_project_tech', true );
?>
  <article class="card">
    <div class="row">
      <div class="col-md-6 col-12">
        <div class="card-body">
        <a href="<?php echo get_permalink() ?>"><h3 class="card-title"><?php the_title(); ?></h3></a>
        <span class="badge badge-secondary"> <?php echo $tech; ?></span>
        <p class="card-text"><small><strong>Start date:</strong> <?php echo $start_date ?></small></p>
        <p class="card-text"><small><strong>End date:</strong> <?php echo $end_date ?></small></p>
        <a class="btn btn-primary" href="<?php echo $url ?>">Respository / Demo</a>
        <p class="card-text"><?php the_taxonomies();?></p>
        <p class="card-text"><?php the_content(); ?></p>
      </div>
      </div>
      <div class="col-md-6 col-12">

        <?php the_post_thumbnail( $size = 'post-thumbnail', $attr = 'class=img-fluid card-img-top' ) ?>
      </div>

    </div>
  </article>


  <?php
endwhile; wp_reset_postdata();
}
?>