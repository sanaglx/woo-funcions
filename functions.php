<?php
/*************Добавить поля к продукту**********************************************/
/*
Поводы:  отображение меток присвоенных товару
Тип – надувной, механический
Где? - улица, помещение, улица / помещение
Поверхность – грунт, песок, асфальт
Время года -  лето, осень, зима, весна
Кол-во участников – индивидуальный, для двоих, командный 
Создать кнопки ( типа как «видео»и «описание» ) , разместить рядом? Соответственно в админке создать поля с заданными параметрами
Время установки: ___ минут
*/
/********Для цены админка (что написать перед ценой)*****************************************/

add_action( 'woocommerce_product_options_pricing', 'wc_ot_product_field' );
function wc_ot_product_field() {
woocommerce_wp_text_input( array( 'id' => 'ot', 'class' => ' short', 'label' => __( 'Надпись перед ценой(например:от)', 'woocommerce' ) ) );
}

/*запишем*/
add_action( 'save_post', 'wc_ot_save_product' );
function wc_ot_save_product( $product_id ) {
// Если это автосохранение, то ничего не делаем, сохраняем данные только при нажатии на кнопку Обновить
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
	return;

if ( isset( $_POST['ot'] ) ) {
	if (  $_POST['ot']  )
		update_post_meta( $product_id, 'ot', $_POST['ot'] );
	} else delete_post_meta( $product_id, 'ot' );
}

/***Тип – надувнойханический****/
add_action( 'woocommerce_product_options_pricing', 'wc_tipa_product_field' );
	function wc_tipa_product_field() {
	$args1 = array(	  'label' =>__('тип:'),'class' => 'selx',  'id' => 'tipa','name'=>'tipa[]', 
	'options' => array(
			'1'   => __( 'скрыть блок', 'woocommerce' ),
			'надувные аттракционы'   => __( 'надувные аттракционы', 'woocommerce' ),
			'механические аттракционы'   => __( 'механические аттракционы', 'woocommerce' ),
			'спортивный инвентарь'   => __( 'спортивный инвентарь', 'woocommerce' ),
			'игровое оборудование( аппараты и игры )'   => __( 'игровое оборудование', 'woocommerce' ),
			'водные аттракционы '   => __( 'водные аттракционы ', 'woocommerce' ),
			'детские аттракционы '   => __( 'детские аттракционы ', 'woocommerce' ),
			'фаст-фуд'   => __( 'фаст-фуд ', 'woocommerce' ),
			'выездное питание'   => __( 'выездное питание ', 'woocommerce' ),
			'задания для тимбилдинга'   => __( 'задания для тимбилдинга', 'woocommerce' ),
			'техническое оснащение'   => __( 'техническое оснащение', 'woocommerce' ),
			'фан-казино'   => __( 'фан-казино', 'woocommerce' ),
			'экстремальные аттракционы'   => __( 'экстремальные аттракционы', 'woocommerce' ),
			'транспорт'   => __( 'транспорт', 'woocommerce' )
		));
	woocommerce_wp_select_multiple( $args1 );
}
/*запишем*/
add_action( 'save_post', 'wc_tipa_save_product' );
function wc_tipa_save_product( $product_id ) {
// Если это автосохранение, то ничего не делаем, сохраняем данные только при нажатии на кнопку Обновить
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
	return;

if ( isset( $_POST['tipa'] ) ) {
	if (  $_POST['tipa']  )
		update_post_meta( $product_id, 'tipa', $_POST['tipa'] );
	} else delete_post_meta( $product_id, 'tipa' );
}

/***размещение***/
add_action( 'woocommerce_product_options_pricing', 'wc_gde_product_field' );
	function wc_gde_product_field() {
	$args = array(	  'label' =>__('размещение'), 'class' => 'selx', 'id' => 'gde', 
	  'options' => array(
			'улица'   =>     __( 'улица', 'woocommerce' ),
			'помещение'   => __( 'помещение', 'woocommerce' ),
			'улица или помещение'   => __( 'улица_помещение', 'woocommerce' )
		));
	woocommerce_wp_select( $args );
}
/*запишем*/
add_action( 'save_post', 'wc_gde_save_product' );
function wc_gde_save_product( $product_id ) {
// Если это автосохранение, то ничего не делаем, сохраняем данные только при нажатии на кнопку Обновить
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
	return;

if ( isset( $_POST['gde'] ) ) {
	if (  $_POST['gde']  )
		update_post_meta( $product_id, 'gde', $_POST['gde'] );
	} else delete_post_meta( $product_id, 'gde' );
}

