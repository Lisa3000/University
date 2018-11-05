<?php get_header(); ?>

<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/studyhall.jpg'); ?>);"></div>
    <div class="page-banner__content container t-center c-white">
      <h1 class="headline headline--large">Welcome to Fictional University</h1>
      
      <h3 class="headline headline--medium">Where will you go?</h3>
      <a href="<?php echo get_post_type_archive_link('program'); ?>" class="btn btn--large btn--yellow">Find Your Major</a>
    </div>
  </div>


  <section class="flex-container container t-center">
      <div class="flex-item">
        <a href="#">
        <i class="fa fa-home fa-3x" aria-hidden="true"></i>
        <h3>Housing</h3></a>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, reiciendis!</p>
      </div>
      <div class="flex-item">
      <a href="#">
      <i class="fa fa-graduation-cap fa-3x" aria-hidden="true"></i>
        <h3>Student Life</h3></a>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, reiciendis!</p>
      </div>
      <div class="flex-item">
      <a href="#">
        <i class="fa fa-briefcase fa-3x"></i>
        <h3>Student Employment</h3></a>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, reiciendis!</p>
      </div>
  </section>
  
  <section class="flex-container container">
    <div class="flex-item">
      <h2 class="headline headline--small-plus t-center">Upcoming Events</h2>
     
     <?php
        $today = date('Ymd');
        $homepageEvents = new WP_Query(array(
          'posts_per_page' => 2,
          'post_type' => 'event',
          'meta_key' => 'event_date',
          'orderby' => 'meta_value_num',
          'order' => 'ASC',
          'meta_query' => array(
            array(
              'key' => 'event_date',
              'compare' => '>=',
              'value' => $today,
              'type' => 'numeric'
            )
          )
        ));

        while($homepageEvents->have_posts()) {
          $homepageEvents->the_post(); 
          get_template_part('template-parts/content', 'event');
        }
      ?>   
      
      <p class="t-center no-margin"><a href="<?php echo get_post_type_archive_link('event'); ?>" class="btn btn--yellow">View All Events</a></p>

      </div>
      <div class="flex-item"> 
         <h2 class="headline headline--small-plus t-center">From Our Blogs</h2>
         <?php 
          // CUSTOM QUERY OBJECT
          $homepagePosts = new WP_Query(array(
            'posts_per_page' => 2
          ));

          while ($homepagePosts->have_posts()) {
            $homepagePosts->the_post(); ?>
 
            <div class="event-summary">
              <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
                <span class="event-summary__month"><?php the_time('M'); ?></span>
                <span class="event-summary__day"><?php the_time('d'); ?></span>  
              </a>
              <div class="event-summary__content">
                <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                <p><?php if (has_excerpt()) {
                    echo get_the_excerpt();
                } else {
                  echo wp_trim_words(get_the_content(), 18);
                } ?><a href="<?php the_permalink(); ?>" class="nu gray">Read more</a></p>
              </div>
            </div>

          <?php } wp_reset_postdata();
         ?>   
        <p class="t-center no-margin"><a href="<?php echo site_url('/blog'); ?>" class="btn btn--yellow">View All Blog Posts</a></p>
      </div>
  </section>
 
  <div class="hero-slider">
  <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/bus.jpg'); ?>);">
    <div class="hero-slider__interior container">
      <div class="hero-slider__overlay">
        <h2 class="headline headline--medium t-center">Free Transportation</h2>
        <p class="t-center">All students have free unlimited bus fare.</p>
        <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
      </div>
    </div>
  </div>
  <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/sunnygrad.jpg'); ?>);">
    <div class="hero-slider__interior container">
      <div class="hero-slider__overlay">
        <h2 class="headline headline--medium t-center">Financial Aid</h2>
        <p class="t-center">Our dentistry program recommends eating apples.</p>
        <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
      </div>
    </div>
  </div>
  <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/cafeteria.jpg'); ?>);">
    <div class="hero-slider__interior container">
      <div class="hero-slider__overlay">
        <h2 class="headline headline--medium t-center">Meal Plans</h2>
        <p class="t-center">Fictional University offers meal plans for those in need.</p>
        <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
