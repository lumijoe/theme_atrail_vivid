<?php get_header(); ?>
<!-- nav -->
<!-- <div class="site-main">
  <div>
    <nav class="global-nav nav-list">
      <?php
      wp_nav_menu([
        'theme_location' => 'place_global',
        'container' => false,
      ]);
      ?>
    </nav>
  </div> -->




<!-- ------------------------------
//////////// 事業案内 service
------------------------------- -->
<section class="section-contents" id="shop">
  <div class="wrapper">


    <!----------------------------
    /////// 使用するページの要素を取得するphp
    ----------------------------->
    <?php
    // 固定ページを表示させる（引数：ページのスラッグ）
    $shop_obj = get_page_by_path('service');
    // 投稿記事
    $post = $shop_obj;
    // 固定ページの投稿記事を使用する宣言（引数：関数定義）
    setup_postdata($post);
    // タイトルを取得
    $shop_title = get_the_title();
    ?>
    <!----------------------------
    // 取得したphpなどのhtml予約
    ----------------------------->
    <!-- 英語のタイトル -->
    <span class="section-title-en"><?php the_field('english_title'); ?></span>
    <!-- ❶タイトル -->
    <h2 class="section-title"><?php the_title(); ?></h2>
    <!-- 本文 -->
    <p class="section-lead"><?php echo get_the_excerpt(); ?></p>
    <!-- ❸投稿表示ループ終わりの宣言 -->
    <?php wp_reset_postdata(); ?>




    <ul class="shops">
      <!----------------------------
      /////// 使用するページの要素を取得するphp
      ----------------------------->
      <?php
      // 記事が続く限り、でも４つまで
      $shop_pages = get_child_pages(4, $shop_obj->ID);
      if ($shop_pages->have_posts()) :
        while ($shop_pages->have_posts()) : $shop_pages->the_post();
      ?>
          <li class="shops-item">
            <a class="shop-link" href="<?php the_permalink(); ?>">
              <div class="shop-image"><?php the_post_thumbnail('common'); ?></div>
              <div class="shop-body">
                <!-- ❶タイトル -->
                <p class="name"><?php the_title(); ?></p>
                <!-- 引数：❷ACFのフィールド名 -->
                <!-- <p class="location"><?php the_field('location'); ?></p> -->
                <p><?php the_field('location'); ?></p>
                <div class="buttonBox">
                  <button type="button" class="seeDetail">詳しくは→</button>
                </div>
              </div>
            </a>
          </li>
          <!-- ❸投稿表示ループ終わりの宣言 -->
      <?php
        endwhile;
        wp_reset_postdata();
      endif;
      ?>
    </ul> <!--ulここまで-->
    <div class="section-buttons">
      <button type="button" class="button button-ghost" onclick="javascript:location.href = '<?php echo esc_url(home_url('service')); ?>';">
        <?php echo $shop_title; ?>一覧を見る
      </button>
    </div>
  </div>
</section>




<!----------------------------------
        gallery
