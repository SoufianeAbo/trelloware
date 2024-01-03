const projectsBtn = document.getElementById("ProjectsBtn");
const projectsBtn2 = document.getElementById("ProjectsBtn2");
const projectsTable = document.getElementById("ProjectsTable");

const tasksBtn = document.getElementById("TasksBtn");
const tasksBtn2 = document.getElementById("TasksBtn2");
const tasksTable = document.getElementById("TasksTable");

function showProjects() {
    projectsTable.classList.remove("hidden");
    projectsBtn.classList.add("bg-blue-700");
    projectsBtn2.classList.add("bg-blue-700");
    hideTasks();
}

function hideProjects() {
    projectsTable.classList.add("hidden");
    projectsBtn.classList.remove("bg-blue-700");
    projectsBtn2.classList.remove("bg-blue-700");
}

function showTasks() {
    tasksTable.classList.remove("hidden");
    tasksBtn.classList.add("bg-blue-700");
    tasksBtn2.classList.add("bg-blue-700");
    hideProjects();
}

function hideTasks() {
    tasksTable.classList.add("hidden");
    tasksBtn.classList.remove("bg-blue-700");
    tasksBtn2.classList.remove("bg-blue-700");
}

projectsBtn.addEventListener("click", showProjects);
projectsBtn2.addEventListener("click", showProjects);

tasksBtn.addEventListener("click", showTasks);
tasksBtn2.addEventListener("click", showTasks);

