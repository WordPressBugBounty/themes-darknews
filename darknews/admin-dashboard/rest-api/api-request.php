<?php 

add_action('rest_api_init','darknews_register_plugins_routes');
function darknews_register_plugins_routes(){
    register_rest_route( 'aft-useful-plugins/v1', '/get-useful-plugins', array(
        'methods' => 'GET',
        'callback' => 'darknews_get_all_useful_plugins',
        'permission_callback' => function () {           
            return current_user_can('manage_options');
        }
      ) );
}

function darknews_get_all_useful_plugins(\WP_REST_Request $request){
    $params = $request->get_params();
    
   $plugin_array =  json_decode($request['plug'],TRUE);
   
    require_once( ABSPATH . 'wp-admin/includes/plugin-install.php' );

    
      $data = array();
      foreach($plugin_array as $plugin) {

        $button_classes = 'install button';
        $button_text = __('Install Now', 'darknews');
        
        $plugin_description  = $plugin['description'];

        
        
        $api = plugins_api( 'plugin_information',
           array(
              'slug' => sanitize_file_name($plugin['slug']),
              'fields' => array(
                 'short_description' => true,
                 'sections' => false,
                 'requires' => false,
                 'downloaded' => true,
                 'last_updated' => false,
                 'added' => false,
                 'tags' => false,
                 'compatibility' => false,
                 'homepage' => false,
                 'donate_link' => false,
                 'icons' => true,
                 'banners' => true,
              ),
           )
        );


             if ( !is_wp_error( $api ) ) { // confirm error free

            $main_plugin_file = darknews_get_plugin_file($plugin['slug']); // Get main plugin file
            if($plugin['slug'] == 'af-companion'){
                $title = $plugin['title'];
            }else{
                $title = $api->name;
            }
            
            if(darknews_check_file_extension($main_plugin_file)){ // check file extension
                if(is_plugin_active($main_plugin_file)){
                   // plugin activation, confirmed!
                   $button_classes = 'button disabled';
                   $button_text = __('Activated', 'darknews');
               } else {
                  // It's installed, let's activate it
                   $button_classes = 'activate button button-primary';
                   $button_text = __('Activate', 'darknews');
               }
            }
            $data['plugins'][] = darknews_render_plugin_lists_template($plugin, $api, $button_text, $button_classes, $plugin_description,$title);
        }

        
    }

    return $data;

}


function darknews_render_plugin_lists_template($plugin, $api, $button_text, $button_classes ,$plugin_description,$title){
    
    ob_start();
    ?>
        <div class="aft-plugin-installer">
            <div class="plugin">
                <div class="plugin-headear">
                    <img src="<?php echo $api->icons['1x']; ?>" alt="">
                     <h2><?php echo $title; ?></h2>
                </div>
                <div class="plugin-info">
                    <p><?php echo $plugin_description; ?></p>

                    <p class="plugin-author"><?php _e('By', 'darknews'); ?> <?php echo $api->author; ?></p>
                </div>
                <ul class="activation-row">
                <li>
                <?php if($api->slug == 'af-companion' && $button_text == 'Activated'){?>
                    <a class="button-primary" href="<?php echo site_url( ).'/wp-admin/admin.php?page='.$api->slug?>"><?php echo _e('Get Starter Sites','darknews')?></a>
                    
               <?php  }else{?>
                    
                    <a class="<?php echo $button_classes; ?>"
                        data-slug="<?php echo $api->slug; ?>"
                                    data-name="<?php echo $api->name; ?>"
                                        href="<?php echo get_admin_url(); ?>/update.php?action=install-plugin&amp;plugin=<?php echo $api->slug; ?>&amp;_wpnonce=<?php echo wp_create_nonce('install-plugin_'. $api->slug) ?>">
                                <?php echo $button_text; ?>
                    </a>
                    <?php }?>
               </li>
                <li>
                    <a  href="https://wordpress.org/plugins/<?php echo $api->slug; ?>/" target="_blank">
                        <?php _e('More Details', 'darknews'); ?>
                    </a>
                </li>
                </ul>
            </div>
        </div>

        


<?php 
 return ob_get_clean();
}

function darknews_get_plugin_file( $plugin_slug ) {
    require_once( ABSPATH . '/wp-admin/includes/plugin.php' ); // Load plugin lib
    $plugins = get_plugins();

    foreach( $plugins as $plugin_file => $plugin_info ) {

        // Get the basename of the plugin e.g. [askismet]/askismet.php
        $slug = dirname( plugin_basename( $plugin_file ) );

        if($slug){
           if ( $slug == $plugin_slug ) {
              return $plugin_file; // If $slug = $plugin_name
           }
       }
    }
    return null;
 }


 function darknews_check_file_extension( $filename ) {
    if( substr( strrchr($filename, '.' ), 1 ) === 'php' ){
        // has .php exension
        return true;
    } else {
        // ./wp-content/plugins
        return false;
    }

}

function darknews_get_companion_status(\WP_REST_Request $request){
    if ( file_exists( WP_PLUGIN_DIR . '/af-companion/af-companion.php' ) ) {
        if(!is_plugin_active('af-companion/af-companion.php')){
            
            $af_companion_title = __( 'Get Starter Sites', 'darknews' );
            $af_companion_url = site_url( ).'/wp-admin/admin.php?page=af-companion';
            $af_target = '_self';
            $af_plugin_status="inactive";
        }else{
            $af_companion_title = __( 'Get Starter Sites', 'darknews' );
            $af_companion_url = site_url( ).'/wp-admin/admin.php?page=af-companion';
            $af_target = '_self';
            $af_plugin_status="active";
        }
    }else{
        

            require_once( ABSPATH . 'wp-admin/includes/plugin-install.php' );
			require_once( ABSPATH . 'wp-admin/includes/class-wp-upgrader.php' );
			require_once( ABSPATH . 'wp-admin/includes/class-wp-ajax-upgrader-skin.php' );
			require_once( ABSPATH . 'wp-admin/includes/class-plugin-upgrader.php' );
            $plugin='af-companion';
            $api = plugins_api( 'plugin_information',
				array(
					'slug' => $plugin,
					'fields' => array(
						'short_description' => false,
						'sections' => false,
						'requires' => false,
						'rating' => false,
						'ratings' => false,
						'downloaded' => false,
						'last_updated' => false,
						'added' => false,
						'tags' => false,
						'compatibility' => false,
						'homepage' => false,
						'donate_link' => false,
					),
				)
			);

			$skin     = new WP_Ajax_Upgrader_Skin();
			$upgrader = new Plugin_Upgrader( $skin );
			$upgrader->install($api->download_link);

			if($api->name){
                $af_companion_title = __( 'Get Starter Sites', 'darknews' );
                $af_companion_url = site_url( ).'/wp-admin/admin.php?page=af-companion';
                $af_target = '_self';
                $af_plugin_status="inactive";
			} 
           
    }
    $json= array(
        'title'=>$af_companion_title,
        'link'=>$af_companion_url,
        'target'=>$af_target,
        'af_plugin_status'=>$af_plugin_status
        
    );
    return $json;

    

}

function darknews_get_companion_activation(\WP_REST_Request $request){
    
     if(!is_plugin_active('af-companion/af-companion.php')){
         activate_plugin(  'af-companion/af-companion.php', '',false, true );
       
     }
     return "success";

}