  <div class="news">
    <p class='title'><?php the_title(); ?></p>
    <time class="time"><?php the_time('Y.m.d'); ?></time>
    <hr>
    <div class="news-body">
      <div style="padding-bottom:30px;">
        <?php the_content(); ?>
        <p class="works-link-text" style="font-size: 16px; display: flex; padding: 5px 0px;">
          <?php
          $work_strong = get_field('work_strong');
          if ($work_strong) :
            echo esc_html($work_strong);
          endif;
          ?>
        </p>
      </div>
      <?php the_post_thumbnail(); ?>
      <?php
      $work_img = get_field('work_img');
      if ($work_img) :
      ?>
        <img src="<?php echo esc_url($work_img); ?>" alt="" style="aspect-ratio: 2560 / 1690;">
      <?php endif; ?>
    </div>
  </div>
  <div>
    <?php get_template_part('content-tax-info'); ?>
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
        <a class="another-link" href="<?php echo get_permalink($next_post->ID); ?>">NEXT<span class="arrow-next"> ></span></a>
      </div>
    <?php
    endif;
    if ($prev_post):
    ?>
      <div class="prev">
        <a class="another-link" href="<?php echo get_permalink($prev_post->ID); ?>"><span class="arrow-prev">
            < </span>PREV</a>
      </div>

    <?php endif; ?>
    <div class="backtolist">
      <?php
      // タイトルを取得
      $main_title = get_main_title();

      // デフォルトURLを設定
      $back_to_list_url = esc_url(home_url('/'));

      // タイトルに基づいてURLを変更
      if ($main_title == 'お知らせ') {
        $back_to_list_url = esc_url(home_url('archives/category/info'));
      } elseif ($main_title == 'コンテナハウス' || $main_title == 'コンテナオフィス' || $main_title == 'コンテナガレージ' || $main_title == 'コンテナショップ') {
        $back_to_list_url = esc_url(home_url('/work'));
      } elseif (is_singular('works')) {
        // 施工事例のカスタム投稿タイプの場合
        $back_to_list_url = esc_url(home_url('/work'));
      }
      ?>

      <a class="another-link" href="<?php echo $back_to_list_url; ?>">BACK TO LIST</a>
    </div>
  </div>