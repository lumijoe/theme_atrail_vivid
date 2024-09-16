<div class="info-othersection-wrapper">
    <h2 class="info-othersection-title">最新の施工事例はこちら</h2>
    <div class="info-othersection-work">
        <ul>
            <?php
            // WP_Query で直接カスタム投稿を取得
            $args = array(
                'post_type' => 'works', // カスタム投稿タイプ名
                'posts_per_page' => 4,  // 4件取得
                'post_status' => 'publish' // 公開状態の投稿のみ取得
            );
            $term = new WP_Query($args);

            if ($term->have_posts()):
                while ($term->have_posts()): $term->the_post();
                    // 詳細部分のテンプレートを表示
                    get_template_part('content-tax-info-detail');
                endwhile;
                wp_reset_postdata(); // クエリのリセット
            else:
                echo '<p>施工事例がありません。</p>';
            endif;
            ?>
        </ul>
    </div>
</div>