<?php

define('TM_DIR', get_template_directory(__FILE__));
define('TM_URL', get_template_directory_uri(__FILE__));

require_once TM_DIR.'/lib/parser.php';

function add_style(){
    wp_enqueue_style( 'my-bootstrap-extension', get_template_directory_uri() . '/css/bootstrap.css', array(), '1');
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array('my-bootstrap-extension'), '1');
    wp_enqueue_style( 'my-styles', get_template_directory_uri() . '/css/style.css', array('my-bootstrap-extension'), '1');
    wp_enqueue_style( 'my-sass', get_template_directory_uri() . '/sass/style.css', array('my-bootstrap-extension'), '1');
    wp_enqueue_style( 'fotorama', get_template_directory_uri() . '/css/fotorama.css', array('my-bootstrap-extension'), '1');
}

function add_script(){
    // wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-2.1.3.min.js', array(), '1');
    // wp_enqueue_script( 'jq', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js', array(), '1');
    wp_enqueue_script( 'jq', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', array(), '1');
    wp_enqueue_script( 'my-bootstrap-extension', get_template_directory_uri() . '/js/bootstrap.js', array(), '1');
    wp_enqueue_script( 'my-script', get_template_directory_uri() . '/js/script.js', array(), '1');
    wp_enqueue_script( 'fotorama-js', get_template_directory_uri() . '/js/fotorama.js', array(), '1');
     wp_enqueue_script( 'unslider-js', '//unslider.com/unslider.min.js', array(), '1');

    
}

add_action( 'wp_enqueue_scripts', 'add_style' );
add_action( 'wp_enqueue_scripts', 'add_script' );

function prn($content) {
    echo '<pre style="background: lightgray; border: 1px solid black; padding: 2px">';
    print_r ( $content );
    echo '</pre>';
}

add_action('admin_menu', 'admin_menu');

function admin_menu(){
    add_menu_page( 'Настройки слайдера', 'Слайдер на главной', 'manage_options', 'text', 'admin_text' );
    add_menu_page( 'Отзывы', 'Отзывы клиентов', 'manage_options', 'reviews', 'admin_review' );
}

// load script to admin
function admin_js() {
    $url = get_template_directory_uri() . '/js/admin.js';
    echo "<script type='text/javascript' src='$url'></script>";
}

add_action('admin_head', 'admin_js');

function admin_text(){
    global $wpdb;

    if (function_exists('wp_enqueue_media')) {
        wp_enqueue_media();
    } else {
        wp_enqueue_style('thickbox');
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
    }

    if(isset($_GET['del'])){
        $wpdb->delete('text_reviews',array("id" => $_GET['del']));
        $message = "Отзыв успешно удален!";
    }

    if(isset($_POST['attachment_url'])){

        $wpdb->insert('text_reviews', array(
            "photo_url" => $_POST['attachment_url'],
            "name" => $_POST['name'],
            "prof" => $_POST['prof'],
            "review" => $_POST['review']));
        $message = "Отзыв успешно добавлен!";
        echo mysql_error();
    }

    $generate = '';

    $texts = $wpdb->get_results("SELECT * FROM text_reviews");
    foreach ($texts as $text) {
        $generate .= "<tr>
            <td><img src='". $text->photo_url. "' alt='' style='width: 50px;'/></td>
            <td>".$text->name."</td>
            <td><p>".$text->prof."</p></td>
            <td><p>".$text->review."</p></td>
            <td><a href='/wp-admin/admin.php?page=text&del=$text->id'>Удалить</a></td>
        </tr>";
    }

    $parser = new Parser();
    $parser->parse(TM_DIR."/view/admin_text.php",array('texts'=>$generate,
        'message'=>$message), true);
}

function text_slides_sc(){
    global $wpdb;

    $generate = "";

    $texts = $wpdb->get_results("SELECT * FROM text_reviews");

    foreach ($texts as $text) {
        $generate .= "<li>";
        $generate .= "<div class='userIconCirc'><img src='$text->photo_url'></div>
        <h3>$text->name</h3>
        <p>$text->prof</p>
        <div class='indexComent'><p>$text->review</p></div>";
        $generate .= "</li>";
    }
    return $generate;
}

function my_pagenavi() {
    global $wp_query;

    $big = 999999999; // уникальное число для замены

    $args = array(
        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) )
    ,'format' => ''
    ,'current' => max( 1, get_query_var('paged') )
    ,'total' => $wp_query->max_num_pages
    );

    $result = paginate_links( $args );

    // удаляем добавку к пагинации для первой страницы
    $result = str_replace( '/page/1/', '', $result );

    echo $result;
}


