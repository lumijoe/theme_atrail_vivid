<?php
/*
Template Name: 施工事例
*/
get_header('contribution');
?>
<!-- 施工事例一覧 -->
<div class="page-inner full-width">
    <div class="page-main" id="pg-shopDetail">
        <div class="shopList-Container" style="margin-top: 0px!important; padding-top:90px!important; ">
            <div class="shopList-head">
                <span class="title-en"></span>
                <h2 class="title" style="font-size:30px!important;">HOUSE / SHOP / OFFICE / GARAGE</h2>
            </div>
            <section class="section-contents" id="work">
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
                        <div class="works-box" style="max-width: 300px;">
                            <ul class="works-lists">
                                <?php
                                while ($the_query->have_posts()) {
                                    $the_query->the_post(); //ループのカウントアップ
                                ?>
                                    <li class="works-list" style="list-style-type: none; max-width: 300px;">
                                        <!-- パーマリンク -->
                                        <a class="works-link" href="<?php the_permalink(); ?>">
                                            <!-- 画像：カスタムフィールドwork_imgから画像のURLを取得 -->
                                            <div class="works-link-thumb">
                                                <?php
                                                $work_img = get_field('work_img');
                                                // 画像があるか確認
                                                if ($work_img) :
                                                ?>
                                                    <!-- 画像があればecho表示 -->
                                                    <img src="<?php echo esc_url($work_img); ?>" alt="" style="max-width: 300px; max-height: 220px; aspect-ratio: 300 / 220;">
                                                <?php else : ?>
                                                    <!-- 画像がなければデフォルトサムネを表示 -->
                                                    <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                                                <?php endif; ?>
                                            </div>
                                            <!-- タイトル：施工名 -->
                                            <h3 class="works-link-text" style="font-size: 16px; display: flex; padding: 5px 0px;">
                                                <?php
                                                $work_name = get_field('work_name'); // カスタムフィールド 'work_name' 
                                                if ($work_name) : // あるか確認
                                                ?>
                                                    <?php echo esc_html($work_name); ?><!-- テキスト表示 -->
                                                <?php else : ?>
                                                    <!-- 文字列がない場合はデフォルトを表示 -->
                                                <?php endif; ?>
                                            </h3>

                                            <div class="works-link-body">
                                                <!-- タクソノミーを取得する -->
                                                <!-- タクソノミーが選択されていたら実行する -->
                                                <!-- 複数のタクソノミーを配列で定義 -->
                                                <div style="display: flex; flex-wrap: wrap; gap: 5px; max-width: 300px;">
                                                    <?php
                                                    $taxonomies = ['worktype', 'styletype', 'sizetype'];
                                                    // 各タクソノミーごとのタームをループ処理
                                                    foreach ($taxonomies as $taxonomy) {
                                                        // タクソノミーのタームを取得
                                                        $terms = get_the_terms($post->ID, $taxonomy);
                                                        if ($terms) {
                                                    ?>
                                                            <ul class="works-link-category" style="display: flex; flex-direction: row; gap:5px;">
                                                                <!-- 取得できたタームの数だけループさせる -->
                                                                <?php
                                                                foreach ($terms as $term) {
                                                                ?>
                                                                    <!-- タームの名前を出力  -->
                                                                    <li style="padding: 2px 8px; border-radius: 10px; border: 1px solid #232323; width: max-content; font-size:12px;">＃<?php echo esc_html($term->name); ?>
                                                                    </li>
                                                                <?php
                                                                }
                                                                ?>
                                                            </ul>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </div> <!--ここまでdiv ulループ-->
                                            </div> <!--ここまでタクソノミーループdiv-->

                        </div>

                        <!-- <?php
                                    $category_slug = get_field('work');
                                    if ($category_slug) :
                                ?>
                            <p><?php echo esc_html($category_slug); ?></p> 
                        <?php else : ?>
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
            ?> -->
                </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>