/*** Выход в час порций ***/
add_action( 'woocommerce_product_options_pricing', 'wc_porcii_product_field' );
function wc_porcii_product_field() {
woocommerce_wp_text_input( array( 'id' => 'porcii', 'class' => ' short', 'label' => __( 'Выход в час порций', 'woocommerce' ) ) );
}

/*запишем*/
add_action( 'save_post', 'wc_porcii_save_product' );
function wc_porcii_save_product( $product_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
	return;

if ( isset( $_POST['porcii'] ) ) {
	if (  $_POST['porcii']  )
		update_post_meta( $product_id, 'porcii', $_POST['porcii'] );
	} else delete_post_meta( $product_id, 'porcii' );
}

/*** Проходимость в час ***/
add_action( 'woocommerce_product_options_pricing', 'wc_prchas_product_field' );
function wc_prchas_product_field() {
woocommerce_wp_text_input( array( 'id' => 'prchas', 'class' => ' short', 'label' => __( 'Проходимость в час(питание) ', 'woocommerce' ) ) );
}

/*запишем*/
add_action( 'save_post', 'wc_prchas_save_product' );
function wc_prchas_save_product( $product_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
	return;

if ( isset( $_POST['prchas'] ) ) {
	if (  $_POST['prchas']  )
		update_post_meta( $product_id, 'prchas', $_POST['prchas'] );
	} else delete_post_meta( $product_id, 'prchas' );
}

/***Поверхность***/
add_action( 'woocommerce_product_options_pricing', 'wc_surface_product_field' );
	function wc_surface_product_field() {
	$args1 = array(  'label' =>__('Поверхность для установки'),  'class' => 'selx',  'id' => 'surface','name' => 'surface[]', 
	  'options' => array(
			'паркет'   => __( 'паркет', 'woocommerce' ),
			'асфальт' => __( 'асфальт', 'woocommerce' ),
			'грунт'   => __( 'грунт', 'woocommerce' ),
			'песок'   => __( 'песок', 'woocommerce' ),
			'вода'   => __( 'вода', 'woocommerce' )
		));
	woocommerce_wp_select_multiple( $args1 );
}
/*запишем*/
add_action( 'save_post', 'wc_surface_save_product' );
function wc_surface_save_product( $product_id ) {
// Если это автосохранение, то ничего не делаем, сохраняем данные только при нажатии на кнопку Обновить
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
	return;

if ( isset( $_POST['surface'] ) ) {
	if (  $_POST['surface']  )
		update_post_meta( $product_id, 'surface', $_POST['surface'] );
	} else delete_post_meta( $product_id, 'surface' );
}

/***Крепление -  требует, не требует****/
add_action( 'woocommerce_product_options_pricing', 'wc_krepl_product_field' );
	function wc_krepl_product_field() {
	$args1 = array( 'label' =>__('крепление'),  'class' => 'selx', 'id' => 'krepl',
	  'options' => array(
			'не требует'   => __( 'не требует', 'woocommerce' ),
			'требует крепление)'   => __( 'требует ( анкерное/ углубление в грунт/ на блоках )', 'woocommerce' ),
		));
	woocommerce_wp_select( $args1 );
}
/*запишем*/
add_action( 'save_post', 'wc_krepl_save_product' );
function wc_krepl_save_product( $product_id ) {
// Если это автосохранение, то ничего не делаем, сохраняем данные только при нажатии на кнопку Обновить
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
	return;

if ( isset( $_POST['krepl'] ) ) {
	if (  $_POST['krepl']  )
		update_post_meta( $product_id, 'krepl', $_POST['krepl'] );
	} else delete_post_meta( $product_id, 'krepl' );
}




/***Время года -  лето, осеньа, весна****/
add_action( 'woocommerce_product_options_pricing', 'wc_season_product_field' );
	function wc_season_product_field() {
	$args1 = array( 'label' =>__('время года'),  'class' => 'selx', 'id' => 'season','name' => 'season[]',
	  'options' => array(
			'всесезонный'   => __( 'всесезонный', 'woocommerce' )
	  ));
	woocommerce_wp_select_multiple( $args1 );
}
/*запишем*/
add_action( 'save_post', 'wc_season_save_product' );
function wc_season_save_product( $product_id ) {
// Если это автосохранение, то ничего не делаем, сохраняем данные только при нажатии на кнопку Обновить
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
	return;

if ( isset( $_POST['season'] ) ) {
	if (  $_POST['season']  )
		update_post_meta( $product_id, 'season', $_POST['season'] );
	} else delete_post_meta( $product_id, 'season' );
}


