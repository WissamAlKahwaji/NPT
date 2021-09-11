<?php 
        //Include navwaler Class For Bootstrap Navigation menu
        require_once('wp-bootstrap-navwalker.php');
    //Add Featured image support //
    add_theme_support( 'post-thumbnails' );

/*
** Add My Custom Styles
** Added By @Wissamalkahwaji
** wp_enqueue_style()
*/

    function npt_add_styles(){
    
    wp_enqueue_style('bootstrap-css' , get_template_directory_uri(). '/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-css' , get_template_directory_uri(). '/css/bootstrap.css');
    wp_enqueue_style('main-css' , get_template_directory_uri(). '/css/main.css');
    }

    function npt_add_scripts(){

        
        wp_deregister_script('jquery'); //Remove Registeration For Old jQuery//
        wp_register_script( 'jquery', get_template_directory_uri(). '/js/jquery-3.3.1.slim.min.js', array(), false, true); // Register A New jQuery In Footer
        wp_enqueue_script('jquery'); //Enqeueu The New jQuery
        wp_enqueue_script('bootstrap-js' , get_template_directory_uri(). '/js/bootstrap.min.js', array(), false, true);
        wp_enqueue_script('popper.min-js' , get_template_directory_uri(). '/js/popper.min.js', array(), false, true);
        wp_enqueue_script('query-ui-js' , get_template_directory_uri(). '/js/query-ui.js', array(), false, true);
        wp_enqueue_script('main-js' , get_template_directory_uri(). '/js/main.js', array(), false, true);
        wp_enqueue_script('bootstrap-js' , get_template_directory_uri(). '/js/bootstrap.js', array(), false, true);
        wp_enqueue_script('html5shiv' , get_template_directory_uri(). '/js/html5shiv.js');
        wp_script_add_data('html5shiv', 'conditional', 'lt IE 9');
        wp_enqueue_script('respond' , get_template_directory_uri(). '/js/respond.js');
        wp_script_add_data('respond', 'conditional' ,'lt IE 9');
    }

        /**
    *  Add Cusotm Menu Support
    *  Added By @Wissamalkahwaji
    */
    function npt_register_custom_menu(){
        //Register Custom Menus
        register_nav_menus( array(

            'bootstrap-menu' => 'NavBar Left'

        ));
    }

    function npt_bootstrap_menu(){
    
    wp_nav_menu(array(

            'theme_location'    => 'bootstrap-menu',
            'menu_class'        => 'navbar-nav',
            'container'         => 'false',
            'depth'             =>  3 ,
            'walker'            =>  new WP_Bootstrap_Navwalker()

    ));
}

/*
*   Custmize The Excerpt Word Length & Read More Dots
* Added By @Wissamalkahwaji
*/

    function ntp_extend_excerpt_length($length) {
        if (is_category() ){
        return 10;
        }else{
        return 10;
        }
    }
    
    add_filter('excerpt_length','ntp_extend_excerpt_length');

    function ntp_excerpt_change_dots($more){
        return ' ...';

    }

    add_filter('excerpt_more','ntp_excerpt_change_dots');


    /*
    **  Add Actions
    **  Added By @Wissamalkahwji
    **  add_action()
    */
    //Add Css Style
    add_action('wp_enqueue_scripts', 'npt_add_styles');
    //Add js script 
    add_action('wp_enqueue_scripts', 'npt_add_scripts');
    //Add Custom Menu
    add_action ('init','npt_register_custom_menu');

//  Numbering Pagination

    function num_home () {

        global $wp_query; // Make WP_Query Global

        $all_pages = $wp_query->max_num_pages; // Get All Posts//

        $current_page = max(1, get_query_var('paged')); // Get Current Page

        if ($all_pages > 1) { // Check If Toral Pages

            return paginate_links(array(
            
            'base'              =>  get_home_url() . '%_%' ,
            'format'            => '/page/%#%' ,
            'current'           =>  $current_page ,
            'total'             =>  $all_pages ,
            'mid_size'          => 2 ,
            'end_size'          => 1 ,
            'prev_text'         => '«',         
            'next_text'         => '»',         
            ));
        }
    }


    function num_samsung () {

        global $wp_query; // Make WP_Query Global

        $all_pages = $wp_query->max_num_pages; // Get All Posts//

        $current_page = max(1, get_query_var('paged')); // Get Current Page

        if ($all_pages > 1) { // Check If Toral Pages

            return paginate_links(array(
            
            'base'              =>  get_term_link( 4 ,) . '%_%' ,
            'format'            => 'page/%#%' ,
            'current'           =>  $current_page ,
            'total'             =>  $all_pages ,
            'mid_size'          => 2 ,
            'end_size'          => 1 ,
            'prev_text'         => '«',         
            'next_text'         => '»',         
            ));
        }
    }

    //Register Sidebar

    function home_main_sidebar() {

        //register Sidebar
        register_sidebar(array(

        'name'              =>  'Sidebar Single-Page',
        'id'                =>  'sidebar-single-page',
        'description'       =>  'SideBar For Single-Page',
        'class'             =>  'sidebar-single-page',
        'before_widget'     =>  '<div class="widget-content">',
        'after_widget'      =>  '</div>',
        'before_title'      =>  '<h3 class="widget-title">',
        'after_title'       =>  '</h3>',

        ));
    }
    
    add_action('widgets_init','home_main_sidebar');

function npt_remove_paragraph($content) {

    remove_filter('the_content','wpautop');

    return $content;

}

add_filter('the_content','npt_remove_paragraph', 0);


