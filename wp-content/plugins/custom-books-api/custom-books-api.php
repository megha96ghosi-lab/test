<?php
/**
 * Plugin Name: Custom Books API
 * Description: A custom REST API for managing books.
 * Version: 1.0.0
 * Author: Your Name
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/** Register the book post type */
add_action( 'init', 'cba_register_book_post_type' );

function cba_register_book_post_type() {

    register_post_type(
        'book',
        array(
            'labels' => array(
                'name'          => 'Books',
                'singular_name' => 'Book',
            ),
            'public'       => true,
            'show_in_rest' => true,
            'supports'     => array(
                'title',
                'editor',
                'author',
            ),
        )
    );
}

/** Creating endpoint */
add_action( 'rest_api_init', 'cba_register_routes' );

function cba_register_routes() {

    register_rest_route(
        'cba/v1',
        '/hello',
        array(
            'methods'             => 'GET',
            'callback'            => 'cba_hello_callback',
            'permission_callback' => '__return_true',
        )
    );
}

function cba_hello_callback() {

    return rest_ensure_response(
        array(
            'success' => true,
            'message' => 'Hello from my custom WordPress API!',
        )
    );
}

add_action( 'rest_api_init', 'cba_register_book_routes' );

function cba_register_book_routes() {

    // List books and create a book.
    register_rest_route(
        'cba/v1',
        '/books',
        array(
            array(
                'methods'             => WP_REST_Server::READABLE,
                'callback'            => 'cba_get_books',
                'permission_callback' => '__return_true',
            ),
            array(
                'methods'             => WP_REST_Server::CREATABLE,
                'callback'            => 'cba_create_book',
                'permission_callback' => 'cba_can_manage_books',
            ),
        )
    );

    // Read, update, or delete one book.
    register_rest_route(
        'cba/v1',
        '/books/(?P<id>\d+)',
        array(
            array(
                'methods'             => WP_REST_Server::READABLE,
                'callback'            => 'cba_get_book',
                'permission_callback' => '__return_true',
            ),
            array(
                'methods'             => WP_REST_Server::EDITABLE,
                'callback'            => 'cba_update_book',
                'permission_callback' => 'cba_can_manage_books',
            ),
            array(
                'methods'             => WP_REST_Server::DELETABLE,
                'callback'            => 'cba_delete_book',
                'permission_callback' => 'cba_can_manage_books',
            ),
        )
    );
}

function cba_can_manage_books() {
    return current_user_can( 'edit_posts' );
}

function cba_get_books( WP_REST_Request $request ) {

    $books = get_posts(
        array(
            'post_type'      => 'book',
            'post_status'    => 'publish',
            'posts_per_page' => 10,
            'orderby'        => 'date',
            'order'          => 'DESC',
        )
    );
 
    $data = array();

    foreach ( $books as $book ) {
        $data[] = array(
            'id'      => $book->ID,
            'title'   => $book->post_title,
            'content' => $book->post_content,
            'date'    => $book->post_date,
        );
    }

    return rest_ensure_response( $data );
}

