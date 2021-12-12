<div class="sidebar-col">
  <div>
    <a href="<?php echo get_post_type_archive_link(get_queried_object()->post_type) ?>">Back to All Posts</a>
  </div>
  <time><?php echo date('D, M j, Y', strtotime($post->post_date));?></time>
</div>