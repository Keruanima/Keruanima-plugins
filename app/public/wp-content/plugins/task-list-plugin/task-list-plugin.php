<?php
/*
Plugin Name: Mi Plugin de Tareas
Description: Plugin para gestionar listas de tareas.
*/

// Enlazar archivos CSS y JS
function enqueue_plugin_styles() {
    wp_enqueue_style('plugin-style', plugins_url('assets/styles.css', __FILE__));
    wp_enqueue_script('plugin-script', plugins_url('assets/script.js', __FILE__));

    // Agregar la variable ajaxurl al script
    wp_localize_script('plugin-script', 'myAjax', array('ajaxurl' => admin_url('admin-ajax.php')));

}
add_action('wp_enqueue_scripts', 'enqueue_plugin_styles');

// Registra el shortcode
function task_list_shortcode() {
    ob_start();
    global $wpdb;
    $user_id = get_current_user_id();
    $table_name = $wpdb->prefix . 'task_list_tasks';
    $tasks = $wpdb->get_results(
        $wpdb->prepare("SELECT id, task FROM $table_name WHERE user_id = %d", $user_id)
    );
    //var_dump($tasks);
    include plugin_dir_path(__FILE__) . 'task-list-interface.php';
    return ob_get_clean();
}
add_shortcode('task_list', 'task_list_shortcode');


function task_list_plugin_activate() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'task_list_tasks';

    $sql = "CREATE TABLE $table_name (
        id INT NOT NULL AUTO_INCREMENT,
        task TEXT NOT NULL,
        user_id BIGINT NOT NULL, /* Nueva columna para el ID del usuario */
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'task_list_plugin_activate');

// Agregar página de configuración en el panel de administración
function task_list_admin_page() {
    add_menu_page(
        'Configuración de Tareas', // Título de la página
        'Config. Tareas', // Título del menú
        'manage_options', // Capacidad requerida para acceder
        'task-list-settings', // Slug de la página
        'task_list_settings_page', // Función de callback para mostrar la página
        'dashicons-list', // Icono del menú
        80 // Posición en el menú
    );
}
add_action('admin_menu', 'task_list_admin_page');

// Función para mostrar la página de configuración
function task_list_settings_page() {
    ?>
    <div class="wrap">
        <h2>Configuración de Tareas</h2>

        <form method="post" action="options.php">
            <?php settings_fields('task_list_settings'); ?>
            <?php do_settings_sections('task_list_settings'); ?>

            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Opciones del Plugin</th>
                    <td>
                        <!-- Aquí puedes agregar campos de configuración según tus necesidades -->
                        <label for="task_list_option">Opción de ejemplo:</label>
                        <input type="text" id="task_list_option" name="task_list_option" value="<?php echo esc_attr(get_option('task_list_option')); ?>" />
                    </td>
                </tr>
            </table>

            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

// Registra las opciones de configuración
function task_list_register_settings() {
    register_setting(
        'task_list_settings', // Nombre del grupo de opciones
        'task_list_option' // Nombre de la opción
    );
}
add_action('admin_init', 'task_list_register_settings');


// Función para guardar una tarea en la base de datos
function save_task_to_database($task_text) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'task_list_tasks';
    $user_id = get_current_user_id();

    // Validación del texto de la tarea
    $task_text = sanitize_text_field($task_text);
    
    $wpdb->insert(
        $table_name,
        array(
            'task' => $task_text,
            'user_id' => $user_id,
        )
    );
}


// Función para manejar la acción de guardar la tarea usando AJAX
function save_task_callback() {
    if (isset($_POST['task'])) {
        $task_text = sanitize_text_field($_POST['task']);
        save_task_to_database($task_text);
        wp_die();
    }
}
add_action('wp_ajax_save_task', 'save_task_callback');

// Agregar acción para usuarios no registrados
add_action('wp_ajax_nopriv_save_task', 'save_task_callback');

?>