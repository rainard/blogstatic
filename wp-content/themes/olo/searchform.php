<div id="olosearch">
<div class="svg-search"><?php echo hjyl_get_svg( array( 'icon' => 'search') ); ?></div>
<form method="get" id="searchform" action="<?php echo esc_url(home_url()); ?>/" >
  <input type="text" class="field" id="s" name="s" value="<?php the_search_query(); ?>" placeholder="<?php _e( 'Search...Enter', 'olo'); ?>" required="required" />
  <input type="submit" class="submit" name="submit" id="searchsubmit" value="Search" />
</form>
</div>