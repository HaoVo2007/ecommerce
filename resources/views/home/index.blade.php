
    <x-app-layout>
        <div class="mt-16">
            <section>
                <div class="w-full relative">
                    <div class="swiper default-carousel swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="bg-indigo-50 rounded-2xl h-96 flex justify-center items-center">
                                    <span class="text-3xl font-semibold text-indigo-600"><img src="/image/slider/slideshow_1.jpg" alt=""></span>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="bg-indigo-50 rounded-2xl h-96 flex justify-center items-center">
                                    <span class="text-3xl font-semibold text-indigo-600"><img src="/image/slider/slideshow_2.jpg" alt=""></span>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="bg-indigo-50 rounded-2xl h-96 flex justify-center items-center">
                                    <span class="text-3xl font-semibold text-indigo-600"><img src="/image/slider/slideshow_3.jpg" alt=""></span>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="bg-indigo-50 rounded-2xl h-96 flex justify-center items-center">
                                    <span class="text-3xl font-semibold text-indigo-600"><img src="/image/slider/slideshow_4.jpg" alt=""></span>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="bg-indigo-50 rounded-2xl h-96 flex justify-center items-center">
                                    <span class="text-3xl font-semibold text-indigo-600"><img src="/image/slider/slideshow_5.jpg" alt=""></span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-8 lg:justify-start justify-center">
                            <button id="slider-button-left"
                                class="swiper-button-prev group !p-2 flex justify-center items-center border border-solid border-indigo-600 !w-12 !h-12 transition-all duration-500 rounded-full !top-2/4 !-translate-y-8 !left-5 hover:bg-indigo-600 "
                                data-carousel-prev>
                            
                            </button>
                            <button id="slider-button-right"
                                class="swiper-button-next group !p-2 flex justify-center items-center border border-solid border-indigo-600 !w-12 !h-12 transition-all duration-500 rounded-full !top-2/4 !-translate-y-8  !right-5 hover:bg-indigo-600"
                                data-carousel-next>
                            
                            </button>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

            </section>
            <section class="pl-10 pr-10 pt-3 pb-3 bg-white">
                <div class="flex w-full items-center rounded-full pb-10 pt-5">
                    <div class="flex-1 border-b border-gray-300 ml-10"></div>
                    <span class="text-black text-3xl font-semibold leading-8 px-8 py-3 uppercase">{{trans('message.product-for-you')}}</span>
                    <div class="flex-1 border-b border-gray-300 mr-10"></div>
                </div>
                <div id="product-container" class="pl-10 pr-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    
                </div>
            </section>
            <section class="pl-10 pr-10 pt-3 pb-3 bg-white">
                <div class="flex w-full items-center rounded-full pb-10 pt-5">
                    <div class="flex-1 border-b border-gray-300 ml-10"></div>
                    <span class="text-black text-3xl font-semibold leading-8 px-8 py-3 uppercase">{{trans('message.search-brand')}}</span>
                    <div class="flex-1 border-b border-gray-300 mr-10"></div>
                </div>
                <div id="brand-container" class="pl-10 pr-10 grid grid-cols-1 sm:grid-cols-4 lg:grid-cols-4 gap-8">
                    
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
                                    <a href="/home/product/detail/${product.id}"
                                        class="mx-auto sm:mr-0 group cursor-pointer lg:mx-auto bg-white transition-all duration-500">
                                        <div class="">
                                            <img src="storage/${product.main_image.image_url}" alt="face cream image"
                                                class="w-full aspect-square rounded-2xl object-cover transition-opacity duration-300 hover:opacity-80">
                                        </div>
                                        <div class="mt-5">
                                            <div class="flex flex-col justify-between">
                                                <h6
                                                    class="line-clamp-2 font-semibold text-sm leading-8 text-black transition-all duration-500 group-hover:text-indigo-600">
                                            ${product.name}</h6>
                                            <p class="mt-2 font-normal text-sm leading-6 text-gray-500">${product.category.name}</p>
                                            </div>
                                            <div class="flex items-center justify-between">
                                                <h6 class="font-semibold text-xl leading-8 text-indigo-600">${product.price}</h6>
                                                <div class="flex">
                                                    <button
                                                        class="min-[400px]:p-3 rounded-full bg-white border border-gray-300 flex items-center justify-center group shadow-sm shadow-transparent transition-all duration-500 hover:shadow-gray-200 hover:border-gray-400 hover:bg-gray-50">
                                                        <svg class="stroke-gray-900 transition-all duration-500 group-hover:stroke-black"
                                                            xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 26 26"
                                                            fill="none">
                                                            <path
                                                                d="M12.6892 21.125C12.6892 22.0225 11.9409 22.75 11.0177 22.75C10.0946 22.75 9.34632 22.0225 9.34632 21.125M19.3749 21.125C19.3749 22.0225 18.6266 22.75 17.7035 22.75C16.7804 22.75 16.032 22.0225 16.032 21.125M4.88917 6.5L6.4566 14.88C6.77298 16.5715 6.93117 17.4173 7.53301 17.917C8.13484 18.4167 8.99525 18.4167 10.7161 18.4167H18.0056C19.7266 18.4167 20.587 18.4167 21.1889 17.9169C21.7907 17.4172 21.9489 16.5714 22.2652 14.8798L22.8728 11.6298C23.3172 9.25332 23.5394 8.06508 22.8896 7.28254C22.2398 6.5 21.031 6.5 18.6133 6.5H4.88917ZM4.88917 6.5L4.33203 3.25"
                                                                stroke="" stroke-width="1.6" stroke-linecap="round" />
                                                        </svg>
                                                    </button>
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
                                    <a href="${brand.url}"
                                        class="mx-auto sm:mr-0 group cursor-pointer lg:mx-auto bg-white transition-all duration-500">
                                        <div class="shadow-xl">
                                            <img src="storage/${brand.image_url}" alt="face cream image"
                                                class="w-full aspect-square h-48 rounded-2xl object-cover transition-all duration-300 hover:scale-110">
                                        </div>
                                        <div class="mt-5">
                                            <div class="flex flex-col justify-between items-center">
                                                <h6
                                                    class="line-clamp-2 font-semibold text-sm leading-8 text-indigo-600  transition-all duration-500 uppercase">
                                            Giày đá banh ${brand.name}</h6>
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
