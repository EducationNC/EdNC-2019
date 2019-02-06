

<section class="block perspectives">
  <div class="widget-content">
    <h2 class="header-big">Perspectives</h2>
    <div class="content-box-container">
       <?php
        // Show 3 most recent featured perspective
       $args = array(
         'posts_per_page' => $number,
         // 'post__not_in' => $featured_ids,
         'tax_query' => array(
           array(
             'taxonomy' => 'appearance',
             'field' => 'slug',
             'terms' => 'perspectives'
           )
         ),
         'meta_key' => 'updated_date',
         'orderby' => 'meta_value_num',
         'order' => 'DESC'
       );

       $perspectives = new WP_Query($args);

       if ($perspectives->have_posts()) : while ($perspectives->have_posts()) : $perspectives->the_post();

         $featured_ids[] = get_the_id();
         get_template_part('templates/layouts/block', 'perspectives');

       endwhile; endif; wp_reset_query(); ?>
    </div>
  </div>
</section>
