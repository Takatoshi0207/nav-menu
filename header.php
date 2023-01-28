<?php

/**
 * The header for Astra Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

?>
<!DOCTYPE html>
<?php astra_html_before(); ?>
<html <?php language_attributes(); ?>>

<head>
	<?php astra_head_top(); ?>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<?php astra_head_bottom(); ?>

</head>

<body <?php astra_schema_body(); ?> <?php body_class(); ?>>
	<?php astra_body_top(); ?>
	<?php wp_body_open(); ?>
	<header class="header">
		<div class="header-inner hiddenSp">
			<nav class="header__nav">
				<a href="<?php echo home_url(); ?>" class="header__logo">
					<img class="header__logo-img" src="<?php echo get_stylesheet_directory_uri();  ?>/favicon/logo.svg" alt="" loading="lazy" height="60">
				</a>
				<ul class="header__list">
					<li class="header__list-item">
						<a href="<?php echo site_url('#'); ?>" class="header__list-item-link">
							<img class="header__list-item-link-img" src="<?php echo get_stylesheet_directory_uri(); ?>/favicon/about.svg" alt="" loading="lazy" height="60">
							<span class="header__list-item-link-nomal">About as</span>
							<span class="header__list-item-link-hover">インテリアロード<br>について</span>
						</a>
					</li>
					<li class="header__list-item">
						<a href="<?php echo site_url('#'); ?>" class="header__list-item-link">
							<img class="header__list-item-link-img" src="<?php echo get_stylesheet_directory_uri(); ?>/favicon/menber.svg" alt="" loading="lazy" height="60">
							<span class="header__list-item-link-nomal">Members</span>
							<span class="header__list-item-link-hover">メンバー紹介</span>
						</a>
					</li>
					<li class="header__list-item">
						<a href="<?php echo site_url('#'); ?>" class="header__list-item-link">
							<img class="header__list-item-link-img" src="<?php echo get_stylesheet_directory_uri(); ?>/favicon/message.svg" alt="" loading="lazy" height="60">
							<span class="header__list-item-link-nomal">Message</span>
							<span class="header__list-item-link-hover">代表メッセージ</span>
						</a>
					</li>
					<li class="header__list-item">
						<a href="<?php echo site_url('#'); ?>" class="header__list-item-link">
							<img class="header__list-item-link-img" src="<?php echo get_stylesheet_directory_uri(); ?>/favicon/recruit.svg" alt="" loading="lazy" height="60">
							<span class="header__list-item-link-nomal">Recruit</span>
							<span class="header__list-item-link-hover">採用情報</span>
						</a>
					</li>
					<li class="header__list-item">
						<a href="<?php echo site_url('#'); ?>" class="header__list-item-link">
							<img class="header__list-item-link-img" src="<?php echo get_stylesheet_directory_uri(); ?>/favicon/faq.svg" alt="" loading="lazy" height="60">
							<span class="header__list-item-link-nomal">FAQ</span>
							<span class="header__list-item-link-hover">ご質問</span>
						</a>
					</li>
					<li class="header__list-item">
						<a href="<?php echo site_url('#'); ?>" class="header__list-item-link">
							<img class="header__list-item-link-img" src="<?php echo get_stylesheet_directory_uri(); ?>/favicon/entry.svg" alt="" loading="lazy" height="60">
							<span class="header__list-item-link-nomal">Entry</span>
							<span class="header__list-item-link-hover">応募</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
			<!-- sp menu -->
			<div class="hiddenPc">
				<div class="header__sp">
					<a href="<?php echo home_url(); ?>" class="header__sp-logo">
						<img class="header__logo-img" src="<?php echo get_stylesheet_directory_uri();  ?>/favicon/logo.svg" alt="" loading="lazy" height="60">
					</a>
					<div class="openbtn"><span></span><span></span><span></span></div>
				</div>
			</div>
	</header> <!-- .header -->

	<a class="skip-link screen-reader-text" href="#content" role="link" title="<?php echo esc_html(astra_default_strings('string-header-skip-link', false)); ?>">
		<?php echo esc_html(astra_default_strings('string-header-skip-link', false)); ?>
	</a>

	<div <?php
				echo astra_attr(
					'site',
					array(
						'id'    => 'page',
						'class' => 'hfeed site',
					)
				);
				?>>
		<?php
		astra_header_before();

		astra_header();

		astra_header_after();

		astra_content_before();
		?>
		<div id="content" class="site-content">
			<div class="ast-container">
				<?php astra_content_top(); ?>