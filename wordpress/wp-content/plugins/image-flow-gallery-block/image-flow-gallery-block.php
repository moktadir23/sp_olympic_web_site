<?php
/*
Plugin Name: Image Flow Gallery Block
Plugin URI: https://tishonator.com/plugins/image-flow-gallery-block
Description: Image Flow Gallery Blocks is a simple plugin that adds a Gutenberg block for inserting an image gallery with sliding effect to your pages. Features: Responsive, touch-enabled jQuery plugin, 3D transform and flipping effects.
Author: tishonator
Version: 1.0.0
Author URI: http://tishonator.com/
Contributors: tishonator
Text Domain: image-flow-gallery-block
*/

if ( !class_exists('tishonator_ifgb_ImageFlowGalleryBlockPlugin') ) :

    /**
     * Register the plugin.
     *
     * Display the administration panel, insert JavaScript etc.
     */
    class tishonator_ifgb_ImageFlowGalleryBlockPlugin {
        
    	/**
    	 * Instance object
    	 *
    	 * @var object
    	 * @see get_instance()
    	 */
    	protected static $instance = NULL;


        /**
         * Constructor
         */
        public function __construct() {}

        /**
         * Setup
         */
        public function setup() {

            add_action( 'init', array(&$this, 'register_scripts') );

            // register a block to display team members
            add_action( 'init', array(&$this, 'register_block') );
        }

        /**
         * Register scripts used to display team members
         */
        public function register_scripts() {

            if ( !is_admin() ) {
                
                // Image Flow Gallery CSS
                wp_register_style('image-flow-gallery-css',
                    plugins_url('css/image-flow-gallery.css', __FILE__), true);

                wp_enqueue_style( 'image-flow-gallery-css',
                    plugins_url('css/image-flow-gallery.css', __FILE__), array( ) );

                // Image Flow Gallery JS
                wp_register_script('image-flow-gallery-js',
                    plugins_url('js/image-flow-gallery.js', __FILE__), array('jquery'));

                wp_enqueue_script('image-flow-gallery-js',
                        plugins_url('js/image-flow-gallery.js', __FILE__), array('jquery') );
            }
        }

        /*
         * Register Block
         */
        public function register_block() {

            global $pagenow;

            $arrDeps = ($pagenow === 'widgets.php') ?
                array( 'wp-edit-widgets', 'wp-blocks', 'wp-i18n', 'wp-element', )
              : array( 'wp-editor', 'wp-blocks', 'wp-i18n', 'wp-element', );
            
            // Image Flow Gallery Block Block
            wp_register_script(
                'tishonator-image-flow-gallery-block',
                plugins_url('js/image-flow-gallery-block.js', __FILE__),
                $arrDeps
            );

            register_block_type( 'tishonator/image-flow-gallery-block', array(
                'editor_script' => 'tishonator-image-flow-gallery-block',
            ) );
        }

    	/**
    	 * Used to access the instance
         *
         * @return object - class instance
    	 */
    	public static function get_instance() {

    		if ( NULL === self::$instance ) {
                self::$instance = new self();
            }

    		return self::$instance;
    	}
    }

endif; // tishonator_ifgb_ImageFlowGalleryBlockPlugin

add_action('plugins_loaded',
    array( tishonator_ifgb_ImageFlowGalleryBlockPlugin::get_instance(), 'setup' ), 10);
