$(document).ready(function () {

    $("#btn-modal-cart").on("click", function () {

            $("#modal-cart").toggle();

            $.ajax({
                url: "/home/product/get_cart",
                method: "GET",
                success: function (response) {

                    renderCartItems(response.data);

                    if (response.quantity == 0) {
                        let cartHtml = `
                                    <div class="grid gap-4 w-60 mx-auto">
                                        <svg class="mx-auto" xmlns="http://www.w3.org/2000/svg" width="116" height="121" viewBox="0 0 116 121" fill="none">
                                        <path d="M0.206909 63.57C0.206909 31.7659 25.987 6.12817 57.6487 6.12817C89.2631 6.12817 115.079 31.7541 115.079 63.57C115.079 77.0648 110.43 89.4805 102.627 99.2755C91.8719 112.853 75.4363 121 57.6487 121C39.7426 121 23.4018 112.794 12.6582 99.2755C4.85538 89.4805 0.206909 77.0648 0.206909 63.57Z" fill="#EEF2FF" />
                                        <path d="M72.7942 0.600875L72.7942 0.600762L72.7836 0.599331C72.3256 0.537722 71.8622 0.5 71.3948 0.5H22.1643C17.1256 0.5 13.0403 4.56385 13.0403 9.58544V107.286C13.0403 112.308 17.1256 116.372 22.1643 116.372H93.1214C98.1725 116.372 102.245 112.308 102.245 107.286V29.4482C102.245 28.7591 102.17 28.0815 102.019 27.4162L102.019 27.416C101.615 25.6459 100.67 24.0014 99.2941 22.7574C99.2939 22.7572 99.2937 22.757 99.2934 22.7568L77.5462 2.89705C77.5461 2.89692 77.5459 2.89679 77.5458 2.89665C76.2103 1.66765 74.5591 0.876968 72.7942 0.600875Z" fill="white" stroke="#E5E7EB" />
                                        <circle cx="60.2069" cy="61" r="21.0256" fill="#EEF2FF" />
                                        <path d="M74.6786 46.1412L74.6783 46.1409C66.5737 38.0485 53.4531 38.0481 45.36 46.1412C37.2552 54.2341 37.2551 67.3666 45.3597 75.4596C53.4529 83.5649 66.5739 83.5645 74.6786 75.4599C82.7716 67.3669 82.7716 54.2342 74.6786 46.1412ZM79.4694 41.3508C90.2101 52.0918 90.2101 69.5093 79.4694 80.2502C68.7166 90.9914 51.3104 90.9915 40.5576 80.2504C29.8166 69.5095 29.8166 52.0916 40.5576 41.3506C51.3104 30.6096 68.7166 30.6097 79.4694 41.3508Z" stroke="#E5E7EB" />
                                        <path d="M83.2471 89.5237L76.8609 83.1309C78.9391 81.5058 80.8156 79.6106 82.345 77.6546L88.7306 84.0468L83.2471 89.5237Z" stroke="#E5E7EB" />
                                        <path d="M104.591 94.4971L104.59 94.4969L92.7346 82.653C92.7342 82.6525 92.7337 82.652 92.7332 82.6515C91.6965 81.6018 90.0076 81.6058 88.9629 82.6505L89.3089 82.9965L88.9629 82.6505L81.8573 89.7561C80.8213 90.7921 80.8248 92.4783 81.8549 93.5229L81.8573 93.5253L93.7157 105.384C96.713 108.381 101.593 108.381 104.591 105.384C107.6 102.375 107.6 97.5062 104.591 94.4971Z" fill="#A5B4FC" stroke="#818CF8" />
                                        <path d="M62.5493 65.6714C62.0645 65.6714 61.6626 65.2694 61.6626 64.7729C61.6626 62.7866 58.6595 62.7866 58.6595 64.7729C58.6595 65.2694 58.2576 65.6714 57.761 65.6714C57.2762 65.6714 56.8743 65.2694 56.8743 64.7729C56.8743 60.422 63.4478 60.4338 63.4478 64.7729C63.4478 65.2694 63.0458 65.6714 62.5493 65.6714Z" fill="#4F46E5" />
                                        <path d="M70.1752 58.0694H66.4628C65.9662 58.0694 65.5642 57.6675 65.5642 57.1709C65.5642 56.6862 65.9662 56.2842 66.4628 56.2842H70.1752C70.6717 56.2842 71.0737 56.6862 71.0737 57.1709C71.0737 57.6675 70.6717 58.0694 70.1752 58.0694Z" fill="#4F46E5" />
                                        <path d="M53.8596 58.0693H50.1472C49.6506 58.0693 49.2487 57.6673 49.2487 57.1708C49.2487 56.686 49.6506 56.2841 50.1472 56.2841H53.8596C54.3443 56.2841 54.7463 56.686 54.7463 57.1708C54.7463 57.6673 54.3443 58.0693 53.8596 58.0693Z" fill="#4F46E5" />
                                        <rect x="28.9248" y="16.3846" width="30.7692" height="2.05128" rx="1.02564" fill="#4F46E5" />
                                        <rect x="28.9248" y="100.487" width="41.0256" height="4.10256" rx="2.05128" fill="#A5B4FC" />
                                        <rect x="28.9248" y="22.5385" width="10.2564" height="2.05128" rx="1.02564" fill="#4F46E5" />
                                        <circle cx="42.2582" cy="23.5641" r="1.02564" fill="#4F46E5" />
                                        <circle cx="46.3607" cy="23.5641" r="1.02564" fill="#4F46E5" />
                                        <circle cx="50.4633" cy="23.5641" r="1.02564" fill="#4F46E5" />
                                        </svg>
                                        <div>
                                            <h2 class="text-center text-black text-base font-semibold leading-relaxed pb-1">${translations.cartEmpty}</h2>                                            
                                            <div class="flex gap-3">
                                            <button class="w-full px-3 py-2 mt-4 rounded-full bg-indigo-600 border border-gray-300 text-white text-xs font-semibold leading-4">${translations.goStore}</button>
                                        </div>
                                    </div>
                                `;

                                $("#cart-container").append(cartHtml);
                                $('#btn-view-cart').hide();
                    } else {
                        $('#btn-view-cart').show();
                    }
                },
                error: function (error) {
                    swal(
                        translations.error,
                        translations.wentWrong,
                        "error"
                    );
                },
            });
    });

    function renderCartItems(items) {

        $("#cart-container").empty()

        items.forEach((item) => {
            let cartHtml = `
            <div class="rounded-xl border border-gray-300 p-3 mb-4 flex gap-3 bg-white">
                <div class="w-[70px] h-[70px]">
                    <img src="/storage/${
                        item.image_url
                            ? item.image_url
                            : item.product.main_image.image_url
                    }" 
                        alt="speaker image"
                        class="w-full h-full object-cover rounded-lg">
                </div>

                <div class="flex flex-col w-full">
                    <div class="flex items-center justify-between">
                        <strong class="font-manrope font-semibold text-sm text-gray-900">
                            ${item.name ? item.name : item.product.name}
                        </strong>
                        <button id="delete-cart-item" data-id = ${
                            item.product_id ? item.product_id : item.product.id
                        } class="rounded-full group p-1 focus:outline-none">
                            <svg width="28" height="28" viewBox="0 0 34 34" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle class="fill-red-200 transition duration-300 group-hover:fill-red-500"
                                    cx="17" cy="17" r="14"/>
                                <path class="stroke-red-600 transition duration-300 group-hover:stroke-white"
                                    d="M14 13.5V12.5C14 11.8 14.6 11 15.3 11H18.7C19.4 11 20 11.8 20 12.5V13.5M20 13.5H11M12.5 13.5H21.5V18.5C21.5 20 21.5 21 20.9 21.6C20.3 22.2 19.5 22.2 17.8 22.2H16.2C14.5 22.2 13.7 22.2 13.1 21.6C12.5 21 12.5 20 12.5 18.5V13.5Z"
                                    stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </button>
                    </div>

                    <div class="flex justify-between items-center mt-2">
                        <div class="flex items-center gap-3">
                            <button id="btn-decrease-cart" data-id = ${
                                item.product_id ? item.product_id : item.product.id
                            } class="rounded-full border border-gray-300 p-1.5 
                                        bg-white hover:bg-gray-200 transition">
                                <svg class="stroke-gray-900 w-4 h-4"
                                    viewBox="0 0 18 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.5 9.5H13.5" stroke-width="1.6" stroke-linecap="round"/>
                                </svg>
                            </button>
                            <input type="number" id="number"
                                class="border border-gray-300 rounded-md w-8 h-8 text-center
                                    font-semibold text-sm bg-gray-100" min="1" value="${item.quantity}">
                            <button id="btn-increase-cart" data-id = ${
                                item.product_id ? item.product_id : item.product.id
                            } class="rounded-full border border-gray-300 p-1.5 
                                        bg-white hover:bg-gray-200 transition">
                                <svg class="stroke-gray-900 w-4 h-4"
                                    viewBox="0 0 18 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.75 9.5H14.25M9 14.75V4.25"
                                        stroke-width="1.6" stroke-linecap="round"/>
                                </svg>
                            </button>
                        </div>
                        <h6 class="text-indigo-600 font-manrope font-bold text-lg">
                            ${item.price}
                        </h6>
                    </div>
                </div>
            </div>
            `;
            $("#cart-container").append(cartHtml);
        });
    }

    $(document).on("click", "#delete-cart-item", function () {
        let productId = $(this).data("id");
        swal({
            title: translations.areYouSure,
            text: translations.deleteItem,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: `/home/product/delete/cart/${productId}`,
                    method: "POST",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr("content"),
                    },
                    success: function (response) {
                        if (response.status == "success") {
                            swal(
                                translations.goodJob,
                                response.message,
                                response.status
                            );
                            $(`button[data-id="${productId}"]`)
                                .closest(".rounded-xl")
                                .remove();

                            if (response.quantity == 0) {
                                let cartHtml = `
                                    <div class="grid gap-4 w-60 mx-auto">
                                        <svg class="mx-auto" xmlns="http://www.w3.org/2000/svg" width="116" height="121" viewBox="0 0 116 121" fill="none">
                                        <path d="M0.206909 63.57C0.206909 31.7659 25.987 6.12817 57.6487 6.12817C89.2631 6.12817 115.079 31.7541 115.079 63.57C115.079 77.0648 110.43 89.4805 102.627 99.2755C91.8719 112.853 75.4363 121 57.6487 121C39.7426 121 23.4018 112.794 12.6582 99.2755C4.85538 89.4805 0.206909 77.0648 0.206909 63.57Z" fill="#EEF2FF" />
                                        <path d="M72.7942 0.600875L72.7942 0.600762L72.7836 0.599331C72.3256 0.537722 71.8622 0.5 71.3948 0.5H22.1643C17.1256 0.5 13.0403 4.56385 13.0403 9.58544V107.286C13.0403 112.308 17.1256 116.372 22.1643 116.372H93.1214C98.1725 116.372 102.245 112.308 102.245 107.286V29.4482C102.245 28.7591 102.17 28.0815 102.019 27.4162L102.019 27.416C101.615 25.6459 100.67 24.0014 99.2941 22.7574C99.2939 22.7572 99.2937 22.757 99.2934 22.7568L77.5462 2.89705C77.5461 2.89692 77.5459 2.89679 77.5458 2.89665C76.2103 1.66765 74.5591 0.876968 72.7942 0.600875Z" fill="white" stroke="#E5E7EB" />
                                        <circle cx="60.2069" cy="61" r="21.0256" fill="#EEF2FF" />
                                        <path d="M74.6786 46.1412L74.6783 46.1409C66.5737 38.0485 53.4531 38.0481 45.36 46.1412C37.2552 54.2341 37.2551 67.3666 45.3597 75.4596C53.4529 83.5649 66.5739 83.5645 74.6786 75.4599C82.7716 67.3669 82.7716 54.2342 74.6786 46.1412ZM79.4694 41.3508C90.2101 52.0918 90.2101 69.5093 79.4694 80.2502C68.7166 90.9914 51.3104 90.9915 40.5576 80.2504C29.8166 69.5095 29.8166 52.0916 40.5576 41.3506C51.3104 30.6096 68.7166 30.6097 79.4694 41.3508Z" stroke="#E5E7EB" />
                                        <path d="M83.2471 89.5237L76.8609 83.1309C78.9391 81.5058 80.8156 79.6106 82.345 77.6546L88.7306 84.0468L83.2471 89.5237Z" stroke="#E5E7EB" />
                                        <path d="M104.591 94.4971L104.59 94.4969L92.7346 82.653C92.7342 82.6525 92.7337 82.652 92.7332 82.6515C91.6965 81.6018 90.0076 81.6058 88.9629 82.6505L89.3089 82.9965L88.9629 82.6505L81.8573 89.7561C80.8213 90.7921 80.8248 92.4783 81.8549 93.5229L81.8573 93.5253L93.7157 105.384C96.713 108.381 101.593 108.381 104.591 105.384C107.6 102.375 107.6 97.5062 104.591 94.4971Z" fill="#A5B4FC" stroke="#818CF8" />
                                        <path d="M62.5493 65.6714C62.0645 65.6714 61.6626 65.2694 61.6626 64.7729C61.6626 62.7866 58.6595 62.7866 58.6595 64.7729C58.6595 65.2694 58.2576 65.6714 57.761 65.6714C57.2762 65.6714 56.8743 65.2694 56.8743 64.7729C56.8743 60.422 63.4478 60.4338 63.4478 64.7729C63.4478 65.2694 63.0458 65.6714 62.5493 65.6714Z" fill="#4F46E5" />
                                        <path d="M70.1752 58.0694H66.4628C65.9662 58.0694 65.5642 57.6675 65.5642 57.1709C65.5642 56.6862 65.9662 56.2842 66.4628 56.2842H70.1752C70.6717 56.2842 71.0737 56.6862 71.0737 57.1709C71.0737 57.6675 70.6717 58.0694 70.1752 58.0694Z" fill="#4F46E5" />
                                        <path d="M53.8596 58.0693H50.1472C49.6506 58.0693 49.2487 57.6673 49.2487 57.1708C49.2487 56.686 49.6506 56.2841 50.1472 56.2841H53.8596C54.3443 56.2841 54.7463 56.686 54.7463 57.1708C54.7463 57.6673 54.3443 58.0693 53.8596 58.0693Z" fill="#4F46E5" />
                                        <rect x="28.9248" y="16.3846" width="30.7692" height="2.05128" rx="1.02564" fill="#4F46E5" />
                                        <rect x="28.9248" y="100.487" width="41.0256" height="4.10256" rx="2.05128" fill="#A5B4FC" />
                                        <rect x="28.9248" y="22.5385" width="10.2564" height="2.05128" rx="1.02564" fill="#4F46E5" />
                                        <circle cx="42.2582" cy="23.5641" r="1.02564" fill="#4F46E5" />
                                        <circle cx="46.3607" cy="23.5641" r="1.02564" fill="#4F46E5" />
                                        <circle cx="50.4633" cy="23.5641" r="1.02564" fill="#4F46E5" />
                                        </svg>
                                        <div>
                                            <h2 class="text-center text-black text-base font-semibold leading-relaxed pb-1">${translations.cartEmpty}</h2>                                            
                                            <div class="flex gap-3">
                                            <button class="w-full px-3 mt-4 py-2 rounded-full bg-indigo-600 border border-gray-300 text-white text-xs font-semibold leading-4">${translations.goStore}</button>
                                        </div>
                                    </div>
                                `;

                                $("#cart-container").append(cartHtml);
                                $('#btn-view-cart').hide();
                            }
                        } else {
                            swal(
                                translations.error,
                                translations.wentWrong,
                                "error"
                            );
                        }
                    },
                });
            } else {
                swal(translations.safe);
            }
        });
    });

    $(document).on('click', '#btn-decrease-cart', function () {

        let productId = $(this).data('id');
        let inputElement = $(this).siblings('input');
        let quantity = 1;
        $.ajax({
            url: `/home/product/update/cart/${productId}`,
            method: "POST",
            data: {
                type: 2,
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {

                if (response.data.quantity) {

                    quantity = response.data.quantity

                } else {

                    quantity = response.data[productId].quantity

                }

                if (response.status == "success") {

                    inputElement.val(quantity)
                    
                }
            }
        });
    })

    $(document).on('click', '#btn-increase-cart', function () {

        let productId = $(this).data('id');
        let inputElement = $(this).siblings('input');
        let quantity = 1;
        $.ajax({
            url: `/home/product/update/cart/${productId}`,
            method: "POST",
            data: {
                type: 1,
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {

                if (response.data.quantity) {

                    quantity = response.data.quantity

                } else {

                    quantity = response.data[productId].quantity

                }

                if (response.status == "success") {

                    inputElement.val(quantity)

                }
            }
        });
    })
});
