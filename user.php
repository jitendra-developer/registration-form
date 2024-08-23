<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update user</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.0/dist/tailwind.min.css" rel="stylesheet"> -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-200 antialiased">

    <div class="container mx-auto my-20 py-6 px-4 bg-white rounded-lg shadow-lg">
        <h1 class="text-3xl py-4 border-b mb-10">Datatable</h1>

        <div id="notification" class="bg-teal-200 fixed top-0 left-0 right-0 z-40 w-full shadow hidden">
            <div class="container mx-auto px-4 py-4">
                <div class="flex md:items-center">
                    <svg class="h-8 w-8 text-teal-600" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    <div id="notification-text" class="text-teal-800 text-lg ml-2"></div>
                </div>
            </div>
        </div>

        <div class="mb-4 flex justify-between items-center">
            <input id="search" type="search" placeholder="Search..." class="w-full pl-10 pr-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium">
            <div class="relative">
                <button id="toggle-columns" class="rounded-lg inline-flex items-center bg-white hover:text-blue-500 focus:outline-none text-gray-500 font-semibold py-2 px-2 md:px-4">
                    <span class="hidden md:block">Display</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                </button>

                <div id="column-menu" class="absolute top-0 right-0 w-40 bg-white rounded-lg shadow-lg mt-12 hidden">
                    <label class="flex justify-start items-center text-truncate hover:bg-gray-100 px-4 py-2">
                        <input type="checkbox" class="form-checkbox" checked data-column="userId">
                        <span class="text-gray-700 ml-2">User ID</span>
                    </label>
                    <label class="flex justify-start items-center text-truncate hover:bg-gray-100 px-4 py-2">
                        <input type="checkbox" class="form-checkbox" checked data-column="firstName">
                        <span class="text-gray-700 ml-2">First Name</span>
                    </label>
                    <label class="flex justify-start items-center text-truncate hover:bg-gray-100 px-4 py-2">
                        <input type="checkbox" class="form-checkbox" checked data-column="lastName">
                        <span class="text-gray-700 ml-2">Last Name</span>
                    </label>
                    <label class="flex justify-start items-center text-truncate hover:bg-gray-100 px-4 py-2">
                        <input type="checkbox" class="form-checkbox" checked data-column="emailAddress">
                        <span class="text-gray-700 ml-2">Email</span>
                    </label>
                    <label class="flex justify-start items-center text-truncate hover:bg-gray-100 px-4 py-2">
                        <input type="checkbox" class="form-checkbox" checked data-column="gender">
                        <span class="text-gray-700 ml-2">Gender</span>
                    </label>
                    <label class="flex justify-start items-center text-truncate hover:bg-gray-100 px-4 py-2">
                        <input type="checkbox" class="form-checkbox" checked data-column="phoneNumber">
                        <span class="text-gray-700 ml-2">Phone</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table id="data-table" class="min-w-full border-collapse border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-3 border-b border-gray-200 text-justify">
                            <input type="checkbox" id="select-all" class="form-checkbox">
                        </th>
                        <th class="py-2 px-3 border-b border-gray-200 text-justify" data-column="userId">User ID</th>
                        <th class="py-2 px-3 border-b border-gray-200 text-justify" data-column="firstName">Name</th>
                        <th class="py-2 px-3 border-b border-gray-200 text-justify" data-column="lastName">Email</th>
                        <th class="py-2 px-3 border-b border-gray-200 text-justify" data-column="emailAddress">Password</th>
                        <th class="py-2 px-3 border-b border-gray-200 text-justify" data-column="gender">Number</th>
                        <th class="py-2 px-3 border-b border-gray-200 text-justify" data-column="phoneNumber">DOB</th>
                        <th class="py-2 px-3 border-b border-gray-200 text-justify" data-column="phoneNumber">Gender</th>
                        <th class="py-2 px-3 border-b border-gray-200 text-justify" data-column="phoneNumber">Message</th>
                        <th class="py-2 px-3 border-b border-gray-200 text-justify" data-column="phoneNumber">Image</th>
                        <th class="py-2 px-3 border-b border-gray-200 text-justify">Action </th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <!-- Rows will be inserted by JavaScript -->
                    <?php
                    require_once('connection.php');

                    $sql = "SELECT * FROM admission_crud ";

                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result)) {
                        while ($row =  mysqli_fetch_assoc($result)) {
                    ?>

                            <tr>
                                <td class="py-2 px-3 border-t border-gray-200 text-justify">
                                    <input type="checkbox" class="row-checkbox" data-id="${user.userId}">
                                </td>
                                <td class="py-2 px-3 border-t border-gray-200 text-justify ${key}">
                                    <?php echo $row['id']; ?>
                                </td>
                                <td class="py-2 px-3 border-t border-gray-200 text-justify ${key}">
                                    <?php echo $row['name']; ?>
                                </td>
                                <td class="py-2 px-3 border-t border-gray-200 text-justify ${key}">
                                    <?php echo $row['email']; ?>
                                </td>
                                <td class="py-2 px-3 border-t border-gray-200 text-justify ${key}">
                                    <?php echo $row['password']; ?>
                                </td>
                                <td class="py-2 px-3 border-t border-gray-200 text-justify ${key}">
                                    <?php echo $row['number']; ?>
                                </td>
                                <td class="py-2 px-3 border-t border-gray-200 text-justify ${key}">
                                    <?php echo $row['dob']; ?>
                                </td>
                                <td class="py-2 px-3 border-t border-gray-200 text-justify ${key}">
                                    <?php echo $row['gender']; ?>
                                </td>
                                <td class="py-2 px-3 border-t border-gray-200 text-justify ${key}">
                                    <?php echo $row['message']; ?>
                                </td>
                                <td class="py-2 px-3 border-t border-gray-200 text-justify ${key}">
                                    <?php echo $row['file']; ?>
                                </td>
                                <th>
                                    <div class="flex justify-around gap-2 items-center">
                                        <a class="bg-green-600 rounded shedow-lg text-white px-3 py-1 my-1 font-normal " href="update.php?id=<?php echo $row['id'];  ?>">Edit</a>
                                        <a class="bg-red-600 rounded shedow-lg text-white px-3 py-1 my-1 font-normal " href="delete.php?id=<?php echo $row['id'];  ?>">Delete</a>
                                    </div>
                                </th>
                            </tr>
                    <?php


                        }
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // document.addEventListener('DOMContentLoaded', () => {
        //     const data = [{
        //             "userId": 1,
        //             "firstName": "Cort",
        //             "lastName": "Tosh",
        //             "emailAddress": "ctosh0@github.com",
        //             "gender": "Male",
        //             "phoneNumber": "327-626-5542"
        //         },
        //         {
        //             "userId": 2,
        //             "firstName": "Brianne",
        //             "lastName": "Dzeniskevich",
        //             "emailAddress": "bdzeniskevich1@hostgator.com",
        //             "gender": "Female",
        //             "phoneNumber": "144-190-8956"
        //         },
        //         // Add more data as needed
        //     ];

        //     const tableBody = document.getElementById('table-body');
        //     const columnMenu = document.getElementById('column-menu');
        //     const toggleColumnsButton = document.getElementById('toggle-columns');
        //     const notification = document.getElementById('notification');
        //     const notificationText = document.getElementById('notification-text');
        //     const selectAllCheckbox = document.getElementById('select-all');

        //     function renderTable() {
        //         tableBody.innerHTML = data.map(user => `
        //             <tr>
        //                 <td class="py-2 px-3 border-t border-gray-200 text-justify">
        //                     <input type="checkbox" class="row-checkbox" data-id="${user.userId}">
        //                 </td>
        //                 ${['userId', 'firstName', 'lastName', 'emailAddress', 'gender', 'phoneNumber'].map(key => `
        //                     <td class="py-2 px-3 border-t border-gray-200 text-justify ${key}">
        //                         ${user[key]}
        //                     </td>
        //                 `).join('')}
        //             </tr>
        //         `).join('');
        //     }

        //     function updateColumnVisibility() {
        //         document.querySelectorAll('#data-table th, #data-table td').forEach(cell => {
        //             const column = cell.getAttribute('data-column');
        //             const isVisible = document.querySelector(`input[data-column="${column}"]`).checked;
        //             cell.style.display = isVisible ? '' : 'none';
        //         });
        //     }

        //     function toggleRowSelection(checkbox) {
        //         const id = checkbox.dataset.id;
        //         if (checkbox.checked) {
        //             selectedRows.push(id);
        //         } else {
        //             selectedRows = selectedRows.filter(rowId => rowId !== id);
        //         }
        //         updateNotification();
        //     }

        //     function toggleAllRows(checked) {
        //         document.querySelectorAll('.row-checkbox').forEach(checkbox => {
        //             checkbox.checked = checked;
        //             toggleRowSelection(checkbox);
        //         });
        //     }

        //     function updateNotification() {
        //         if (selectedRows.length > 0) {
        //             notification.classList.remove('hidden');
        //             notificationText.textContent = `${selectedRows.length} rows are selected`;
        //         } else {
        //             notification.classList.add('hidden');
        //         }
        //     }

        //     let selectedRows = [];

        //     renderTable();

        //     toggleColumnsButton.addEventListener('click', () => {
        //         columnMenu.classList.toggle('hidden');
        //     });

        //     document.getElementById('search').addEventListener('input', (e) => {
        //         const query = e.target.value.toLowerCase();
        //         document.querySelectorAll('#table-body tr').forEach(row => {
        //             row.style.display = row.textContent.toLowerCase().includes(query) ? '' : 'none';
        //         });
        //     });

        //     document.querySelectorAll('#column-menu input').forEach(checkbox => {
        //         checkbox.addEventListener('change', updateColumnVisibility);
        //     });

        //     selectAllCheckbox.addEventListener('change', (e) => {
        //         toggleAllRows(e.target.checked);
        //     });

        //     document.querySelectorAll('.row-checkbox').forEach(checkbox => {
        //         checkbox.addEventListener('change', () => toggleRowSelection(checkbox));
        //     });
        // });
    </script>

</body>

</html>

<?php require_once("navbar.php"); ?>