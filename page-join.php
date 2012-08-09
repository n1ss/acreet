<?php
/**
 * Template Name: Join now
 */

get_header(); ?>

<div id="content">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>
        <?php if(has_post_thumbnail()) {
          echo '<a href="'; the_permalink(); echo '">';
          echo '<div class="featured-thumbnail"><div class="img-wrap">'; the_post_thumbnail(); echo '</div></div>';
          echo '</a>';
          }
        ?>
  
				<?php the_content(); ?>
        <div class="pagination">
          <?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
        </div><!--.pagination-->
    </div><!--#post-# .post-->

  <?php endwhile; ?>
  <?php wp_reset_query(); ?>
  
  <div class="container_24">
  	<div class="grid_24">
		<h3 class="title">Babysitters</h3>
		
			
			<?php
			  $temp = $wp_query;
			  $wp_query= null;
			  $wp_query = new WP_Query();
			  $wp_query->query("post_type=babysitters&showposts=2&paged=".$paged);
			  ?>
			  
			
			<div class="pagenavi top">
				<?php if(function_exists('wp_pagenavi')) : ?>
				<?php wp_pagenavi(); ?>
			<?php else : ?>
			  <?php if ( $wp_query->max_num_pages > 1 ) : ?>
			    <nav class="oldernewer">
				 <div class="older">
				   <?php next_posts_link('&laquo; Older Entries') ?>
				 </div><!--.older-->
				 <div class="newer">
				   <?php previous_posts_link('Newer Entries &raquo;') ?>
				 </div><!--.newer-->
			    </nav><!--.oldernewer-->
			  <?php endif; ?>
			<?php endif; ?>  
			</div>
			
			<div id="babysitters-cycle">
			<?php if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();?>
			
			<?php 
				$custom = get_post_custom($post->ID);
				$address = $custom["address"][0];
				$gender = $custom["gender"][0];
				$age = $custom["age"][0];
				$experience = $custom["experience"][0];
			?>
				
			<div class="babysitters-item">
				<?php if ( has_post_thumbnail()) { ?>
					 <?php echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; ?>
				<?php } ?> 
				<div class="extra-wrap">
					<h5><?php the_title(); ?><span class="address"><?php echo $address; ?></span></h5>
					<div class="meta">
						<span class="gender"><?php echo $gender; ?></span>
						<span class="age"><?php if ($age!="") { echo $age; echo ' Years Old'; } ?></span>
						<span class="experience">
							<?php if ($experience!="") {
								if ($experience > 1) {
									echo $experience; echo ' Years Experience';
								} else {
									echo $experience; echo ' Year Experience';
								}
							} ?>
						</span>
					</div>
						<?php the_excerpt(); ?>
						<span class="recommendations"><?php comments_popup_link('No Comments', '1 Comment', '% Comments', 'comments-link', 'Comments are closed'); ?></span> <a href="<?php the_permalink() ?>" class="link"><?php _e('View Profile','theme1336');?></a>
				</div>
			</div>	
						
			<?php endwhile; else: ?>
    <div class="no-results">
      <p><strong>There has been an error.</strong></p>
      <p>We apologize for any inconvenience, please <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>">return to the home page</a> or use the search form below.</p>
      <?php get_search_form(); ?> <!-- outputs the default Wordpress search form-->
    </div><!--noResults-->
  <?php endif; ?>
			<?php wp_reset_query(); ?>
			
			</div>
			
			<?php if(function_exists('wp_pagenavi')) : ?>
				<?php wp_pagenavi(); ?>
			<?php else : ?>
			  <?php if ( $wp_query->max_num_pages > 1 ) : ?>
			    <nav class="oldernewer">
				 <div class="older">
				   <?php next_posts_link('&laquo; Older Entries') ?>
				 </div><!--.older-->
				 <div class="newer">
				   <?php previous_posts_link('Newer Entries &raquo;') ?>
				 </div><!--.newer-->
			    </nav><!--.oldernewer-->
			  <?php endif; ?>
			<?php endif; ?>
			
			<?php $wp_query = null; $wp_query = $temp;?>
			
		
		
	</div>
  </div>
  
  
</div><!--#content-->
<?php get_footer(); ?>
