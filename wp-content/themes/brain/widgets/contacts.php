<?php

add_action( 'widgets_init', 'register_my_widgets' );
function register_my_widgets(){
	register_sidebar( array(
		'name'          => 'Контактная информация',
		'id'            => "contacts",
		'description'   => '',
		'class'         => '',
		'before_widget' => '<li id="%1$s" class="widget nav-item %2$s">',
		'after_widget'  => "</li>\n",
		'before_title'  => '<div style="display: none;">',
		'after_title'   => "</div>\n",
	) );
}