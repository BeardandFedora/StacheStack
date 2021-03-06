<?php

/*
 * Add the necessary actions and filters for post formats.
 */
function stachestack_post_formats() {
	if ( is_singular() ) {

		// If the post format is set to "aside", don't display a title.
		if ( get_post_format() == 'aside' ) {
			add_filter( 'stachestack_title_section', '__return_null', 20 );
		}

		if ( get_post_format() == 'gallery' ) {
			add_filter( 'stachestack_title', 'stachestack_post_format_gallery_title', 20 );
		}

		// If the post format is set to "link", make the link into a button.
		if ( get_post_format() == 'link' ) {
			add_filter( 'the_content', 'stachestack_post_formats_link' );
			add_filter( 'stachestack_title', 'stachestack_post_format_link_title', 20 );
		}

		if ( get_post_format() == 'image' ) {
			add_filter( 'stachestack_title', 'stachestack_post_format_image_title', 20 );
		}

		if ( get_post_format() == 'quote' ) {
			add_filter( 'stachestack_title', 'stachestack_post_format_quote_title', 20 );
		}

		if ( get_post_format() == 'status' ) {
			add_filter( 'stachestack_title', 'stachestack_post_format_status_title', 20 );
		}

		if ( get_post_format() == 'video' ) {
			add_filter( 'stachestack_title', 'stachestack_post_format_video_title', 20 );
		}

		if ( get_post_format() == 'audio' ) {
			add_filter( 'stachestack_title', 'stachestack_post_format_audio_title', 20 );
		}

		if ( get_post_format() == 'chat' ) {
			add_filter( 'stachestack_title', 'stachestack_post_format_chat_title', 20 );
		}
	}
}
add_action( 'wp', 'stachestack_post_formats' );


/**
 * Add icons to post format titles (gallery)
 */
function stachestack_post_format_gallery_title( $title ) {
	return '<i class="el-icon-picture text-info"></i> ' . $title;
}

/**
 * Add icons to post format titles (link)
 */
function stachestack_post_format_link_title( $title ) {
	return '<i class="el-icon-link text-info"></i> ' . $title;
}

/**
 * Add icons to post format titles (image)
 */
function stachestack_post_format_image_title( $title ) {
	return '<i class="el-icon-picture text-info"></i> ' . $title;
}

/**
 * Add icons to post format titles (quote)
 */
function stachestack_post_format_quote_title( $title ) {
	return '<i class="el-icon-quotes-alt text-info"></i> ' . $title;
}

/**
 * Add icons to post format titles (status)
 */
function stachestack_post_format_status_title( $title ) {
	return '<i class="el-icon-comment text-info"></i> ' . $title;
}

/**
 * Add icons to post format titles (video)
 */
function stachestack_post_format_video_title( $title ) {
	return '<i class="el-icon-video text-info"></i> ' . $title;
}

/**
 * Add icons to post format titles (audio)
 */
function stachestack_post_format_audio_title( $title ) {
	return '<i class="el-icon-volume-up text-info"></i> ' . $title;
}

/**
 * Add icons to post format titles (chat)
 */
function stachestack_post_format_chat_title( $title ) {
	return '<i class="el-icon-comment-alt text-info"></i> ' . $title;
}


/*
 * If the post format is set to "link", make the link into a button.
 */
function stachestack_post_formats_link( $content ) {
	global $ss_framework;

	return str_replace( '<a ', '<a class="' . $ss_framework->button_classes( 'primary', 'large' ) . '" ', $content );
}
