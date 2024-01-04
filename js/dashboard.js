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

const urlParams = new URLSearchParams(window.location.search);
const projectId = urlParams.get('projectId');

if (projectId) {
    showTasks();
}

let statusVar = 0;
let statusCondition = 0;
let check = 0;
const statusForm = document.getElementById("statusForm");

function changeValue() {
    statusForm.value = statusVar;
    statusCondition = 1;
}

function changeStatus(argument) {
    if (argument == 1 || argument == 2) {
        console.log("hello world!" + argument);
        if (argument == 0) {
            if (check == 0) {
                check = 1;
            } else {
                statusVar = argument;
                check = 0;
                changeValue();
            }
        } else {
            statusVar = argument;
            changeValue();
        }
    }
}

function stoppedStatus() {
    console.log("i closed the dialog");
}