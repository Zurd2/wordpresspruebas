<?php
/*
Plugin Name: DG Sidebars
Plugin URI: #
Description: Create and manage your sidebars
Author: Daniel Guerrero
Version: 0.1
*/

#http://codex.wordpress.org/Creating_Options_Pages

class DGSidebars{

    /**
     * Contiene los valores que se utilizarán en las devoluciones de llamada campos
     */
    private $options;

    /**
     * Puesta en marcha
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Añadir página de opciones
     */
    public function add_plugin_page()
    {
        /**
         * Esta página estará por debajo "Settings"
         *
         * add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function)
         *  capability : permisos de acceso al menu http://codex.wordpress.org/Roles_and_Capabilities
         */
        add_options_page(
            'Settings Admin',
            'DG Sidebars',
            'manage_options',
            'dgsidebars',
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Pagina principal del plugin en el admin de Wordpress
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'dg_sidebars_option_name' );
        ?>
        <div class="wrap">
            <h2>DG Sidebars</h2>
            <form method="post" action="options.php">
                <?php
                // This prints out all hidden setting fields
                settings_fields( 'dg_sidebars_settings_group' );
                do_settings_sections( 'dgsidebars' );
                submit_button();
                ?>
            </form>
        </div>
    <?php
    }

    /**
     * Registro y creacion de la configuracion
     */
    public function page_init()
    {
        register_setting(
            'dg_sidebars_settings_group', // Option group
            'dg_sidebars_option_name', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id_create', // ID
            'Configuración de sidebars:', // Title
            array( $this, 'print_section_info' ), // Callback
            'dgsidebars' // Page
        );

        /*
        add_settings_field(
            'id_number', // ID
            'ID Number', // Title
            array( $this, 'id_number_callback' ), // Callback
            'dgsidebars', // Page
            'setting_section_id' // Section
        );
        */

        add_settings_field(
            'name',
            'Nombre',
            array( $this, 'title_callback' ),
            'dgsidebars',
            'setting_section_id_create'
        );

        add_settings_section(
            'setting_section_id_admin', // ID
            'Administra tus sidebars:', // Title
            array(), // Callback
            'dgsidebars' // Page
        );
    }

    /**
     * Desinfectar cada campo de configuración según sea necesario
     *
     * @param array $input Contains all settings fields as array keys
     * @return array
     */
    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['id_number'] ) )
            $new_input['id_number'] = absint( $input['id_number'] );

        if( isset( $input['title'] ) )
            $new_input['title'] = sanitize_text_field( $input['title'] );

        return $new_input;
    }

    /**
     * Muestra el titulo de la seccion
     */
    public function print_section_info()
    {
        print 'Crea un nuevo sidebar:';
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function id_number_callback()
    {
        printf(
            '<input type="text" id="id_number" name="dg_sidebars_option_name[id_number]" value="%s" />',
            isset( $this->options['id_number'] ) ? esc_attr( $this->options['id_number']) : ''
        );
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function title_callback()
    {
        printf(
            '<input type="text" id="title" name="dg_sidebars_option_name[title]" value="%s" />',
            isset( $this->options['title'] ) ? esc_attr( $this->options['title']) : ''
        );
    }
}

/**
 * Crea una instancia de la clase cuando carga el admin de Wordpress
 */
if( is_admin() )
    $dgsidebars = new DGSidebars();
?>