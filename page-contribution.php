<?php get_header('contribution'); ?>
			  <div class="page-inner">
                <div class="page-main" id="pg-contribution">
				  <div class="contribution">
<?php
$terms = get_terms( 'event' );
foreach ( $terms as $term ) :
	include 'content-contribution.php';
endforeach;
?>
                  </div>
                </div>
              </div>
<?php get_footer(); ?>
