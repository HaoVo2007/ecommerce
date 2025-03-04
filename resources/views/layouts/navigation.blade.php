<nav x-data="{ open: false }"
    class="fixed top-0 right-0 left-0 h-auto z-50 bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-center gap-20 h-20">
            <div class="flex gap-5">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img class="w-14 h-14" src="{{asset('/image/logo/logo.png')}}" alt="">
                    </a>
                </div>
            </div>

            <div class="flex justify-center items-center flex-grow">
                <div class="w-full">
                    <label for="default-search"
                        class="text-sm font-medium text-gray-900 sr-only dark:text-white">{{trans('message.search')}}</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" style="padding-left: 35px" id="key-word"
                            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="{{trans('message.search-name')}}" required />
                        <button id="btn-search" type="submit"
                            class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{trans('message.search')}}</button>
                    </div>
                </div>
            </div>
            <!-- Settings Dropdown -->
            <div class="flex items-center justify-center">
                @auth
                    <div class="hidden sm:flex sm:items-center">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <form method="POST" style="margin: 0px;" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <div class="hidden sm:flex sm:items-center">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                    <div class="flex gap-2 justify-center items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('login')">
                                    {{ __('Login') }}
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('register')">
                                    {{ __('Register') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endauth
                <div class="relative hidden sm:flex sm:items-center">

                    <button id="btn-modal-cart"
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                            <span id="cart-item-text"
                                class="absolute -top-2 -right-2 text-xs px-2 py-1 bg-blue-400 text-white rounded-full text-center leading-none">{{ session('countCart', 0) }}</span>
                    </button>

                    <div id="modal-cart" class="hidden w-[450px] h-auto absolute rounded-3xl border-2 border-gray-200 bg-white shadow-lg top-12 z-10 right-0 p-4">
                        <div class="w-full px-3">
                            <h2 class="font-manrope font-bold text-2xl text-center text-black mb-4">
                                {{trans('message.shop-cart')}}
                            </h2>
                            <div id="cart-container" class="max-h-[330px] overflow-y-auto pr-1">

                            </div>
                        </div>
                        <div class="max-lg:max-w-lg max-lg:mx-auto">
                            <a href="/home/product/cart" id="btn-view-cart">
                                <button
                                    class="rounded-full py-4 px-6 bg-indigo-600 text-white font-semibold text-lg w-full text-center transition-all duration-500 hover:bg-indigo-700 ">{{trans('message.view-cart')}}
                                </button>
                            </a>
                        </div>
                    </div>
                    
                </div>

                <div class="hidden sm:flex sm:items-center">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div class="flex gap-2 justify-center items-center">
                                    {{ app()->getLocale() === 'vi' ? 'ENG' : 'VIE' }}
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('language.switch', 'vi')">
                                <div class="flex items-center gap-2">
                                    <img src="https://file.vfo.vn/hinh/2013/12/co-viet-nam-2.jpg" class="h-3 w-4"
                                        alt="">
                                    {{ trans('message.vi') }}
                                </div>
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('language.switch', 'en')">
                                <div class="flex items-center gap-2">
                                    <img src="https://thietbidoandoi.com/wp-content/uploads/2022/04/co-anh.png"
                                        class="h-3 w-4" alt="">
                                    {{ trans('message.eng') }}
                                </div>
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="flex justify-center items-center">
            <div class="container justify-center flex items-center p-5">
                <!-- Main Navigation -->
                <ul class="flex space-x-8 gap-4">
                    <li><a href="#" class="text-blue-500 font-medium uppercase">{{trans('message.home')}}</a></li>

                    <li><a href="#" class="text-gray-700 font-medium uppercase">{{trans('message.all-product')}}</a></li>

                    <li class="dropdown relative"><a href="#" class="text-gray-700 font-medium uppercase">{{trans('message.shoe-at')}}</a>
                        <div class="dropdown-content mt-2 py-3">
                            @foreach ($categories as $item)
                            <a href="#" class="uppercase block px-4 py-2 text-gray-600 hover:bg-gray-100 flex items-center">
                                {{$item->name}}
                            </a>
                            @endforeach
                        </div>
                    </li>

                    <li class="dropdown relative"><a href="#" class="uppercase text-gray-700 font-medium">{{trans('message.shoe-ft')}}</a>
                        <div class="dropdown-content mt-2 py-3">
                            @foreach ($categories as $item)
                            <a href="#" class="uppercase block px-4 py-2 text-gray-600 hover:bg-gray-100 flex items-center">
                                {{$item->name}}
                            </a>
                            @endforeach
                        </div>
                    </li>

                    <li class="dropdown relative">
                        <a href="#" class="uppercase text-gray-700 font-medium flex items-center">
                            {{trans('message.brand')}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </a>
                        <div class="dropdown-content mt-2 py-3">
                            
                            @foreach ($categories as $item)

                                @if ($item->children->isNotEmpty())
                                    <div class="nested-dropdown relative">
                                        <a href="#" class="uppercase block px-4 py-2 text-gray-600 hover:bg-gray-100 flex items-center justify-between">
                                            <div class="flex items-center">
                                                {{$item->name}}
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </a>

                                        <div class="nested-dropdown-content py-3">
                                            @foreach ($item->children as $item)
                                                <a href="#" class="uppercase block px-4 py-2 text-gray-600 hover:bg-gray-100">{{$item->name}}</a>
                                            @endforeach
                                        </div>

                                    </div>
                                @else
                                <a href="#" class="uppercase block px-4 py-2 text-gray-600 hover:bg-gray-100 flex items-center">
                                    {{$item->name}}
                                </a>
                                @endif
                            @endforeach

                        </div>
                    </li>
                    
                    <li><a href="#" class="text-gray-700 font-medium uppercase">{{trans('message.news')}}</a></li>
                    <li><a href="#" class="text-gray-700 font-medium uppercase">{{trans('message.contact')}}</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
