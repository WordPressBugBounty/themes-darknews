<?php
class AdminNotice
{

  private $dismiss_notice_key = 'aft_notice_dismissed';

  private $theme_name;
  private $theme_slug;
  private $page_slug;
  private $screenshot;

  public function __construct()
  {

    $theme = wp_get_theme();
    if (! is_child_theme()) {
      $this->screenshot =  get_template_directory_uri() . "/screenshot.png";
    } else {
      $this->screenshot =  get_stylesheet_directory_uri() . "/screenshot.png";
    }

    $this->theme_name = $theme->get('Name');
    $this->theme_slug    = $theme->get_template();
    $this->page_slug     = $this->theme_slug;

    if (get_option($this->dismiss_notice_key) !== 'yes') {
      add_action('admin_notices', [$this, 'darknews_admin_notice'], 0);
      add_action('wp_ajax_aft_notice_dismiss', [$this, 'darknews_notice_dismiss']);
    }
  }

  function darknews_admin_notice()
  {
    $current_screen = get_current_screen();

    if ($current_screen->id != 'tools' && $current_screen->id != 'plugins' && $current_screen->id != 'options-general' && $current_screen->id !== 'dashboard' && $current_screen->id !== 'themes' && $current_screen->id !== 'appearance_page_af-dashbaord-details') {

      return;
    }



    if (defined('DOING_AJAX') && DOING_AJAX) {
      return;
    }

    if (is_network_admin()) {
      return;
    }

    if (! current_user_can('manage_options')) {
      return;
    }

    global $current_user;
    $user_id          = $current_user->ID;
    $dismissed_notice = get_user_meta($user_id, $this->dismiss_notice_key, true);


    if ($dismissed_notice === 'dismissed') {
      update_option($this->dismiss_notice_key, 'yes');
    }

    if (get_option($this->dismiss_notice_key, 'no') === 'yes') {
      return;
    }
    echo '<div class="aft-notice-content-wrapper updated notice">';
    echo '<button type="button" class="notice-dismiss aft-dismiss-notice"><span class="screen-reader-text">Dismiss this notice.</span></button>';
    $this->darknews_dashboard_notice_content();
    echo '</div>';
  }