----------------------------------->
<section class="l-gallery-section">
  <ul class="l-section-inner l-section-inner-plf--20px l-gallery-section-inner">
    <li class="l-gallery">
      <img src="https://atrail.co.jp/wp-content/uploads/images/container-01@2x.jpg" alt="" srcset="">
      <p class="sp-pb50">私たちは、暮らしに自由を感じ、理想の住まいを見つけるお手伝いを致します。
        自由な発見、広がる空間、理想の暮らし。それが私たちの約束です。豊富な物件ラインナップと専門的な知識を持ち、お客様の夢を形にします。自分らしいライフスタイルを見つけましょう。
        ご要望に合わせて柔軟なプランを提供し、理想の住まいに出会えるよう努めます。未来の住まいに、自由な可能性を感じさせる物件がきっと見つかります。新しい一歩を踏み出すなら、私たちにおかませください。自由な未来、理想の住まいを一緒に見つけましょう。「暮らしに自由を」、それが私たちのコミットメントです。</p>
    </li>
    <li class="l-gallery">
      <img src="https://atrail.co.jp/wp-content/uploads/images/container-02@2x.jpg" alt="" srcset="">
      <p class="sp-pb50">コンテナハウスは、船舶やトラックで輸送されるためのコンテナを再利用して建設された住宅や建築物の形態です。持続可能でコスト効率が高く、迅速に建設できる選択肢として注目されています。
        1. コスト効率 : 新しい建材を使用するよりも比較的低コストです。
        2. 迅速な建設 : 短期間で住宅や建築物を完成させることが可能です。 􀀃. モジュール性と拡張性 : コンテナは標準化されておりモジュールとして簡単に組み立てられ、柔軟なプランニングが可能です。
        3. 耐久性と強度 : コンテナは非常に強固で耐久性があります。これによ
        り、地震や自然災害に対する強い耐性を持っています。
        4. 移動可能性 : コンテナハウスは基本的に移動可能で、様々な場所で
        利用でき、移動型住宅や仮設施設としての利用が可能です。
        5. 現代的なデザイン : モダンで洗練された外観を持って独自のスタイリッシュなデザインを実現できます。
      </p>
    </li>
    <li class="l-gallery">
      <img src="https://atrail.co.jp/wp-content/uploads/images/container-01@2x.jpg" alt="" srcset="">
      <p class="sp-pb50">私たちは、暮らしに自由を感じ、理想の住まいを見つけるお手伝いを致します。
        自由な発見、広がる空間、理想の暮らし。それが私たちの約束です。豊富な物件ラインナップと専門的な知識を持ち、お客様の夢を形にします。自分らしいライフスタイルを見つけましょう。
        ご要望に合わせて柔軟なプランを提供し、理想の住まいに出会えるよう努めます。未来の住まいに、自由な可能性を感じさせる物件がきっと見つかります。新しい一歩を踏み出すなら、私たちにお任せください。自由な未来、理想の住まいを一緒に見つけましょう。「暮らしに自由を」、それが私たちのコミットメントです。</p>
    </li>
    <li class="l-gallery">
      <img src="https://atrail.co.jp/wp-content/uploads/images/container-02@2x.jpg" alt="" srcset="">
      <p class="sp-pb50">コンテナハウスは、船舶やトラックで輸送されるためのコンテナを再利用して建設された住宅や建築物の形態です。持続可能でコスト効率が高く、迅速に建設できる選択肢として注目されています。
        1. コスト効率 : 新しい建材を使用するよりも比較的低コストです。
        2. 迅速な建設 : 短期間で住宅や建築物を完成させることが可能です。 􀀃. モジュール性と拡張性 : コンテナは標準化されておりモジュールとして簡単に組み立てられ、柔軟なプランニングが可能です。
        3. 耐久性と強度 : コンテナは非常に強固で耐久性があります。これによ
        り、地震や自然災害に対する強い耐性を持っています。
        4. 移動可能性 : コンテナハウスは基本的に移動可能で、様々な場所で
        利用でき、移動型住宅や仮設施設としての利用が可能です。
        5. 現代的なデザイン : モダンで洗練された外観を持って独自のスタイリッシュなデザインを実現できます。
      </p>
    </li>
  </ul>
</section>

<!-- 施工事例ここから -->
<section class="section-contents" id="contribution">
  <div class="wrapper">
    <?php
    $contribution_obj = get_page_by_path('work');
    $post = $contribution_obj;
    setup_postdata($post);
    $contribution_title = get_the_title();
    ?>
    <span class="section-title-en"><?php the_field('english_title'); ?></span>
    <h2 class="section-title"><?php the_title(); ?></h2>
    <p class="section-lead"><?php echo get_the_excerpt(); ?></p>
    <?php wp_reset_postdata(); ?>
    <div class="articles">
      <?php
      $args = array(
        'post_type' => 'works',
        'post_status' => 'publish',
        'posts_per_page' => 3,
      );

      $the_query = new WP_Query($args);
      if ($the_query->have_posts()) :
        while ($the_query->have_posts()) : $the_query->the_post();
      ?>
          <article class="article-card">
            <a class="card-link" href="<?php the_permalink(); ?>">
              <div class="card-inner">
                <div class="card-image">
                  <?php
                  $work_img = get_field('work_img');
                  if ($work_img) :
                  ?>
                    <img src="<?php echo esc_url($work_img); ?>" alt="" style="height: 445px;">
                  <?php endif; ?>
                </div>
                <div class="card-body">
                  <p class="title" style="font-weight: bold; padding-bottom: 10px;"><?php the_title(); ?></p>
                  <div style="display: flex; flex-wrap: wrap; gap: 5px; max-width: 300px;">
                    <?php
                    $taxonomies = ['worktype', 'styletype', 'sizetype'];
                    foreach ($taxonomies as $taxonomy) {
                      $terms = get_the_terms($post->ID, $taxonomy);
                      if ($terms) :
                    ?>
                        <ul class="works-link-category" style="display: flex;  flex-direction: row; gap:5px; flex-wrap: wrap;">
                          <?php
                          foreach ($terms as $term) :
                          ?>
                            <li style="padding: 2px 8px; border-radius: 10px; border: 1px solid #232323; width: max-content; font-size:12px;">
                              ＃<?php echo esc_html($term->name); ?>
                            </li>
                          <?php
                          endforeach;
                          ?>
                        </ul>
                    <?php
                      endif;
                    }
                    ?>
                  </div><!-- タクソノミー終了 -->
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


    <!-- 施工事例 -->
    <div class="section-buttons">
      <button type="button" class="button button-ghost" onclick="javascript:location.href = '<?php echo esc_url(home_url('work')); ?>';">
        <?php echo $contribution_title; ?>一覧を見る
      </button>
    </div>
  </div>
