
<x-app-layout>
    <section
        class="mt-28 bg-white relative z-10 after:contents-[''] after:absolute after:z-0 after:h-full xl:after:w-1/3 after:top-0 after:right-0 after:bg-gray-50">
        <div class="w-full max-w-7xl px-4 md:px-5 lg-6 mx-auto relative z-10">
            <div class="grid grid-cols-12">
                <div
                    class="col-span-12 xl:col-span-8 lg:pr-8 pt-14 pb-8 lg:py-24 w-full max-xl:max-w-3xl max-xl:mx-auto">
                    <div class="flex items-center justify-between pb-8 border-b border-gray-300">
                        <h2 class="font-manrope font-bold text-3xl leading-10 text-black">{{trans('message.shop-cart')}}</h2>
                        <h2 class="font-manrope font-bold text-xl leading-8 text-gray-600">{{ session('countCart', 0) }} {{trans('message.items')}}</h2>
                    </div>
                    <div class="grid grid-cols-12 mt-8 max-md:hidden pb-6 border-b border-gray-200">
                        <div class="col-span-12 md:col-span-7">
                            <p class="font-normal text-lg leading-8 text-gray-400">{{trans('message.product-detail')}}</p>
                        </div>
                        <div class="col-span-12 md:col-span-5">
                            <div class="grid grid-cols-5">
                                <div class="col-span-3">
                                    <p class="font-normal text-lg leading-8 text-gray-400 text-center">{{trans('message.quantity')}}</p>
                                </div>
                                <div class="col-span-2">
                                    <p class="font-normal text-lg leading-8 text-gray-400 text-center">{{trans('message.total')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach ($data as $item)
                        <div
                            class="flex flex-col min-[500px]:flex-row min-[500px]:items-center gap-5 py-6  border-b border-gray-200 group">
                            <div class="w-full md:max-w-[126px]">
                                <img src="/storage/{{$item->image_url ? $item->image_url : $item->product->mainImage->image_url}}" alt="perfume bottle image"
                                    class="mx-auto rounded-xl object-cover">
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-4 w-full">
                                <div class="md:col-span-2">
                                    <div class="flex flex-col max-[500px]:items-center gap-3">
                                        <h6 class="font-semibold text-base leading-7 text-black">{{$item->name ? $item->name : $item->product->name}}</h6>
                                        <h6 class="font-normal text-base leading-7 text-gray-500">{{trans('message.size')}}: {{$item->size}}</h6>
                                        <h6
                                            class="font-medium text-base leading-7 text-gray-600 transition-all duration-300 group-hover:text-indigo-600">
                                            {{$item->price ? $item->price : $item->product->price}}</h6>
                                    </div>
                                </div>
                                <div class="flex items-center max-[500px]:justify-center h-full max-md:mt-3">
                                    <div class="flex items-center h-full z-10">
                                        <button data-id="{{$item->product_id ? $item->product_id : $item->product->id}}" data-size="{{$item->size ? $item->size : $item->product->productSizes->size}}"
                                            class="btn-decrease-cart group rounded-l-xl px-5 py-[18px] border border-gray-200 flex items-center justify-center shadow-sm shadow-transparent transition-all duration-500 hover:bg-gray-50 hover:border-gray-300 hover:shadow-gray-300 focus-within:outline-gray-300">
                                            <svg class="stroke-gray-900 transition-all duration-500 group-hover:stroke-black"
                                                xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                viewBox="0 0 22 22" fill="none">
                                                <path d="M16.5 11H5.5" stroke="" stroke-width="1.6"
                                                    stroke-linecap="round" />
                                                <path d="M16.5 11H5.5" stroke="" stroke-opacity="0.2"
                                                    stroke-width="1.6" stroke-linecap="round" />
                                                <path d="M16.5 11H5.5" stroke="" stroke-opacity="0.2"
                                                    stroke-width="1.6" stroke-linecap="round" />
                                            </svg>
                                        </button>
                                        <input type="number"
                                            class="border-y border-gray-200 outline-none text-gray-900 font-semibold text-lg w-full max-w-[73px] min-w-[60px] placeholder:text-gray-900 py-[15px]  text-center bg-transparent"
                                            value="{{$item->quantity}}" min="1">
                                        <button data-id="{{$item->product_id ? $item->product_id : $item->product->id}}" data-size="{{$item->size ? $item->size : $item->product->productSizes->size}}"
                                            class="btn-increase-cart group rounded-r-xl px-5 py-[18px] border border-gray-200 flex items-center justify-center shadow-sm shadow-transparent transition-all duration-500 hover:bg-gray-50 hover:border-gray-300 hover:shadow-gray-300 focus-within:outline-gray-300">
                                            <svg class="stroke-gray-900 transition-all duration-500 group-hover:stroke-black"
                                                xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                viewBox="0 0 22 22" fill="none">
                                                <path d="M11 5.5V16.5M16.5 11H5.5" stroke="" stroke-width="1.6"
                                                    stroke-linecap="round" />
                                                <path d="M11 5.5V16.5M16.5 11H5.5" stroke="" stroke-opacity="0.2"
                                                    stroke-width="1.6" stroke-linecap="round" />
                                                <path d="M11 5.5V16.5M16.5 11H5.5" stroke="" stroke-opacity="0.2"
                                                    stroke-width="1.6" stroke-linecap="round" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex items-center max-[500px]:justify-center md:justify-end max-md:mt-3 h-full">
                                    <p
                                        class="price-text font-bold text-lg leading-8 text-gray-600 text-center transition-all duration-300 group-hover:text-indigo-600">
                                        {{number_format($item->price, 0, ',', '.') ? number_format($item->price, 0, ',', '.')  : number_format($item->product->price, 0, ',', '.')}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div
                    class=" col-span-12 xl:col-span-4 bg-gray-50 w-full max-xl:px-6 max-w-3xl xl:max-w-lg mx-auto lg:pl-8 py-24">
                    <h2 class="font-manrope font-bold text-3xl leading-10 text-black pb-8 border-b border-gray-300">
                        {{trans('message.order-summary')}}</h2>
                    <div class="mt-8">
                        <div class="flex items-center justify-between pb-6">
                            <p class="font-normal text-lg leading-8 text-black">{{ session('countCart', 0) }} {{trans('message.items')}}</p>
                            <p id="total" class="font-medium text-lg leading-8 text-black">{{number_format($total, 0, ',', '.')}}</p>
                        </div>
                        <form>
                            <label class="flex  items-center mb-1.5 text-gray-600 text-sm font-medium">{{trans('message.ship')}}
                            </label>
                            <div class="flex pb-6">
                                <div class="relative w-full">
                                    <div class=" absolute left-0 top-0 py-3 px-4">
                                        <span class="font-normal text-base text-gray-300">Second Delivery</span>
                                    </div>
                                    <input type="text"
                                        class="block w-full h-11 pr-10 pl-36 min-[500px]:pl-52 py-2.5 text-base font-normal shadow-xs text-gray-900 bg-white border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-gray-400"
                                        placeholder="$5.00">
                                    <button id="dropdown-button" data-target="dropdown-delivery"
                                        class="dropdown-toggle flex-shrink-0 z-10 inline-flex items-center py-4 px-4 text-base font-medium text-center text-gray-900 bg-transparent  absolute right-0 top-0 pl-2 "
                                        type="button">
                                        <svg class="ml-2 my-auto" width="12" height="7" viewBox="0 0 12 7"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1 1.5L4.58578 5.08578C5.25245 5.75245 5.58579 6.08579 6 6.08579C6.41421 6.08579 6.74755 5.75245 7.41421 5.08579L11 1.5"
                                                stroke="#6B7280" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </svg>
                                    </button>

                                </div>
                            </div>
                            <label class="flex items-center mb-1.5 text-gray-400 text-sm font-medium">{{trans('message.promo')}}
                            </label>
                            <div class="flex pb-4 w-full">
                                <div class="relative w-full ">
                                    <div class=" absolute left-0 top-0 py-2.5 px-4 text-gray-300">

                                    </div>
                                    <input type="text"
                                        class="block w-full h-11 pr-11 pl-5 py-2.5 text-base font-normal shadow-xs text-gray-900 bg-white border border-gray-300 rounded-lg placeholder-gray-500 focus:outline-gray-400 "
                                        placeholder="xxxx xxxx xxxx">
                                    <button id="dropdown-button" data-target="dropdown"
                                        class="dropdown-toggle flex-shrink-0 z-10 inline-flex items-center py-4 px-4 text-base font-medium text-center text-gray-900 bg-transparent  absolute right-0 top-0 pl-2 "
                                        type="button"><svg class="ml-2 my-auto" width="12" height="7"
                                            viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1 1.5L4.58578 5.08578C5.25245 5.75245 5.58579 6.08579 6 6.08579C6.41421 6.08579 6.74755 5.75245 7.41421 5.08579L11 1.5"
                                                stroke="#6B7280" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </svg>

                                </div>
                            </div>
                            <div class="flex items-center border-b border-gray-200">
                                <button
                                    class="rounded-lg w-full bg-black py-2.5 px-4 text-white text-sm font-semibold text-center mb-8 transition-all duration-500 hover:bg-black/80">{{trans('message.apply')}}</button>
                            </div>
                            <div class="flex items-center justify-between py-8">
                                <p class="font-medium text-xl leading-8 text-black">{{ session('countCart', 0) }} {{trans('message.items')}}</p>
                                <p id="total-last" class="font-semibold text-xl leading-8 text-indigo-600">{{number_format($total, 0, ',', '.')}}</p>
                            </div>
                            <button
                                class="w-full text-center bg-indigo-600 rounded-xl py-3 px-6 font-semibold text-lg text-white transition-all duration-500 hover:bg-indigo-700">{{trans('message.checkout')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {

            $('#btn-modal-cart').hide();
            
            function formatCurrency(number) {
                return number.toLocaleString('vi-VN');
            }

            function updateTotal() {

                let total = 0

                $('.price-text').each(function() {
                    let price = $(this).text().replace(/\D/g, "");
                    total = total + parseInt(price);
                })

                $('#total, #total-last').text(formatCurrency(total));
                
                console.log(total);
            }

            $(document).on('click', '.btn-decrease-cart', function () {

                let productId = $(this).data('id');
                let size = $(this).data('size');
                let inputElement = $(this).siblings('input');
                let quantity = 1;
                let keyId = productId + '_' + size;

                $.ajax({
                    url: `/home/product/update/cart/${productId}`,
                    method: "POST",
                    data: {
                        type: 2,
                        size: size,
                        _token: $('meta[name="csrf-token"]').attr("content"),
                    },
                    success: function (response) {

                        if (response.data.quantity) {

                            quantity = response.data.quantity
                            price = response.data.price;

                        } else {

                            quantity = response.data[keyId].quantity
                            price = response.data[keyId].price;

                        }

                        if (response.status == "success") {

                            inputElement.val(quantity)

                            $(`button[data-id="${productId}"][data-size="${size}"]`)
                            .closest(".grid")
                            .find(".price-text")
                            .text(formatCurrency(parseInt(price)));

                            updateTotal()

                        }
                    }
                });
            })

            $(document).on('click', '.btn-increase-cart', function (event) {

                let productId = $(this).data('id');
                let size = $(this).data('size');
                let inputElement = $(this).siblings('input');
                let quantity = 1;
                let keyId = productId + '_' + size;

                $.ajax({
                    url: `/home/product/update/cart/${productId}`,
                    method: "POST",
                    data: {
                        type: 1,
                        size: size,
                        _token: $('meta[name="csrf-token"]').attr("content"),
                    },
                    success: function (response) {

                        if (response.data.quantity) {

                            quantity = response.data.quantity
                            price = response.data.price;


                        } else {

                            quantity = response.data[keyId].quantity
                            price = response.data[keyId].price;

                        }

                        if (response.status == "success") {

                            inputElement.val(quantity)

                            $(`button[data-id="${productId}"][data-size="${size}"]`)
                            .closest(".grid")
                            .find(".price-text")
                            .text(formatCurrency(parseInt(price)));

                            updateTotal()

                        }
                    }
                });
           
        })
    })
    </script>
</x-app-layout>
