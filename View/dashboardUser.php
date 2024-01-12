<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="./js/dashboard.js" defer></script>
    <script src="https://kit.fontawesome.com/736a1ef302.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.5.0/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    },
                    animation: {
                        "slide-in-right": "slide-in-right 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940)   both",
                        "slide-out-right": "slide-out-right 0.5s cubic-bezier(0.550, 0.085, 0.680, 0.530)   both",
                        "pulsate-fwd": "pulsate-fwd 0.5s ease  infinite both",
                        "roll-in-top": "roll-in-top 0.6s ease   both",
                        "swing-in-top-fwd": "swing-in-top-fwd 2s cubic-bezier(0.175, 0.885, 0.320, 1.275)   both"
                    },
                    keyframes: {
                        "slide-in-right": {
                            "0%": {
                                transform: "translateX(1000px)",
                                opacity: "0"
                            },
                            to: {
                                transform: "translateX(0)",
                                opacity: "1"
                            }
                        },
                        "slide-out-right": {
                            "0%": {
                                transform: "translateX(0)",
                                opacity: "1"
                            },
                            to: {
                                transform: "translateX(1000px)",
                                opacity: "0"
                            }
                        },
                        "pulsate-fwd": {
                            "0%,to": {
                                transform: "scale(1)"
                            },
                            "50%": {
                                transform: "scale(1.1)"
                            }
                        },

                        "roll-in-top": {
                            "0%": {
                                transform: "translateY(-800px) rotate(-540deg)",
                                opacity: "0"
                            },
                            to: {
                                transform: "translateY(0) rotate(0deg)",
                                opacity: "1"
                            }
                        },
                        "swing-in-top-fwd": {
                            "0%": {
                                transform: "rotateX(-100deg)",
                                "transform-origin": "top",
                                opacity: "0"
                            },
                            to: {
                                transform: "rotateX(0deg)",
                                "transform-origin": "top",
                                opacity: "1"
                            }
                        }
                    }
                }
            }
        }
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background: #1e40af; }
        .cta-btn { color: #1e40af; }
        .upgrade-btn { background: #1947ee; }
        .upgrade-btn:hover { background: #0038fd; }
        .active-nav-link { background: #1947ee; }
        .nav-item:hover { background: #1947ee; }
        .account-link:hover { background: #3d68ff; }
    </style>
</head>

<body class="bg-gray-100 font-family-karla flex">

    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a class="text-white text-3xl font-semibold uppercase hover:text-gray-300"><img src="../img/white3.png" alt=""></a>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a class="flex items-center text-white bg-blue-700 opacity-75 hover:opacity-100 py-4 pl-6 nav-item cursor-pointer" id = "ProjectsBtn">
                <i class="fa-solid fa-list-check mr-3"></i>
                Projects
            </a>
            <a class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item cursor-pointer" id = "TasksBtn">
                <i class="fa-solid fa-bars-progress mr-3"></i>
                Tasks
            </a>
        </nav>
        <a href="logout.php" class="absolute w-full upgrade-btn bottom-0 active-nav-link text-white flex items-center justify-center py-4">
            <i class="fas fa-arrow-circle-up mr-3"></i>
            Sign Out 
        </a>
    </aside>

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <header class="w-full items-center bg-blue-950 py-2 px-6 hidden sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <?php
                            $image = $_SESSION['image'];
                            echo "<img src='$image'>";
                    ?>
               </button>
                <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
                <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Account</a>
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Sign Out</a>
                </div>
            </div>
        </header>

        <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
            <div class="flex items-center justify-between">
                <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">DATAWARE</a>
                <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                <a class="flex items-center text-white opacity-75 bg-blue-700 hover:opacity-100 py-2 pl-4 nav-item" id = "ProjectsBtn2">
                    <i class="fa-solid fa-list-check mr-3"></i>
                    Projects
                </a>
                <a class="flex items-center text-white opacity-75 bg-blue-700 hover:opacity-100 py-2 pl-4 nav-item" id = "TasksBtn2">
                    <i class="fa-solid fa-bars-progress mr-3"></i>
                    Tasks
                </a>
                <button onclick="window.location.href='logout.php';" class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                    <i class="fas fa-sign-out-alt mr-3"></i> Sign Out
                </button>
            </nav>
        </header>
    
        <div class="w-full overflow-x-hidden border-t flex flex-col">

            <main class="w-full grid grid-flow-row grid-cols-1 lg:grid-cols-3 p-6 gap-4" id = "ProjectsTable">
                <h1 class="text-3xl text-black pb-6 col-span-1 lg:col-span-3">Your projects</h1>
                <?php foreach ($projects as $project): ?>
                    <div class="card card-compact w-96 bg-white shadow-xl">
                        <figure><img src="<?php echo $project['image']; ?>" alt="Project Image" /></figure>
                        <div class="card-body">
                            <div class="flex flex-row justify-between">
                                <h2 class="card-title text-black"><?php echo $project['name']; ?></h2>
                                <div class="avatar">
                                    <div class="w-12 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                                        <img src="<?php echo $userObj->getImage(); ?>" alt="User Avatar" />
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action = "../index.php?action=edit_project" enctype="multipart/form-data">
                                    <dialog id="<?php echo 'modalModify' . $project['id']?>" class="modal modal-bottom sm:modal-middle">
                                        <div class="modal-box">
                                        <label class="form-control w-full max-w-xs">
                                            <div class="label">
                                                <span class="label-text">What is the project name?</span>
                                            </div>
                                            <input type="text" class = "hidden" name = "project_id" placeholder="Project ID" class="input input-bordered w-full max-w-xs" value = "<?php echo $project['id']?>" />
                                            <input type="text" name = "project_name" placeholder="Project name" class="input input-bordered w-full max-w-xs" value = "<?php echo $project['name']?>" />
                                            </label>
                                            <div class="label mt-4">
                                                <span class="label-text">Choose a picture for your project</span>
                                            </div>
                                            <input type="file" name = "project_image" class="file-input w-full max-w-xs" />
                                            <label class="form-control">
                                                <div class="label">
                                                    <span class="label-text">Description for your project</span>
                                                </div>
                                                <textarea name = "project_description" class="textarea textarea-bordered h-24 resize-none" placeholder="Description"><?php echo $project['description']?></textarea>
                                            </label>
                                            <button class="btn btn-success absolute mt-6">Submit</button>
                                            </form>
                                            <div class="modal-action">
                                                <form method = "dialog">
                                                    <button class="btn">Close</button>
                                                </form>
                                            </div>
                                        </div>
                                    </dialog>
                            <p class = "text-black"><?php echo $project['description']; ?></p>
                            <div class = "flex flex-row justify-between">
                                <button class="btn btn-active btn-primary text-white" onclick="<?php echo 'modalModify' . $project['id']?>.showModal()"><i class="fa-solid fa-gear"></i>Modify</button>

                                <form method = "POST" action = "./dashboardUser.php?projectId=<?php echo $project['id']?>">
                                    <button class="btn btn-active btn-success text-white"><i class="fa-solid fa-bars-progress"></i>Tasks</button>
                                </form>
                                <form method = "POST" action = "../index.php?action=delete_project">
                                    <input type="text" class = "hidden" name = "project_id" placeholder="Project ID" class="input input-bordered w-full max-w-xs" value = "<?php echo $project['id']?>" />
                                    <button class="btn btn-active btn-error text-white"><i class="fa-solid fa-trash"></i>Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class = "card card-compact w-96 shadow-xl border-8 bg-blue-200 border-blue-400 border-dashed" onclick="my_modal_5.showModal()">
                    <h1 class = "text-8xl m-auto text-blue-400">+</h1>

                    <form method="POST" action = "../index.php?action=add_project" enctype="multipart/form-data">
                    <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
                        <div class="modal-box">
                        <label class="form-control w-full max-w-xs">
                            <div class="label">
                                <span class="label-text">What is the project name?</span>
                            </div>
                            <input type="text" name = "project_name" placeholder="Project name" class="input input-bordered w-full max-w-xs" />
                            </label>
                            <div class="label mt-4">
                                <span class="label-text">Choose a picture for your project</span>
                            </div>
                            <input type="file" name = "project_image" class="file-input w-full max-w-xs" />
                            <label class="form-control">
                                <div class="label">
                                    <span class="label-text">Description for your project</span>
                                </div>
                                <textarea name = "project_description" class="textarea textarea-bordered h-24 resize-none" placeholder="Description"></textarea>
                            </label>
                            <button class="btn btn-success absolute mt-6">Submit</button>
                            </form>
                            <div class="modal-action">
                                <form method = "dialog">
                                    <button class="btn">Close</button>
                                </form>
                            </div>
                        </div>
                    </dialog>
                </div>

            </main>

            <main class="w-full grid grid-flow-row grid-cols-1 lg:grid-cols-3 p-6 gap-4 hidden" id="TasksTable">
    <?php
        $projectId = isset($_GET['projectId']) ? $_GET['projectId'] : null;
    ?>

    <?php if ($projectId): ?>
        <h1 class="text-3xl text-black pb-6 col-span-1 lg:col-span-3">Your tasks</h1>

        <div class = "flex flex-row gap-8 justify-end lg:col-span-3 col-span-1">
            <button onclick =  "window.location.href = './dashboardUser.php?projectId=<?php echo $projectId; ?>&sortByDeadline=true'" class="btn w-42 z-40 bg-blue-400 text-white border-0">
                Sort by Deadline
                <i class="fa-solid fa-clock"></i>
            </button>

            <button class="btn w-42 z-40 bg-blue-400 text-white border-0">
                Search
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>

        <div class = "flex flex-col items-center gap-4">
            <h1 class="text-3xl text-black pb-6">To Do</h1>
            <?php foreach ($tasksByStatus[0] as $task): ?>
                <div class="card w-96 bg-white shadow-xl">
                    <div class="card-body p-0">
                        <div class="bg-gray-800 w-full p-4 rounded-t-lg flex flex-row justify-between">
                            <h2 class="card-title text-white"><?php echo $task['title']; ?></h2>
                            <div class="bg-sky-500 px-2 rounded">
                                <p class="text-white"><i class="fa-solid fa-clock mr-2 my-2"></i><?php echo $task['deadline']; ?></p>
                            </div>
                        </div>
                        <div class="card-actions p-6">
                            <div class="flex flex-row justify-between w-full">
                                <div class="flex flex-row gap-2">
                                    <button class="btn btn-circle bg-blue-500 text-black border-none hover:bg-blue-600 hover:text-black" onclick="taskmodal_<?php echo $task['id']?>.showModal()">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>

                                    <form action="../index.php?action=delete_task&task_id=<?php echo $task['id']?>" method="POST">
                                        <input type="text" name = "projectid" class="input input-bordered w-full max-w-xs hidden" value = "<?php echo $_GET['projectId']?>" />
                                        <button class="btn btn-circle bg-red-500 text-black border-none hover:bg-red-600 hover:text-black">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>

                                <div class="flex flex-row gap-2">
                                    <form action="../index.php?action=change_status&task_id=<?php echo $task['id']?>&status=1" method = "POST">
                                        <input type="text" name = "projectid" class="input input-bordered w-full max-w-xs hidden" value = "<?php echo $_GET['projectId']?>" />
                                        <button class="btn btn-circle btn-primary">
                                            <i class="fa-solid fa-spinner"></i>
                                        </button>
                                    </form>

                                    <form action="../index.php?action=change_status&task_id=<?php echo $task['id']?>&status=2" method = "POST">
                                        <input type="text" name = "projectid" class="input input-bordered w-full max-w-xs hidden" value = "<?php echo $_GET['projectId']?>" />
                                        <button class="btn btn-circle btn-accent">
                                            <i class="fa-solid fa-check"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class = "h-24 card card-compact w-96 shadow-xl border-8 bg-blue-200 border-blue-400 border-dashed" onclick="my_modal_6.showModal(); changeStatus(0);">
                    <h1 class = "text-8xl m-auto text-blue-400">+</h1>

                    <form method="POST" action = "../index.php?action=add_task" enctype="multipart/form-data">
                    <dialog id="my_modal_6" class="modal modal-bottom sm:modal-middle">
                        <div class="modal-box">
                        <label class="form-control w-full max-w-xs">
                            <div class="label">
                                <span class="label-text">Task title</span>
                            </div>
                            <input type="text" name = "tasktitle" placeholder="Your task" class="input input-bordered w-full max-w-xs" />
                            <div class="label">
                                <span class="label-text">Deadline</span>
                            </div>
                            <input type="text" name = "deadline" placeholder="Deadline of the task" class="input input-bordered w-full max-w-xs" />
                            <input type="text" id = "statusForm" name = "status" class="input input-bordered w-full max-w-xs hidden" value = "0" />
                            <input type="text" name = "projectid" class="input input-bordered w-full max-w-xs hidden" value = "<?php echo $_GET['projectId']?>" />
                            <button class="btn btn-success hidden">Submit</button>
                            </form>
                            <div class="modal-action">
                                <form method = "dialog">
                                    <button class="btn" onclick="stoppedStatus()">Close</button>
                                </form>
                            </div>
                        </div>
                    </dialog>
                </div>
        </div>

        <div class = "flex flex-col items-center gap-4">
            <h1 class="text-3xl text-black pb-6">Doing</h1>
            <?php foreach ($tasksByStatus[1] as $task): ?>
                <div class="card w-96 bg-white shadow-xl">
                    <div class="card-body p-0">
                        <div class="bg-blue-500 w-full p-4 rounded-t-lg flex flex-row justify-between">
                            <h2 class="card-title text-white"><?php echo $task['title']; ?></h2>
                            <div class="bg-sky-500 px-2 rounded">
                                <p class="text-white"><i class="fa-solid fa-clock mr-2 my-2"></i><?php echo $task['deadline']; ?></p>
                            </div>
                        </div>
                        <div class="card-actions p-6">
                            <div class="flex flex-row justify-between w-full">
                                <div class="flex flex-row gap-2">
                                    <button class="btn btn-circle bg-blue-500 text-black border-none hover:bg-blue-600 hover:text-black" onclick="taskmodal_<?php echo $task['id']?>.showModal()">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>

                                    <form action="../index.php?action=delete_task&task_id=<?php echo $task['id']?>" method="POST">
                                        <input type="text" name = "projectid" class="input input-bordered w-full max-w-xs hidden" value = "<?php echo $_GET['projectId']?>" />
                                        <button class="btn btn-circle bg-red-500 text-black border-none hover:bg-red-600 hover:text-black">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>

                                <div class="flex flex-row gap-2">
                                    <form action="../index.php?action=change_status&task_id=<?php echo $task['id']?>&status=0" method = "POST">
                                        <input type="text" name = "projectid" class="input input-bordered w-full max-w-xs hidden" value = "<?php echo $_GET['projectId']?>" />
                                        <button class="btn btn-circle btn-neutral">
                                            <i class="fa-solid fa-arrow-rotate-left"></i>
                                        </button>
                                    </form>

                                    <form action="../index.php?action=change_status&task_id=<?php echo $task['id']?>&status=2" method = "POST">
                                        <input type="text" name = "projectid" class="input input-bordered w-full max-w-xs hidden" value = "<?php echo $_GET['projectId']?>" />
                                        <button class="btn btn-circle btn-accent">
                                            <i class="fa-solid fa-check"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class = "h-24 card card-compact w-96 shadow-xl border-8 bg-blue-200 border-blue-400 border-dashed" onclick="my_modal_6.showModal(); changeStatus(1);">
            <h1 class = "text-8xl m-auto text-blue-400">+</h1></div>
        </div>

        <div class = "flex flex-col items-center gap-4">
            <h1 class="text-3xl text-black pb-6">Done</h1>
            <?php foreach ($tasksByStatus[2] as $task): ?>
                <div class="card w-96 bg-white shadow-xl">
                    <div class="card-body p-0">
                        <div class="bg-green-500 w-full p-4 rounded-t-lg flex flex-row justify-between">
                            <h2 class="card-title text-white"><?php echo $task['title']; ?></h2>
                            <div class="bg-green-400 px-2 rounded">
                                <p class="text-white"><i class="fa-solid fa-clock mr-2 my-2"></i><?php echo $task['deadline']; ?></p>
                            </div>
                        </div>
                        <div class="card-actions p-6">
                            <div class="flex flex-row justify-between w-full">
                                <div class="flex flex-row gap-2">
                                    <button class="btn btn-circle bg-blue-500 text-black border-none hover:bg-blue-600 hover:text-black" onclick="taskmodal_<?php echo $task['id']?>.showModal()">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>

                                    <form action="../index.php?action=delete_task&task_id=<?php echo $task['id']?>" method="POST">
                                        <input type="text" name = "projectid" class="input input-bordered w-full max-w-xs hidden" value = "<?php echo $_GET['projectId']?>" />
                                        <button class="btn btn-circle bg-red-500 text-black border-none hover:bg-red-600 hover:text-black">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>

                                <div class="flex flex-row gap-2">
                                    <form action="../index.php?action=change_status&task_id=<?php echo $task['id']?>&status=1" method = "POST">
                                        <input type="text" name = "projectid" class="input input-bordered w-full max-w-xs hidden" value = "<?php echo $_GET['projectId']?>" />
                                        <button class="btn btn-circle btn-primary">
                                            <i class="fa-solid fa-spinner"></i>
                                        </button>
                                    </form>

                                    <form action="../index.php?action=change_status&task_id=<?php echo $task['id']?>&status=0" method = "POST">
                                        <input type="text" name = "projectid" class="input input-bordered w-full max-w-xs hidden" value = "<?php echo $_GET['projectId']?>" />
                                        <button class="btn btn-circle btn-neutral">
                                            <i class="fa-solid fa-arrow-rotate-left"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class = "h-24 card card-compact w-96 shadow-xl border-8 bg-blue-200 border-blue-400 border-dashed" onclick="my_modal_6.showModal(); changeStatus(2);">
            <h1 class = "text-8xl m-auto text-blue-400">+</h1></div>
        </div>
    <?php else: ?>
        <h1 class="text-3xl text-black pb-6 col-span-1 lg:col-span-3">You don't have any project selected right now.</h1>
        </div>
    <?php endif; ?>

    <?php foreach ($tasks as $task): ?>
        <form method="POST" action = "../index.php?action=edit_task&task_id=<?php echo $task['id']?>" enctype="multipart/form-data">
            <dialog id="taskmodal_<?php echo $task['id']?>" class="modal modal-bottom sm:modal-middle">
                <div class="modal-box">
                <label class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">Task title</span>
                    </div>
                    <input type="text" name = "tasktitle" placeholder="Your task" class="input input-bordered w-full max-w-xs" value = "<?php echo $task['title']?>" />
                    <div class="label">
                        <span class="label-text">Deadline</span>
                    </div>
                    <input type="text" name = "deadline" placeholder="Deadline of the task" class="input input-bordered w-full max-w-xs" value = "<?php echo $task['deadline']?>" />
                    <input type="text" name = "projectid" class="input input-bordered w-full max-w-xs hidden" value = "<?php echo $_GET['projectId']?>" />
                    <button class="btn btn-success hidden">Submit</button>
                    </form>
                    <div class="modal-action">
                        <form method = "dialog">
                            <button class="btn" onclick="stoppedStatus()">Close</button>
                        </form>
                    </div>
                </div>
            </dialog>
    <?php endforeach; ?>
        
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>
</html>