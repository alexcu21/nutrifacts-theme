<?php

/*
* function for products queries
 */

function nf_query_products($cant){
  $args = array(
    'post_type' => 'products',
    'posts_per_page' => $cant,
  );

  $products = new WP_Query($args);

  while($products->have_posts()): $products->the_post();
   
?>
    <div class="col-md-4 col-12">
        <article class="card" style="width: 18rem;">
                    
                        <?php the_post_thumbnail( $size = 'post-thumbnail', $attr = 'class=img-fluid card-img-top' ) ?>
        
                        <div class="card-body">
                            <a href="<?php echo get_permalink() ?>"><h3 class="card-title"><?php the_title(); ?></h3></a>
                            <p class="card-text"><?php the_taxonomies();?></p>
                            <p class="card-text"><?php the_content(); ?></p>
                        </div>
        
        </article>
    </div>

  <?php
endwhile; wp_reset_postdata();
}


/*
* function for brand queries
 */

function nf_query_brands($cant){
    $args = array(
      'post_type' => 'brands',
      'posts_per_page' => $cant,
    );
  
    $brands = new WP_Query($args);
  
    while($brands->have_posts()): $brands->the_post();
     
  ?>
      <div class="col-md-4 col-12">
          <article class="card" style="width: 18rem;">
                      
                          <?php the_post_thumbnail( $size = 'post-thumbnail', $attr = 'class=img-fluid card-img-top' ) ?>
          
                          <div class="card-body">
                              <a href="<?php echo get_permalink() ?>"><h3 class="card-title"><?php the_title(); ?></h3></a>
                              <p class="card-text"><?php the_content(); ?></p>
                          </div>
          
          </article>
      </div>
  
    <?php
  endwhile; wp_reset_postdata();
  }

?>