  function darknews_dashboard_notice_content()
  {

    //$plugins = apply_filters('aft_plugins_for_starter_sites', array("blockspare", "templatespare", "elespare"));
    $plugins = apply_filters('aft_plugins_for_starter_sites', array("templatespare"));
    $install_plugin = [];
    $darknews_templatespare_subtitle = '';
    $activate_plugins = [];
    // $install_plugin = [];
    // $blocksapre_pro = 'blockspare-pro';
    // $elepsare_pro = 'elespare-pro';
    // $is_blockspare_pro = darknews_get_plugin_file($blocksapre_pro);
    // $is_elespare_pro = darknews_get_plugin_file($elepsare_pro);
    // $af_themes_info = new AF_themes_info();
    // $check_blockspare = $af_themes_info->darknews_check_blockspare_free_pro_activated();
    // $check_elespare = $af_themes_info->darknews_check_elespare_free_pro_activated();
    // $darknews_elementor_pro_installed = darknews_get_plugin_file('elementor-pro');
    // $darknews_elementor_installed = darknews_get_plugin_file('elementor');
    // if ($check_blockspare == 'pro' && $is_blockspare_pro != null) {
    //   unset($plugins[array_search('blockspare', $plugins)]);
    //   array_push($plugins, $blocksapre_pro);
    // }
    // if ($check_elespare == 'pro' && $is_elespare_pro != null) {
    //   unset($plugins[array_search('elespare', $plugins)]);
    //   array_push($plugins, $elepsare_pro);
    //   if (!empty($darknews_elementor_pro_installed)) {
    //     array_push($plugins, 'elementor-pro');
    //   }
    //   if (!empty($darknews_elementor_installed)) {
    //     array_push($plugins, 'elementor');
    //   } else {
    //     array_push($plugins, 'elementor');
    //   }
    // }
    // if (array_search('elespare', $plugins)) {
    //   if (!empty($darknews_elementor_pro_installed)) {
    //     array_push($plugins, 'elementor-pro');
    //   }
    //   if (!empty($darknews_elementor_installed)) {
    //     array_push($plugins, 'elementor');
    //   } else {
    //     array_push($plugins, 'elementor');
    //   }
    // }



    if (!empty($plugins)) {
      foreach ($plugins as $key => $plugin) {

        $main_plugin_file = darknews_get_plugin_file($plugin); // Get main plugin file
        if (!empty($main_plugin_file)) {

          if (!is_plugin_active($main_plugin_file)) {

            $btn_class = 'aft-bulk-active-plugin-installer';
            $darknews_templatespare_url = '#';
            $activate_plugins[] = $plugin;
          }
        } else {
          $install_plugin[$key] = $plugin;
          $btn_class = 'aft-bulk-plugin-installer';
          $darknews_templatespare_url = "#";
        }
      }
    }

    if (empty($activate_plugins) && empty($install_plugin)) {
      $btn_class = '';
      $darknews_templatespare_url = site_url() . '/wp-admin/admin.php?page=' . $this->page_slug;
      //$darknews_templatespare_subtitle = __( 'The "Get Started" action will install/activate the AF Companion and Blockspare plugins for Starter Sites and Templates.', 'darknews' );
      $darknews_templatespare_title = __('Get Starter Sites', 'darknews');
    } else {
      $btn_class = 'aft-bulk-active-plugin-installer';
      $darknews_templatespare_url = '#';
      $darknews_templatespare_title = __('Get Started', 'darknews');
      $darknews_templatespare_subtitle = __('The "Get Started" action will install/activate the Templatespare and Blockspare plugins for Starter Sites and Templates.', 'darknews');
    }



    $main_template = '<div class="aft-notice-wrapper">
        %1$s
        
        <div class="aft-notice-msg-wrapper">%2$s %3$s %4$s  </div>
        
        </div>';

    $notice_header = sprintf(
      '<h2>%1$s</h2><p class="about-description">%2$s</p></hr>',
      esc_html__('👋 Welcome, and Thank You!', 'darknews'),
      sprintf(
        esc_html__('%s is now active. We\'re here to help you turn your ideas into a beautiful, professional website — quickly and confidently.', 'darknews'),
        $this->theme_name
      )
    );

    $notice_picture    = sprintf(
      '<div class="aft-notice-col-1"><figure>
					<img src="%1$s"/>
				</figure></div>',
      esc_url($this->screenshot)
    );

    $demo_link = "https://afthemes.com/products/darknews/#aft-view-starter-sites";


    $notice_starter_msg = sprintf(
      '<div class="aft-notice-col-2">
				<div class="aft-general-info">
					<h3>%1$s</h3>
					<p>%2$s</p>
				</div>
				<div class="aft-general-info-link %9$s ">
					<div>
					<a href="%3$s"  data-install=' . json_encode($install_plugin) . ' data-activate=' . json_encode($activate_plugins) . ' data-page=' . esc_html($this->page_slug) . ' class="button button-primary">%4$s</a>
					<a href="%7$s"  class="button-secondary">%8$s</a>
						
					</div>
					<div>
						<a href="%5$s" target="_blank"><span aria-hidden="true" class="dashicons dashicons-external"></span>%6$s</a>
					</div>
				</div>
				</div>',
      __('🚀 Start With One Click', 'darknews'),
      esc_html__('Choose from 100+ starter sites designed for blogs, magazines, businesses & more.
      Setup is simple — no coding required.', 'darknews'),
      $darknews_templatespare_url,
      $darknews_templatespare_title,
      esc_url($demo_link),
      esc_html__('View Demos', 'darknews'),
      esc_url(admin_url() . "admin.php?page=" . $this->page_slug),
      esc_html__('Theme dashboard', 'darknews'),
      esc_attr($btn_class),
      $darknews_templatespare_subtitle,

    );


    $notice_external_msg = sprintf(
      '<div class="aft-notice-col-3">
			<div class="aft-documentation">
				<h3>%1$s</h3>
				<p>%2$s</p>
			</div>
			<div class="aft-documentation-links">
				<div>
					<a href="https://docs.afthemes.com/darknews/" target="_blank"><span aria-hidden="true" class="dashicons dashicons-external"></span>%3$s</a>
					<a href="https://www.youtube.com/watch?v=8C3OsPzkeik&list=PL8nUD79gscmhIFQBYAcfNarPtTDP0dAlk" target="_blank"><span aria-hidden="true" class="dashicons dashicons-external"></span>%4$s</a>
					<a href="https://afthemes.com/supports/" target="_blank"><span aria-hidden="true" class="dashicons dashicons-external"></span>%5$s</a>
				</div>
				<div>
					<a href="https://wordpress.org/support/theme/darknews/reviews/?filter=5" class="button" target="_blank">%6$s</a>
				</div>
			</div>
			</div>',
      __('🤝 We\'re Here for You', 'darknews'),
      esc_html__('Whether you\'re just starting or customizing your site.', 'darknews'),
      esc_html__('Documentation', 'darknews'),
      esc_html__('Videos', 'darknews'),
      esc_html__('Support', 'darknews'),
      esc_html__('⭐ Rate This Theme', 'darknews')

    );


    echo sprintf(
      $main_template,
      $notice_header,
      $notice_picture,
      $notice_starter_msg,
      $notice_external_msg
    );
  }


  public function darknews_notice_dismiss()
  {


    if (! isset($_POST['nonce'])) {
      return;
    }
    $nonce =  $_POST['nonce'];
    if (! wp_verify_nonce($nonce, 'aft_installer_nonce')) {
      return;
    }


    update_option($this->dismiss_notice_key, 'yes');
    $json = array(
      'status' => 'success'

    );
    wp_send_json($json);
    wp_die();
  }
}

$data = new AdminNotice();
