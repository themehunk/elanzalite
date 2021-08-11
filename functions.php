<?php
/**
 * WordPress function Page
 */
if ( ! isset( $content_width ) ) {
  $content_width = 1170;
}
if ( ! function_exists( 'elanzalite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 */
function elanzalite_setup() {
  /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   */
   load_theme_textdomain('elanzalite', get_parent_theme_file_uri('/languages'));
    // Add RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );
    /* Set the image size by cropping the image */
    add_theme_support('post-thumbnails');
    add_image_size( 'elanzalite-two-grid-thumb', 562, 320, true );
    add_image_size( 'elanzalite-related-post', 225, 140, true );
    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array('comment-form', 'comment-list', 'gallery', 'caption'
    ) );

    //remove widegt block
    remove_theme_support( 'widgets-block-editor' );
    /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */

  add_theme_support( 'title-tag' );
  add_theme_support( 'custom-logo', array(
    'height'      => 70,
    'width'       => 300,
    'flex-height' => true,
  ) );
  $args = array(
  'default-color' => 'f5f5f5',
);
add_theme_support( 'custom-background', $args );  
// Add custom-header
  $defaults = array(
    'default-image'          =>'',
    'flex-height'            => false,
    'flex-width'             => false,
    'uploads'                => true,
    'random-default'         => false,
    'header-text'            => true,
    'default-text-color'     => '',
    'wp-head-callback'       => '',
    'admin-head-callback'    => '',
    'admin-preview-callback' => '',
);
  add_theme_support( 'custom-header',$defaults );
// Add custom-background
  add_theme_support( 'custom-background' );
  // Recommend plugins
        add_theme_support( 'recommend-plugins', array(
            'themehunk-customizer' => array(
                'name' => esc_html__( 'ThemeHunk Customizer', 'elanzalite' ),
                'active_filename' => 'themehunk-customizer/themehunk-customizer.php',
            ),
            'lead-form-builder' => array(
                'name' => esc_html__( 'Lead Form Builder', 'elanzalite' ),
                'active_filename' => 'lead-form-builder/lead-form-builder.php',
            ),
            'business-popup' => array(
                'name' => esc_html__( 'Business Popup', 'elanzalite' ),
                'active_filename' => 'business-popup/business-popup.php',
            )

        ) );
}
endif;  
add_action( 'after_setup_theme', 'elanzalite_setup' );
require_once( get_parent_theme_file_path('/inc/include.php') );

// google-font-call
function elanzalite_fonts_url() {
  $fonts_url = '';
  /*
  Translators: If there are characters in your language that are not
  * supported by Roboto or Roboto Slab, translate this to 'off'. Do not translate
  * into your own language.
   */
  $Lato = _x( 'on', 'Lato font: on or off', 'elanzalite' );
  $Lato_slab = _x( 'on', 'Lato Slab font: on or off', 'elanzalite' );

  if ( 'off' !== $Lato || 'off' !== $Lato_slab ) {
    $font_families = array();

    if ( 'off' !== $Lato ) {
      $font_families[] = 'Lato:300,400,500,700';
    }

    if ( 'off' !== $Lato_slab ) {
      $font_families[] = 'Lato Slab:400,700';
    }

    $query_args = array(
      'family' => urlencode( implode( '|', $font_families ) ),
      'subset' => urlencode( 'latin,latin-ext' ),
    );
    $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
  }
  return $fonts_url;
}


/**
 * Enqueue scripts and styles for the front end.

 */
function elanzalite_scripts() {
  // Add Genericons font, used in the main stylesheet.
  wp_enqueue_style( 'elanzalite_fonts', elanzalite_fonts_url(), array(), '1.0.0' );
  wp_enqueue_style( 'font-awesome-new', get_parent_theme_file_uri('/css/fontawesome-all.css'), array(), '1.0.0' );
  wp_enqueue_style( 'font-awesome', get_parent_theme_file_uri('/css/font-awesome.css'), array(), '1.0.0' );
  // Load our main stylesheet.
  wp_enqueue_style('elanzalite-style', get_stylesheet_uri(), array(), '1.0.0' );
  wp_add_inline_style( 'elanzalite-style', elanzalite_custom_header() );

  wp_enqueue_script( 'classie', get_parent_theme_file_uri('/js/classie.js'), array( 'jquery' ), '', true );
  wp_enqueue_script( 'elanzalite-custom', get_parent_theme_file_uri('/js/custom.js'), array( 'jquery' ), '', true );
  // Comment reply
    if (is_singular() && get_option('thread_comments')){
    wp_enqueue_script('comment-reply');
  }
}
add_action( 'wp_enqueue_scripts', 'elanzalite_scripts' );
// home page post meta
function elanzalite_home_post_meta($search,$default=false){
 $home_post_meta = get_theme_mod('home_post_meta');
$value = (!empty($home_post_meta) && !empty($home_post_meta[0]))?in_array($search, $home_post_meta):$default;
return $value;
}
add_action( 'admin_enqueue_scripts', 'elanzalite_admin_script' );
function elanzalite_admin_script(){
wp_enqueue_script( 'elanzalite-admin-settings', get_template_directory_uri()  . '/js/oneclick-demo-import.js', array( 'jquery', 'wp-util', 'updates' ), '');

      $localize = array(
        'ajaxUrl'             => admin_url( 'admin-ajax.php' ),
        'btnActivating'       => __( 'Activating Importer Plugin ', 'elanzalite' ) . '&hellip;',
        'elanzaliteSitesLink'      => admin_url( 'themes.php?page=pt-one-click-demo-import' ),
        'elanzaliteSitesLinkTitle' => __( 'See Library', 'elanzalite' ),
      );
      wp_localize_script( 'elanzalite-admin-settings', 'elanzalite', apply_filters( 'elanzalite_theme_js_localize', $localize ) );
}

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function elanzalite_skip_link_focus_fix() {
    // The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
    ?>
    <script>
    /(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
    </script>
    <?php
}
add_action( 'wp_print_footer_scripts', 'elanzalite_skip_link_focus_fix' );