<?php
/*
Template Name: 施工事例
*/
get_header('contribution');
?>
<div class="page-inner full-width">
  <div class="page-main" id="pg-shopDetail">
    
    <div class="shopList-Container" style="margin-top: 0px!important; padding-top:90px!important; ">
      <div class="shopList-head">
        <span class="title-en"></span>
        <h2 class="title" style="font-size:30px!important;">HOUSE / SHOP / OFFICE / GARAGE</h2>
      </div>
      <section class="section-contents" id="contribution">
  <div class="wrapper">
  <?php
        $args = array(
            'post_type' => 'works', //投稿タイプのスラッグを指定 
            'post_status' => 'publish', //公開済みの投稿を指定
            'posts_per_page' => -1, //投稿件数の指定(-1は全件取得)
        );
        // 配列にした記事を取得
        $the_query = new WP_Query($args); //記事を取得
        if ($the_query->have_posts()) {   //記事が取得できたか？
        ?>
         <div class="works-box">
                <ul class="works-lists">
                    <?php
                    while ($the_query->have_posts()) {
                        $the_query->the_post(); //ループのカウントアップ
                    ?>
                        <li class="works-list">
                            <a class="works-link" href="<?php the_permalink();//記事リンク ?>">

                                <div class="works-link-thumb">
                                    <?php 
                                    $work_img = get_field('work_img'); // カスタムフィールド 'work_img' から画像のURLを取得
                                    if( $work_img ) : // 画像があるか確認
                                    ?>
                                        <img src="<?php echo esc_url($work_img); ?>" alt="">
                                    <?php else : ?>
                                        <img src="<?php the_post_thumbnail_url(); ?>" alt=""> <!-- 画像がない場合はデフォルトのサムネイルを表示 -->
                                    <?php endif; ?>
                                </div>

                                <div class="works-link-b0dy">
                                    <h3 class="works-link-title">
                                        <?php 
                                        $work_day = get_field('work_day'); // カスタムフィールド 'work_day' 
                                        if( $work_day ) : // あるか確認
                                        ?>
                                            <?php echo esc_html($work_day); ?><!-- テキスト表示 -->
                                        <?php else : ?>
                                            制作実績 <!-- 文字列がない場合はデフォルトを表示 -->
                                        <?php endif; ?>
                                    </h3>

                                    <p class="works-link-text">
                                    <?php 
                                        $work_name = get_field('work_name'); // カスタムフィールド 'work_name' 
                                        if( $work_name ) : // あるか確認
                                        ?>
                                            <?php echo esc_html($work_name); ?><!-- テキスト表示 -->
                                        <?php else : ?>
                                            seisakumei <!-- 文字列がない場合はデフォルトを表示 -->
                                        <?php endif; ?>
                                    </p>
                                    <p class="works-link-text">
                                    <?php 
                                        $work_category = get_field('work_category'); // カスタムフィールド 'work_name' 
                                        if( $work_category ) : // あるか確認
                                        ?>
                                            <?php echo esc_html($work_category); ?><!-- テキスト表示 -->
                                        <?php else : ?>
                                            seisakumei <!-- 文字列がない場合はデフォルトを表示 -->
                                        <?php endif; ?>
                                    </p>
                                    <p class="works-link-text">
                                    <?php 
                                        $work_strong = get_field('work_strong'); // カスタムフィールド 'work_name' 
                                        if( $work_strong ) : // あるか確認
                                        ?>
                                            <?php echo esc_html($work_strong); ?><!-- テキスト表示 -->
                                        <?php else : ?>
                                            seisakumei <!-- 文字列がない場合はデフォルトを表示 -->
                                        <?php endif; ?>
                                    </p>
                                    <p class="works-link-text">
                                    <?php 
                                        $work_size = get_field('work_size'); // カスタムフィールド 'work_name' 
                                        if( $work_size ) : // あるか確認
                                        ?>
                                            <?php echo esc_html($work_size); ?><!-- テキスト表示 -->
                                        <?php else : ?>
                                            seisakumei <!-- 文字列がない場合はデフォルトを表示 -->
                                        <?php endif; ?>
                                    </p>
                                    <p class="works-link-text">
                                    <?php 
                                        $work_needs = get_field('work_needs'); // カスタムフィールド 'work_name' 
                                        if( $work_needs ) : // あるか確認
                                        ?>
                                            <?php echo esc_html($work_needs); ?><!-- テキスト表示 -->
                                        <?php else : ?>
                                            seisakumei <!-- 文字列がない場合はデフォルトを表示 -->
                                        <?php endif; ?>
                                    </p>
                                </div>

                                <?php 
$category_slug = get_field('work'); // ACFのフィールド名 'work'
if( $category_slug ) : 
?>
    <p><?php echo esc_html( $category_slug ); ?></p> <!-- スラッグを表示 -->
<?php else : ?>
    <p>デフォルトカテゴリ</p> <!-- デフォルトの文字列 -->
<?php endif; ?>

                            </a>
                        </li>
                    <?php
                    }
                    wp_reset_postdata();
                    ?>
                </ul>
            </div>
        <?php
        }
        ?>



    
    
    </div>


    </div>
  </div>
</div>
<!-- test -->
 <h1>ここから上がテストです</h1>
<div class="page-inner full-width">
  <div class="page-main" id="pg-shopDetail">
    
    <div class="shopList-Container" style="margin-top: 0px!important; padding-top:90px!important; ">
      <div class="shopList-head">
        <span class="title-en"></span>
        <h2 class="title" style="font-size:30px!important;">HOUSE / SHOP / OFFICE / GARAGE</h2>
      </div>
      <section class="section-contents" id="contribution">
  <div class="wrapper">
    <?php
    $contribution_obj = get_page_by_path('contribution');
    $post = $contribution_obj;
    setup_postdata($post);
    $contribution_title = get_the_title();
    ?>
    <?php wp_reset_postdata(); ?>
    <div class="articles">
      <?php
      $contribution_pages = get_specific_posts('daily_contribution', 'event', '');
      if ($contribution_pages->have_posts()) :
        while ($contribution_pages->have_posts()) : $contribution_pages->the_post();
      ?>
          <article class="article-card">
            <a class="card-link" href="<?php the_permalink(); ?>">
              <div class="card-inner">
                <div class="card-image"><?php the_post_thumbnail(''); ?></div>
                <!-- <div class="card-image"><?php the_post_thumbnail('front-contribution'); ?></div> -->
                <div class="card-body">
                  <p class="title"><?php the_title(); ?></p>
                  <div class="buttonBox">
                    <button type="button" class="seeDetail">詳しくは→</button>
                  </div>
                </div>
              </div>
            </a>
          </article>
      <?php
        endwhile;
        wp_reset_postdata();
      endif;
      ?>
    </div>


    </div>
  </div>
</div>
<?php get_footer(); ?>