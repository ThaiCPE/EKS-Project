<?php
/**
 * The template for displaying home page.
 *
 * Template Name: Custom Home Page
 *
 * @package SAAS Software Technology
 */
get_header(); ?>

<main id="main" role="main">
  
<?php if( get_theme_mod( 'saas_software_technology_slider_hide_show', false ) != '' || get_theme_mod( 'saas_software_technology_slider_responsive', true ) != '' ) {?>
    <div class="slider-section position-relative">
      <section id="slider">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000"> 
          <?php $saas_software_technology_slider_pages = array();
            for ( $saas_software_technology_count = 1; $saas_software_technology_count <= 4; $saas_software_technology_count++ ) {
              $saas_software_technology_mod = intval( get_theme_mod( 'saas_software_technology_slider_page' . $saas_software_technology_count ));
              if ( 'page-none-selected' != $saas_software_technology_mod ) {
                $saas_software_technology_slider_pages[] = $saas_software_technology_mod;
              }
            }
            if( !empty($saas_software_technology_slider_pages) ) :
              $saas_software_technology_args = array(
                'post_type' => 'page',
                'post__in' => $saas_software_technology_slider_pages,
                'orderby' => 'post__in'
              );
              $saas_software_technology_query = new WP_Query( $saas_software_technology_args );
            if ( $saas_software_technology_query->have_posts() ) :
              $i = 1;
          ?>     
          <div class="carousel-inner" role="listbox">
            <?php  while ( $saas_software_technology_query->have_posts() ) : $saas_software_technology_query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <div class="slider-bgimage">
                <?php if(has_post_thumbnail()){ ?>
                  <?php the_post_thumbnail(); ?>
                <?php } else {?>
                  <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/banner-image.png" alt="<?php echo esc_attr('Slider Image', 'saas-software-technology'); ?>">
                <?php }?>
              </div>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <?php if( get_theme_mod('saas_software_technology_slider_small_title') != '' ){ ?>
                    <div class="mb-1 wow bounceInUp" data-wow-duration="2s">
                      <span class="slider-badge mb-1"><?php echo esc_html(get_theme_mod('saas_software_technology_slider_small_title',''));?></span>
                    </div>
                  <?php }?>
                  <?php if( get_theme_mod('saas_software_technology_slider_title',true) != ''){ ?>
                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h1>
                  <?php }?>
                  <?php if( get_theme_mod('saas_software_technology_slider_content',true) != ''){ ?>  
                    <p class="mb-3"><?php $saas_software_technology_excerpt = get_the_excerpt(); echo esc_html( saas_software_technology_string_limit_words( $saas_software_technology_excerpt,esc_attr(get_theme_mod('saas_software_technology_slider_excerpt_length','20')))); ?></p>
                  <?php }?>  
                  <?php if(get_theme_mod('saas_software_technology_slider_button',true) != '' || get_theme_mod('saas_software_technology_slider_button_responsive',true) != ''|| get_theme_mod('saas_software_technology_slider_button_text','View Tour') != ''|| get_theme_mod('saas_software_technology_slider_button_link') != '') {?> 
                    <div class="read-btn">
                      <a href="<?php echo esc_url(get_theme_mod('saas_software_technology_slider_button_link')!= '') ? esc_url(get_theme_mod('saas_software_technology_slider_button_link')) : esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('saas_software_technology_slider_button_text',__('Read More', 'saas-software-technology'))); ?><span class="screen-reader-text"><?php echo esc_html('Read More', 'saas-software-technology') ?></span></a>
                    </div>
                  <?php }?>    
                </div>
              </div>
            </div>
            <?php $i++; endwhile; 
            wp_reset_postdata();?>
          </div>
          <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif;
          endif;?>
          <?php if( get_theme_mod('saas_software_technology_slider_arrow',true) != ''){ ?>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="<?php echo esc_attr(get_theme_mod('saas_software_technology_slider_prev_icon','fas fa-long-arrow-alt-left')); ?>"></i></span><span class="screen-reader-text"><?php esc_html_e( 'Previous','saas-software-technology');?></span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"><i class="<?php echo esc_attr(get_theme_mod('saas_software_technology_slider_next_icon','fas fa-long-arrow-alt-right')); ?>"></i></span><span class="screen-reader-text"><?php esc_html_e( 'Next','saas-software-technology');?></span>
          </a>
          <?php }?>
        </div> 
      </section> 
    </div>
  <?php }?>

  <?php do_action( 'saas_software_technology_before_product_section' ); ?>

  <?php if( get_theme_mod( 'saas_software_technology_about_hide_show', false ) != '') {?>
  <section id="about-section" class="pb-5">
    <div class="container">
      <?php $saas_software_technology_about_page = array();
        $saas_software_technology_mod = absint( get_theme_mod( 'saas_software_technology_about_page'));
        if ( 'page-none-selected' != $saas_software_technology_mod ) {
          $saas_software_technology_about_page[] = $saas_software_technology_mod;
        }
        if( !empty($saas_software_technology_about_page) ) :
          $saas_software_technology_args = array(
            'post_type' => 'page',
            'post__in' => $saas_software_technology_about_page,
            'orderby' => 'post__in'
          );
          $saas_software_technology_query = new WP_Query( $saas_software_technology_args );
          if ( $saas_software_technology_query->have_posts() ) :
            $saas_software_technology_count = 0;
            while ( $saas_software_technology_query->have_posts() ) : $saas_software_technology_query->the_post(); ?>
              <div class="row">
                <div class="col-lg-7 col-md-7 align-self-center">
                  <?php if(get_theme_mod('saas_software_technology_section_title') != ''){ ?>
                    <h2><?php echo esc_html(get_theme_mod('saas_software_technology_section_title')); ?></h2>
                  <?php }?>
                  <h3><?php the_title(); ?></h3>
                  <p class="mb-5"><?php $saas_software_technology_excerpt = get_the_excerpt(); echo esc_html( saas_software_technology_string_limit_words( $saas_software_technology_excerpt, 30)); ?></p>
                  <div class="about-list">
                    <?php for ($i=1; $i <= 2; $i++) { ?>
                      <div class="about-tech">
                        <div class="row">
                          <div class="col-lg-4 col-md-4 col-3 align-self-center">
                            <span class="tech-num"><?php echo esc_html($i); ?></span>
                          </div>
                          <div class="col-lg-8 col-md-8 col-9 align-self-center">
                            <span class="tech-name"><?php echo esc_html(get_theme_mod('saas_software_technology_about_list_text'.$i));?></span>
                          </div>
                        </div>
                      </div>
                    <?php }?>
                  </div>
                  <div class="read-btn mt-5">
                    <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small"><?php echo esc_html('Know More', 'saas-software-technology'); ?><span class="screen-reader-text"><?php echo esc_html('Know More', 'saas-software-technology'); ?></span>
                    </a>
                  </div>
                </div>
                <div class="col-lg-5 col-md-5 align-self-center">
                  <?php if(has_post_thumbnail()) {?>
                    <div class="image-box position-relative">
                      <?php the_post_thumbnail(); ?>
                    </div>
                  <?php }?>
                </div>
              </div>
            <?php endwhile; ?>
          <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif;
        endif;
        wp_reset_postdata();
      ?>
    </div>
  </section>

  <?php do_action( 'saas_software_technology_after_product_section' ); ?>

  <div id="content-ma" class="py-5">
  	<div class="container">
    	<?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
  	</div>
  </div>
  <?php }?>
</main>

<?php get_footer(); ?>