</section>
<!-- cta -->
<section class="l-cta">
  <button class="p-cta-btn">
    <div style="display:flex; flex-direction: row; justify-content:center; align-items:center; gap: 5px;">
      <img src="https://atrail.co.jp/wp-content/uploads/images/svg/icon-mail-circle.svg" alt="" srcset="" class="img-mail">
      <a href="https://atrail.co.jp/contact/" style="font-size: 16px;">お問い合わせ</a>
  </button>
  </div>
</section>


<!-- お知らせ -->
<section class="section-contents" id="info">
  <div class="wrapper maxw600">
    <?php $term_obj = get_term_by('slug', 'info', 'category'); ?>
    <span class="section-title-en"><?php the_field('english_title'); ?></span>
    <h2 class="section-title"><?php echo $term_obj->name; ?></h2>
    <p class="section-lead"><?php echo $term_obj->description; ?></p>

    <div class="page-inner full-width">
      <div class="page-main" id="pg-news">
        <div class="main-container">
          <div class="main-wrapper">
            <ul class="newsLists">
              <?php
              // 投稿を4件取得するクエリ
              $args = array(
                'post_type'      => 'post', // 投稿タイプ
                'posts_per_page' => 4,      // 取得する投稿の数
                'orderby'        => 'date',      // 日付順で並び替え
                'order'          => 'DESC',
              );
              $news_posts = new WP_Query($args);

              if ($news_posts->have_posts()):
                while ($news_posts->have_posts()): $news_posts->the_post();
              ?>
                  <li class="news-list">
                    <a class="news-link" href="<?php the_permalink(); ?>">
                      <span class="news-body release" style="color: #949494;"><?php the_time('Y.m.d'); ?></span>
                      <span class="news-category <?php
                                                  $categories = get_the_category();
                                                  if (! empty($categories)) {
                                                    foreach ($categories as $category) {
                                                      echo esc_html($category->slug) . ' '; // 全てのカテゴリスラッグをクラスに追加
                                                    }
                                                  }
                                                  ?>">
                        <?php
                        if (! empty($categories)) {
                          foreach ($categories as $category) {
                            echo esc_html($category->name) . ' '; // カテゴリ名をスペース区切りで表示
                          }
                        }
                        ?>
                      </span>
                      <p class="title"><?php the_title(); ?></p>
                      </span>
                    </a>
                  </li>
              <?php
                endwhile;
                wp_reset_postdata();
              endif;
              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="pager">
      <ul class="pagerList">
        <?php
        // ページナビゲーションの表示
        page_navi();
        ?>
      </ul>
    </div>
  </div>

  <div class="section-buttons">
    <button type="button" class="button button-ghost" onclick="javascript:location.href = '<?php echo esc_url(get_term_link($term_obj)); ?>';">
      <?php echo $term_obj->name; ?>一覧を見る
    </button>
  </div>
</section>


<!-- 会社概要 -->
<!----------------------------------
        company
----------------------------------->
<section class="section-contents" id="company">
  <div class="wrapper maxw600">
    <span class="section-title-en"></span>
    <h2 class="section-title" style="margin-bottom:30px;">会社案内</h2>
    <div class="l-company-table">
      <p>長年の住宅メーカーでのノウハウを活かし<br>より沢山の人へ「暮らしを自由に」を届けます。<br>コンテナの特徴を活かした自由な発想のハウスをはじめ<br>ショップ、オフィス、ガレージなど、お客様のこだわりの空間づくりを支えています。</p>
    </div>
    <div class="section-buttons">
      <button type="button" class="button button-ghost" onclick="javascript:location.href = '<?php echo esc_url(home_url('company')); ?>';">
        会社案内一覧を見る
      </button>
    </div>
  </div>
</section>
</div>


<?php get_footer(); ?>