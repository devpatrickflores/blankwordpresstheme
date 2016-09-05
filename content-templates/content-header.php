<?php
/**
 * Section header file for blank wordpress theme.
 * @package blankwordpresstheme
 */
?>

<header id="bwt-header">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					 <div class="bwt-logo">
             <a href="<?php bloginfo('url');?>">
               <?php if(get_theme_mod('bwt_logo')): ?>
               <img src="<?php echo get_theme_mod('bwt_logo');?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display'));?>" />
               <?php else: ?>
                 Blank Wordpress Theme
              <?php endif; ?>
             </a>
           </div>
				</div>

				<div class="col-sm-8 col-xs-12">
						<nav id="bwt-navigation" class="navbar">
							<div class="navbar-header">
								<a href="javascript:void(0)" class="mobile-icon visible-xs">
									<div class="hamburger">
										<div class="menui top-menu"></div>
										<div class="menui mid-menu"></div>
										<div class="menui bottom-menu"></div>
									</div>
								</a>
							</div>
							<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_class' => 'nav navbar-nav navbar-right nav-menu hidden-xs') ); ?>
						</nav>
				</div>
			</div>
		</div>
</header>
