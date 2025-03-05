<x-app-layout>
    <section class="mt-12 sm:mt-32 py-12 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <div class="slider-box w-full h-full mx-auto p-4 lg:p-10">
                    <div class="swiper main-slide-carousel swiper-container relative mb-3 sm:mb-6">
                        <div class="swiper-wrapper">
                            @foreach ($data->subImage as $item)
                                <div class="swiper-slide">
                                    <img src="/storage/{{ $item->image_url }}" 
                                        class="w-full h-auto rounded-2xl object-cover max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-xl">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="nav-for-slider flex space-x-2 justify-center">
                        <div class="swiper-wrapper" style="padding: 0px !important;">
                            @foreach ($data->subImage as $item)
                                <div class="swiper-slide thumbs-slide">
                                    <img src="/storage/{{ $item->image_url }}" 
                                        class="w-20 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 rounded-2xl object-cover">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="flex justify-center items-center">
                    <div class="pro-detail w-full max-lg:max-w-[608px] lg:pl-8 xl:pl-16 max-lg:mx-auto max-lg:mt-8">
                        <div class="flex items-center justify-between sm:gap-6 gap-2 mb-6">
                            <div class="text">
                                <h2 class="font-manrope font-bold text-md sm:text-3xl leading-10 text-gray-900 mb-2">
                                    {{ $data->name }}
                                </h2>
                                <p class="font-normal text-base text-gray-500">{{ $data->category->name }}</p>
                            </div>
                            <button class="group transition-all duration-500 p-0.5">
                                <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle
                                        class="fill-indigo-50 transition-all duration-500 group-hover:fill-indigo-100"
                                        cx="30" cy="30" r="30" fill="" />
                                    <path
                                        class="stroke-indigo-600 transition-all duration-500 group-hover:stroke-indigo-700"
                                        d="M21.4709 31.3196L30.0282 39.7501L38.96 30.9506M30.0035 22.0789C32.4787 19.6404 36.5008 19.6404 38.976 22.0789C41.4512 24.5254 41.4512 28.4799 38.9842 30.9265M29.9956 22.0789C27.5205 19.6404 23.4983 19.6404 21.0231 22.0789C18.548 24.5174 18.548 28.4799 21.0231 30.9184M21.0231 30.9184L21.0441 30.939M21.0231 30.9184L21.4628 31.3115"
                                        stroke="" stroke-width="1.6" stroke-miterlimit="10" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>

                        <div class="flex flex-row mb-8 gap-6 sm:gap-y-3">
                            <div class="flex items-center">
                                <h5 class="font-manrope font-semibold text-2xl leading-9 text-gray-900 ">
                                    {{ number_format($data->price, 0, ',', '.') }}</h5>
                                <span class="ml-3 font-semibold text-lg text-indigo-600">30% off</span>
                            </div>
                            <svg class="mx-5 max-[400px]:hidden" xmlns="http://www.w3.org/2000/svg" width="2"
                                height="36" viewBox="0 0 2 36" fill="none">
                                <path d="M1 0V36" stroke="#E5E7EB" />
                            </svg>
                            <button class="flex items-center gap-1 rounded-lg bg-amber-400 py-1.5 px-2.5 w-max">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_12657_16865)">
                                        <path
                                            d="M8.10326 2.26718C8.47008 1.52393 9.52992 1.52394 9.89674 2.26718L11.4124 5.33818C11.558 5.63332 11.8396 5.83789 12.1653 5.88522L15.5543 6.37768C16.3746 6.49686 16.7021 7.50483 16.1086 8.08337L13.6562 10.4738C13.4205 10.7035 13.313 11.0345 13.3686 11.3589L13.9475 14.7343C14.0877 15.5512 13.2302 16.1742 12.4966 15.7885L9.46534 14.1948C9.17402 14.0417 8.82598 14.0417 8.53466 14.1948L5.5034 15.7885C4.76978 16.1742 3.91235 15.5512 4.05246 14.7343L4.63137 11.3589C4.68701 11.0345 4.57946 10.7035 4.34378 10.4738L1.89144 8.08337C1.29792 7.50483 1.62543 6.49686 2.44565 6.37768L5.8347 5.88522C6.16041 5.83789 6.44197 5.63332 6.58764 5.33818L8.10326 2.26718Z"
                                            fill="white" />
                                        <g clip-path="url(#clip1_12657_16865)">
                                            <path
                                                d="M8.10326 2.26718C8.47008 1.52393 9.52992 1.52394 9.89674 2.26718L11.4124 5.33818C11.558 5.63332 11.8396 5.83789 12.1653 5.88522L15.5543 6.37768C16.3746 6.49686 16.7021 7.50483 16.1086 8.08337L13.6562 10.4738C13.4205 10.7035 13.313 11.0345 13.3686 11.3589L13.9475 14.7343C14.0877 15.5512 13.2302 16.1742 12.4966 15.7885L9.46534 14.1948C9.17402 14.0417 8.82598 14.0417 8.53466 14.1948L5.5034 15.7885C4.76978 16.1742 3.91235 15.5512 4.05246 14.7343L4.63137 11.3589C4.68701 11.0345 4.57946 10.7035 4.34378 10.4738L1.89144 8.08337C1.29792 7.50483 1.62543 6.49686 2.44565 6.37768L5.8347 5.88522C6.16041 5.83789 6.44197 5.63332 6.58764 5.33818L8.10326 2.26718Z"
                                                fill="white" />
                                        </g>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_12657_16865">
                                            <rect width="18" height="18" fill="white" />
                                        </clipPath>
                                        <clipPath id="clip1_12657_16865">
                                            <rect width="18" height="18" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                <span class="text-base font-medium text-white">{{ $avgReview }}</span>
                            </button>
                        </div>
                        <p class="font-medium text-lg text-gray-900 mb-4">{{ trans('message.size') }}</p>
                        <div class="grid grid-cols-2 min-[400px]:grid-cols-4 gap-3 mb-3 min-[400px]:mb-8">
                            @foreach ($data->productSizes as $item)
                                <button data-size={{ $item->size }}
                                    class="btn-choose-size border border-gray-200 whitespace-nowrap text-gray-900 text-sm leading-6 py-2.5 rounded-full px-5 text-center w-full font-semibold shadow-sm shadow-transparent transition-all duration-300 hover:bg-gray-50 hover:shadow-gray-300">{{ $item->size }}</button>
                            @endforeach
                        </div>
                        <div class="flex items-center flex-col min-[400px]:flex-row gap-3 mb-3 min-[400px]:mb-8">
                            <div class=" flex items-center justify-center border border-gray-400 rounded-full">
                                <button id="btn-decrease"
                                    class="group py-[14px] px-3 w-full border-r border-gray-400 rounded-l-full h-full flex items-center justify-center bg-white shadow-sm shadow-transparent transition-all duration-300 hover:bg-gray-50 hover:shadow-gray-300">
                                    <svg class="stroke-black group-hover:stroke-black" width="22" height="22"
                                        viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.5 11H5.5" stroke="" stroke-width="1.6"
                                            stroke-linecap="round" />
                                        <path d="M16.5 11H5.5" stroke="" stroke-opacity="0.2" stroke-width="1.6"
                                            stroke-linecap="round" />
                                        <path d="M16.5 11H5.5" stroke="" stroke-opacity="0.2" stroke-width="1.6"
                                            stroke-linecap="round" />
                                    </svg>
                                </button>
                                <input type="number" id="quantity"
                                    class="appearance-none font-semibold text-gray-900 text-lg py-3 px-2 w-full min-[400px]:min-w-[75px] h-full bg-transparent placeholder:text-gray-900 text-center hover:text-indigo-600 outline-0 hover:placeholder:text-indigo-600"
                                    min="1" value="1">
                                <button id="btn-increase"
                                    class="group py-[14px] px-3 w-full border-l border-gray-400 rounded-r-full h-full flex items-center justify-center bg-white shadow-sm shadow-transparent transition-all duration-300 hover:bg-gray-50 hover:shadow-gray-300">
                                    <svg class="stroke-black group-hover:stroke-black" width="22" height="22"
                                        viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 5.5V16.5M16.5 11H5.5" stroke="#9CA3AF" stroke-width="1.6"
                                            stroke-linecap="round" />
                                        <path d="M11 5.5V16.5M16.5 11H5.5" stroke="black" stroke-opacity="0.2"
                                            stroke-width="1.6" stroke-linecap="round" />
                                        <path d="M11 5.5V16.5M16.5 11H5.5" stroke="black" stroke-opacity="0.2"
                                            stroke-width="1.6" stroke-linecap="round" />
                                    </svg>
                                </button>
                            </div>
                            <button id="btn-add-cart"
                                class="group py-3 px-5 rounded-full bg-indigo-50 text-indigo-600 font-semibold text-lg w-full flex items-center justify-center gap-2 shadow-sm shadow-transparent transition-all duration-500 hover:shadow-indigo-300 hover:bg-indigo-100">
                                <svg class="stroke-indigo-600 transition-all duration-500 group-hover:stroke-indigo-600"
                                    width="22" height="22" viewBox="0 0 22 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.7394 17.875C10.7394 18.6344 10.1062 19.25 9.32511 19.25C8.54402 19.25 7.91083 18.6344 7.91083 17.875M16.3965 17.875C16.3965 18.6344 15.7633 19.25 14.9823 19.25C14.2012 19.25 13.568 18.6344 13.568 17.875M4.1394 5.5L5.46568 12.5908C5.73339 14.0221 5.86724 14.7377 6.37649 15.1605C6.88573 15.5833 7.61377 15.5833 9.06984 15.5833H15.2379C16.6941 15.5833 17.4222 15.5833 17.9314 15.1605C18.4407 14.7376 18.5745 14.0219 18.8421 12.5906L19.3564 9.84059C19.7324 7.82973 19.9203 6.8243 19.3705 6.16215C18.8207 5.5 17.7979 5.5 15.7522 5.5H4.1394ZM4.1394 5.5L3.66797 2.75"
                                        stroke="" stroke-width="1.6" stroke-linecap="round" />
                                </svg>
                                {{ trans('message.add-to-cart') }}
                            </button>
                        </div>
                        <button
                            class="text-center w-full px-5 py-4 rounded-[100px] bg-indigo-600 flex items-center justify-center font-semibold text-lg text-white shadow-sm shadow-transparent transition-all duration-500 hover:bg-indigo-700 hover:shadow-indigo-300">
                            {{ trans('message.buy-now') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="tabs bg-white sm:p-10 p-4">

        <div class="flex overflow-x-auto scrollbar scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">
            <ul class="flex min-w-max">
                <li>
                    <a href="javascript:void(0)"
                        class="uppercase text-sm sm:text-lg flex items-center py-2 sm:py-3 px-3 sm:px-6 text-gray-500 border-b-2 border-transparent hover:text-gray-800 font-medium tab-active:text-indigo-600 tab-active:border-b-indigo-600 active tablink whitespace-nowrap"
                        data-tab="tabs-with-badge-1" role="tab">
                        {{ trans('message.review-product') }}
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)"
                        class="uppercase text-sm sm:text-lg flex items-center py-2 sm:py-3 px-3 sm:px-6 text-gray-500 border-b-2 border-transparent hover:text-gray-800 font-medium tab-active:text-indigo-600 tab-active:border-b-indigo-600 tablink whitespace-nowrap"
                        data-tab="tabs-with-badge-2" role="tab">
                        {{ trans('message.description-product') }}
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)"
                        class="uppercase text-sm sm:text-lg flex items-center py-2 sm:py-3 px-3 sm:px-6 text-gray-500 border-b-2 border-transparent hover:text-gray-800 font-medium tab-active:text-indigo-600 tab-active:border-b-indigo-600 tablink whitespace-nowrap"
                        data-tab="tabs-with-badge-3" role="tab">
                        {{ trans('message.warranty-policy') }}
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)"
                        class="uppercase text-sm sm:text-lg flex items-center py-2 sm:py-3 px-3 sm:px-6 text-gray-500 border-b-2 border-transparent hover:text-gray-800 font-medium tab-active:text-indigo-600 tab-active:border-b-indigo-600 tablink whitespace-nowrap"
                        data-tab="tabs-with-badge-4" role="tab">
                        {{ trans('message.shoe-tip') }}
                    </a>
                </li>
            </ul>
        </div>


        <div class="mt-3">
            <div id="tabs-with-badge-1" role="tabpanel" aria-labelledby="tabs-with-badge-item-1" class="tabcontent">
                <section class="bg-white">
                    <div class="px-4 sm:px-10 md:px-20 lg:px-[150px]">
                        <div class="flex flex-wrap md:flex-nowrap items-start gap-5 md:gap-10 w-full">
                            <div class="bg-white p-6 rounded-lg border w-full md:w-1/3">
                                <h2 class="text-xl font-semibold mb-4 text-gray-800">
                                    {{ trans('message.avg-review') }}
                                </h2>
                                <div class="flex items-center mb-4">
                                    <span class="text-2xl font-bold text-yellow-500 mr-2">{{ $avgReview }}</span>
                                    <div class="flex">
                                        <i class="fas fa-star text-yellow-500"></i>
                                    </div>
                                </div>
                                <div class="space-y-5">
                                    @foreach ($starPercent as $star => $percent)
                                        <div class="flex items-center gap-2">
                                            <span class="w-12 text-gray-600">{{ $star }}</span>
                                            <div class="w-full bg-gray-200 rounded-full h-2">
                                                <div class="bg-blue-800 h-2 rounded-full"
                                                    style="width: {{ $percent }}%;"></div>
                                            </div>
                                            <span class="text-gray-600">{{ $percent }}%</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="bg-white rounded-lg border w-full md:w-2/3 p-6">
                                <h2 class="text-xl font-semibold mb-4 text-gray-800">
                                    {{ trans('message.submit-review') }}
                                </h2>
                                <form class="space-y-4">
                                    <div>
                                        <div class="flex gap-4 items-center">
                                            <label
                                                class="block text-sm text-gray-600">{{ trans('message.add-review') }}</label>
                                            <div class="flex" id="star-rating">
                                                <i class="fas fa-star text-gray-400 cursor-pointer"
                                                    data-index="1"></i>
                                                <i class="fas fa-star text-gray-400 cursor-pointer"
                                                    data-index="2"></i>
                                                <i class="fas fa-star text-gray-400 cursor-pointer"
                                                    data-index="3"></i>
                                                <i class="fas fa-star text-gray-400 cursor-pointer"
                                                    data-index="4"></i>
                                                <i class="fas fa-star text-gray-400 cursor-pointer"
                                                    data-index="5"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-col md:flex-row items-center gap-5">
                                        <div class="mb-3 w-full md:w-1/2">
                                            <label
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                {{ trans('message.name') }}
                                            </label>
                                            <input type="text" id="name"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                required />
                                        </div>

                                        <div class="mb-3 w-full md:w-1/2">
                                            <label
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                {{ trans('message.email') }}
                                            </label>
                                            <input type="email" id="email"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                required />
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            {{ trans('message.content') }}
                                        </label>
                                        <textarea id="comment"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                            focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            rows="5" placeholder="{{ trans('message.write-here') }}"></textarea>
                                    </div>

                                    <button type="button" id="send-review"
                                        class="flex justify-center items-center gap-2 text-blue-700 hover:text-white 
                                        border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 
                                        font-medium rounded-lg text-sm px-5 py-2.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                                        </svg>
                                        {{ trans('message.send-review') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <section class="relative">
                        <div class="w-full max-w-7xl px-4 md:px-5 lg-6 mx-auto" id="comment-container"></div>
                        <div class="flex justify-center">
                            <button type="button" id="more-comment"
                                class="uppercase flex justify-center items-center gap-2 text-blue-700 hover:text-white 
                                border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 
                                font-medium rounded-lg text-sm px-5 py-2.5">
                                {{ trans('message.more') }}
                            </button>
                        </div>
                    </section>
                </section>
            </div>

            </section>
            <input type="hidden" id="product-id" value="{{ $data->id }}">
            </section>
        </div>
        <div id="tabs-with-badge-2" class="hidden tabcontent" role="tabpanel"
            aria-labelledby="tabs-with-badge-item-2">
            <div class="px-4 sm:px-10 md:px-20 lg:px-[150px] leading-[30px]">
                <div class="prose max-w-full">
                    {!! $data->description !!}
                </div>
            </div>
        </div>

        <div id="tabs-with-badge-3" class="hidden tabcontent" role="tabpanel"
            aria-labelledby="tabs-with-badge-item-3">
            <div class="px-4 sm:px-10 md:px-20 lg:px-[150px] leading-[30px]">
                <p>{{ trans('message.warranty-policy-1') }}</p><br>
                <img class="max-w-full h-auto"
                    src="https://file.hstatic.net/200000278317/file/baohanh2_93b9597ceba746559f5ba19054546a1d.jpg"
                    alt=""><br>
                <p>{{ trans('message.warranty-policy-2') }}</p><br>
                <p><strong>{{ trans('message.warranty-policy-3') }}</strong></p><br>
                <p>{{ trans('message.warranty-policy-4') }}
                    <strong>{{ trans('message.warranty-policy-13') }}</strong>
                    <span>{{ trans('message.warranty-policy-14') }}</span>
                </p><br>
                <div class="ml-5">
                    <p>{{ trans('message.warranty-policy-5') }}</p>
                    <p>{{ trans('message.warranty-policy-6') }}</p>
                    <p>{{ trans('message.warranty-policy-7') }}</p>
                </div>
                <br>
                <p>{{ trans('message.warranty-policy-8') }}
                    <strong>{{ trans('message.warranty-policy-15') }}</strong>
                    <span>{{ trans('message.warranty-policy-16') }}</span>
                </p><br>
                <div class="ml-5">
                    <p>{{ trans('message.warranty-policy-9') }}</p>
                    <p>{{ trans('message.warranty-policy-17') }}</p>
                </div>
                <br>
                <p>{{ trans('message.warranty-policy-10') }}</p><br>
                <img class="max-w-full h-auto"
                    src="https://file.hstatic.net/200000278317/file/baohanh1_b702947d711c4ffca5a837f8c9363d1d.jpg"
                    alt=""><br>
                <p><strong>{{ trans('message.warranty-policy-11') }}</strong></p><br>
                <p>{{ trans('message.warranty-policy-12') }}</p>
            </div>
        </div>

        <div id="tabs-with-badge-4" class="hidden tabcontent" role="tabpanel"
            aria-labelledby="tabs-with-badge-item-4">
            <div class="px-4 sm:px-10 md:px-20 lg:px-[150px] leading-[30px]">
                <p>{{ trans('message.tip-shoe-1') }}</p><br>
                <p><strong>{{ trans('message.tip-shoe-2') }}</strong></p><br>
                <img class="w-full max-w-full h-auto"
                    src="https://file.hstatic.net/200000278317/file/trang-break-in-giay-2_8b96a8d5d72d462685947682b1963ea2.jpg"
                    alt=""><br>
                <p><strong>{{ trans('message.tip-shoe-3') }}</strong></p><br>
                <p class="italic">{{ trans('message.tip-shoe-4') }}</p><br>
                <img class="w-full max-w-full h-auto"
                    src="https://file.hstatic.net/200000278317/file/trang-break-in-giay-1_f006461552604f3bb0cccf4fe3b64c5e.jpg"
                    alt=""><br>
                <p><strong>{{ trans('message.tip-shoe-5') }}</strong></p><br>
                <img class="w-full max-w-full h-auto"
                    src="https://file.hstatic.net/200000278317/file/trang-break-in-giay-3_9804664335254ab3940fd6172881d3c7.jpg"
                    alt="">
            </div>
        </div>

    </div>
    </div>

    <section class="pl-4 pr-4 sm:pl-10 sm:pr-10 pt-3 bg-white">
        <div class="flex w-full items-center rounded-full pb-5 sm:pb-10 pt-5 gap-4">
            <div class="w-full flex-1 border-b border-gray-300 sm:ml-10"></div>
            <span class="text-black text-md sm:text-3xl font-semibold leading-8 sm:px-8 py-3 uppercase">{{ trans('message.product-related') }}</span>
            <div class="w-full flex-1 border-b border-gray-300 sm:mr-10"></div>
        </div>
        <div id="product-container" class="pl-4 pr-4 sm:pl-10 sm:pr-10 grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-8">

        </div>
    </section>


</x-app-layout>
<script>
    $(document).ready(function() {

        let goodJob = `{{ trans('message.good-job') }}`;
        let Error = `{{ trans('message.error') }}`;
        let wentWrong = `{{ trans('message.went-wrong') }}`;
        let selectRating = 0;
        let productId = $('#product-id').val();
        let size;

        loadReview();
        let page = 1;
        loadProduct();

        function formatCurrency(number) {
            return number.toLocaleString('vi-VN');
        }

        function loadProduct(page = 1, keyWord) {
            $.ajax({
                url: '/home/product',
                method: 'GET',
                data: {
                    keyWord: keyWord,
                    id: productId,
                    type: 2,
                },
                success: function(response) {
                    if (response.status === "success") {
                        response.data.forEach(product => {
                            let productContainer = `

                                <a href="/home/product/detail/${product.id}">
                                        <div class="mx-auto sm:mr-0 group cursor-pointer lg:mx-auto bg-white transition-all duration-500">
                                            <img src="/storage/${product.main_image.image_url}" alt="face cream image"
                                                class="w-full aspect-square rounded-2xl object-cover transition-opacity duration-300 sm:hover:opacity-80">
                                            <div class="mt-3 sm:mt-5">
                                                <div class="flex flex-col justify-between">
                                                    <h6 class="h-18 sm:h-20 line-clamp-2 font-semibold text-xs sm:text-sm leading-6 sm:leading-8 text-black transition-all duration-500 group-hover:text-indigo-600">
                                                        ${product.name}
                                                    </h6>
                                                    <p class="font-normal text-xs sm:text-sm leading-5 sm:leading-6 text-gray-500">${product.category.name}</p>
                                                </div>
                                                <div class="flex items-center justify-between">
                                                    <h6 class="font-semibold text-lg sm:text-xl leading-7 sm:leading-8 text-indigo-600">
                                                        ${formatCurrency(parseInt(product.price))}
                                                    </h6> 
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                `;

                            $("#product-container").append(productContainer);
                        });
                    }
                },
                error: function(error) {

                }
            });
        }

        $('.btn-choose-size').on('click', function() {

            size = $(this).data('size');

            $('.btn-choose-size').removeClass('border-2 border-blue-600').addClass(
                'border border-gray-200');

            $(this).addClass('border-2 border-blue-600').removeClass('border border-gray-200');

        })

        $('#btn-decrease').on('click', function() {
            let quantity = parseInt($('#quantity').val());
            if (quantity >= 2) {
                quantity -= 1;
                $('#quantity').val(quantity);
            }
        });

        $('#btn-increase').on('click', function() {
            let quantity = parseInt($('#quantity').val());
            if (quantity >= 1) {
                quantity += 1;
                $('#quantity').val(quantity);
            }
        });

        $('#btn-add-cart').on('click', () => {
            $.ajax({
                url: '/home/product/add_to_cart',
                method: 'POST',
                data: {
                    id: productId,
                    size: size,
                    quantity: parseInt($('#quantity').val()),
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status == 'success') {
                        $('#cart-item-text').text(response.countCart);
                        swal(goodJob, response.message, response.status);
                    }
                },
                error: function(response) {
                    if (response.status === 422) {
                        let errorMessage = response.responseJSON.message;
                        swal(Error, errorMessage, 'error');
                    } else {
                        swal(Error, wentWrong, 'error');
                    }
                },
            });
        });


        function loadReview(page) {
            $.ajax({
                url: `/home/product/review?page=${page}`,
                method: 'GET',
                data: {
                    product_id: productId,
                },
                success: function(response) {
                    if (response.status == 'success' && Array.isArray(response.data.data)) {
                        let htmlContent = '';
                        response.data.data.forEach(review => {
                            let stars = '';
                            for (let i = 1; i <= 5; i++) {
                                if (i <= review.star) {
                                    stars +=
                                        `<i class="fas fa-star text-yellow-500 cursor-pointer"></i>`;
                                } else {
                                    stars +=
                                        `<i class="fas fa-star text-gray-400 cursor-pointer"></i>`;
                                }
                            }
                            htmlContent += `
                                <div class="w-full">
                                       <article class="p-6 text-base bg-white rounded-lg dark:bg-gray-900">
                                            <footer class="flex justify-between items-center mb-2">
                                                <div class="flex items-center">
                                                    <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">${review.name}</p>
                                                    <p class="text-sm text-gray-600 dark:text-gray-400">${new Date(review.created_at).toLocaleDateString()}</p>
                                                </div>
                                                <div class="mt-5">
                                                    ${stars}
                                                </div>
                                            </footer>
                                            <p class="text-gray-500 dark:text-gray-400">${review.comment}</p>
                                        </article>
                                </div>
                            `;
                        });

                        $('#comment-container').append(htmlContent);
                    }
                    if (response.data.next_page_url == null) {
                        console.log(1);
                        $('#more-comment').hide();
                    }
                },
            })
        }

        $('#more-comment').on('click', function() {
            page++;
            loadReview(page);
        })

        $('#star-rating i').hover(
            function() {
                let index = $(this).data('index');
                hilightStars(index);
            },
            function() {
                hilightStars(selectRating);
            }
        )

        $('#star-rating i').on('click', function() {
            selectRating = $(this).data('index');
            hilightStars(selectRating);
        })

        function hilightStars(rating) {
            $('#star-rating i').each(function() {
                if ($(this).data("index") <= rating) {
                    $(this).removeClass("text-gray-400").addClass("text-yellow-500");
                } else {
                    $(this).removeClass("text-yellow-500").addClass("text-gray-400");
                }
            })
        }

        $('#send-review').on('click', function() {
            let goodJob = `{{ trans('message.good-job') }}`;
            let Error = `{{ trans('message.error') }}`;
            let wentWrong = `{{ trans('message.went-wrong') }}`;
            let button = $('#send-review');
            button.prop('disabled', true).html(`
                        <svg aria-hidden="true" role="status" class="inline w-4 h-4 me-3 text-gray-200 animate-spin dark:text-gray-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="#1C64F2"/>
                        </svg>
                        {{ trans('message.loading') }}
                    `);
            $.ajax({
                url: '/home/product/review',
                method: 'POST',
                data: {
                    product_id: productId,
                    rating: selectRating,
                    name: $('#name').val(),
                    email: $('#email').val(),
                    comment: $('#comment').val(),
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status == 'success') {
                        let stars = '';
                        for (let i = 1; i <= 5; i++) {
                            if (i <= response.data.star) {
                                stars +=
                                    `<i class="fas fa-star text-yellow-500 cursor-pointer"></i>`;
                            } else {
                                stars +=
                                    `<i class="fas fa-star text-gray-400 cursor-pointer"></i>`;
                            }
                        }
                        let commentHtml = `
                            <div class="w-full">
                                       <article class="p-6 text-base bg-white rounded-lg dark:bg-gray-900">
                                            <footer class="flex justify-between items-center mb-2">
                                                <div class="flex items-center">
                                                    <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">${response.data.name}</p>
                                                    <p class="text-sm text-gray-600 dark:text-gray-400">${new Date(response.data.created_at).toLocaleDateString()}</p>
                                                </div>
                                                <div class="mt-5">
                                                    ${stars}
                                                </div>
                                            </footer>
                                            <p class="text-gray-500 dark:text-gray-400">${response.data.comment}</p>
                                        </article>
                                </div>
                        `
                        swal(goodJob, response.message, response.status)
                        $('#comment-container').prepend(commentHtml);
                    }
                },
                error: function(response) {
                    if (response.status === 422) {
                        let errorMessage = response.responseJSON.message;
                        swal(Error, errorMessage, 'error');
                    } else {
                        swal(Error, wentWrong, 'error');
                    }
                },
                complete: function() {
                    button.prop('disabled', false).html(`
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                            </svg>
                            {{ trans('message.send-review') }}
                                `);
                }
            })
        })

    })

    var swiper_thumbs = new Swiper(".nav-for-slider", {
        loop: true,
        spaceBetween: 30,
        slidesPerView: 5,
    });

    var swiper = new Swiper(".main-slide-carousel", {
        slidesPerView: 1,
        thumbs: {
            swiper: swiper_thumbs,
        },
    });
</script>
