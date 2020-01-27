<?php 

    get_header();

?>

<!-- <section> products list -->

<section class="products">
	<h2 class="text-center">Products</h2>
	<div class="container">

	<div class="row">
    <?php

        if(isset($options['number_products'])){
            $number_projects = (int)$options['number_products'];
        } else{
            $number_projects = 6;
        }
        nf_query_products($number_products); 

?>
    </div>

	</div>

</section>
  <!-- </section> end section products list -->

<!-- <section> products list -->

<section class="brands">
	<h2 class="text-center">Brands</h2>
	<div class="container">

	<div class="row">
    <?php

        if(isset($options['number_brands'])){
            $number_brands = (int)$options['number_brands'];
        } else{
            $number_brands = 6;
        }
        nf_query_brands($number_brands); 

?>
    </div>

	</div>

</section>
  <!-- </section> end section products list -->

<?php 

    get_footer();

?>