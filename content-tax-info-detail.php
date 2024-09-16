<article class="article-card">
    <a class="card-link" href="<?php the_permalink(); ?>">
        <div class="image info-othersection-worksample">
            <!-- 画像 -->
            <?php
            $work_img = get_field('work_img');
            if ($work_img) :
            ?>
                <img src="<?php echo esc_url($work_img); ?>" alt="" style="max-width: 300px; max-height: 220px; aspect-ratio: 300 / 220;">
            <?php endif; ?>
        </div>

        <div class="">
            <!-- タイトル -->
            <p class="title" style="font-weight: bold; padding-top: 10px;"><?php the_title(); ?></p>


        </div>
    </a>
</article>