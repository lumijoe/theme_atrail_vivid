<?php
/*
Template Name: 施工事例
*/
get_header('contribution');
?>
<div class="page-inner full-width">
    <div class="page-main" id="pg-shopDetail">
        <div class="shopList-Container" style="margin-top: 0px!important; padding-top:90px!important;">
            <div class="shopList-head">
                <span class="title-en"></span>
                <h2 class="title" style="font-size:30px!important;">HOUSE / SHOP / OFFICE / GARAGE</h2>
            </div>
            <!-- 事例セクション -->
            <section class="section-contents" id="work">
                <ul class="works-box" style="display:flex; justify-content: center; align-items: flex-start; flex-direction: row; flex-wrap: wrap; gap: 20px;">
                    <!-- <ul class="works-box" style="max-width: 300px;"> -->
                    <?php
                    $args = array(
                        'post_type' => 'works',
                        'post_status' => 'publish',
                        'posts_per_page' => -1,
                    );

                    $the_query = new WP_Query($args);
                    if ($the_query->have_posts()) :
                        while ($the_query->have_posts()) : $the_query->the_post();
                    ?>
                            <li class="works-lists">
                                <div class="works-list" style="list-style-type: none; max-width: 300px;">
                                    <a class="works-link" href="<?php the_permalink(); ?>">
                                        <!-- 画像 -->
                                        <?php
                                        $work_img = get_field('work_img');
                                        if ($work_img) :
                                        ?>
                                            <img src="<?php echo esc_url($work_img); ?>" alt="" style="max-width: 300px; max-height: 220px; aspect-ratio: 300 / 220;">
                                        <?php endif; ?>
                                        <!-- 施工名 -->
                                        <h3 class="works-link-text" style="font-size: 16px; display: flex; padding: 5px 0px;">
                                            <?php
                                            $work_name = get_field('work_name');
                                            if ($work_name) :
                                                echo esc_html($work_name);
                                            endif;
                                            ?>
                                        </h3>
                                        <!-- タクソノミー -->
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
                                    </a>
                                </div>
                            </li>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </ul>
            </section>
        </div>
    </div>
</div>
<?php get_footer(); ?>