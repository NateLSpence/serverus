<?php
/**
 * Register sidebars and widgets
 */
function roots_widgets_init() {
  // Sidebars
  register_sidebar(array(
    'name'          => __('Primary', 'roots'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Footer', 'roots'),
    'id'            => 'sidebar-footer',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));



    //Login Sidebar
  register_sidebar(array(
    'name' => __('Login Location', 'serverus'),
    'id' => 'sidebar-login',
    'description' => 'Put the Login/Register widget here.',
    'before_widget' => '<div class="%1$s %2$s">',
    'after_widget' => '</div>',
    'before_title' => '',
    'after_title' => '',
  ));



  // Widgets
  register_widget('Roots_Vcard_Widget');
  register_widget('Serverus_Login_Widget');
}
add_action('widgets_init', 'roots_widgets_init');

/**
 * Example vCard widget
 */
class Roots_Vcard_Widget extends WP_Widget {
  private $fields = array(
    'title'          => 'Title (optional)',
    'street_address' => 'Street Address',
    'locality'       => 'City/Locality',
    'region'         => 'State/Region',
    'postal_code'    => 'Zipcode/Postal Code',
    'tel'            => 'Telephone',
    'email'          => 'Email'
  );

  function __construct() {
    $widget_ops = array('classname' => 'widget_roots_vcard', 'description' => __('Use this widget to add a vCard', 'roots'));

    $this->WP_Widget('widget_roots_vcard', __('Roots: vCard', 'roots'), $widget_ops);
    $this->alt_option_name = 'widget_roots_vcard';

    add_action('save_post', array(&$this, 'flush_widget_cache'));
    add_action('deleted_post', array(&$this, 'flush_widget_cache'));
    add_action('switch_theme', array(&$this, 'flush_widget_cache'));
  }

  function widget($args, $instance) {
    $cache = wp_cache_get('widget_roots_vcard', 'widget');

    if (!is_array($cache)) {
      $cache = array();
    }

    if (!isset($args['widget_id'])) {
      $args['widget_id'] = null;
    }

    if (isset($cache[$args['widget_id']])) {
      echo $cache[$args['widget_id']];
      return;
    }

    ob_start();
    extract($args, EXTR_SKIP);

    $title = apply_filters('widget_title', empty($instance['title']) ? __('vCard', 'roots') : $instance['title'], $instance, $this->id_base);

    foreach($this->fields as $name => $label) {
      if (!isset($instance[$name])) { $instance[$name] = ''; }
    }

    echo $before_widget;

    if ($title) {
      echo $before_title, $title, $after_title;
    }
  ?>
    <p class="vcard">
      <a class="fn org url" href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a><br>
      <span class="adr">
        <span class="street-address"><?php echo $instance['street_address']; ?></span><br>
        <span class="locality"><?php echo $instance['locality']; ?></span>,
        <span class="region"><?php echo $instance['region']; ?></span>
        <span class="postal-code"><?php echo $instance['postal_code']; ?></span><br>
      </span>
      <span class="tel"><span class="value"><?php echo $instance['tel']; ?></span></span><br>
      <a class="email" href="mailto:<?php echo $instance['email']; ?>"><?php echo $instance['email']; ?></a>
    </p>
  <?php
    echo $after_widget;

    $cache[$args['widget_id']] = ob_get_flush();
    wp_cache_set('widget_roots_vcard', $cache, 'widget');
  }

  function update($new_instance, $old_instance) {
    $instance = array_map('strip_tags', $new_instance);

    $this->flush_widget_cache();

    $alloptions = wp_cache_get('alloptions', 'options');

    if (isset($alloptions['widget_roots_vcard'])) {
      delete_option('widget_roots_vcard');
    }

    return $instance;
  }

  function flush_widget_cache() {
    wp_cache_delete('widget_roots_vcard', 'widget');
  }

  function form($instance) {
    foreach($this->fields as $name => $label) {
      ${$name} = isset($instance[$name]) ? esc_attr($instance[$name]) : '';
    ?>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id($name)); ?>"><?php _e("{$label}:", 'roots'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id($name)); ?>" name="<?php echo esc_attr($this->get_field_name($name)); ?>" type="text" value="<?php echo ${$name}; ?>">
    </p>
    <?php
    }
  }
}


