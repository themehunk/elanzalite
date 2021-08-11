<?php
/**
* The template for displaying the footer
*/
?>
<?php
$back_to_top_ = get_theme_mod('elanzalite_backtotop_disable');?> 
<?php if($back_to_top_=='' || $back_to_top_=='0') { 
$back_to_top='on';
}else{
$back_to_top='';
}?>
<input type="hidden" id="back-to-top" value="<?php echo esc_attr($back_to_top); ?>"/>
<div class="hk-instagram">
	<div class="widget">
		<?php
		if ( is_active_sidebar( 'instagram-footer-widget' ) ){
		dynamic_sidebar( 'instagram-footer-widget' );
		}
		?>
	</div>
</div>
<div class="footer-wrapper">
	<div class="container">
		<?php get_sidebar('footer'); ?>
		<div class="clearfix"></div>
	</div>
	<div class="footer-copyright">
		<div class="container">
			<ul>
				<li class="copyright">
					<?php 
			$allowed_html = array(
                                  'a' => array(
                                  'href' => array(),
                                  'title' => array(),
                                  'target' => array()
                              ),
                              'br' => array(),
                              'em' => array(),
                              'strong' => array(),
                          );
                $url = "https://themehunk.com";
              echo  sprintf( 
              	wp_kses( __( 'ElanzaLite developed by <a href="%s" target="_blank">ThemeHunk</a>', 'elanzalite' ), $allowed_html), esc_url( $url ) );
			?>
				</li>
				<li class="social-icon">
					<ul>
						<?php if($f_link = esc_url(get_theme_mod('f_link'))) : ?><li><a target='_blank' href="<?php echo esc_url($f_link); ?>" >
						<i class='fa fa-facebook'></i></a></li><?php endif; ?>
						<?php if($y_link = esc_url(get_theme_mod('y_link'))) : ?><li><a target='_blank' href="<?php echo esc_url($y_link); ?>" ><i class='fa fa-youtube'></i></a></li><?php endif; ?>
						<?php if($s_link = esc_url(get_theme_mod('s_link'))) : ?><li><a target='_blank' href="<?php echo esc_url($s_link); ?>" ><i class='fa fa-skype'></i></a></li><?php endif; ?>
						<?php if($i_link = esc_url(get_theme_mod('i_link'))) : ?><li><a target='_blank' href="<?php echo esc_url($i_link); ?>" ><i class='fa fa-instagram'></i></a></li><?php endif; ?>
						<?php if($l_link = esc_url(get_theme_mod('l_link'))) : ?>
						<li><a target='_blank' href="<?php echo esc_url($l_link); ?>" ><i class='fa fa-linkedin'></i></a></li><?php endif; ?>
						<?php if($p_link = esc_url(get_theme_mod('p_link'))) : ?><li><a target='_blank' href="<?php echo esc_url($p_link); ?>" ><i class='fa fa-pinterest'></i></a></li><?php endif; ?>
						<?php if($t_link = esc_url(get_theme_mod('t_link'))) : ?><li><a target='_blank' href="<?php echo esc_url($t_link); ?>" ><i class='fa fa-twitter'></i></a></li><?php endif; ?>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>
<?php wp_footer();
?>
</body>
</html>