/***Кол-во участников – индивидуальный, для двоих, командный ***/
add_action( 'woocommerce_product_options_pricing', 'wc_personnel_product_field' );
	function wc_personnel_product_field() {
	woocommerce_wp_text_input( array( 'id' => 'personnel', 'class' => ' short', 'label' => __( 'Кол-во участников ( одновременно)', 'woocommerce' ) ) );
}
/*запишем*/
add_action( 'save_post', 'wc_personnel_save_product' );
function wc_personnel_save_product( $product_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
	return;

if ( isset( $_POST['personnel'] ) ) {
	if (  $_POST['personnel']  )
		update_post_meta( $product_id, 'personnel', $_POST['personnel'] );
	} else delete_post_meta( $product_id, 'personnel' );
}

/********Время установки: ___ минут админка*****************************************/

add_action( 'woocommerce_product_options_pricing', 'wc_ustmin_product_field' );
function wc_ustmin_product_field() {
woocommerce_wp_text_input( array( 'id' => 'ustmin', 'class' => ' short', 'label' => __( 'Время установки', 'woocommerce' ) ) );
}

/*запишем*/
add_action( 'save_post', 'wc_ustmin_save_product' );
function wc_ustmin_save_product( $product_id ) {
// Если это автосохранение, то ничего не делаем, сохраняем данные только при нажатии на кнопку Обновить
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
	return;

if ( isset( $_POST['ustmin'] ) ) {
	if (  $_POST['ustmin']  )
		update_post_meta( $product_id, 'ustmin', $_POST['ustmin'] );
	} else delete_post_meta( $product_id, 'ustmin' );
}

/********Картинка напротив кнопки*****************************************/

add_action( 'woocommerce_product_options_pricing', 'wc_imgx_product_field' );
function wc_imgx_product_field() {
woocommerce_wp_text_input( array( 'id' => 'imgx', 'class' => ' short', 'label' => __( 'URL картинки (напротив  добавить в корзину)', 'woocommerce' ) ) );
}

/*запишем*/
add_action( 'save_post', 'wc_imgx_save_product' );
function wc_imgx_save_product( $product_id ) {
// Если это автосохранение, то ничего не делаем, сохраняем данные только при нажатии на кнопку Обновить
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
	return;

if ( isset( $_POST['imgx'] ) ) {
	if (  $_POST['imgx']  )
		update_post_meta( $product_id, 'imgx', $_POST['imgx'] );
	} else delete_post_meta( $product_id, 'imgx' );
}
 /**************************************
 * url куда перейти с картинки
 */
add_action( 'woocommerce_product_options_pricing', 'wc_imgurl_product_field' );
function wc_imgurl_product_field() {
woocommerce_wp_text_input( array( 'id' => 'imgurl', 'class' => ' short', 'label' => __( 'URL перехода с картинки (напротив  добавить в корзину)', 'woocommerce' ) ) );
}

/*запишем*/
add_action( 'save_post', 'wc_imgurl_save_product' );
function wc_imgurl_save_product( $product_id ) {
// Если это автосохранение, то ничего не делаем, сохраняем данные только при нажатии на кнопку Обновить
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
	return;

if ( isset( $_POST['imgurl'] ) ) {
	if (  $_POST['imgurl']  )
		update_post_meta( $product_id, 'imgurl', $_POST['imgurl'] );
	} else delete_post_meta( $product_id, 'imgurl' );
}



/********Видео с ютуба админка*****************************************/

add_action( 'woocommerce_product_options_pricing', 'wc_video_product_field' );
function wc_video_product_field() {
woocommerce_wp_text_input( array( 'id' => 'video', 'class' => ' short', 'label' => __( 'Видео youtube.com (вставить URL видео)', 'woocommerce' ) ) );
}

/*запишем*/
add_action( 'save_post', 'wc_video_save_product' );
function wc_video_save_product( $product_id ) {
// Если это автосохранение, то ничего не делаем, сохраняем данные только при нажатии на кнопку Обновить
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
	return;

if ( isset( $_POST['video'] ) ) {
	if (  $_POST['video']  )
		update_post_meta( $product_id, 'video', $_POST['video'] );
	} else delete_post_meta( $product_id, 'video' );
}

/* для вывода   woocommerce_single_product_summary*/

