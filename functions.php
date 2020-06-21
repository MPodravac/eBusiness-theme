<?php

if ( ! function_exists( 'inicijaliziraj_temu' ) )
{
	function inicijaliziraj_temu()
	{
		add_theme_support( 'post-thumbnails' );
		register_nav_menus( array(
			'glavni-menu' => "Glavni navigacijski izbornik"
		) );
		add_theme_support( 'custom-background', apply_filters(
			'test_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'title-tag' );
	}
}
add_action( 'after_setup_theme', 'inicijaliziraj_temu' );

function aktiviraj_sidebar()
{
	register_sidebar(
		array (
			'name' => "Glavni sidebar",
			'id' => 'glavni-sidebar',
			'description' => "Glavni sidebar",
			'before_widget' => '<div class="sidebar">',
			'after_widget' => "</div>",
			'before_title' => '<h4 class="sidebar-title">',
			'after_title' => '</h4>',
		)
	);

	register_sidebar(
		array (
			'name' => "Footer sidebar",
			'id' => 'footer-sidebar',
			'description' => "Footer sidebar 1",
			'before_widget' => '<div class="footer-sidebar">',
			'after_widget' => "</div>",
			'before_title' => '<h4 class="footer-sidebar-title">',
			'after_title' => '</h4>',
		)
	);

	register_sidebar(
		array (
			'name' => "Footer sidebar 2",
			'id' => 'footer-sidebar2',
			'description' => "Footer sidebar 2",
			'before_widget' => '<div class="footer-sidebar">',
			'after_widget' => "</div>",
			'before_title' => '<h4 class="footer-sidebar-title">',
			'after_title' => '</h4>',
		)
	);

	register_sidebar(
		array (
			'name' => "Footer sidebar 3",
			'id' => 'footer-sidebar3',
			'description' => "Footer sidebar 3",
			'before_widget' => '<div class="footer-sidebar">',
			'after_widget' => "</div>",
			'before_title' => '<h4 class="footer-sidebar-title">',
			'after_title' => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'aktiviraj_sidebar' );

function ucitaj_css_datoteke()
{
	wp_enqueue_style( 'main-css', get_template_directory_uri().'/style.css' );
	wp_enqueue_style( 'fontawesome-css', get_template_directory_uri().'/lib/font-awesome/css/font-awesome.min.css' );
}
add_action( 'wp_enqueue_scripts', 'ucitaj_css_datoteke' );

function ucitaj_js_datoteke() 
{
	wp_enqueue_script( 'jquery-js', get_template_directory_uri().'/lib/jquery/jquery.min.js', array( 'jquery' ), true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri().'/lib/bootstrap/js/bootstrap.min.js', array( 'jquery' ), true );
	wp_enqueue_script( 'owlcarousel-js', get_template_directory_uri().'/lib/owlcarousel/owl.carousel.min.js', array( 'jquery' ), true );
	wp_enqueue_script( 'knob-js', get_template_directory_uri().'/lib/knob/jquery.knob.js', array( 'jquery' ), true );
	wp_enqueue_script( 'wow-js', get_template_directory_uri().'/lib/wow/wow.min.js', array( 'jquery' ), true );
	wp_enqueue_script( 'parallax-js', get_template_directory_uri().'/lib/parallax/parallax.js', array( 'jquery' ), true );
	wp_enqueue_script( 'easing-js', get_template_directory_uri().'/lib/easing/easing.min.js', array( 'jquery' ), true );
	wp_enqueue_script( 'nivo-slider-js', get_template_directory_uri().'/lib/nivo-slider/js/jquery.nivo.slider.js', array( 'jquery' ), true );
	wp_enqueue_script( 'appear-js', get_template_directory_uri().'/lib/appear/jquery.appear.js', array( 'jquery' ), true );
	wp_enqueue_script( 'isotope-js', get_template_directory_uri().'/lib/isotope/isotope.pkgd.min.js', array( 'jquery' ), true );
	wp_enqueue_script( 'main-js', get_template_directory_uri().'/js/main.js', array( 'jquery' ), true );
}
add_action( 'wp_enqueue_scripts', 'ucitaj_js_datoteke', 1 );

function ucitaj_select2()
{
	wp_enqueue_style( 'select2css', get_template_directory_uri() . '/lib/select2/select2.min.css' );
	wp_enqueue_script('select2js', get_template_directory_uri().'/lib/select2/select2.min.js', array('jquery'), true);
	wp_enqueue_script('select2-admin-js', get_template_directory_uri().'/js/init_select2.js', array('jquery'), true);
}
add_action( 'admin_enqueue_scripts', 'ucitaj_select2' );

function create_zaposlenici_cpt()
{
	$labels = array(
		'name' => _x( 'Zaposlenici', 'Post Type General Name', 'impress' ),
		'singular_name' => _x( 'Zaposlenik', 'Post Type Singular Name', 'impress' ),
		'menu_name' => __( 'Zaposlenici', 'impress' ),
		'name_admin_bar' => __( 'Zaposlenici', 'impress' ),
		'archives' => __( 'Arhiva zaposlenika', 'impress' ),
		'attributes' => __( 'Atributi', 'impress' ),
		'parent_item_colon' => __( 'Roditeljski element', 'impress' ),
		'all_items' => __( 'Svi zaposlenici', 'impress' ),
		'add_new_item' => __( 'Dodaj novog zaposlenika', 'impress' ),
		'add_new' => __( 'Dodaj novi', 'impress' ),
		'new_item' => __( 'Novi zaposlenik', 'impress' ),
		'edit_item' => __( 'Uredi zaposlenika', 'impress' ),
		'update_item' => __( 'Ažuriraj zaposlenika', 'impress' ),
		'view_item' => __( 'Pogledaj zaposlenika', 'impress' ),
		'view_items' => __( 'Pogledaj zaposlenike', 'impress' ),
		'search_items' => __( 'Pretraži zaposlenike', 'impress' ),
		'not_found' => __( 'Nije pronađeno', 'impress' ),
		'not_found_in_trash' => __( 'Nije pronađeno u smeću', 'impress' ),
		'featured_image' => __( 'Glavna slika', 'impress' ),
		'set_featured_image' => __( 'Postavi glavnu sliku', 'impress' ),
		'remove_featured_image' => __( 'Ukloni glavnu sliku', 'impress' ),
		'use_featured_image' => __( 'Postavi za glavnu sliku', 'impress' ),
		'insert_into_item' => __( 'Umentni', 'impress' ),
		'uploaded_to_this_item' => __( 'Preneseno', 'impress' ),
		'items_list' => __( 'Lista', 'impress' ),
		'items_list_navigation' => __( 'Navigacija među zaposlenicima', 'impress' ),
		'filter_items_list' => __( 'Filtriranje zaposlenika', 'impress' ),
	);
	$args = array(
		'label' => __( 'Zaposlenik', 'impress' ),
		'description' => __( 'Zaposlenik post type', 'impress' ),
		'labels' => $labels,
		'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-groups',
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => false,
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type' => 'page',
	);
	register_post_type( 'zaposlenik', $args );

}
add_action( 'init', 'create_zaposlenici_cpt', 0 );

function registriraj_taksonomiju_uloga_zaposlenika() 
{
	$labels = array(
		'name' => _x( 'Uloge zaposlenika', 'Taxonomy General Name', 'impress' ),
		'singular_name' => _x( 'Uloga zaposlenika', 'Taxonomy Singular Name', 'impress' ),
		'menu_name' => __( 'Uloge zaposlenika', 'impress' ),
		'all_items' => __( 'Sve uloge', 'impress' ),
		'parent_item' => __( 'Roditeljska uloga', 'impress' ),
		'parent_item_colon' => __( 'Roditeljska uloga', 'impress' ),
		'new_item_name' => __( 'Nova uloga', 'impress' ),
		'add_new_item' => __( 'Dodaj novu ulogu', 'impress' ),
		'edit_item' => __( 'Uredi ulogu', 'impress' ),
		'update_item' => __( 'Ažuiriraj ulogu', 'impress' ),
		'view_item' => __( 'Pogledaj ulogu', 'impress' ),
		'separate_items_with_commas' => __( 'Odvojite uloge sa zarezima', 'impress' ),
		'add_or_remove_items' => __( 'Dodaj ili ukloni ulogu', 'impress' ),
		'choose_from_most_used' => __( 'Odaberi među najčešće korištenima', 'impress' ),
		'popular_items' => __( 'Popularne uloge', 'impress' ),
		'search_items' => __( 'Pretraga', 'impress' ),
		'not_found' => __( 'Nema rezultata', 'impress' ),
		'no_terms' => __( 'Nema uloga', 'impress' ),
		'items_list' => __( 'Lista usluga', 'impress' ),
		'items_list_navigation' => __( 'Navigacija', 'impress' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
	);
	register_taxonomy( 'uloga_zaposlenika', array( 'zaposlenik' ), $args );
}
add_action( 'init', 'registriraj_taksonomiju_uloga_zaposlenika', 0 );

function create_portfolio_cpt()
{
	$labels = array(
		'name' => _x( 'Portfolio', 'Post Type General Name', 'impress' ),
		'singular_name' => _x( 'Portfolio', 'Post Type Singular Name', 'impress' ),
		'menu_name' => __( 'Portfolio', 'impress' ),
		'name_admin_bar' => __( 'Portfolio', 'impress' ),
		'archives' => __( 'Arhiva portfolia', 'impress' ),
		'attributes' => __( 'Atributi', 'impress' ),
		'parent_item_colon' => __( 'Roditeljski element', 'impress' ),
		'all_items' => __( 'Cijeli portfolio', 'impress' ),
		'add_new_item' => __( 'Dodaj u portfolio', 'impress' ),
		'add_new' => __( 'Dodaj', 'impress' ),
		'new_item' => __( 'Novo u portfolio', 'impress' ),
		'edit_item' => __( 'Uredi portfolio', 'impress' ),
		'update_item' => __( 'Ažuriraj portfolio', 'impress' ),
		'view_item' => __( 'Pogledaj portfolio', 'impress' ),
		'view_items' => __( 'Pogledaj portfolio', 'impress' ),
		'search_items' => __( 'Pretraži portfolio', 'impress' ),
		'not_found' => __( 'Nije pronađeno', 'impress' ),
		'not_found_in_trash' => __( 'Nije pronađeno u smeću', 'impress' ),
		'featured_image' => __( 'Glavna slika', 'impress' ),
		'set_featured_image' => __( 'Postavi glavnu sliku', 'impress' ),
		'remove_featured_image' => __( 'Ukloni glavnu sliku', 'impress' ),
		'use_featured_image' => __( 'Postavi za glavnu sliku', 'impress' ),
		'insert_into_item' => __( 'Umetnni', 'impress' ),
		'uploaded_to_this_item' => __( 'Preneseno', 'impress' ),
		'items_list' => __( 'Lista', 'impress' ),
		'items_list_navigation' => __( 'Navigacija među portfoliom', 'impress' ),
		'filter_items_list' => __( 'Filtriranje portfolia', 'impress' ),
	);
	$args = array(
		'label' => __( 'Portfolio', 'impress' ),
		'description' => __( 'Portfolio post type', 'impress' ),
		'labels' => $labels,
		'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => false,
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type' => 'page',
	);
	register_post_type( 'portfolio', $args );

}
add_action( 'init', 'create_portfolio_cpt', 0 );

function create_usluge_cpt()
{
	$labels = array(
		'name' => _x( 'Usluge', 'Post Type General Name', 'impress' ),
		'singular_name' => _x( 'Usluga', 'Post Type Singular Name', 'impress' ),
		'menu_name' => __( 'Usluge', 'impress' ),
		'name_admin_bar' => __( 'Usluge', 'impress' ),
		'archives' => __( 'Arhiva usluga', 'impress' ),
		'attributes' => __( 'Atributi', 'impress' ),
		'parent_item_colon' => __( 'Roditeljski element', 'impress' ),
		'all_items' => __( 'Sve usluge', 'impress' ),
		'add_new_item' => __( 'Dodaj uslugu', 'impress' ),
		'add_new' => __( 'Dodaj', 'impress' ),
		'new_item' => __( 'Nova usluga', 'impress' ),
		'edit_item' => __( 'Uredi uslugu', 'impress' ),
		'update_item' => __( 'Ažuriraj uslugu', 'impress' ),
		'view_item' => __( 'Pogledaj uslugu', 'impress' ),
		'view_items' => __( 'Pogledaj usluge', 'impress' ),
		'search_items' => __( 'Pretraži usluge', 'impress' ),
		'not_found' => __( 'Nije pronađeno', 'impress' ),
		'not_found_in_trash' => __( 'Nije pronađeno u smeću', 'impress' ),
		'featured_image' => __( 'Glavna slika', 'impress' ),
		'set_featured_image' => __( 'Postavi glavnu sliku', 'impress' ),
		'remove_featured_image' => __( 'Ukloni glavnu sliku', 'impress' ),
		'use_featured_image' => __( 'Postavi za glavnu sliku', 'impress' ),
		'insert_into_item' => __( 'Umentni', 'impress' ),
		'uploaded_to_this_item' => __( 'Preneseno', 'impress' ),
		'items_list' => __( 'Lista', 'impress' ),
		'items_list_navigation' => __( 'Navigacija među uslugama', 'impress' ),
		'filter_items_list' => __( 'Filtriranje usluga', 'impress' ),
	);
	$args = array(
		'label' => __( 'Usluge', 'impress' ),
		'description' => __( 'Usluge post type', 'impress' ),
		'labels' => $labels,
		'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => false,
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type' => 'page',
	);
	register_post_type( 'usluge', $args );
}
add_action( 'init', 'create_usluge_cpt', 0 );

function registriraj_taksonomiju_tip_usluge() 
{
	$labels = array(
		'name' => _x( 'Dodatne usluge', 'Taxonomy General Name', 'impress' ),
		'singular_name' => _x( 'Dodatna usluga', 'Taxonomy Singular Name', 'impress' ),
		'menu_name' => __( 'Dodatne usluge', 'impress' ),
		'all_items' => __( 'Sve usluge', 'impress' ),
		'parent_item' => __( 'Roditeljska usluga', 'impress' ),
		'parent_item_colon' => __( 'Roditeljska usluga', 'impress' ),
		'new_item_name' => __( 'Nova usluga', 'impress' ),
		'add_new_item' => __( 'Dodaj novu uslugu', 'impress' ),
		'edit_item' => __( 'Uredi uslugu', 'impress' ),
		'update_item' => __( 'Ažuiriraj uslugu', 'impress' ),
		'view_item' => __( 'Pogledaj uslugu', 'impress' ),
		'separate_items_with_commas' => __( 'Odvojite usluge sa zarezima', 'impress' ),
		'add_or_remove_items' => __( 'Dodaj ili ukloni uslugu', 'impress' ),
		'choose_from_most_used' => __( 'Odaberi među najčešće korištenima', 'impress' ),
		'popular_items' => __( 'Popularne usluge', 'impress' ),
		'search_items' => __( 'Pretraga', 'impress' ),
		'not_found' => __( 'Nema rezultata', 'impress' ),
		'no_terms' => __( 'Nema usluga', 'impress' ),
		'items_list' => __( 'Lista usluga', 'impress' ),
		'items_list_navigation' => __( 'Navigacija', 'impress' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
	);
	register_taxonomy( 'dodatna_usluga', array( 'usluge' ), $args );
}
add_action( 'init', 'registriraj_taksonomiju_tip_usluge', 0 );

function add_meta_box_ikona()
{
	add_meta_box( 'impress_ikona_usluge', 'Ikona usluge', 'html_meta_box_ikona', 'usluge', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'add_meta_box_ikona' );

function html_meta_box_ikona($post)
{
	wp_nonce_field( 'spremi_ikonu_usluge', 'ikona_usluge_nonce' ); 
	$ikona_usluge = get_post_meta( $post->ID, 'ikona_usluge', true ); 
	echo '
			<div>
				<div>
					<label for="ikona_usluge"></label>
					<input type="text" id="ikona_usluge" name="ikona_usluge" value="'.$ikona_usluge.'" />
				</div><br/>
			</div>';
}

function spremi_ikonu_usluge($post_id)
{
	$is_autosave = wp_is_post_autosave( $post_id ); 
	$is_revision = wp_is_post_revision( $post_id ); 
	$is_valid_nonce_ikona_usluge = ( isset( $_POST[ 'ikona_usluge_nonce' ] ) && wp_verify_nonce($_POST[ 'ikona_usluge_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

	if ( $is_autosave || $is_revision || !$is_valid_nonce_ikona_usluge ) 
	{
		return; 
	}
	
	if ( !empty($_POST['ikona_usluge']) )
	{
		update_post_meta($post_id, 'ikona_usluge', $_POST['ikona_usluge']); 
	}
	else
	{
		delete_post_meta($post_id, 'ikona_usluge');
	}
}

add_action( 'save_post', 'spremi_ikonu_usluge' );

function add_meta_box_kratki_opis_usluge()
{
	add_meta_box( 'impress_kratki_opis_usluge', 'Kratki opis', 'html_meta_box_kratki_opis', 'usluge', 'normal', 'low' );
}
add_action( 'add_meta_boxes', 'add_meta_box_kratki_opis_usluge' );

function html_meta_box_kratki_opis($post)
{
	wp_nonce_field( 'spremi_kratki_opis_usluge', 'kratki_opis_usluge_nonce' ); 
	$kratki_opis_usluge = get_post_meta( $post->ID, 'kratki_opis_usluge', true ); 
	echo '
			<div>
				<div>
					<label for="kratki_opis_usluge"></label>
					<textarea rows="4" cols="50" id="kratki_opis_usluge" name="kratki_opis_usluge">'.$kratki_opis_usluge.'</textarea>
				</div><br/>
			</div>';
}

function spremi_kratki_opis_usluge($post_id)
{
	$is_autosave = wp_is_post_autosave( $post_id ); 
	$is_revision = wp_is_post_revision( $post_id ); 
	$is_valid_nonce_kratki_opis_usluge = ( isset( $_POST[ 'kratki_opis_usluge_nonce' ] ) && wp_verify_nonce($_POST[ 'kratki_opis_usluge_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

	if ( $is_autosave || $is_revision || !$is_valid_nonce_kratki_opis_usluge ) 
	{
		return; 
	}
	
	if ( !empty($_POST['kratki_opis_usluge']) )
	{
		update_post_meta($post_id, 'kratki_opis_usluge', $_POST['kratki_opis_usluge']); 
	}
	else
	{
		delete_post_meta($post_id, 'kratki_opis_usluge');
	}
}

add_action( 'save_post', 'spremi_kratki_opis_usluge' );

function add_meta_box_usluge_portfolio()
{
	add_meta_box( 'impress_usluge_portfolio', 'Usluge:', 'html_meta_box_usluge_portfolio', 'portfolio', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'add_meta_box_usluge_portfolio' );

function html_meta_box_usluge_portfolio( $post )
{
	wp_nonce_field( 'spremi_uslugu_portfolio', 'usluga_portfolio_nonce' ); 

	$usluge_ids = get_post_meta( $post->ID, 'usluge_portfolio', true ); 
	$usluge_ids = explode(',', $usluge_ids );
	$args = array(
		'posts_per_page'  => -1,
		'post_type'		  => 'usluge',
		'taxonomy'	=> 'dodatna_usluga',
		'post_status'     => 'publish',
	);
	$usluge = get_posts( $args );

	$usluge_form = '<select name="usluge[]" id="usluge[]" class="s2" multiple>';
			foreach ( $usluge as $usluga )
			{
				$selected_text = ( in_array( $usluga->ID, $usluge_ids ) ) ? "selected" : "" ;
				$usluge_form .= '<option '.$selected_text.' value = "'.$usluga->ID.'">'.$usluga->post_title.'</option>';
			}
			
			$usluge_form .='</select>';
			echo '<div> 
					'.$usluge_form.' 
				</div>';	
}

function spremi_uslugu_portfolio( $post_id )
{
	$is_autosave = wp_is_post_autosave( $post_id ); 
	$is_revision = wp_is_post_revision( $post_id ); 
	$is_valid_nonce_usluge_portfolio = ( isset( $_POST[ 'usluga_portfolio_nonce' ] ) && wp_verify_nonce( $_POST[ 'usluga_portfolio_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

	if ( $is_autosave || $is_revision || !$is_valid_nonce_usluge_portfolio ) 
	{
		return; 
	}
	
	if ( !empty($_POST['usluge']) )
	{
		$usluge = implode(",", $_POST['usluge']);
		update_post_meta( $post_id, 'usluge_portfolio', $usluge );
	}
	else
	{
		delete_post_meta ($post_id, 'usluge_portfolio' );
	}
}

add_action( 'save_post', 'spremi_uslugu_portfolio' );

function daj_html_usluge_portfolio($usluga_id)
{
	$usluge_ids = get_post_meta($usluga_id, 'usluge_portfolio', true);;
	if( $usluge_ids != "" )
	{
		$usluge_ids = explode(",", $usluge_ids);
		foreach ( $usluge_ids as $usluga_id ) 
		{
			$usluga = get_post( $usluga_id );
			$sIstaknutaSlikaUsluga = ""; 

			if( get_the_post_thumbnail_url( $usluga_id ) )
			{
				$sIstaknutaSlikaUsluga = get_the_post_thumbnail_url ( $usluga_id );
			}
			else
			{
				$sIstaknutaSlikaUsluga = get_template_directory_uri() .'/img/services.jpg';
			}
		
			$sUslugaNaziv = $usluga->post_title;
			$sUslugaUrl = $usluga->guid;



			$sHtml.= '
                <li class="project-menu-li">'.$sUslugaNaziv.'</li>';
		}
	}
	else
	{
		$sHtml .= "<p>Nema usluga</p>";
	}
	return $sHtml;
}


function daj_tim()
{
	$args = array(
			'posts_per_page' => -1,
			'post_type' => 'zaposlenik',
			'post_status' => 'publish'
			);
			$trms = array( 
				'fields' => 'names' 
			);
			$zaposlenici = get_posts( $args );
			$sIstaknutaSlika = "";			
			
			foreach ($zaposlenici as $zaposlenik)
			{
				
				if( get_the_post_thumbnail_url($zaposlenik->ID) )
				{
					$sIstaknutaSlika = get_the_post_thumbnail_url($zaposlenik->ID);
				}
				else
				{
					$sIstaknutaSlika = get_template_directory_uri(). '/img/team/team-1.jpg';
				}

				$terms = wp_get_post_terms( $zaposlenik->ID, 'uloga_zaposlenika', $trms );
				foreach($terms as $term)
				{
					$ZaposlenikUloga=implode(", ",$terms);					
				}	
				$ZaposlenikUrl = $zaposlenik->guid;
				$ZaposlenikNaziv = $zaposlenik->post_title;
				
				$sHtml .= '
						<div class="col-md-3 col-sm-3 col-xs-12">
          					<div class="single-team-member">
            					<div class="team-img">
              					<a href="'.$ZaposlenikUrl.'"><img src="'.$sIstaknutaSlika.'" alt=""></a>
              					<div class="team-social-icon text-center">
                						<ul>
                  						<li>
                    							<a href="#"><i class="fa fa-facebook"></i></a>
                  						</li>
                  						<li>
                    							<a href="#"><i class="fa fa-twitter"></i></a>
                  						</li>
                  						<li>
                  						  <a href="#"><i class="fa fa-instagram"></i></a>
                  						</li>
                						</ul>
              					</div>
            					</div>
            					<div class="team-content text-center">
              						<h4>'.$ZaposlenikNaziv.'</h4>
              						<p>'.$ZaposlenikUloga.'</p>
            					</div>
          				</div>
         			</div>';					
			}
			return $sHtml;
}

function daj_portfolio()
{
	$args = array(
			'posts_per_page' => -1,
			'post_type' => 'portfolio',
			'post_status' => 'publish'
			);
			$trms = array( 
				'fields' => 'names' 
			);
			$portfolio = get_posts( $args );
			$sIstaknutaSlika = "";			
			
			foreach ($portfolio as $pfolio)
			{
				
				if( get_the_post_thumbnail_url($pfolio->ID) )
				{
					$sIstaknutaSlika = get_the_post_thumbnail_url($pfolio->ID);
				}
				else
				{
					$sIstaknutaSlika = get_template_directory_uri(). '/img/portfolio/-4.jpg';
				}

				$PortfolioUrl = $pfolio->guid;
				$PortfolioNaziv = $pfolio->post_title;
				
				$sHtml .= '
						<div class="col-md-4 col-sm-4 col-xs-12 photo">
          				<div class="single-awesome-project">
            					<div class="awesome-img">
              					<a href="'.$PortfolioUrl.'"><img src="'.$sIstaknutaSlika.'" alt="" /></a>
              					<div class="add-actions text-center">
                						<div class="project-dec">
                  							<a class="venobox" data-gall="myGallery" href="'.$PortfolioUrl.'">
                    						<h4>'.$PortfolioNaziv.'</h4>
                  							</a>
                						</div>
              					</div>
            				</div>
          				</div>
         			</div>';					
			}
			return $sHtml;
}

function daj_usluge()
{
	$args = array(
			'posts_per_page' => -1,
			'post_type' => 'usluge',
			'post_status' => 'publish'
			);

			$usluge = get_posts( $args );
			$sIstaknutaSlika = "";			
			
			foreach ($usluge as $usluga)
			{
				
				if( get_the_post_thumbnail_url($usluga->ID) )
				{
					$sIstaknutaSlika = get_the_post_thumbnail_url($usluga->ID);
				}
				else
				{
					$sIstaknutaSlika = get_template_directory_uri(). '/img/services.jpg';
				}

				$sIkonaUsluge = get_post_meta( $usluga->ID, 'ikona_usluge', true );
				$sKratkiOpis = get_post_meta( $usluga->ID, 'kratki_opis_usluge', true );	
				$UslugaUrl = $usluga->guid;
				$UslugaNaziv = $usluga->post_title;
				
				$sHtml .= '
						<div class="col-md-3 col-sm-3 col-xs-12">
          				<div class="about-move">
            					<div class="services-details">
              					<div class="single-services" >
                						<a class="services-icon" href="'.$UslugaUrl.'">
											<i class="'.$sIkonaUsluge.'"></i>
										</a>
                						<a href="'.$UslugaUrl.'"><h4>'.$UslugaNaziv.'</h4>
                						<p>'.$sKratkiOpis.'</p></a>
              					</div>
            					</div>
          				</div>
         			</div>';					
			}
			return $sHtml;
}

function prikazi_postove()
{
	$args = array(
			'posts_per_page' => -1,
			);

	$postovi = get_posts( $args );
	$sIstaknutaSlika = "";

	foreach ( $postovi as $post )
	{
		
		if( get_the_post_thumbnail_url( $post->ID ) )
		{
			$sIstaknutaSlika = get_the_post_thumbnail_url( $post->ID );
		}
		else
		{
			$sIstaknutaSlika = get_template_directory_uri(). '/img/team-1.jpg';
		}
		$sPostUrl = $post->guid;
		$sPostNaziv = $post->post_title;
		$sPostDatum = get_the_date( $format,$post->ID );
		
		$sHtml .= '
					<div class="col-md-3 col-sm-3 col-xs-12">
            			<div class="single-blog">
              				<div class="single-blog-img">
                				<a href="'.$sPostUrl.'">
								<img src="'.$sIstaknutaSlika.'" alt="">
								</a>
              				</div>
              				<div class="blog-meta">
                				<span class="date-type">
									<i class="fa fa-calendar"></i>'.$sPostDatum.'</span>
              				</div>
              				<div class="blog-text">
                				<h4><a href="'.$sPostUrl.'">'.$sPostNaziv.'</a></h4>
              				</div>
            			</div>
          			</div>';				
	}
	return $sHtml;
}


?>