document.addEventListener('DOMContentLoaded', function () {
    const taskInput = document.getElementById('taskInput');
    const addTaskBtn = document.getElementById('addTaskBtn');
    const taskList = document.getElementById('taskList');
    const selectAllCheckbox = document.getElementById('selectAllCheckbox');
    const deleteSelectedBtn = document.getElementById('deleteSelectedBtn');

    addTaskBtn.addEventListener('click', function () {
        addTask();
    });

    taskInput.addEventListener('keyup', function (event) {
        if (event.keyCode === 13) {
            addTask();
        }
    });

    selectAllCheckbox.addEventListener('change', function () {
        const checkboxes = taskList.querySelectorAll('li input[type="checkbox"]');
        checkboxes.forEach(function (checkbox) {
            checkbox.checked = selectAllCheckbox.checked;
        });
    });

    deleteSelectedBtn.addEventListener('click', function () {
        const checkboxes = taskList.querySelectorAll('li input[type="checkbox"]');
        checkboxes.forEach(function (checkbox) {
            if (checkbox.checked) {
                checkbox.parentElement.remove();
            }
        });
    });

    function addTask() {
        const taskText = taskInput.value.trim();
        if (taskText !== '') {
            const taskItem = document.createElement('li');
            taskItem.innerHTML = `
                <input type="checkbox">
                <span>${taskText}</span>
            `;
            taskList.appendChild(taskItem);
            taskInput.value = '';
            
            // Llama a la función AJAX para guardar la tarea en la base de datos
            saveTaskToDatabase(taskText);
        }
    }
    
    // Función para guardar la tarea en la base de datos usando AJAX
    function saveTaskToDatabase(taskText) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', myAjax.ajaxurl, true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Tarea guardada exitosamente
                } else {
                    // Error al guardar la tarea
                }
            }
        };
        
        const data = 'action=save_task&task=' + encodeURIComponent(taskText);
        xhr.send(data);
    }
    
    
});
