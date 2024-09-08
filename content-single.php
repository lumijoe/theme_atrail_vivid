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

  <!-- 制作事例はこちら -->
  <div class="info-othersection-wrapper">
    <h2 class="info-othersection-title">最新の制作事例はこちら</h2>
    <div class="info-othersection-work">
      <ul>
        <?php
        $term = get_specific_posts('daily_contribution', 'event', $term, 4);
        if ($term->have_posts()):
          while ($term->have_posts()): $term->the_post();
            get_template_part('content-tax-info');
          endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </ul>
    </div>
  </div>
  <hr>

  <div class="more-news">
    <!-- prev -->
    <?php
    $next_post = get_next_post();
    $prev_post = get_previous_post();
    if ($next_post):
    ?>
      <div class="next">
        <a class="another-link" href="<?php echo get_permalink($next_post->ID); ?>">NEXT →</a>
      </div>
      <!-- backtolist -->
      <div class="next">
        <a class="another-link" href="<?php echo esc_url(home_url('/')); ?>">BACK TO LIST</a>
      </div>
      <!-- next -->
    <?php
    endif;
    if ($prev_post):
    ?>
      <div class="prev">
        <a class="another-link" href="<?php echo get_permalink($prev_post->ID); ?>">← PREV</a>
      </div>
    <?php endif; ?>
  </div>