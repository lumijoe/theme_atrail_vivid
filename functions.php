<?php
// ///////////////////////////////////
// 画像解像度を綺麗にするためのremove
// ///////////////////////////////////
function remove_decoding_async_attribute($html)
{
	// decoding="async" 属性を削除
	$html = str_replace('decoding="async"', '', $html);
	return $html;
}
add_filter('wp_get_attachment_image', 'remove_decoding_async_attribute');

// ///////////////////////////////////
// スタイルやjsの適用
// ///////////////////////////////////
function my_enqueue_scripts()
{
	$uri = esc_url(get_template_directory_uri());
	wp_enqueue_script('jquery');
	wp_enqueue_script('bundle_js', $uri . '/assets/js/bundle.js', array());
	wp_enqueue_style('my_styles', $uri . '/style.css', array());
}
add_action('wp_enqueue_scripts', 'my_enqueue_scripts');

// ///////////////////////////////////
// ログイン画面のカスタマイズ
// ///////////////////////////////////
function my_login_logo()
{ 	?>
	<style type="text/css">
		#login h1 a,
		.login h1 a {
			background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/common/head-logo.svg);
			width: 120px;
			height: 90px;
			background-size: 120px;
		}
	</style>
	<script type="text/javascript">
		document.addEventListener('DOMContentLoaded', function() {
			document.querySelector('#login h1 a').setAttribute('href', 'https://atrail.co.jp/');
		});
	</script>
<?php
}
add_action('login_enqueue_scripts', 'my_login_logo');

// ///////////////////////////////////
// ヘッダー、フッターのカスタムメニュー化
// ///////////////////////////////////
register_nav_menus(array(
	'place_global' => ' グローバル',
	'place_footer' => ' フッターナビ',
));

// ////////////////////////////////////
// メイン画像上にテンプレートごとの文字列を表示
// ////////////////////////////////////
function get_main_title()
{
	if (is_singular('post')) :
		$category_obj = get_the_category();
		return $category_obj[0]->name;
	elseif (is_page()) :
		return get_the_title();
	elseif (is_category() || is_tax()) :
		return single_cat_title();
	elseif (is_search()) :
		return ' サイト内検索結果';
	elseif (is_404()) :
		return ' ページが見つかりません';
	elseif (is_singular('daily_contribution')) :
		$term_obj = get_the_terms(get_queried_object()->ID, 'event');
		return $term_obj[0]->name;
	endif;
}

// 子ページを取得する関数
function get_child_pages($number = -1, $specified_id = null)
{
	if (isset($specified_id)) :
		$parent_id = $specified_id;
	else :
		$parent_id = get_the_ID();
	endif;
	$args = array(
		'posts_per_page' => $number,
		'post_type' => 'page',
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'post_parent' => $parent_id,
	);
	$child_pages = new WP_Query($args);
	return $child_pages;
}
// ///////////////////////////////
// 固定ページの画像設定
// ///////////////////////////////
// アイキャッチ画像を利用できるようにする
add_theme_support('post-thumbnails');

// トップページのメイン画像用のサイズ設定
add_image_size('top', 1077, 622, true);

// 施工事例一覧画像用のサイズ設定
add_image_size('contribution', 557, 280, true);

// トップページの施工事例にて使用している画像用のサイズ設定
add_image_size('front-contribution', 295, 295, false);

// 企業情報・店舗情報一覧画像用のサイズ設定
// トップページ事業案内画像用のサイズ設定
add_image_size('common', 432, 287, true);

// 各ページのメイン画像用のサイズ設定
add_image_size('detail', 1100, 330, true);

// 検索一覧画像用のサイズ設定
add_image_size('search', 168, 168, true);

