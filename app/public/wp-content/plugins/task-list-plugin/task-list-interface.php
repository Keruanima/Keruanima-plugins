<div class="container">
    <h1>Lista de Tareas</h1>
    <div class="task-input">
        <input type="text" id="taskInput" placeholder="Escribe una tarea...">
        <button id="addTaskBtn">Agregar</button>
    </div>
    <ul id="taskList">
        <li>
            <input type="checkbox" id="selectAllCheckbox">
            <span>Seleccionar todas las tareas</span>
        </li>
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix . 'task_list_tasks';
        $user_id = get_current_user_id(); // Obtener el ID del usuario actual
        $tasks = $wpdb->get_results($wpdb->prepare("SELECT id, task FROM $table_name WHERE user_id = %d", $user_id));
        foreach ($tasks as $task) {
            echo '<li><input type="checkbox"><span>' . esc_html($task->task) . '</span></li>';
        }        
        ?>
    </ul>
    <button id="deleteSelectedBtn">Eliminar tareas seleccionadas</button>
</div>
