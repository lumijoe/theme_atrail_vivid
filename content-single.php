  <div class="news">
    <p class='title'><?php the_title(); ?></p>
    <time class="time"><?php the_time('Y.m.d'); ?></time>
    <hr>
    <div class="news-body">
      <div style="padding-bottom:30px;">
        <?php the_content(); ?>
      </div>
      <?php the_post_thumbnail(); ?>
    </div>
  </div>
  <div class="more-news">
    <?php
    $next_post = get_next_post();
    $prev_post = get_previous_post();
    if ($next_post):
    ?>
      <div class="next">
        <a class="another-link" href="<?php echo get_permalink($next_post->ID); ?>">NEXT →</a>
      </div>
    <?php
    endif;
    if ($prev_post):
    ?>
      <div class="prev">
        <a class="another-link" href="<?php echo get_permalink($prev_post->ID); ?>">← PREV</a>
      </div>
    <?php endif; ?>
  </div>