// ///////////////////////////////
// 各テンプレートごとのメイン画像を表示
// ///////////////////////////////
function get_main_image()
{
	if (is_page() || is_singular('daily_contribution')) :
		$attachment_id = get_field('main_image');
		if (is_front_page()) :
			return wp_get_attachment_image($attachment_id, 'top');
		else :
			return wp_get_attachment_image($attachment_id, 'detail');
		endif;
	elseif (is_category('info') || is_singular('post')) :
		return '<img src="' . get_template_directory_uri() . '/assets/images/bg-page-news.jpg" />';
	elseif (is_search() || is_404()) :
		return '<img src="' . get_template_directory_uri() . '/assets/images/bg-page-search.jpg">';
	elseif (is_tax('event')) :
		$term_obj = get_queried_object();
		$image_id = get_field('event_image', $term_obj->taxonomy . '_' . $term_obj->term_id);
		return wp_get_attachment_image($image_id, 'detail');
	else :
		return '<img src="' . get_template_directory_uri() . '/assets/images/bg-page-dummy.png" />';
	endif;
}

// 特定の記事を抽出する関数
function get_specific_posts($post_type, $taxonomy = null, $term = null, $number = -1)
{
	if (!$term) :
		$terms_obj = get_terms('event');
		$term = wp_list_pluck($terms_obj, 'slug');
	endif;

	$args = array(
		'post_type' => $post_type,
		'tax_query' => array(
			array(
				'taxonomy' => $taxonomy,
				'field' => 'slug',
				'terms' => $term,
			),
		),
		'posts_per_page' => $number,
	);
	$specific_posts = new WP_Query($args);
	return $specific_posts;
}

function page_navi()
{
	the_posts_pagination(array(
		'mid_size' => 2,
		'prev_text' => '<',
		'next_text' => '>',
	));
}

function cms_excerpt_more()
{
	return '...';
}
add_filter('excerpt_more', 'cms_excerpt_more');

function cms_excerpt_length()
{
	return 80;
}
add_filter('excerpt_mblength', 'cms_excerpt_length');

// 抜粋機能を固定ページに使えるよう設定
add_post_type_support('page', 'excerpt');

// 抜粋文字以降を...で表示する
function get_flexible_excerpt($number)
{
	$value = get_the_excerpt();
	$value = wp_trim_words($value, $number, '...');
	return $value;
}

//get_the_excerpt() で取得する文字列に改行タグを挿入
function apply_excerpt_br($value)
{
	return nl2br($value);
}
add_filter('get_the_excerpt', 'apply_excerpt_br');

// ウィジェット機能を有効化
function theme_widgets_init()
{
	register_sidebar(array(
		'name' => ' サイドバーウィジェットエリア',
		'id' => 'primary-widget-area',
		'description' => ' 固定ページのサイドバー',
		'before_widget' => '<aside class="side-inner">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="title">',
		'after_title' => '</h4>',
	));
}
add_action('widgets_init', 'theme_widgets_init');

// メイン画像上にテンプレートごとの英語タイトルを表示
function get_main_en_title()
{
	if (is_category()) :
		$term_obj = get_queried_object();

		// カテゴリースラッグに基づいて 'news' や 'work' を返す
		if ($term_obj->slug === 'info') {
			return 'news';
		} elseif ($term_obj->slug === 'work') {
			return 'work';
		}

		$english_title = get_field('english_title', $term_obj->taxonomy . '_' . $term_obj->term_id);
		return $english_title;
	elseif (is_singular('post')) :
		$term_obj = get_the_category();
		$english_title = get_field('english_title', $term_obj[0]->taxonomy . '_' . $term_obj[0]->term_id);
		return $english_title;
	elseif (is_page('service')) :
		return 'service';
	elseif (is_page('work')) :
		return 'work';
	elseif (is_page('contact')) :
		return 'form';
	elseif (is_page('complete')) :
		return 'form';
	elseif (is_page('company')) :
		return 'company';
	elseif (is_page() || is_singular('daily_contribution')) :
		return get_field('english_title');
	elseif (is_search()) :
		return 'Search Result';
	elseif (is_404()) :
		return '404 Not Found';
	elseif (is_tax()) :
		$term_obj = get_queried_object();
		$english_title = get_field('english_title', $term_obj->taxonomy . '_' . $term_obj->term_id);
		return $english_title;
	endif;
}
