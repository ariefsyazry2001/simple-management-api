@extends('layouts.app')

@section('content')
<div class="container-task">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="task-header">Task List</h1>
        <button class="btn btn-primary" onclick="openTaskModal()">Create New Task</button>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-success">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Deadline</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="taskTableBody">
                
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="taskModal" tabindex="-1" aria-labelledby="taskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="taskForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="taskModalLabel">Task Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="taskId">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" id="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select id="status" class="form-control">
                            <option value="New">New</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="deadline" class="form-label">Deadline</label>
                        <input type="date" id="deadline" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Task</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const apiUrl = 'http://127.0.0.1:8000/api/tasks';


    function loadTasks() {
    fetch(apiUrl)
        .then((response) => response.json())
        .then((tasks) => {
            const tbody = document.getElementById('taskTableBody');
            let rows = '';
            tasks.forEach((task) => {
                rows += `
                    <tr>
                        <td>${task.title}</td>
                        <td>${task.description}</td>
                        <td><span class="badge badge-${task.status.toLowerCase().replace(' ', '-')}">${task.status}</span></td>
                        <td>${task.deadline ? new Date(task.deadline).toLocaleDateString() : 'No Deadline'}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" onclick="editTask(${task.id})">Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="deleteTask(${task.id})">Delete</button>
                        </td>
                    </tr>
                `;
            });
            tbody.innerHTML = rows;
        })
        .catch((error) => console.error('Error loading tasks:', error));
}

function openTaskModal() {
    document.getElementById('taskForm').reset();
    document.getElementById('taskId').value = '';
    new bootstrap.Modal(document.getElementById('taskModal')).show();
}

document.getElementById('taskForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const id = document.getElementById('taskId').value;
    const taskData = {
        title: document.getElementById('title').value,
        description: document.getElementById('description').value,
        status: document.getElementById('status').value,
        deadline: document.getElementById('deadline').value,
    };
    const method = id ? 'PUT' : 'POST';
    const url = id ? `${apiUrl}/${id}` : apiUrl;

    axios({ method, url, data: taskData })
        .then(() => {
            loadTasks();
            const modal = bootstrap.Modal.getInstance(document.getElementById('taskModal'));
            modal.hide(); // Ensure the modal closes after submission
        })
        .catch((error) => console.error('Error saving task:', error));
});

function editTask(id) {
    axios.get(`${apiUrl}/${id}`)
        .then((response) => {
            const task = response.data;
            document.getElementById('taskId').value = task.id;
            document.getElementById('title').value = task.title;
            document.getElementById('description').value = task.description;
            document.getElementById('status').value = task.status;
            document.getElementById('deadline').value = task.deadline;
            new bootstrap.Modal(document.getElementById('taskModal')).show();
        })
        .catch((error) => console.error('Error fetching task:', error));
}

function deleteTask(id) {
    axios.delete(`${apiUrl}/${id}`)
        .then(() => loadTasks())
        .catch((error) => console.error('Error deleting task:', error));
}

loadTasks();



</script>
@endsection