add_action( 'woocommerce_single_product_summary', 'wc_video_show',11 );
function wc_video_show() {

	global $product;
	// Ничего не предпринимаем для вариативных товаров
	if ( $product->product_type <> 'variable' ) {
	$tipa = get_post_meta( $product->id, 'tipa', true );
	$gde = get_post_meta( $product->id, 'gde', true );
	$surface = get_post_meta( $product->id, 'surface', true );
	$season = get_post_meta( $product->id, 'season', true );
	$krepl = get_post_meta( $product->id, 'krepl', true );
	$porcii = get_post_meta( $product->id, 'porcii', true );
	$prchas = get_post_meta( $product->id, 'prchas', true );
	$personnel = get_post_meta( $product->id, 'personnel', true );
	$ustmin=get_post_meta( $product->id, 'ustmin', true );
	$video = get_post_meta( $product->id, 'video', true );
	$imgx = get_post_meta( $product->id, 'imgx', true );
	$imgurl = get_post_meta( $product->id, 'imgurl', true );
	$text = !empty($product->post->post_content) ? $product->post->post_content : '';

	echo '<div class="woocommerce_msrp">';
	if(strlen($video)>14){
		
		//_e( '', 'woocommerce' );
			 echo '<a  class="video-t" data-fancybox  href="' .  $video  . '"><img src ="'. get_theme_root_uri().'/prointeractiv/images/video-camera1.png " /> <span> смотреть видео </span> </a>';
		}	 
			//echo '<span class="resp-accordion" role="tab">&nbsp;&nbsp;&nbsp; Описание: &nbsp;</span>';
			 echo '<a class="text-t dop-cvet2" data-fancybox data-options=\'{"src": "#modalx", "modal": true,"touch": false}\' href="javascript.void(0);"> <img src ="'. get_theme_root_uri().'/prointeractiv/images/browser1.png " /> <span> описание</span> </a>';
		if(strlen($tipa[0])>2){	
			echo '<a class="text-t dop-cvet3" data-fancybox data-options=\'{"src": "#modalx1", "modal": true,"touch": false}\'  href="javascript:;"> <img src ="'. get_theme_root_uri().'/prointeractiv/images/tehrd.png " /> <span> техн.райдер</span> </a>';
		}	 		 
			//---------------------	
			echo"<div id='modalx' style='display:none; max-width:800px;'>
			 <h4>Описание товара:</h4>". $text.
			 "</div>";
			 echo"<hr>";
			 echo '</div>';
				 if(is_array($tipa)){$tita = implode(", ",$tipa);}else{$tita ="";}
				 if(is_array($surface)){$surface = implode(", ",$surface);}else{$surface ="";}
				 if(is_array($season)){$season = implode(", ",$season);}else{$season ="";}
				 if(is_array($personnel)){$personnel = implode(", ",$personnel);}else{}
	 
			//----------------------
			echo"<div id='modalx1' style='display:none; max-width:800px;'>
			  <h4>Правила размещения:</h4>".
			 "<br> Тип:&nbsp; <b>".$tita."</b>".
			 "<br> Размещение:&nbsp; <b>".$gde."</b>";
			 
			if((int)$porcii > 0 ) {
			 echo "<br> Выход в час:&nbsp; <b>".$porcii."</b>&nbsp;порций";
			}
			if((int)$prchas > 0) { 
			 echo "<br> Проходимость в час:&nbsp; <b>".$prchas."</b>&nbsp;участников";
			}
			 echo" <br> Поверхность для установки:&nbsp; <b>".$surface."</b>".
			 "<br> Крепление:&nbsp; <b>".$krepl."</b>".
			 "<br> Время года:&nbsp; <b>".$season."</b>".
			 "<br> Кол-во участников:&nbsp; <b>".$personnel."</b>".
			 "<br> Время установки:&nbsp; <b>".$ustmin." минут</b>".
			 //"<p><button data-fancybox-close class=btn>Close me</button></p>".
			 "</div>";

	}

	
}
/********************************
*
*/
add_action( 'woocommerce_single_product_summary', 'wc_imgx_show',31 );
function wc_imgx_show() {
	global $product;
	if ( $product->product_type <> 'variable' ) {
	$imgx = get_post_meta( $product->id, 'imgx', true );
	$imgurl = get_post_meta( $product->id, 'imgurl', true );
	}

		/**вывод картинки**/
	if(strlen($imgx)>3 && strlen($imgurl)>3){
	echo'<a class="animated-link" href="'.$imgurl.'" target="_blank">
		 <img src="'.$imgx.'" alt="" width="260" >
		
		</a>';
	}
}
 
// Дополнительно: Для вывода на страницах архивов (в товарных категориях, например)
//add_action( 'woocommerce_after_shop_loop_item_title', 'wc_video_show' );
//woocommerce_show_product_images
/**
* Добавил css для админки
*/

