
<!--- tab first -->
<div class="theme_link">
    <h3><?php _e('1. Install Recommended Plugins','elanzalite'); ?></h3>
    <p><?php _e('We highly Recommend to install ThemeHunk Customizer plugin to get all customization options in Elanzalite theme. Also install recommended plugins available in recommended tab.','elanzalite'); ?></p>

</div>
<div class="theme_link">
    <h3><?php _e('2. Setup Home Page','elanzalite'); ?><!-- <php echo $theme_config['plugin_title']; ?> --></h3>
        <p><?php _e('To set up the HomePage in Elanzalite theme, Just follow the below given Instructions.','elanzalite'); ?> </p>
<p><?php _e('Go to Wp Dashboard > Pages > Add New > Create a Page using “Home Page Template” available in Page attribute.','elanzalite'); ?> </p>
<p><?php _e('Now go to Settings > Reading > Your homepage displays > A static page (select below) and set that page as your homepage.','elanzalite'); ?> </p>
     <p>
        <?php
		if($this->_check_homepage_setup()){
            $class = "activated";
            $btn_text = __("Home Page Activated",'elanzalite');
            $Bstyle = "display:none;";
            $style = "display:inline-block;";
        }else{
            $class = "default-home";
             $btn_text = __("Set Home Page",'elanzalite');
             $Bstyle = "display:inline-block;";
            $style = "display:none;";


        }
        ?>
        <button style="<?php echo $Bstyle; ?>"; class="button activate-now <?PHP echo $class; ?>"><?php _e($btn_text,'elanzalite'); ?></button>

        <a style="<?php echo $style; ?>";  target="_blank" href="<?php echo get_home_url(); ?>" class="button alink button-primary"><?php _e('View Home Page','elanzalite'); ?></a>
		
         </p>
		 	 
		 
    <p>
        <a target="_blank" href="https://themehunk.com/docs/elanza-lite-theme/#setup-homepage" class="button"><?php _e('Go to Doc','elanzalite'); ?></a>
    </p>
</div>

<!--- tab third -->





<!--- tab second -->
<div class="theme_link">
    <h3><?php _e('3. Customize Your Website','elanzalite'); ?><!-- <php echo $theme_config['plugin_title']; ?> --></h3>
    <p><?php _e('Elanzalite theme support live customizer for home page set up. Everything visible at home page can be changed through customize panel','elanzalite'); ?></p>
    <p>
    <a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary"><?php _e("Start Customize","elanzalite"); ?></a>
    </p>
</div>
<!--- tab third -->

  <div class="theme_link">
    <h3><?php _e("4. Customizer Links","elanzalite"); ?></h3>
    <div class="card-content">
        <div class="columns">
                <div class="col">
                    <a href="<?php echo admin_url('customize.php?autofocus[control]=custom_logo'); ?>" class="components-button is-link"><?php _e("Upload Logo","elanzalite"); ?></a>
                    <hr><a href="<?php echo admin_url('customize.php?autofocus[panel]=elanzalite_theme_options'); ?>" class="components-button is-link"><?php _e("Theme Options","elanzalite"); ?></a><hr>
                    <a href="<?php echo admin_url('customize.php?autofocus[panel]=woocommerce'); ?>" class="components-button is-link"><?php _e("Woocommerce","elanzalite"); ?></a><hr>

                </div>

               <div class="col">

                <a href="<?php echo admin_url('customize.php?autofocus[panel]=nav_menus'); ?>" class="components-button is-link"><?php _e("Menus","elanzalite"); ?></a><hr>

                <a href="<?php echo admin_url('customize.php?autofocus[section]=custom_css'); ?>" class="components-button is-link"><?php _e("Additional CSS","elanzalite"); ?></a>
                <hr>


                 <a href="<?php echo admin_url('customize.php?autofocus[panel]=widgets'); ?>" class="components-button is-link"><?php _e("Widgets","elanzalite"); ?></a><hr>
            </div>

        </div>
    </div>

</div>
<!--- tab fourth -->