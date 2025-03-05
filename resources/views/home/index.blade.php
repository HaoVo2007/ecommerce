
    <x-app-layout>
        <div class="">
            <section class="mt-24 sm:mt-40">
                <div class="w-full relative h-[200px] sm:h-[650px]">
                    <div class="swiper default-carousel swiper-container h-full">
                        <div class="swiper-wrapper h-full">
                            <div class="swiper-slide h-full">
                                <div class="bg-indigo-50 rounded-2xl flex justify-center items-center h-full">
                                    <img class="w-full h-full object-cover rounded-2xl" src="/image/slider/slideshow_1.jpg" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="bg-indigo-50 rounded-2xl flex justify-center items-center h-full">
                                    <img class="w-full h-full object-cover rounded-2xl" src="/image/slider/slideshow_2.jpg" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="bg-indigo-50 rounded-2xl flex justify-center items-center h-full">
                                    <img class="w-full h-full object-cover rounded-2xl" src="/image/slider/slideshow_3.jpg" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="bg-indigo-50 rounded-2xl flex justify-center items-center h-full">
                                    <img class="w-full h-full object-cover rounded-2xl" src="/image/slider/slideshow_4.jpg" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="bg-indigo-50 rounded-2xl flex justify-center items-center h-full">
                                    <img class="w-full h-full object-cover rounded-2xl" src="/image/slider/slideshow_5.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 lg:gap-8 lg:justify-start justify-center">
                            <button id="slider-button-left"
                                class="mt-2 sm:mt-4 swiper-button-prev group !p-1 sm:!p-2 flex justify-center items-center border border-solid border-indigo-600 !w-8 !h-8 sm:!w-12 sm:!h-12 transition-all duration-500 rounded-full !top-2/4 !-translate-y-8 !left-2 sm:!left-5 hover:bg-indigo-600">
                            </button>
                            <button id="slider-button-right"
                                class="mt-2 sm:mt-4 swiper-button-next group !p-1 sm:!p-2 flex justify-center items-center border border-solid border-indigo-600 !w-8 !h-8 sm:!w-12 sm:!h-12 transition-all duration-500 rounded-full !top-2/4 !-translate-y-8 !right-2 sm:!right-5 hover:bg-indigo-600">
                            </button>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </section>
            
            <section class="pl-4 pr-4 sm:pl-10 sm:pr-10 pt-3 pb-3 bg-white">
                <div class="flex w-full items-center rounded-full pb-5 sm:pb-10 pt-5 gap-4">
                    <div class="w-full flex-1 border-b border-gray-300 sm:ml-10"></div>
                    <span class="text-black text-md sm:text-3xl font-semibold leading-8 sm:px-8 py-3 uppercase">{{trans('message.product-for-you')}}</span>
                    <div class="w-full flex-1 border-b border-gray-300 sm:mr-10"></div>
                </div>
                <div id="product-container" class="pl-4 pr-4 sm:pl-10 sm:pr-10 grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    
                </div>
            </section>
            <section class="pl-4 pr-4 sm:pl-10 sm:pr-10 pt-3 pb-3 bg-white">

                <div class="flex w-full items-center rounded-full pb-5 sm:pb-10 pt-5 gap-4">
                    <div class="w-full flex-1 border-b border-gray-300 sm:ml-10"></div>
                    <span class="text-black text-md sm:text-3xl font-semibold leading-8 sm:px-8 py-3 uppercase">{{trans('message.search-brand')}}</span>
                    <div class="w-full flex-1 border-b border-gray-300 sm:mr-10"></div>
                </div>

                <div id="brand-container" class="sm:pl-10 sm:pr-10 grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-4 gap-8">
                    
                </div>
            </section>
        </div>
    </x-app-layout>
    <script>

        var swiper = new Swiper(".default-carousel", {
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

        $(document).ready(function() {

            loadProduct();
            loadBrand();
            
            let goodJob = `{{ trans('message.good-job') }}`;
            let error = `{{ trans('message.error') }}`;
            let wentWrong = `{{ trans('message.went-wrong') }}`;

            function formatCurrency(number) {
                return number.toLocaleString('vi-VN');
            }

            function loadProduct(page = 1, keyWord) {
                $.ajax({
                    url: '/home/product',
                    method: 'GET',
                    data: {
                        keyWord: keyWord,
                        type: 1,
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

            function loadBrand(page = 1, keyWord) {
                $.ajax({
                    url: `/home/brand`,
                    method: 'GET',
                    data: {
                        keyWord: keyWord,
                        type: 1,
                    },
                    success: function(response) {    
                        if (response.status === "success") {
                            response.data.forEach(brand => {
                                let brandContainer = `
                                    <a href="${brand.url}" class="mx-auto sm:mr-0 group cursor-pointer lg:mx-auto bg-white transition-all duration-500">
                                        <div class="shadow-xl">
                                            <img src="storage/${brand.image_url}" alt="face cream image"
                                                class="w-full aspect-square h-32 sm:h-48 rounded-2xl object-cover transition-all duration-300 sm:hover:scale-110">
                                        </div>
                                        <div class="mt-3 sm:mt-5">
                                            <div class="flex flex-col justify-between items-center">
                                                <h6 class="line-clamp-2 font-semibold text-xs sm:text-sm leading-6 sm:leading-8 text-indigo-600 transition-all duration-500 uppercase">
                                                    Giày đá banh ${brand.name}
                                                </h6>
                                            </div>
                                        </div>
                                    </a>

                                `;

                                $("#brand-container").append(brandContainer);
                            });
                        }
                    },
                    error: function(error) {
                        
                    }
                });
            }

        })
    </script>
