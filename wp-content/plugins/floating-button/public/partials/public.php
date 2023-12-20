<?php
/**
 * Public code
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$menu_icon = '<i class="' . esc_attr( $param['button_icon'] ) . '"></i>';

$main_type = ! empty( $param['item_type'] ) ? $param['item_type'] : 'main';
$main_link = ! empty( $param['item_link'] ) ? $param['item_link'] : '#';

$button_class = ! empty( $param['main_button_class'] ) ? $param['main_button_class'] : '';
$main_param   = 'class="' . esc_attr( $button_class ) . '"';

$menu = '<div class="flBtn flBtn-position-br flBtn-size-medium flBtn-shape-circle" id="floatBtn-' . absint( $id ) . '">';

if ( $main_type === 'main' ) {
	$menu .= '<label for="floating-main-button-' . absint( $id ) . '" class="flBtn-screen-reader-text">' . esc_attr__( 'Floating button', 'floating-button' ) . '</label>';
	$menu .= '<input type="checkbox" id="floating-main-button-' . absint( $id ) . '">';
	$menu .= '<a role="button" data-role="main ' . wp_kses_post( $main_param ) . '">' . wp_kses_post( $menu_icon ) . '</a>';
} else {
	$menu .= '<a href="' . $main_link . '" data-role="main" ' . wp_kses_post( $main_param ) . '>' . wp_kses_post( $menu_icon ) . '</a>';
}


// Build Vertical button menu

if ( ! empty( $param['menu_1']['item_type'] ) && $main_type === 'main' ) :
	$menu    .= '<ul class="flBtn-first">';
	$count_i = count( $param['menu_1']['item_type'] );

	for ( $i = 0; $i < $count_i; $i ++ ) {
		$menu .= '<li>';

		$icon = '<i class="' . esc_attr( $param['menu_1']['item_icon'][ $i ] ) . '"></i>';

		if ( ! empty( $param['menu_1']['item_tooltip_include'][ $i ] ) ) {
			$tooltip = ' data-tooltip="' . esc_attr( $param['menu_1']['item_tooltip'][ $i ] ) . '"';
		} else {
			$tooltip = '';
		}

		$item_type  = $param['menu_1']['item_type'][ $i ];
		$link_param = $tooltip;
		$link       = $param['menu_1']['item_link'][ $i ];

		switch ( $item_type ) {
			case 'link':
				$menu .= '<a href="' . esc_url( $link ) . '" ' . wp_kses_post( $link_param ) . '>' . wp_kses_post( $icon ) . '</a>';
				break;
			case 'login':
				$menu .= '<a rel="nofollow" href="' . wp_login_url( $link ) . '" ' . wp_kses_post( $link_param ) . '>' . wp_kses_post( $icon ) . '</a>';
				break;
			case 'logout':
				$menu .= '<a rel="nofollow" href="' . wp_logout_url( $link ) . '" ' . wp_kses_post( $link_param ) . '>' . wp_kses_post( $icon )
				         . '</a>';
				break;
			case 'register':
				$menu .= '<a rel="nofollow" href="' . wp_registration_url() . '" ' . wp_kses_post( $link_param ) . '>' . wp_kses_post( $icon ) . '</a>';
				break;
			case 'lostpassword':
				$menu .= '<a rel="nofollow" href="' . wp_lostpassword_url( $link ) . '" ' . wp_kses_post( $link_param ) . '>' . wp_kses_post( $icon )
				         . '</a>';
				break;

		}
		$menu .= '</li>';
	}
	$menu .= '</ul>';
endif;

// Build Horizontal button menu
if ( ! empty( $param['menu_2']['item_type'] ) && $main_type === 'main' ) :
	$menu    .= '<ul class="flBtn-second">';
	$count_i = count( $param['menu_2']['item_type'] );
	for ( $i = 0; $i < $count_i; $i ++ ) {
		$menu .= '<li>';
		$icon = '<i class="' . $param['menu_2']['item_icon'][ $i ] . '"></i>';
		if ( ! empty( $param['menu_2']['item_tooltip_include'][ $i ] ) ) {

			$tooltip = ' data-tooltip="' . $param['menu_2']['item_tooltip'][ $i ] . '"';
		} else {
			$tooltip = '';
		}
		$item_type  = $param['menu_2']['item_type'][ $i ];
		$link_param = $tooltip;
		$link       = $param['menu_2']['item_link'][ $i ];

		switch ( $item_type ) {
			case 'link':
				$menu .= '<a href="' . esc_url( $link ) . '" ' . wp_kses_post( $link_param ) . '>' . wp_kses_post( $icon ) . '</a>';
				break;
			case 'login':
				$menu .= '<a rel="nofollow" href="' . wp_login_url( $link ) . '" ' . wp_kses_post( $link_param ) . '>' . wp_kses_post( $icon ) . '</a>';
				break;
			case 'logout':
				$menu .= '<a rel="nofollow" href="' . wp_logout_url( $link ) . '" ' . wp_kses_post( $link_param ) . '>' . wp_kses_post( $icon )
				         . '</a>';
				break;
			case 'register':
				$menu .= '<a rel="nofollow" href="' . wp_registration_url() . '" ' . wp_kses_post( $link_param ) . '>' . wp_kses_post( $icon ) . '</a>';
				break;
			case 'lostpassword':
				$menu .= '<a rel="nofollow" href="' . wp_lostpassword_url( $link ) . '" ' . wp_kses_post( $link_param ) . '>' . wp_kses_post( $icon )
				         . '</a>';
				break;
		}
		$menu .= '</li>';
	}
	$menu .= '</ul>';
endif;
$menu .= '</div>';

