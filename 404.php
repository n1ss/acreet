<?php get_header(); ?>
<div id="content">
	<div id="error404" class="clearfix container_24">
  	<div class="error404-num grid_12 prefix_2">404</div>
    <div class="grid_8">
    	<hgroup>
        <h1>Sorry!</h1>
        <h2>Page Not Found</h2>
      </hgroup>
      <h4>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</h4>
      <p>Please try using our search box below to look for information on the internet. </p>
      <?php get_search_form(); /* outputs the default Wordpress search form */ ?>
    </div>
	</div><!--#error404 .post-->
</div><!--#content-->
<?php get_footer(); ?>