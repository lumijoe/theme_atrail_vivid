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