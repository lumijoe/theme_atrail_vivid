<div class="info-othersection-wrapper">
    <h2 class="info-othersection-title">最新の制作事例はこちら</h2>
    <div class="info-othersection-work">
        <ul>
            <?php
            $term = get_specific_posts('daily_contribution', 'event', $term, 4);
            if ($term->have_posts()):
                while ($term->have_posts()): $term->the_post();
                    get_template_part('content-tax-info-detail');
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </ul>
    </div>
</div>