/**
 * LOGIN/REGISTER WIDGET
 */
class Serverus_Login_Widget extends WP_Widget {

  /**
   * Serverus Login Widget
   *
   * Registers the login widget
   */
  public function __construct() {
    $widget_ops = array(
      'classname'   => 'login-register-widget',
      'description' => __( 'A bbPress login/register widget for the Serverus theme. Place in the "Login Location" area.', 'bbpress' ) /*TODO should this (and below) say bbpress or serverus?*/
    );

    parent::__construct( false, __( '(Serverus) Login Widget', 'bbpress' ), $widget_ops );
  }

  /**
   * Register the widget
   *
   * @uses register_widget()
   */
  public static function register_widget() {
    register_widget( 'Serverus_Login_Widget' );
  }

  /**
   * Displays the output, the login form
   *
   * @param mixed $args Arguments
   * @param array $instance Instance
   * @uses get_template_part() To get the login/logged in form 
   *    This is from the bbPress login widget's notes.
   *    I don't see where it uses get_template_part(). 
   */
  public function widget( $args = array(), $instance = array() ) {

    // Get widget settings
    $settings = $this->parse_settings( $instance );

    // Typical WordPress filter
    $settings['title'] = apply_filters( 'widget_title', $settings['title'], $instance, $this->id_base );


    echo $args['before_widget'];

/*    if ( !empty( $settings['title'] ) ) {
      echo $args['before_title'] . $settings['title'] . $args['after_title'];
    }*/ // TODO are we using the title field at all?

    if ( !is_user_logged_in() ) : ?>

      <?php if ( !empty( $settings['login'] ) ) : ?>

        <div class="bbp-login-links">
          <a href="<?php echo esc_url( $settings['login'] ); ?>" title="<?php esc_attr_e( 'Login/Register', 'bbpress' ); ?>" class="serverus-login-link"><?php _e( 'Login/Register', 'bbpress' ); ?></a>

        </div>

      <?php endif; ?>

    <?php else : ?>

      <div class="bbp-logged-in">
        <a href="<?php bbp_user_profile_url( bbp_get_current_user_id() ); ?>" class="submit user-submit serverus-login-avatar"><?php echo get_avatar( bbp_get_current_user_id(), '30' ); ?></a>
        <span class="login-widget-username"><?php bbp_user_profile_link( bbp_get_current_user_id() ); ?></span>

        <a href="<?php echo wp_logout_url(); ?>" class="logout-link" title="Log out"><span class="glyphicon glyphicon-log-out"></span></a>

      </div>

    <?php endif;

    echo $args['after_widget'];
  }


  /**
   * Update the login widget options
   *
   * @param array $new_instance The new instance options
   * @param array $old_instance The old instance options
   */
  public function update( $new_instance, $old_instance ) {
    $instance             = $old_instance;
    $instance['title']    = strip_tags( $new_instance['title'] );
    $instance['login'] = esc_url_raw( $new_instance['login'] );

    return $instance;
  }

  /**
   * Output the login widget options form
   *
   * @param $instance Instance
   * @uses Serverus_Login_Widget::get_field_id() To output the field id
   * @uses Serverus_Login_Widget::get_field_name() To output the field name
   */
  public function form( $instance = array() ) {

    // Get widget settings
    $settings = $this->parse_settings( $instance ); ?>

    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'bbpress' ); ?>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $settings['title'] ); ?>" /></label>
    </p>

    <p>
      <label for="<?php echo $this->get_field_id( 'login' ); ?>"><?php _e( 'Login URI:', 'bbpress' ); ?>
      <input class="widefat" id="<?php echo $this->get_field_id( 'login' ); ?>" name="<?php echo $this->get_field_name( 'login' ); ?>" type="text" value="<?php echo esc_url( $settings['login'] ); ?>" /></label>
    </p>


    <?php
  }

  /**
   * Merge the widget settings into defaults array.
   *
   * @param $instance Instance
   * @uses bbp_parse_args() To merge widget settings into defaults
   */
  public function parse_settings( $instance = array() ) {
    return bbp_parse_args( $instance, array(
      'title'    => '',
      'login'    => ''
    ), 'login_widget_settings' );
  }

}
