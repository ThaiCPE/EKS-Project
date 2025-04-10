<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package SAAS Software Technology
 */
get_header(); ?>

<main id="main" role="main" class="content-aa">
	<div class="container space-top">
        <div class="page-content py-4">
        	<?php if(get_theme_mod('saas_software_technology_404_title','404 Not Found')){ ?>
				<h1><?php echo esc_html( get_theme_mod('saas_software_technology_404_title',__('404 Not Found', 'saas-software-technology' )) ); ?></h1>
			<?php }?>
			<?php if(get_theme_mod('saas_software_technology_404_text','Looks like you have taken a wrong turn. Dont worry it happens to the best of us.')){ ?>
				<p class="text-404 mb-0"><?php echo esc_html( get_theme_mod('saas_software_technology_404_text',__('Looks like you have taken a wrong turn. Dont worry it happens to the best of us.', 'saas-software-technology' )) ); ?></p>
			<?php }?>
			<?php if(get_theme_mod('saas_software_technology_404_button_text','Return to Home Page')){ ?>
				<div class="read-moresec">
	           		<a href="<?php echo esc_url( home_url() ); ?>" class="button my-3 py-2 px-4"><?php echo esc_html( get_theme_mod('saas_software_technology_404_button_text',__('Return to Home Page', 'saas-software-technology' )) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('saas_software_technology_404_button_text',__('Return to Home Page', 'saas-software-technology' )) ); ?></span></a>
				</div>
				<div class="clearfix"></div>
			<?php }?>
        </div>
	</div>
</main>
	
<?php get_footer(); ?>