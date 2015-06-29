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
    add_menu_page( 'Настройки слайдера', 'Отзывы клиентов', 'manage_options', 'text', 'admin_text' );
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
        $generate .= "<div><div class='userIconCirc'>";
        $generate .= "<img src='$text->photo_url'></div>
        <h3>$text->name</h3>
        <p>$text->prof</p>
        <div class='indexComent'>
        <p>$text->review</p>";
        $generate .= "</div></div>";
    }
    return $generate;
}

add_shortcode('text', 'text_slides_sc');



