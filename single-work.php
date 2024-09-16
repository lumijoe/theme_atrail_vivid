<?php get_header('contribution'); ?>
<section class="contents-column">
    <div class="contents-column-body">
        <?php
        $terms = get_the_terms($spot->ID, 'work');
        if ($terms) {
        ?>
            <ul class="post-category">
                <?php
                foreach ($terms as $term) {
                ?>
                    <li><?php echo $term->name; ?></li>
                <?php
                }
                ?>
            </ul>
        <?php
        }
        ?>
        <div class="post-area">
            <?php the_content(); ?>
        </div>
    </div>
</section>



<?php get_footer(); ?>