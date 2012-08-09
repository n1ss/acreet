<?php get_header(); ?>
<div class="container_24">
	<div id="content" class="grid_16 <?php echo of_get_option('blog_sidebar_pos') ?>">
	<?php
    if(isset($_GET['author_name'])) :
      $curauth = get_userdatabylogin($author_name);
      else :
      $curauth = get_userdata(intval($author));
    endif;
  ?>
  <div class="author-info">
    <h3 class="title">About: <span><?php echo $curauth->display_name; ?></span></h3>
    <p class="avatar">
      <?php if(function_exists('get_avatar')) { echo get_avatar( $curauth->user_email, $size = '120' ); } /* Displays the Gravatar based on the author's email address. Visit Gravatar.com for info on Gravatars */ ?>
    </p>
    
    <?php if($curauth->description !="") { /* Displays the author's description from their Wordpress profile */ ?>
      <p><?php echo $curauth->description; ?></p>
    <?php } ?>
  </div><!--.author-->
  <div id="recent-author-posts">
    <h3 class="title">Recent Posts by <?php echo $curauth->display_name; ?></h3>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); /* Displays the most recent posts by that author. Note that this does not display custom content types */ ?>
      <?php static $count = 0;
        if ($count == "5") // Number of posts to display
                { break; }
        else { ?>
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
      <?php $count++; } ?>
      <?php endwhile; else: ?>
        <p>
          No posts by <?php echo $curauth->display_name; ?> yet.
        </p>
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
  </div><!--#recentPosts-->
  <div id="recent-author-comments">
    <h3 class="title">Recent Comments by <?php echo $curauth->display_name; ?></h3>
      <?php
        $number=5; // number of recent comments to display
        $comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_approved = '1' and comment_author_email='$curauth->user_email' ORDER BY comment_date_gmt DESC LIMIT $number");
      ?>
      <ul>
        <?php
          if ( $comments ) : foreach ( (array) $comments as $comment) :
          echo  '<li class="recentcomments">' . sprintf(__('%1$s on %2$s'), get_comment_date(), '<a href="'. get_comment_link($comment->comment_ID) . '">' . get_the_title($comment->comment_post_ID) . '</a>') . '</li>';
        endforeach; else: ?>
                  <p>
                    No comments by <?php echo $curauth->display_name; ?> yet.
                  </p>
        <?php endif; ?>
            </ul>
  </div><!--#recentAuthorComments-->

  
</div><!--#content-->
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>