function wph_add_css_file_admin() {
    $themeurl = get_bloginfo('stylesheet_directory');
    echo '<link rel="stylesheet" href="'.$themeurl.'/admin_style.css" 
    type="text/css" media="all" />';
}
add_action('admin_head', 'wph_add_css_file_admin');

/**
*ПОВОДЫ
*
**/
add_action( 'woocommerce_after_single_product_summary', 'wc_tagx_show',10 );
function wc_tagx_show(){
	global $product;
    $args = array( 'hide_empty' => 0 );
    //$terms = get_terms('product_tag', $args );
    $terms =  get_the_terms( $post->ID, 'product_tag' );
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
        $term_list = '<div class="lg-p"><h2 class="nm dxd">Поводы:</h2>';
		
		$term_list .= '<ul class="my-terms-list">';
        foreach ( $terms as $term ) {
        	$term_list .= '<li><a href="' . get_term_link( $term ) . '" title="'. $term->name .'">' . $term->name . '</a></li>';
        }
        $term_list .= '</ul></div> ';
		
		$term_list .= '
		<div class="resp-tabs-container">
			  <h2 id = "povody" class="resp-accordion"  >
			  <span class="resp-arrow"></span>Поводы</h2>
				<div id="pov-p" style= "display:none"  >
				<ul class="my-terms-list">';
					foreach ( $terms as $term ) {
						$term_list .= '<li><a href="' . get_term_link( $term ) . '" title="'. $term->name .'">' . $term->name . '</a></li>';
					}
		        $term_list .= '</ul> 
				</div>
			  </div> 
			</div>';
		
		echo $term_list ;
        return $term_list;
    }else{
    	return 'Поводы не назначены.';
    }
}



/*************************PRICE******************************************************************/

add_shortcode( 'main_price', 'jc_featured_products' );
function jc_featured_products($atts){
 
	global $woocommerce_loop;
 
	extract(shortcode_atts(array(
		'cats' => '',	// list of categories in the format 0,1,2,3,4
		'tax' => 'product_cat',	// taxonomy use
		'per_cat' => '-1',	// max featured items to display per category
		'columns' => '1',	// columns size
	), $atts));
 
	// get list of categories if no categories have been chosen
	if(empty($cats)){
		$terms = get_terms( 'product_cat', array('hide_empty' => true, 'fields' => 'ids'));
		$cats = implode(',', $terms);
	}

	// explode csv of categories into array e.g. array(0,1,2,3,4)
	$cats = explode(',', $cats);
 
	// escape early if no categories
	if(empty($cats)){
		return '';
	}
 
	ob_start();
 
	foreach($cats as $cat){
 
		// get the product category
		$term = get_term( $cat, $tax);


		// setup query
		$args = array(
			'post_type'	=> 'product',
			'post_status' => 'publish',
			'ignore_sticky_posts'	=> 1,
			'posts_per_page' => $per_cat,
			'tax_query' => array(
				// получать продукцию в указанных таксономиях
				array(
					'taxonomy' => $tax,
					'field' => 'id',
					'terms' => $cat,
				)
			),
			'meta_query' => array(
				// get products that are allowed to be displayed in the catalogue
				//получить продукты, которые разрешены для отображения в каталоге
				array(
					'key' => '_visibility',
					'value' => array('catalog', 'visible'),
					'compare' => 'IN'
				)
				// get only products marked as featured
				//получить только продукты, отмеченные как признак
				/*array(
					'key' => '_featured',
					'value' => 'yes'
				)*/
			)
		);
 
		// set woocommerce columns
		$woocommerce_loop['columns'] = $columns;
 
		// query database
		$products = new WP_Query( $args );
 
		$woocommerce_loop['columns'] = $columns;
 
		if ( $products->have_posts() ) : 
 ?>
			<h2 class="h2-price"><a target="_blank" href="<?php echo get_term_link($term, $tax ); ?>"><?php echo $term->name; ?></a></h2>
			<?php woocommerce_product_loop_start1(); ?>
 
				<?php while ( $products->have_posts() ) : $products->the_post(); ?>
 
					<?php woocommerce_get_template_part( 'content1', 'product1' ); ?>
 
				<?php endwhile; // end of the loop. ?>
 
			<?php woocommerce_product_loop_end(); ?>
 
		<?php else:
			echo"Нет постов для вывода";
		
		endif;
 
		wp_reset_postdata();
	}
 
	return '<div class="woocommerce columns-' . $columns . '">' . ob_get_clean() . '</div>';
}
?>