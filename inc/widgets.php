<?php

function watergate_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar ', 'watergate' ),
		'id'            => 'default-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'watergate' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Cateory Sidebar ', 'watergate' ),
		'id'            => 'category-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'watergate' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'watergate_widgets_init' );