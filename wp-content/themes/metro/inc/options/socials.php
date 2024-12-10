<?php
/**
 * @author  RadiusTheme
 *
 * @since   1.0
 *
 * @version 1.0
 */

namespace radiustheme\Metro;

use Redux;

$opt_name = Constants::$theme_options;

Redux::setSection(
	$opt_name,
	[
		'title'   => esc_html__('Contact & Socials', 'metro'),
		'id'      => 'socials_section',
		'heading' => '',
		'icon'    => 'el el-twitter',
		'fields'  => [
			[
				'id'       => 'phone',
				'type'     => 'text',
				'title'    => esc_html__('Phone', 'metro'),
				'default'  => '',
			],
			[
				'id'       => 'email',
				'type'     => 'text',
				'title'    => esc_html__('Email', 'metro'),
				'validate' => 'email',
				'default'  => '',
			],
			[
				'id'       => 'social_facebook',
				'type'     => 'text',
				'title'    => esc_html__('Facebook', 'metro'),
				'default'  => '',
			],
			[
				'id'       => 'social_twitter',
				'type'     => 'text',
				'title'    => esc_html__('Twitter', 'metro'),
				'default'  => '',
			],
			[
				'id'       => 'social_linkedin',
				'type'     => 'text',
				'title'    => esc_html__('Linkedin', 'metro'),
				'default'  => '',
			],
			[
				'id'       => 'social_youtube',
				'type'     => 'text',
				'title'    => esc_html__('Youtube', 'metro'),
				'default'  => '',
			],
			[
				'id'       => 'social_pinterest',
				'type'     => 'text',
				'title'    => esc_html__('Pinterest', 'metro'),
				'default'  => '',
			],
			[
				'id'       => 'social_instagram',
				'type'     => 'text',
				'title'    => esc_html__('Instagram', 'metro'),
				'default'  => '',
			],
			[
				'id'       => 'social_vk',
				'type'     => 'text',
				'title'    => esc_html__('VKontakte', 'metro'),
				'default'  => '',
			],
			[
				'id'       => 'social_rss',
				'type'     => 'text',
				'title'    => esc_html__('RSS', 'metro'),
				'default'  => '',
			],
		],
	]
);
