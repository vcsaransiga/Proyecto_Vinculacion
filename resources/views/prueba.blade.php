<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @vite(['resources/css/app.css'])



</head>

<body>
    <div class="tw-relative tw-overflow-x-auto tw-shadow-md sm:tw-rounded-lg">
        <div
            class="tw-flex tw-items-center tw-justify-between tw-flex-column tw-flex-wrap md:tw-flex-row tw-space-y-4 md:tw-space-y-0 tw-pb-4 tw-bg-white dark:tw-bg-gray-900">
            <div>
                <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                    class="tw-inline-flex tw-items-center tw-text-gray-500 tw-bg-white tw-border tw-border-gray-300 focus:tw-outline-none hover:tw-bg-gray-100 focus:tw-ring-4 focus:tw-ring-gray-100 tw-font-medium tw-rounded-lg tw-text-sm tw-px-3 tw-py-1.5 dark:tw-bg-gray-800 dark:tw-text-gray-400 dark:tw-border-gray-600 dark:hover:tw-bg-gray-700 dark:hover:tw-border-gray-600 dark:focus:tw-ring-gray-700"
                    type="button">
                    <span class="tw-sr-only">Action button</span>
                    Action
                    <svg class="tw-w-2.5 tw-h-2.5 tw-ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownAction"
                    class="tw-z-10 tw-hidden tw-bg-white tw-divide-y tw-divide-gray-100 tw-rounded-lg tw-shadow tw-w-44 dark:tw-bg-gray-700 dark:tw-divide-gray-600">
                    <ul class="tw-py-1 tw-text-sm tw-text-gray-700 dark:tw-text-gray-200"
                        aria-labelledby="dropdownActionButton">
                        <li>
                            <a href="#"
                                class="tw-block tw-px-4 tw-py-2 hover:tw-bg-gray-100 dark:hover:tw-bg-gray-600 dark:hover:tw-text-white">Reward</a>
                        </li>
                        <li>
                            <a href="#"
                                class="tw-block tw-px-4 tw-py-2 hover:tw-bg-gray-100 dark:hover:tw-bg-gray-600 dark:hover:tw-text-white">Promote</a>
                        </li>
                        <li>
                            <a href="#"
                                class="tw-block tw-px-4 tw-py-2 hover:tw-bg-gray-100 dark:hover:tw-bg-gray-600 dark:hover:tw-text-white">Activate
                                account</a>
                        </li>
                    </ul>
                    <div class="tw-py-1">
                        <a href="#"
                            class="tw-block tw-px-4 tw-py-2 tw-text-sm tw-text-gray-700 hover:tw-bg-gray-100 dark:hover:tw-bg-gray-600 dark:tw-text-gray-200 dark:hover:tw-text-white">Delete
                            User</a>
                    </div>
                </div>
            </div>
            <label for="table-search" class="tw-sr-only">Search</label>
            <div class="tw-relative">
                <div
                    class="tw-absolute tw-inset-y-0 rtl:tw-inset-r-0 tw-start-0 tw-flex tw-items-center tw-ps-3 tw-pointer-events-none">
                    <svg class="tw-w-4 tw-h-4 tw-text-gray-500 dark:tw-text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" id="table-search-users"
                    class="tw-block tw-p-2 tw-ps-10 tw-text-sm tw-text-gray-900 tw-border tw-border-gray-300 tw-rounded-lg tw-w-80 tw-bg-gray-50 focus:tw-ring-blue-500 focus:tw-border-blue-500 dark:tw-bg-gray-700 dark:tw-border-gray-600 dark:tw-placeholder-gray-400 dark:tw-text-white dark:focus:tw-ring-blue-500 dark:focus:tw-border-blue-500"
                    placeholder="Search for users">
            </div>
        </div>
        <table class="tw-w-full tw-text-sm tw-text-left rtl:tw-text-right tw-text-gray-500 dark:tw-text-gray-400">
            <thead
                class="tw-text-xs tw-text-gray-700 tw-uppercase tw-bg-gray-50 dark:tw-bg-gray-700 dark:tw-text-gray-400">
                <tr>
                    <th scope="col" class="tw-p-4">
                        <div class="tw-flex tw-items-center">
                            <input id="checkbox-all-search" type="checkbox"
                                class="tw-w-4 tw-h-4 tw-text-blue-600 tw-bg-gray-100 tw-border-gray-300 tw-rounded focus:tw-ring-blue-500 dark:focus:tw-ring-blue-600 dark:tw-ring-offset-gray-800 dark:focus:tw-ring-offset-gray-800 focus:tw-ring-2 dark:tw-bg-gray-700 dark:tw-border-gray-600">
                            <label for="checkbox-all-search" class="tw-sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="tw-px-6 tw-py-3">
                        Name
                    </th>
                    <th scope="col" class="tw-px-6 tw-py-3">
                        Position
                    </th>
                    <th scope="col" class="tw-px-6 tw-py-3">
                        Status
                    </th>
                    <th scope="col" class="tw-px-6 tw-py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr
                    class="tw-bg-white tw-border-b dark:tw-bg-gray-800 dark:tw-border-gray-700 hover:tw-bg-gray-50 dark:hover:tw-bg-gray-600">
                    <td class="tw-w-4 tw-p-4">
                        <div class="tw-flex tw-items-center">
                            <input id="checkbox-table-search-1" type="checkbox"
                                class="tw-w-4 tw-h-4 tw-text-blue-600 tw-bg-gray-100 tw-border-gray-300 tw-rounded focus:tw-ring-blue-500 dark:focus:tw-ring-blue-600 dark:tw-ring-offset-gray-800 dark:focus:tw-ring-offset-gray-800 focus:tw-ring-2 dark:tw-bg-gray-700 dark:tw-border-gray-600">
                            <label for="checkbox-table-search-1" class="tw-sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row"
                        class="tw-flex tw-items-center tw-px-6 tw-py-4 tw-text-gray-900 tw-whitespace-nowrap dark:tw-text-white">
                        <img class="tw-w-10 tw-h-10 tw-rounded-full" src="/docs/images/people/profile-picture-1.jpg"
                            alt="Jese image">
                        <div class="tw-ps-3">
                            <div class="tw-text-base tw-font-semibold">Neil Sims</div>
                            <div class="tw-font-normal tw-text-gray-500">neil.sims@flowbite.com</div>
                        </div>
                    </th>
                    <td class="tw-px-6 tw-py-4">
                        React Developer
                    </td>
                    <td class="tw-px-6 tw-py-4">
                        <div class="tw-flex tw-items-center">
                            <div class="tw-h-2.5 tw-w-2.5 tw-rounded-full tw-bg-green-500 tw-me-2"></div> Online
                        </div>
                    </td>
                    <td class="tw-px-6 tw-py-4">
                        <a href="#"
                            class="tw-font-medium tw-text-blue-600 dark:tw-text-blue-500 hover:tw-underline">Edit
                            user</a>
                    </td>
                </tr>
                <tr
                    class="tw-bg-white tw-border-b dark:tw-bg-gray-800 dark:tw-border-gray-700 hover:tw-bg-gray-50 dark:hover:tw-bg-gray-600">
                    <td class="tw-w-4 tw-p-4">
                        <div class="tw-flex tw-items-center">
                            <input id="checkbox-table-search-2" type="checkbox"
                                class="tw-w-4 tw-h-4 tw-text-blue-600 tw-bg-gray-100 tw-border-gray-300 tw-rounded focus:tw-ring-blue-500 dark:focus:tw-ring-blue-600 dark:tw-ring-offset-gray-800 dark:focus:tw-ring-offset-gray-800 focus:tw-ring-2 dark:tw-bg-gray-700 dark:tw-border-gray-600">
                            <label for="checkbox-table-search-2" class="tw-sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row"
                        class="tw-flex tw-items-center tw-px-6 tw-py-4 tw-font-medium tw-text-gray-900 tw-whitespace-nowrap dark:tw-text-white">
                        <img class="tw-w-10 tw-h-10 tw-rounded-full" src="/docs/images/people/profile-picture-3.jpg"
                            alt="Jese image">
                        <div class="tw-ps-3">
                            <div class="tw-text-base tw-font-semibold">Bonnie Green</div>
                            <div class="tw-font-normal tw-text-gray-500">bonnie@flowbite.com</div>
                        </div>
                    </th>
                    <td class="tw-px-6 tw-py-4">
                        Designer
                    </td>
                    <td class="tw-px-6 tw-py-4">
                        <div class="tw-flex tw-items-center">
                            <div class="tw-h-2.5 tw-w-2.5 tw-rounded-full tw-bg-green-500 tw-me-2"></div> Online
                        </div>
                    </td>
                    <td class="tw-px-6 tw-py-4">
                        <a href="#"
                            class="tw-font-medium tw-text-blue-600 dark:tw-text-blue-500 hover:tw-underline">Edit
                            user</a>
                    </td>
                </tr>
                <tr
                    class="tw-bg-white tw-border-b dark:tw-bg-gray-800 dark:tw-border-gray-700 hover:tw-bg-gray-50 dark:hover:tw-bg-gray-600">
                    <td class="tw-w-4 tw-p-4">
                        <div class="tw-flex tw-items-center">
                            <input id="checkbox-table-search-2" type="checkbox"
                                class="tw-w-4 tw-h-4 tw-text-blue-600 tw-bg-gray-100 tw-border-gray-300 tw-rounded focus:tw-ring-blue-500 dark:focus:tw-ring-blue-600 dark:tw-ring-offset-gray-800 dark:focus:tw-ring-offset-gray-800 focus:tw-ring-2 dark:tw-bg-gray-700 dark:tw-border-gray-600">
                            <label for="checkbox-table-search-2" class="tw-sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row"
                        class="tw-flex tw-items-center tw-px-6 tw-py-4 tw-font-medium tw-text-gray-900 tw-whitespace-nowrap dark:tw-text-white">
                        <img class="tw-w-10 tw-h-10 tw-rounded-full" src="/docs/images/people/profile-picture-2.jpg"
                            alt="Jese image">
                        <div class="tw-ps-3">
                            <div class="tw-text-base tw-font-semibold">Jese Leos</div>
                            <div class="tw-font-normal tw-text-gray-500">jese@flowbite.com</div>
                        </div>
                    </th>
                    <td class="tw-px-6 tw-py-4">
                        Vue JS Developer
                    </td>
                    <td class="tw-px-6 tw-py-4">
                        <div class="tw-flex tw-items-center">
                            <div class="tw-h-2.5 tw-w-2.5 tw-rounded-full tw-bg-green-500 tw-me-2"></div> Online
                        </div>
                    </td>
                    <td class="tw-px-6 tw-py-4">
                        <a href="#"
                            class="tw-font-medium tw-text-blue-600 dark:tw-text-blue-500 hover:tw-underline">Edit
                            user</a>
                    </td>
                </tr>
                <tr
                    class="tw-bg-white tw-border-b dark:tw-bg-gray-800 dark:tw-border-gray-700 hover:tw-bg-gray-50 dark:hover:tw-bg-gray-600">
                    <td class="tw-w-4 tw-p-4">
                        <div class="tw-flex tw-items-center">
                            <input id="checkbox-table-search-2" type="checkbox"
                                class="tw-w-4 tw-h-4 tw-text-blue-600 tw-bg-gray-100 tw-border-gray-300 tw-rounded focus:tw-ring-blue-500 dark:focus:tw-ring-blue-600 dark:tw-ring-offset-gray-800 dark:focus:tw-ring-offset-gray-800 focus:tw-ring-2 dark:tw-bg-gray-700 dark:tw-border-gray-600">
                            <label for="checkbox-table-search-2" class="tw-sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row"
                        class="tw-flex tw-items-center tw-px-6 tw-py-4 tw-font-medium tw-text-gray-900 tw-whitespace-nowrap dark:tw-text-white">
                        <img class="tw-w-10 tw-h-10 tw-rounded-full" src="/docs/images/people/profile-picture-5.jpg"
                            alt="Jese image">
                        <div class="tw-ps-3">
                            <div class="tw-text-base tw-font-semibold">Thomas Lean</div>
                            <div class="tw-font-normal tw-text-gray-500">thomes@flowbite.com</div>
                        </div>
                    </th>
                    <td class="tw-px-6 tw-py-4">
                        UI/UX Engineer
                    </td>
                    <td class="tw-px-6 tw-py-4">
                        <div class="tw-flex tw-items-center">
                            <div class="tw-h-2.5 tw-w-2.5 tw-rounded-full tw-bg-green-500 tw-me-2"></div> Online
                        </div>
                    </td>
                    <td class="tw-px-6 tw-py-4">
                        <a href="#"
                            class="tw-font-medium tw-text-blue-600 dark:tw-text-blue-500 hover:tw-underline">Edit
                            user</a>
                    </td>
                </tr>
                <tr class="tw-bg-white dark:tw-bg-gray-800 hover:tw-bg-gray-50 dark:hover:tw-bg-gray-600">
                    <td class="tw-w-4 tw-p-4">
                        <div class="tw-flex tw-items-center">
                            <input id="checkbox-table-search-3" type="checkbox"
                                class="tw-w-4 tw-h-4 tw-text-blue-600 tw-bg-gray-100 tw-border-gray-300 tw-rounded focus:tw-ring-blue-500 dark:focus:tw-ring-blue-600 dark:tw-ring-offset-gray-800 dark:focus:tw-ring-offset-gray-800 focus:tw-ring-2 dark:tw-bg-gray-700 dark:tw-border-gray-600">
                            <label for="checkbox-table-search-3" class="tw-sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row"
                        class="tw-flex tw-items-center tw-px-6 tw-py-4 tw-font-medium tw-text-gray-900 tw-whitespace-nowrap dark:tw-text-white">
                        <img class="tw-w-10 tw-h-10 tw-rounded-full" src="/docs/images/people/profile-picture-4.jpg"
                            alt="Jese image">
                        <div class="tw-ps-3">
                            <div class="tw-text-base tw-font-semibold">Leslie Livingston</div>
                            <div class="tw-font-normal tw-text-gray-500">leslie@flowbite.com</div>
                        </div>
                    </th>
                    <td class="tw-px-6 tw-py-4">
                        SEO Specialist
                    </td>
                    <td class="tw-px-6 tw-py-4">
                        <div class="tw-flex tw-items-center">
                            <div class="tw-h-2.5 tw-w-2.5 tw-rounded-full tw-bg-red-500 tw-me-2"></div> Offline
                        </div>
                    </td>
                    <td class="tw-px-6 tw-py-4">
                        <a href="#"
                            class="tw-font-medium tw-text-blue-600 dark:tw-text-blue-500 hover:tw-underline">Edit
                            user</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</body>


</html>
