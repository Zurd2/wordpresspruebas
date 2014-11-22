<?php
/*
Plugin Name: DG Sidebars
Plugin URI: #
Description: Create and manage your sidebars
Author: Daniel Guerrero
Version: 0.1
*/

/**
 * Muestra un menu en el admin de wordpress
 *
 * - nombre del hook de Wordpress
 * - nombre de la funcion a la que llama
 */
add_action('admin_menu', array('DGSidebars','admin_menu'));

class DGSidebars{
    /**
     * Genera el menu de administracion del plugin
     */
    function admin_menu() {
        /**
         * Añade el menu al menu de administracion de WordPresss
         *
         * add_menu_page ( $page_title , $menu_title , $capability , $menu_slug , $function , $icon_url , $position )
         */
        add_menu_page("DG Sidebars", "DG Sidebars", 1, "dg_sidebars", array('DGSidebars',"home_admin"));

        /**
         * Añade un submenu al menu principal
         *
         * add_submenu_page ( $parent_slug , $page_title , $menu_title , $capability , $menu_slug , $function )
         */
        add_submenu_page('dg_sidebars', 'DG Sidebars Sub', 'Sub', 1, 'dg_sidebars_sub', array('DGSidebars','home_sub_admin'));
    }

    /**
     * Agrega la vista de la pagina principal del plugin
     */
    function home_admin(){
        include( plugin_dir_path(__FILE__).'/views/home_admin.php' );
    }

    function home_sub_admin(){
        echo "sub pagina";
    }
}