add_shortcode('text', 'text_slides_sc');

<<<<<<< HEAD
function excerpt_readmore($more) {
    return '... <br><a href="'. get_permalink($post->ID) . '" class="readmore">' . 'Читать далее' . '</a>';
}
=======
function admin_review(){
    global $wpdb;

    if (function_exists('wp_enqueue_media')) {
    wp_enqueue_media();
    } else {
        wp_enqueue_style('thickbox');
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
    }

    if(isset($_GET['del'])){
        $wpdb->delete('reviews',array("id" => $_GET['del']));
        $message = "Отзыв успешно удален!";
    }

    if(isset($_POST['attachment_url'])){

        $wpdb->insert('reviews', array("photo_url" => $_POST['attachment_url'],
            "name" => $_POST['name'],"prof" => $_POST['prof'], "review" => $_POST['review']));
        $message = "Отзыв успешно добавлен!";
        echo mysql_error();
    }
    
    $generate = '';

    $texts = $wpdb->get_results("SELECT * FROM reviews");
    foreach ($texts as $text) {
        $generate .= "<tr>
            <td><img src='". $text->photo_url. "' alt='' style='width: 50px;'/></td>
            <td>".$text->name."</td>
            <td><p>".$text->prof."</p></td>
            <td><p>".$text->review."</p></td>
            <td><a href='/wp-admin/admin.php?page=reviews&del=$text->id'>Удалить</a></td>
        </tr>";
    }

    $parser = new Parser();
    $parser->parse(TM_DIR."/view/admin_review.php",array('texts'=>$generate,
        'message'=>$message), true);
}

function review_slides_sc(){
    global $wpdb;

    $generate = "";
    $texts = $wpdb->get_results("SELECT * FROM reviews");

    for ($i=0; $i < count($texts); $i=$i+3) {
        $generate .= "<li>"; 
        
            $generate .= "<div class='slider-item'>";
                $generate .= "<div class='userIconCirc'><img src='".$texts[$i]->photo_url."'></div>
                <h3>".$texts[$i]->name."</h3>
                <p>".$texts[$i]->prof."</p>
                <div class='indexComent'><p>".$texts[$i]->review."</p></div>";
            $generate .= "</div>";

            if(isset($texts[$i+1])){
                $generate .= "<div class='slider-item'>";
                    $generate .= "<div class='userIconCirc'><img src='".$texts[$i+1]->photo_url."'></div>
                    <h3>".$texts[$i+1]->name."</h3>
                    <p>".$texts[$i+1]->prof."</p>
                    <div class='indexComent'><p>".$texts[$i+1]->review."</p></div>";
                $generate .= "</div>";
            }

            if(isset($texts[$i+2])){
                $generate .= "<div class='slider-item'>";
                    $generate .= "<div class='userIconCirc'><img src='".$texts[$i+2]->photo_url."'></div>
                    <h3>".$texts[$i+2]->name."</h3>
                    <p>".$texts[$i+2]->prof."</p>
                    <div class='indexComent'><p>".$texts[$i+2]->review."</p></div>";
                $generate .= "</div>";
            }
        
        $generate .= "</li>";
    }
    return $generate;
}

add_shortcode('review', 'review_slides_sc');

>>>>>>> 43c5861bc133a5dcbe824e067266be51b6a2a1eb

add_filter('excerpt_more', 'excerpt_readmore');

