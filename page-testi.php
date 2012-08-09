<?php
/**
 * Template Name: Testimonials
 */

get_header(); ?>
<div class="container_24">
	<div id="content" class="grid_24">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	   <h3 class="title"><?php the_title(); ?>
        </h3>
	   <div id="page-content"><?php the_content(); ?>
        </div>
	   <?php endwhile; else: ?>
	   <div class="no-results">
	      <p><strong>There has been an error.</strong></p>
           <p>We apologize for any inconvenience, please <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>">return to the home page</a> or use the search form below.</p>
           <?php get_search_form(); ?> <!-- outputs the default Wordpress search form-->
        </div>
	   <!--noResults-->
        <?php endif; ?>
	   <?php
      $temp = $wp_query;
      $wp_query= null;
      $wp_query = new WP_Query();
      $wp_query->query('post_type=testi&showposts=8&paged='.$paged);
      ?>
	   <?php if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
	   <?php 
				$custom = get_post_custom($post->ID);
				$testiname = $custom["testimonial-name"][0];
      $testitype = $custom["testimonial-type"][0];
	 $testiaddress = $custom["testimonial-address"][0];
				?>
        <article id="post-<?php the_ID(); ?>" class="testimonial">
           <div class="post-content">
              <?php echo '<div class="testi-pic">'; the_post_thumbnail('testi-thumbnail'); echo '</div>'; ?>
              <?php the_content(); ?>
              <div class="name-testi"><span class="user"><?php echo $testiname; ?></span><?php if ($testitype!="") echo ', '; ?><span class="type"><?php echo $testitype; ?></span><?php if ($testiaddress!="") echo ', '; ?> <?php echo $testiaddress; ?></div>           </div>
             </article>
	   
        <?php endwhile; else: ?>
        <div class="no-results">
           <p><strong>There has been an error.</strong></p>
           <p>We apologize for any inconvenience, please <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>">return to the home page</a> or use the search form below.</p>
           <?php get_search_form(); ?> <!-- outputs the default Wordpress search form-->
          </div>
	   <!--noResults-->
        <?php endif; ?>
	   
        <?php if ( $wp_query->max_num_pages > 1 ) : ?>
        <nav class="oldernewer">
           <div class="older">
              <?php next_posts_link('&laquo; Older Entries') ?>
           </div><!--.older-->
           <div class="newer">
              <?php previous_posts_link('Newer Entries &raquo;') ?>
           </div><!--.newer-->
          </nav>
	   <!--.oldernewer-->
        <?php endif; ?>
	   
        <?php $wp_query = null; $wp_query = $temp;?>
    </div>
</div>	
<?php get_footer(); ?>