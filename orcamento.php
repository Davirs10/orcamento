<?php
/*
Plugin Name: Gerador de Lead Fipe
Plugin URI: http://www.rrsolucoesdigitais.com.br/plugins
Description: Plugin para gerar Lead no Funil de Vendas e Orçamento em pdf de Seguro veicular com Fipe
Version: 1.0.0
Details: http://www.rrsolucoesdigitais.com.br
Author: Davi Rodrigues da Silva
Author URI: https://www.linkedin.com/in/davirs10
License: EULA

 *      Copyright 2020 Davi Rodrigues da Silva <davirs10@hotmail.com>
 *
 *      This program is free software; you can redistribute it and/or modify
 *      it under the terms of the GNU General Public License as published by
 *      the Free Software Foundation; either version 3 of the License, or
 *      (at your option) any later version.
 *
 *      This program is distributed in the hope that it will be useful,
 *      but WITHOUT ANY WARRANTY; without even the implied warranty of
 *      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *      GNU General Public License for more details.
 *
 *      You should have received a copy of the GNU General Public License
 *      along with this program; if not, write to the Free Software
 *      Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 *      MA 02110-1301, USA.
 */
include_once( plugin_dir_path( __FILE__ ) . '/functions.php' ); 

function displayFields() {
    if ( is_user_logged_in() ) {
        $current_user = wp_get_current_user();
        include_once plugin_dir_path( __FILE__ ) . "/includes/templates/form.php";
    } else {
        login_plugin();
    }
}
add_shortcode('display_orcamento', 'displayFields');