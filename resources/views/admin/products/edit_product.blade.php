<style>
    h1.ck-content {
        font-size: 28px;
        color: #333;
        font-weight: bold;
        margin-bottom: 15px;
    }

    h2.ck-content {
        font-size: 24px;
        color: #444;
        font-weight: bold;
        margin-bottom: 12px;
    }

    h3.ck-content {
        font-size: 20px;
        color: #555;
        font-weight: bold;
        margin-bottom: 10px;
    }

    ul.ck-content {
        list-style-type: disc;
        margin-left: 20px;
        padding-left: 20px;
    }

    ol.ck-content {
        list-style-type: decimal;
        margin-left: 20px;
        padding-left: 20px;
    }

    li.ck-content {
        margin-bottom: 5px;
    }

    a.ck-content {
        color: #007bff;
        text-decoration: underline;
    }

    .ck-content h1 {
        font-size: 28px;
        color: #333;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .ck-content h2 {
        font-size: 24px;
        color: #444;
        font-weight: bold;
        margin-bottom: 12px;
    }

    .ck-content h3 {
        font-size: 20px;
        color: #555;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .ck-content ul {
        list-style-type: disc;
        margin-left: 20px;
        padding-left: 20px;
    }

    .ck-content ol {
        list-style-type: decimal;
        margin-left: 20px;
        padding-left: 20px;
    }

    .ck-content li {
        margin-bottom: 5px;
    }

    .ck-content a {
        color: #007bff;
        text-decoration: underline;
    }

    .comment-list {
        max-height: 500px;
        overflow-y: auto;
    }

    .comment-text {
        max-width: 100%;
        word-wrap: break-word;
        overflow-wrap: break-word;
    }

    .comment-container {
        width: 100%;
    }

    .comment-content {
        width: 100%;
    }

    .edit-comment-textarea {
        resize: vertical;
        min-height: 60px;
        line-height: 1.5;
        vertical-align: top;
    }

    .ck-editor__editable_inline {
        min-height: 200px;
    }
</style>

