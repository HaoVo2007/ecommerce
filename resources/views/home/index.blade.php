
    <x-app-layout>
        <div class="mt-48">
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
                                    <div 
                                        class="mx-auto sm:mr-0 group cursor-pointer lg:mx-auto bg-white transition-all duration-500">

                                            <img src="storage/${product.main_image.image_url}" alt="face cream image"
                                                class="w-full aspect-square rounded-2xl object-cover transition-opacity duration-300 hover:opacity-80">
                                        <div class="mt-5">
                                            <div class="flex flex-col justify-between">
                                                <h6
                                                    class="h-20 line-clamp-2 font-semibold text-sm leading-8 text-black transition-all duration-500 group-hover:text-indigo-600">
                                            ${product.name}</h6>
                                            <p class="font-normal text-sm leading-6 text-gray-500">${product.category.name}</p>
                                            </div>
                                            <div class="flex items-center justify-between">
                                                <h6 class="font-semibold text-xl leading-8 text-indigo-600">${formatCurrency(parseInt(product.price))}</h6> 
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
