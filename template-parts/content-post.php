<?php $html = nf_featured_image( get_the_ID() );
     // $html[0] retorna el HTML
     // $html[1] retornar si la imagen existe
     echo $html[0];
?>

<main class="container">
     <div class="row justify-content-center">
          <div class="py-3 px-5 main-content bg-light <?php echo $html[1] ? 'col-md-8 featured' : 'col-md-12 no-featured';  ?>">


               <h1 class="text-center my-5 separator"><?php the_title(); ?></h1>
               <?php get_template_part('template-parts/meta', 'post'); ?>
               <?php the_content(); ?>
          </div>
     </div><!--.row-->
</main>