<?php
/**
 * The Template for displaying a custom shortcode inside the Hero
 *
 * @author         United Themes
 * @package     Brooklyn
 * @version     1.0
 */

/* template config */
$ut_hero_shortcode = ut_return_hero_config('ut_hero_shortcode');

/* down arrow button */
$ut_hero_down_arrow = ut_return_hero_config('ut_hero_down_arrow' , 'off');
$ut_hero_down_arrow_scroll_target = ut_return_hero_config('ut_hero_down_arrow_scroll_target' , '#ut-to-first-section'); ?>

<!-- hero section -->
<section id="ut-custom-hero" class="ut-custom-hero ha-waypoint" data-animate-up="ha-header-hide" data-animate-down="ha-header-hide">

    <?php echo do_shortcode( ut_translate_meta($ut_hero_shortcode) ); ?>
    
    <?php if( $ut_hero_down_arrow == 'on' ) : ?>
                    
        <div class="hero-down-arrow-wrap">                        
            
            <span class="hero-down-arrow">
                
                <a href="<?php echo ut_clean_section_id( $ut_hero_down_arrow_scroll_target ); ?>"><i class="Bklyn-Core-Down-3"></i></a>
                
            </span>
            
        </div>
    
    <?php endif; ?>
    
</section>
<!-- end hero section -->