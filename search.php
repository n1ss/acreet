<?php get_header(); ?>
<div class="container_24">
	<div id="content" class="grid_16 <?php echo of_get_option('blog_sidebar_pos') ?>">
  <h3 class="title">Search results for: "<?php the_search_query(); ?>"</h3>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
      <div class="post-meta">
            <time datetime="<?php the_time('Y-m-d\TH:i'); ?>"><?php the_time('l, d F Y h:i'); ?></time> <span class="author">Posted by <?php the_author(); ?></span>
          </div><!--.post-meta-->
      <?php if(has_post_thumbnail()) {
	   	echo '<div class="featured-thumbnail"><div class="img-wrap">'; 
          echo '<a href="'; the_permalink(); echo '">';
          the_post_thumbnail();
          echo '</a>';
		echo '</div></div>';
          }
        ?>
      
      <div class="post-content extra-wrap">
        <div class="excerpt"><?php $excerpt = get_the_excerpt(); echo my_string_limit_words($excerpt,50);?></div>
	   <div class="post-meta-bot"><span class="p_comments"><?php comments_popup_link('No comments', 'One comment', '% comments', 'comments-link', 'Comments are closed'); ?></span> <a href="<?php the_permalink() ?>" class="link"><?php _e('Read more','theme1336');?></a></div>
      </div>
    </article>

  <?php endwhile; else: ?>
    <div class="no-results">
      <h2>No Results</h2>
      <p>Please feel free try again!</p>
      <?php get_search_form(); ?> <!-- outputs the default Wordpress search form-->
    </div><!--noResults-->
  <?php endif; ?>

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

</div><!-- #content -->
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>