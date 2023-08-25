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