<?php
$baseURL = "http://ecommercewebsite.localhost/";
if (\App\SessionGuard::user() !== null) {
    $userImage = \App\SessionGuard::user()->image;
    $imageURL = $baseURL . $userImage;
} else {
    $imageURL = $baseURL . "assets/user_avatar.jpg";
}
$imgLogo = $baseURL . "./assets/OIG-removebg-preview.png";
?>

<!DOCTYPE html>
<html>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <title><?= $this->e($title) ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="<?php echo $imgLogo ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel='stylesheet' type='text/css' media='screen' href='./css/test.css'>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Caprasimo&family=Fruktur:ital@1&family=Kanit:wght@400;500&family=Kaushan+Script&family=Lilita+One&family=Luckiest+Guy&family=Lunasima&family=Mr+Dafoe&family=Open+Sans:wght@500;600&family=Orbitron:wght@600&family=Permanent+Marker&family=Poppins:wght@500&family=Roboto+Slab&family=Staatliches&family=Yellowtail&display=swap" rel="stylesheet">
    <!-- Use tailwind library through cdn (Content Delivery Network) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tailwindcss local using -->
    <!-- <link rel="stylesheet" href="./css/test.css"> -->
</head>


<body class="relative">
    <div id="content" class="relative w-full max-w-[1200px] m-auto md:flex-row min-h-screen overflow-x-hidden hidden">
        <!-- header -->
        <header name="top" class="overflow-hidden">
            <nav class="flex items-center justify-between top-0 left-0 w-full px-4 py-[15px]">
                <button class="flex items-center gap-x-4">
                    <div class="md:hidden bar relative border border-[#a3a3a3] rounded"><i class="fa-solid fa-bars p-[12px] ease-out duration-[0.4s] hover:scale-[1.1]"></i></div>
                    <a href="/home" class="test text-[18px] md:text-[20px] font-bold uppercase">JEIKEI <span class="text-[#DC143C]">SWITCH</span></a>
                </button>
                <div class="relative flex items-center justify-center">
                    <ul class="ml-3 hidden md:flex lg:ml-4">
                        <!-- <li class="px-[15px] lg:px-[20px] text-[18px]">
                            <a href="/" class="no-underline font-semibold text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Home</a>
                        </li> -->
                        <li class="px-[15px] lg:px-[20px] text-[18px]">
                            <a href="/orderhistory" class="no-underline font-semibold text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#DC143C]">Lịch sử đơn hàng</a>
                        </li>
                    </ul>
                    <form action="/search" method="post" class="ml-[50px] hidden md:block">
                        <input name="search" type="text" placeholder="Tìm kiếm sản phẩm ..." class="relative border-[1.2px] outline-none border-[#646464] bg-transparent w-[210px] lg:w-[350px] p-2 rounded-e-[5px] rounded-s-[5px] placeholder:text-[#808080]">
                        <button type="submit">
                            <div class="absolute top-0 right-0 rounded-e-md translate-x-[50%] bg-[#DC143C] px-4 py-[9px] cursor-pointer"><i class="text-[#fff] fa-solid fa-magnifying-glass cursor-pointer"></i></div>
                        </button>
                    </form>
                </div>

                <div class="flex justify-center items-center gap-4">
                    <div id="user_info" class="w-10 h-10 border border-1 border-slate-950 rounded-full flex justify-center items-center cursor-pointer bg-center bg-cover" style="background-image:url('<?php echo $imageURL; ?>')">
                    </div>
                    <button class="relative">
                        <div class="relative border border-[#a3a3a3] rounded">
                            <i class="fa-sharp fa-solid fa-cart-shopping p-[12px] ease-out duration-[0.4s] hover:scale-[1.1]"></i>
                        </div>
                        <div class="absolute top-[-25%] right-[-20%] bg-[#DC143C] w-6 h-6 flex justify-center items-center rounded-[50%] font-medium text-[#fff] count_products">0</div>
                    </button>
                </div>
            </nav>
            <div class="sidebar fixed top-0 -left-[100%] bg-[#fff] p-4 w-full h-full z-40">
                <div class="mb-4">
                    <button class="closed">
                        <div class="relative border border-[#a3a3a3] rounded w-[40px] h-[40px]">
                            <i class="fa-solid fa-x p-[12px] ease-out duration-[0.4s] hover:scale-[1.1]"></i>
                        </div>
                    </button>
                </div>
                <ul class="flex flex-col">
                    <form action="/search" method="post" class="relative mb-4">
                        <input type="text" name="search" placeholder="Tìm kiếm sản phẩm ..." class="relative border-[1px] border-[#646464] bg-transparent w-full p-[6px] rounded-e-[5px] rounded-s-[5px] placeholder:text-[#808080]">
                        <button type="submit">
                            <div class="absolute top-0 right-0 rounded-e-md bg-[#DC143C] px-3 py-[6.8px] cursor-pointer"><i class="text-[#fff] fa-solid fa-magnifying-glass cursor-pointer"></i></div>
                        </button>
                    </form>
                    <li class="pb-[15px]">
                        <a href="/orderhistory" class="border-b-2 border-transparent hover:border-b-2 hover:border-[#DC143C] font-semibold text-[20px] transition-colors ">Lịch sử đơn hàng</a>
                    </li>
                </ul>
            </div>
            <div class="mt-8 flex justify-between items-center w-full px-4 flex-wrap">
                <div class="flex justify-start flex-col gap-2 lg:w-[60%] w-full">
                    <p class="text-[18px] text-[#DC143C] font-bold uppercase">JeiKei Shop</p>
                    <p class="lg:text-6xl text-4xl font-semibold">Nintendo Switch</p>
                    <p class="mt-2 text-[14px]"><span class="text-[#DC143C] font-semibold">JeiKei Shop</span> cam kết mối liên hệ này xuất phát từ sự trân trọng của chúng tôi, cam kết phục vụ sản phẩm với chất lượng tốt nhất, tạo mối liên kết đến từng khách hàng, thực hiện trách nhiệm với cộng đồng tại nơi chúng tôi hoạt động kinh doanh. Nếu có thắc mắc xin hãy liên hệ đến Hotline dưới đây để được hỗ trợ tốt hơn. Xin cảm ơn !</p>
                    <p class="text-[15px] font-semibold mb-4">Hotline đặt hàng và hỗ trợ : <span class="text-[#DC143C]"> 079.965.8592</span> <span class="font-normal">(7:30-22:00)</span></p>
                    <button class="bg-[#DC143C] w-[150px] text-center px-3 py-2 text-[#fff] font-medium">Tìm hiểu thêm</button>
                    <ul class="lg:flex gap-[20px] mt-8 hidden">
                        <li class="cursor-pointer transition-all duration-500 hover:scale-110"><i class="fa-brands fa-xbox"></i></li>
                        <li class="cursor-pointer transition-all duration-500 hover:scale-110"><i class="fa-brands fa-playstation"></i></li>
                        <li class="cursor-pointer transition-all duration-500 hover:scale-110"><i class="fa-solid fa-n"></i></li>
                        <li class="cursor-pointer transition-all duration-500 hover:scale-110"><i class="fa-solid fa-gamepad"></i></li>
                    </ul>
                </div>
                <div class="relative flex justify-center items-center w-full lg:w-[40%]">
                    <div class="before:absolute before:bg-[#DC143C] before:bottom-[-50%] before:left-[50%] before:translate-x-[-50%] lg:before:top-0 before:w-[450px] before:h-[450px] lg:before:w-[320px] lg:before:h-[320px] before:-z-10 before:rounded-full">
                        <img src="./assets/./Picture32-removebg-preview.png" alt="" class="z-10 w-[450px]">
                    </div>
                </div>
            </div>
        </header>
        <hr class="lg:my-10 mb-10">
        <!-- main content -->
        <?= $this->section("page") ?>
        <!-- shopping cart -->
        <div class="cart-shop fixed top-0 right-0 bg-[#FFFAFA] w-full md:w-[500px] h-full z-20 transition-all duration-[.4s] translate-x-[100%]">
            <div class="w-full overflow-y-auto h-full">
                <div class="relative mt-[20px]">
                    <h1 class="text-center font-bold text-2xl uppercase text-[#333]">JEIKEI <span class="text-[#DC143C]">SWITCH</span> Giỏ Hàng</h1>
                </div>
                <div class="flex justify-center items-center flex-col m-[30px] cart_product"></div>
            </div>
            <div class="absolute bottom-0 w-full grid grid-cols-2 font-semibold text-[#fff]">
                <div class="bg-[#DC143C] w-full p-2 text-center total">0 đ</div>
                <div class="bg-[#333] w-full p-2 text-center cursor-pointer close-cart">Close</div>
            </div>
        </div>

        <!-- Dropdown Menu -->
        <div id="user_info_panel" class="absolute top-14 right-[-100%] z-10 mt-2 w-60 divide-y divide-gray-100 rounded-lg border border-gray-100 bg-white text-left text-sm shadow-lg transition-all">
            <div class="py-3 px-4">
                <div class="flex items-center gap-3">
                    <div class="relative h-10 w-10">
                        <div class="w-10 h-10 rounded-full bg-slate-200 text-slate-500 flex justify-center items-center bg-center bg-cover" style="background-image:url('<?php echo $imageURL; ?>')">
                        </div>
                        <span class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                    </div>
                    <div class="text-xs">
                        <div class="font-medium text-gray-700"><?php if (\App\SessionGuard::user()) {
                            $this->e(\App\SessionGuard::user()->name);
                        }  echo "Tên của bạn" ?></div>
                        <div class="text-gray-400"><?php if (\App\SessionGuard::user()) {
                            $this->e(\App\SessionGuard::user()->email);
                        }  echo "Email" ?></div>
                    </div>
                </div>
            </div>
            <div class="p-1">
                <a href="/profile" class="flex w-full items-center gap-2 rounded-md px-3 py-2 text-gray-700 hover:bg-gray-100"><i class="fa-regular fa-user"></i> Hồ sơ</a>
                <a href="/editprofile" class="flex w-full items-center gap-2 rounded-md px-3 py-2 text-gray-700 hover:bg-gray-100"><i class="fa-solid fa-wrench"></i> Chỉnh sửa hồ sơ</a>
            </div>
            <div class="p-1">
                <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex w-full items-center gap-2 rounded-md px-3 py-2 text-gray-700 hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                    </svg>
                    Đăng xuất
                    <span class="inline-flex flex-1 justify-end gap-1 text-xs capitalize text-gray-400">
                        <kbd class="min-w-[1em] font-sans">⌥</kbd>
                        <kbd class="min-w-[1em] font-sans">⇧</kbd>
                        <kbd class="min-w-[1em] font-sans">Q</kbd>
                    </span>
                    <form id="logout-form" class="d-none" action="/logout" method="POST">
                    </form>
                </a>
            </div>
        </div>

        <!-- Black background when open Side bar -->
        <!-- <div class="opacity-toggle absolute top-0 left-0 w-full opacity-50 bg-[#333] h-full z-10 hidden transition-all duration-100"></div> -->

        <!-- Arrow to top -->
        <a href="#top" id="backtotop" class="hidden fixed bottom-5 right-5 z-30 w-12 h-12 bg-[#DC143C] rounded-[10px] border-[3px] border-[#333] justify-center items-center text-white font-bold shadow-lg transition-all duration-500 hover:-translate-y-3"><i class="fa-solid fa-angles-up"></i></a>
    </div>
    <!-- footer -->
    <footer class="bg-[#24355a] text-[#fff] p-5 w-full font-medium">
        <div class="max-w-[1200px] mx-auto flex justify-center flex-col md:flex-row md:justify-between items-center">
            <div class="flex flex-col md:flex-row md:text-sm">
                <p class="mr-5">© 2023 JeiKei, Inc. All rights reserved.</p>
                <p class="md:border-l-2 md:border-l-[#fff] px-4">Designed and Managed by JeiKei</p>
            </div>
            <div class="md:text-sm">
                <p>Products provided by Nintendo | JeiKei</p>
            </div>
        </div>
    </footer>
    <div class="opacity-toggle absolute top-0 left-0 w-full opacity-50 bg-[#333] h-full z-10 hidden transition-all duration-100"></div>
    <!-- Loading -->
    <div id="loading" class="fixed top-0 left-0 w-full h-screen bg-[rgba(0,0,0,.7)] flex justify-center items-center">
        <div class="w-16 h-16 border-4 border-dashed rounded-full animate-spin dark:border-[#DC143C]"></div>
    </div>

    <!-- Javascript and Jquery code -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // Show loading when browser is loading datas
            $(window).on("load", function() {
                $("#loading").fadeOut("slow");
                $("#content").fadeIn("slow");
            })

            // Show a notification when user places an order successfully 
            const successNotification = $("#success-notification");
            if (successNotification.length > 0) {
                successNotification.css("display", "block");
            }
            setTimeout(() => {
                successNotification.css("display", "none");
            }, 5000);

            $("#addCart").submit(function(e) {
                e.preventDefault();
            })

            // show notify when user hit ADD button in home page
            $(".add_to_cart").click(function() {
                const notify = $("#added_to_cart_successfully");
                notify.css("display", "block");
                setTimeout(() => {
                    notify.css("display", "none");
                }, 4000);
            });

            //sidebar
            $(".bar").click(function() {
                $(".sidebar").toggleClass("left-0");
            });

            $(".closed").click(function() {
                $(".sidebar").toggleClass("left-0");
            });

            //ẩn hiện thanh ngang
            $(".clickdown_2").click(function() {
                $(".list_1").addClass("hidden");
                $(".dropdown_1").addClass("rotate-180");
                if (!$(".list_2").hasClass("hidden")) {
                    $(".list_2").addClass("hidden");
                } else {
                    $(".list_2").removeClass("hidden");
                }

                $(".dropdown_2").toggleClass("rotate-180");
            });

            //cart
            $(".close-cart").click(function() {
                $(".cart-shop").addClass("translate-x-[100%]");
                $(".opacity-toggle").addClass("hidden");
            });

            $(".fa-cart-shopping").click(function() {
                $(".cart-shop").removeClass("translate-x-[100%]");
                $(".opacity-toggle").removeClass("hidden");
            });

            $("#user_info").click(function() {
                $("#user_info_panel").toggleClass("right-4");
            });

            //filter products
            $("#Nintendo_OLED").click(function() {
                $(".Nintendo_OLED").show();
                $(".Nintendo_Lite").hide();
                $(".Nintendo_Old").hide();
            });
            $("#Nintendo_Lite").click(function() {
                $(".Nintendo_OLED").hide();
                $(".Nintendo_Lite").show();
                $(".Nintendo_Old").hide();
            });
            $("#Nintendo_Old").click(function() {
                $(".Nintendo_OLED").hide();
                $(".Nintendo_Lite").hide();
                $(".Nintendo_Old").show();
            });
            $("#all").click(function() {
                $(".style").show();
            });

            //filter mobile
            $("#Nintendo_OLED_1").click(function() {
                $(".Nintendo_OLED").show();
                $(".Nintendo_Lite").hide();
                $(".Nintendo_Old").hide();
            });
            $("#Nintendo_Lite_1").click(function() {
                $(".Nintendo_OLED").hide();
                $(".Nintendo_Lite").show();
                $(".Nintendo_Old").hide();
            });
            $("#Nintendo_Old_1").click(function() {
                $(".Nintendo_OLED").hide();
                $(".Nintendo_Lite").hide();
                $(".Nintendo_Old").show();
            });
            $("#all").click(function() {
                $(".style").show();
            });

            //add products
            let cart_items = [];
            $(".add").click(function() {
                var productElement = $(this).closest(".style");
                var productName = productElement.find(".name").text().trim();
                console.log(productName)
                let price = parseFloat(
                    productElement.find(".price").text().trim().split("$")[0].trim()
                );
                let productWarehouse = productElement
                    .find(".warehouse")
                    .text()
                    .trim()
                    .split(":")[1];
                var productImage = productElement.find("img").attr("src");
                var productID = productElement.find(".productID").text();
                add_to_cart(productName, price, productWarehouse, productImage, productID);
            });

            //Hàm này dùng để kiểm tra xem sản phẩm có không
            function find_CartItem(productName) {
                for (var i = 0; i < cart_items.length; i++) {
                    if (cart_items[i].name === productName) {
                        return i;
                    }
                }
                return -1;
            }

            //Hàm này thêm giỏ hàng
            function add_to_cart(name, price, warehousem, image, productID) {
                var productIndex = find_CartItem(name);
                var totalPrice = 0;
                if (productIndex !== -1) {
                    cart_items[productIndex].quantity++;
                    cart_items[productIndex].price = price * cart_items[productIndex].quantity;
                } else {
                    var products = {
                        name: name,
                        price: price,
                        warehousem: warehousem,
                        image: image,
                        quantity: 1,
                        productID: productID,
                    };
                    cart_items.push(products);
                }
                updateCount();
                updateTotalPrice();
                render_CartItems();
            }

            function render_CartItems() {
                $(".cart_product").empty();
                var totalPrice = 0;
                for (var i = 0; i < cart_items.length; i++) {
                    var product = `
            <div class="flex justify-start gap-2 border-b-2 border-[#333] py-[15px] cart">
                <div class="w-1/3">
                    <img src="${cart_items[i].image}">
                </div>
                <div class="text-sm flex justify-center flex-col gap-[8px] font-semibold">
                    <h1>${cart_items[i].name}</h1>
                    <p>Giá : <span class="text-[#DC143C] price">${cart_items[i].price}.00$</span></p>
                    <div class="flex items-center gap-4">
                        <a href="/orders/${cart_items[i].productID}" class="px-[18px] py-[6px] bg-[#333] transition-all duration-300 text-[#fff] hover:bg-[#DC143C]"><i class="fa-solid fa-cart-shopping"></i> Mua hàng</a>
                        <button class="px-[18px] py-[6px] bg-[#DC143C] transition-all duration-500 hover:text-[#fff] del">Xóa sản phẩm</button>
                    </div>
                </div>
            </div>
        `;
                    $(".cart_product").append(product);
                }

                // $(".plus").click(function() {
                //     var productElement = $(this).closest(".cart");
                //     var productNameCart = productElement.find("h1").text();
                //     var productIndex = find_CartItem(productNameCart);
                //     var initialPrice = cart_items[productIndex].price;
                //     cart_items[productIndex].quantity++;
                //     var currentPrice = cart_items[productIndex].quantity * initialPrice;
                //     productElement.find(".price").text(currentPrice + ".00$");
                //     productElement.find(".quantity").val(cart_items[productIndex].quantity);
                //     updateTotalPrice();
                // });

                // $(".minus").click(function() {
                //     var productElement = $(this).closest(".cart");
                //     var productNameCart = productElement.find("h1").text();
                //     var productIndex = find_CartItem(productNameCart);
                //     var initialPrice = cart_items[productIndex].price;
                //     if (cart_items[productIndex].quantity > 1) {
                //         cart_items[productIndex].quantity--;
                //         var currentPrice = cart_items[productIndex].quantity * initialPrice;
                //         productElement.find(".price").text(currentPrice + ".00$");
                //         productElement.find(".quantity").val(cart_items[productIndex].quantity);
                //     } else {
                //         productElement.remove();
                //         cart_items.splice(productIndex, 1);
                //         updateCount();
                //     }
                //     updateTotalPrice();
                // });

                $(".del").click(function() {
                    var productElement = $(this).closest(".cart");
                    var productNameCart = productElement.find("h1").text();
                    var productIndex = find_CartItem(productNameCart);
                    cart_items.splice(productIndex, 1);
                    productElement.remove();
                    updateTotalPrice();
                    updateCount();
                });
            }

            function updateTotalPrice() {
                var totalPrice = 0;
                for (var i = 0; i < cart_items.length; i++) {
                    var productTotalPrice = cart_items[i].price * cart_items[i].quantity;
                    totalPrice += productTotalPrice;
                }
                $(".total").text(totalPrice.toFixed(2) + " " + "$");
            }

            function updateCount() {
                var count = 0;
                count += cart_items.length;
                $(".count_products").text(count);
            }

            // Decrease the quantity of product
            $("#decrease").click(function() {
                if (parseInt($("#quantity").val()) === 1) {
                    $("#quantity").val(1);
                } else {
                    var quantity = parseInt($("#quantity").val()) - 1;
                    $("#quantity").val(quantity);
                }
            });

            $("#increase").click(function() {
                var quantity = parseInt($("#quantity").val()) + 1;
                $("#quantity").val(quantity);
            });

            //  Show image when uploading image
            $("#imageInput").change(function() {
                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#imagePreview").removeClass("hidden");
                    $("#image_icon").addClass("hidden");
                    $("#imagePreview").attr("src", e.target.result);
                };
                reader.readAsDataURL(file);
            });

            // Hide and show the back to top button
            $(window).scroll(function() {
                if ($(this).scrollTop() > 500) {
                    $("#backtotop").addClass("flex");
                    $("#backtotop").removeClass("hidden");
                } else {
                    $("#backtotop").addClass("hidden");
                    $("#backtotop").removeClass("flex");
                }
            });
        });
    </script>
</body>

</html>