<body>
    <x-app-layout>

        <button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar"
            aria-controls="sidebar-multi-level-sidebar" type="button"
            class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd"
                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                </path>
            </svg>
        </button>

        <aside id="sidebar-multi-level-sidebar"
            class="fixed top-16 left-0 z-40 w-64 h-screen"
            aria-label="Sidebar">
            <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="/admin"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 22 21">
                                <path
                                    d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                <path
                                    d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                            </svg>
                            <span class="ms-3">{{trans('message.dashboard')}}</span>
                        </a>
                    </li>
                    <li>
                        <button type="button"
                            class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 18 21">
                                <path
                                    d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                            </svg>
                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">E-commerce</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <ul id="dropdown-example" class="hidden py-2 space-y-2">
                            <li>
                                <a href="#"
                                    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Products</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Billing</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Invoice</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="/admin/category/view"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">{{trans('message.category')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/product/view" class="bg-slate-300 flex items-center p-2 text-gray-900 rounded-lg group">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 8C3 7.05719 3 6.58579 3.29289 6.29289C3.58579 6 4.05719 6 5 6H19C19.9428 6 20.4142 6 20.7071 6.29289C21 6.58579 21 7.05719 21 8V9C21 9.94281 21 10.4142 20.7071 10.7071C20.4142 11 19.9428 11 19 11H5C4.05719 11 3.58579 11 3.29289 10.7071C3 10.4142 3 9.94281 3 9V8Z" stroke="black" stroke-width="null" class="my-path"></path>
                                <path d="M12 6V21" stroke="black" stroke-width="null" class="my-path"></path>
                                <path d="M5 11H19V17C19 18.8856 19 19.8284 18.4142 20.4142C17.8284 21 16.8856 21 15 21H9C7.11438 21 6.17157 21 5.58579 20.4142C5 19.8284 5 18.8856 5 17V11Z" stroke="black" stroke-width="null" class="my-path"></path>
                                <path d="M12 6V4.5C12 3.67157 11.3284 3 10.5 3C9.67157 3 9 3.67157 9 4.5V6H12Z" stroke="black" stroke-width="null" class="my-path"></path>
                                <path d="M15 6V4.5C15 3.67157 14.3284 3 13.5 3C12.6716 3 12 3.67157 12 4.5V6H15Z" stroke="black" stroke-width="null" class="my-path"></path>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">{{trans('message.product')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 18 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Sign In</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z" />
                                <path
                                    d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z" />
                                <path
                                    d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Sign Up</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <div class="p-4 sm:ml-64 mt-16">
            <div class="flex w-full items-center rounded-full">
                <div class="flex-1 border-b border-gray-300"></div>
                <span class="text-black text-lg font-semibold leading-8 px-8 py-3 uppercase">{{trans('message.edit-product')}}</span>
                <div class="flex-1 border-b border-gray-300"></div>
            </div>
            <div class="p-4 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                <div class="grid grid-cols-1 mb-2">
                    <div class="flex items-center justify-between rounded dark:bg-gray-800">
                        <div class="flex justify-center items-center gap-1">
                            {{-- <button type="button" class="text-black bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Product</button>
                            <button type="button" class="text-black bg-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Size</button> --}}
                        </div>
                        <button type="button" id="btn-save"
                            class="flex justify-center items-center gap-2 text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H6.911a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661Z" />
                            </svg>
                            {{trans('message.save')}}
                        </button>
                    </div>
                </div>
                <div class="p-4">
                    <div class="flex flex-row gap-10 justify-center">
                        <div class="basis-2/3">
                            <div class="flex items-center gap-5 mb-3">
                                <div class="mb-3 basis-1/2">
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{trans('message.product-name')}}</label>
                                    <input type="name" id="nameProduct"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required value="{{ $data->name }}" />
                                </div>

                                <div class="mb-3 basis-1/2">
                                    <label for="price"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{trans('message.product-price')}}</label>
                                    <input type="number" id="priceProduct"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required value="{{ $data->price }}" />
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{trans('message.description')}}</label>
                                <textarea id="description" name="description" rows="5"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $data->description }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="category"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{trans('message.parent-category')}}</label>
                                <select id="parentCategory"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected value="{{$data->category->id}}">{{$data->category->name}}</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="category"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{trans('message.category')}}</label>
                                <select id="typeProduct" data-placeholder="{{trans('message.select-type')}}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected value="{{$data->type}}">{{$data->type == 1 ? trans('message.at-base') : trans('message.tf-base')}}</option>
                                    <option value="1">{{trans('message.at-base')}}</option>
                                    <option value="2">{{trans('message.tf-base')}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="basis-1/3">
                            <div class="mb-3">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="main_image">{{trans('message.main-image')}}</label>
                                <label>
                                    <div
                                        class="mb-5 w-full h-11 rounded-3xl border border-gray-300 justify-between items-center inline-flex">
                                        <h2 class="text-gray-900/20 text-sm font-normal leading-snug pl-4">No file
                                            chosen</h2>
                                        <input type="file" hidden id="main_image" />
                                        <div
                                            class="flex w-28 h-11 px-2 flex-col bg-indigo-600 rounded-r-3xl shadow text-white text-xs font-semibold leading-4 
                                                                           items-center justify-center cursor-pointer focus:outline-none">
                                            Choose File </div>
                                    </div>
                                </label>
                            </div>
                            <div class="mb-2">
                                <div class="w-full flex items-center justify-center p-5" id="main-image-preview">
                                    
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="sub_image">{{trans('message.sub-image')}}</label>
                                <div class="flex items-center justify-center w-full">
                                    <label for="sub_image"
                                        class="flex h-24 flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-6 pb-6">
                                            <svg class="w-8 h-8 mb-2 text-gray-500 dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                    class="font-semibold">Click to upload</span> or drag and drop</p>
                                        </div>
                                        <input id="sub_image" type="file" class="hidden" multiple />
                                    </label>
                                </div>
                            </div>


                            <div class=" mb-2 grid grid-cols-2 gap-6" id="sub-image-preview">
                               
                            </div>

                            <div class="mb-3">
                                <div class="size-container">
                                    @foreach ($data->productSizes as $item)
                                        <div class="flex items-center gap-5 mb-3" id="size-container">
                                            <div class="mb-3 basis-1/2">
                                                <label for="name-size"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    {{trans('message.name-size')}}
                                                </label>
                                                <input type="text" id="name-size" name="name_size[]"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required value="{{ $item->size }}" />
                                            </div>
                                            <div class="mb-3 basis-1/2">
                                                <label for=""
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    {{trans('message.quantity')}}
                                                </label>
                                                <input type="number" id="quantity" name="name_quantity[]"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required value="{{ $item->quantity }}" />
                                            </div>

                                            @if ($loop->first)
                                                <label id="add-size"
                                                    class="flex flex-col items-center justify-center px-3 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <div class="flex flex-col items-center justify-center pt-3 pb-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" class="size-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                        </svg>
                                                    </div>
                                                </label>
                                            @else
                                                <label
                                                    class="remove-size flex flex-col items-center justify-center px-3 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <div class="flex flex-col items-center justify-center pt-3 pb-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" class="size-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M5 12h14" />
                                                        </svg>
                                                    </div>
                                                </label>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" value="{{$data->id}}" id="id_product">
        </div>

    </x-app-layout>

    <script>
        $(document).ready(function() {

            let editorInstance;
            let oldMainImage = '{{$data->mainImage->image_url}}';
            let oldSubImages = @json($data->subImage->pluck('image_url'));
            let id = $('#id_product').val();

            if (oldMainImage) {
                const mainImageWrapper = $('<div>').addClass('relative inline-block');
                const mainImg = $('<img>')
                    .attr('src', `/storage/${oldMainImage}`)
                    .addClass('h-40 w-auto object-cover mt-2 mr-2 rounded-lg');
                const removeButton = $('<div>')
                    .addClass('absolute top-0 right-0 bg-black rounded-full p-1 cursor-pointer')
                    .html(`
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    `)
                    .on('click', function() {
                        mainImageWrapper.remove();
                        oldMainImage = null; 
                    });

                mainImageWrapper.append(mainImg).append(removeButton);
                $('#main-image-preview').append(mainImageWrapper);
            }

            oldSubImages.forEach(imageUrl => {
                const subImageWrapper = $('<div>').addClass('relative inline-block m-1');
                const subImg = $('<img>')
                    .attr('src', `/storage/${imageUrl}`)
                    .addClass('h-40 w-auto object-cover mt-2 rounded-lg');
                const removeButton = $('<div>')
                    .addClass('absolute top-0 right-0 bg-black rounded-full p-1 cursor-pointer')
                    .html(`
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    `)
                    .on('click', function() {
                        subImageWrapper.remove();
                        oldSubImages = oldSubImages.filter(img => img !== imageUrl); 
                    });

                subImageWrapper.append(subImg).append(removeButton);
                $('#sub-image-preview').append(subImageWrapper);
            });

            $('#main_image').on('change', function(e) {

                let mainImage = e.target.files[0];
                const previewContainer = $('#main-image-preview');
                previewContainer.empty();
                const reader = new FileReader();

                reader.onload = function(e) {

                    const imageWrapper = $('<div>')
                        .addClass('relative inline-block');

                    const img = $('<img>')
                        .attr('src', e.target.result)
                        .addClass('h-40 w-auto object-cover mt-2 mr-2 rounded-lg');

                    const removeButton = $('<div>')
                        .addClass('absolute top-0 right-0 bg-black rounded-full p-1 cursor-pointer')
                        .html(`
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    `)
                        .on('click', function() {
                            imageWrapper.remove();
                            $('#main_image').val('');
                        });

                    imageWrapper.append(img).append(removeButton);
                    previewContainer.append(imageWrapper);
                };

                reader.readAsDataURL(mainImage);

            })

            let selectedFiles = [];

            $('#sub_image').on('change', function(e) {
                const files = Array.from(e.target.files);
                const previewContainer = $('#sub-image-preview');

                files.forEach(file => {

                    if (!selectedFiles.some(f => f.name === file.name && f.size === file.size)) {
                        selectedFiles.push(file);

                        const reader = new FileReader();
                        reader.onload = function(e) {

                            const imageWrapper = $('<div>')
                                .addClass('relative inline-block m-1');

                            const img = $('<img>')
                                .attr('src', e.target.result)
                                .addClass('h-40 w-auto object-cover mt-2 rounded-lg');

                            const removeButton = $('<div>')
                                .addClass(
                                    'absolute top-0 -right-0.5 bg-black rounded-full p-1 cursor-pointer'
                                )
                                .html(`
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                `)
                                .on('click', function() {
                                    imageWrapper.remove();
                                    selectedFiles = selectedFiles.filter(f => f.name !==
                                        file.name || f.size !== file.size);
                                    updateInputFiles();
                                });

                            imageWrapper.append(img).append(removeButton);
                            previewContainer.append(imageWrapper);
                        };
                        reader.readAsDataURL(file);
                    }
                });

                $(this).val('');
            });

            $('#parentCategory').select2({
                ajax: {
                    url: '/admin/load_category',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                },
                placeholder: '{{trans('message.select-category')}}',
                allowClear: true,
                language: {
                    searching: function() {
                        return '{{trans('message.loading')}}';
                    },
                    noResults: function() {
                        return '{{trans('message.no-result')}}';
                    }
                }
            });

            $('#typeProduct').select2({
                width: '100%',
                placeholder: $('#typeProduct').data('placeholder'), // Lấy placeholder từ data-placeholder
                allowClear: true,
                language: {
                    searching: function() {
                        return '{{trans('message.loading')}}';
                    },
                    noResults: function() {
                        return '{{trans('message.no-result')}}';
                    }
                }
            });


            function updateInputFiles() {
                const dataTransfer = new DataTransfer();
                selectedFiles.forEach(file => dataTransfer.items.add(file));
                $('#sub_image')[0].files = dataTransfer.files;
            }

            $('#btn-save').on('click', function() {
                let goodJob = `{{ trans('message.good-job') }}`;
                let Error = `{{ trans('message.error') }}`;
                let wentWrong = `{{ trans('message.went-wrong') }}`;
                let formData = new FormData();
                let button = $('#btn-save');
                button.prop('disabled', true).html(`
                        <svg aria-hidden="true" role="status" class="inline w-4 h-4 me-3 text-gray-200 animate-spin dark:text-gray-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="#1C64F2"/>
                        </svg>
                        {{trans('message.loading')}}
                    `);
                formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
                formData.append('name', $('#nameProduct').val());
                formData.append('price', $('#priceProduct').val());
                formData.append('description', editorInstance.getData());
                formData.append('category', $('#parentCategory').val());
                formData.append('type', $('#typeProduct').val());


                if ($('#main_image')[0].files.length > 0) {
                    formData.append('mainImage', $('#main_image')[0].files[0]);
                } else if (oldMainImage) {
                    formData.append('old_main_image', oldMainImage);
                }

                for (let i = 0; i < selectedFiles.length; i++) {
                    formData.append('subImages[]', selectedFiles[i]);
                }

                oldSubImages.forEach(imageUrl => {
                    formData.append('old_sub_images[]', imageUrl);
                });

                $("input[name='name_size[]']").each(function() {
                    formData.append('sizes[]', $(this).val());
                });

                $("input[name='name_quantity[]']").each(function() {
                    formData.append('quantities[]', $(this).val());
                });

                $.ajax({
                    url: `/admin/product/update_product/${id}`, 
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        swal(goodJob, response.message, response.status)
                        .then( () => {
                            window.location.href = `/admin/product/edit_product/${id}`;
                        });
                    },
                    error: function(error) {
                        swal(Error, wentWrong, "error");
                    },
                    complete: function() {
                                button.prop('disabled', false).html(`
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H6.911a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661Z" />
                                    </svg>
                                    {{ trans('message.save') }}
                                `);
                            }
                });
            });


            $('#add-size').on('click', function() {
                let newSize = `
                    <div class="flex items-center justify-center gap-5 mb-3">
                        <div class="mb-3 basis-1/2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{trans('message.name-size')}}</label>
                            <input type="text" name="name_size[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                        </div>

                        <div class="mb-3 basis-1/2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{trans('message.quantity')}}</label>
                            <input type="number" name="name_quantity[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                        </div>
                        <label class="remove-size flex flex-col items-center justify-center px-3 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-3 pb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                </svg>       
                            </div>
                        </label>
                    </div>
                `
                $('.size-container').append(newSize);
            });

            $(document).on('click', '.remove-size', function() {
                $(this).parent().remove();
            });

            ClassicEditor
                .create(document.querySelector('#description'))
                .then(editor => {
                    editorInstance = editor;
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
</body>
