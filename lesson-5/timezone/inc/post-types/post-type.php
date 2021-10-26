<?php
add_action('init', 'my_custom_news');
function my_custom_news(){
    register_post_type('news', array(
        'labels'             => array(
            'name'               => __('Новости'),
            'singular_name'      => __('Новость'),
            'add_new'            => __('Добавить новую'),
            'add_new_item'       => __('Добавить новую новость'),
            'edit_item'          => __('Редактировать новость'),
            'new_item'           => __('Новая новость'),
            'view_item'          => __('Посмотреть новость'),
            'search_items'       => __('Найти новость'),
            'not_found'          => __('Новостей не найдено'),
            'not_found_in_trash' => __('В корзине новостей не найдено'),
            'parent_item_colon'  => '',
            'menu_name'          => __('Новости'),
        ),
        'public'             => true,
        'menu_icon' => 'dashicons-media-document',
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title','editor','author','thumbnail','excerpt','comments','custom-fields'),
    ) );
}

register_taxonomy('news_teg', 'news',array(
	'hierarchical'  => false,
	'labels'        => array(
		'menu_name'                   => __( 'Метки' ),
	),
	'show_ui'       => true,
	'query_var'     => true,
));



add_action('init', 'my_custom_blog');
function my_custom_blog(){
    register_post_type('blog', array(
        'labels'             => array(
            'name'               => __('Блог'),
            'singular_name'      => __('Запись блога'),
            'add_new'            => __('Добавить новую запись блога'),
            'add_new_item'       => __('Добавить новую запись блога'),
            'edit_item'          => __('Редактировать запись блога'),
            'new_item'           => __('Новая запись блога'),
            'view_item'          => __('Посмотреть запись блога'),
            'search_items'       => __('Найти запись блога'),
            'not_found'          => __('записей не найдено'),
            'not_found_in_trash' => __('В корзине записей не найдено'),
            'parent_item_colon'  => '',
            'menu_name'          => __('Блог'),
        ),
        'public'             => true,
        'menu_icon' => 'dashicons-media-interactive',
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title','editor','author','thumbnail','excerpt','comments', 'custom-fields'),
    ) );
}


add_action( 'init', 'create_taxonomy' );
function create_taxonomy(){
    register_taxonomy( 'taxonomy', [ 'blog' ], [
        'label'                 => '',
        'labels'                => [
            'name'              => __('Категории'),
            'singular_name'     => __('Категория'),
            'search_items'      => __('Поиск категорий'),
            'all_items'         => __('Все категории'),
            'view_item '        => __('Посмотреть категории'),
            'parent_item'       => __('Родительская категория'),
            'parent_item_colon' =>  __('Родительская категория'),
            'edit_item'         => __('Редактировать категорию'),
            'update_item'       => __('Обновить категорию'),
            'add_new_item'      =>  __('Добавить новую категорию'),
            'new_item_name'     => __('Добавить новую'),
            'menu_name'         => __('Категории'),
        ],
        'description'           => '',
        'public'                => true,
        'hierarchical'          => true,
        'rewrite'               => true,
        'capabilities'          => array(),
        'meta_box_cb'           => null,
        'show_admin_column'     => true,
        'show_in_rest'          => null,
        'rest_base'             => null,
    ] );

	register_taxonomy('blog_teg', 'blog',array(
		'hierarchical'  => false,
		'labels'        => array(
			'menu_name'  => __( 'Метки' ),
		),
		'show_ui'       => true,
		'query_var'     => true,
	));

}