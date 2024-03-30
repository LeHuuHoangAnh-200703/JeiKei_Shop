<?php $this->layout("layouts/default", ["title" => "Hồ sơ của bạn"]) ?>

<?php $this->start("page");
$timestamp = strtotime($user_data["created_at"]);
$currentDate = strtotime(date('Y-m-d'));
$hour = ceil(($currentDate - $timestamp) / 3600);
?>
<?php if (isset($_SESSION['errors'])) : ?>
    <div class="success-notification bg-red-100 border-[1px] border-[#DC143C] text-white px-4 py-2 fixed top-0 right-0 m-4 shadow-md shadow-red-300 animate__animated animate__backInRight">
        <p class="font-bold text-[#DC143C]"><i class="fa-solid fa-triangle-exclamation"></i> <?php echo $_SESSION['errors'] ?></p>
    </div>
    <?php unset($_SESSION['errors']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['success'])) : ?>
    <div class="success-notification bg-green-100 border-[1px] border-[#3CB371] px-4 py-[10px] fixed top-0 right-0 m-4 shadow-md shadow-green-200 animate__animated animate__backInRight">
        <p class="font-bold text-green-600"><i class="fa-solid fa-circle-check"></i> <?php echo $_SESSION['success'] ?></p>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>
<div class="w-[95%] h-[650px] md:h-[570px] mx-auto mt-3 mb-36">
    <div class="relative h-[300px] w-full bg-center bg-cover rounded-md" style="
            background-image: url('./assets/z5300330066078_500c69306f95b52da4635cb3e9b37424.jpg');
          ">

        <div class="w-[90%] bg-[#fdfdfd] absolute top-32 left-[50%] translate-x-[-50%] mx-auto shadow-lg rounded-md pt-[50px] px-2 sm:px-10 pb-10 sm:pb-0 h-fit ">
            <div style="<?php
                        if (isset($user_data["image"])) {
                            echo "background-image:url('" . $user_data['image'] . "')";
                        } else {
                            echo "background-image:url('../assets/user_avatar.jpg')";
                        }
                        ?>" class="w-[100px] h-[100px] bg-[#fff] rounded-full shadow-lg absolute left-1/2 translate-x-[-50%] -top-[50px] bg-center bg-cover">

            </div>
            <div class="flex justify-between items-center flex-col lg:flex-row gap-4 px-2 lg:px-24">
                <ul class="flex gap-x-6">
                    <li class="flex flex-col items-center"><span class="font-bold text-lg text-[#DC134C]"><?php echo $amountoforder ?></span><span class="text-slate-400">Số đơn hàng</span></li>
                    <li class="flex flex-col items-center"><span class="font-bold text-lg text-[#DC134C]"><?php echo  $hour ?></span><span class="text-slate-400">Giờ</span></li>
                </ul>
                <a href="/editprofile" class="px-3 py-2 sm:px-5 sm:py-2 bg-[#4169E1] text-sm sm:text-md rounded-md font-medium sm:font-bold text-white shadow-md">Chỉnh sửa hồ sơ</a>
            </div>
            <div class="text-center mt-12 pb-4">
                <h3 class="text-2xl font-semibold leading-normal mb-2 text-blueGray-700">
                    <?= htmlspecialchars($user_data["name"]) ?>
                </h3>
                <div class="text-sm leading-normal mt-0 mb-2 text-[#4169E1] font-bold uppercase">
                    <i class="fa-regular fa-envelope"></i></i>
                    <?= htmlspecialchars($user_data["email"]) ?>
                </div>
                <div class="mb-2 text-blueGray-600 mt-10 font-medium">
                    <i class="fa-solid fa-location-dot text-[#4169E1] font-"></i> <?= htmlspecialchars($user_data["address"]) ?>
                </div>
                <div class="mb-2 text-blueGray-600 font-medium">
                    <i class="fa-solid fa-phone mr-2 text-lg text-[#4169E1]"></i> <?= htmlspecialchars($user_data["phone"]) ?>
                </div>
                <hr />
                <div class="my-5 text-[15px]">
                    <p>
                        Chào mừng <span class="uppercase"><?= htmlspecialchars($user_data["name"]) ?></span> đã đến với JEIKEI SHOP, chúng tôi mong rằng tại đây sẽ thõa mãn được những nhu cầu của bạn. Chúng tôi luôn sẳn sàng hỗ trợ bạn , nếu cần thì mong bạn liên hệ đến Hotline ở trang chủ. Xin cám ơn!!
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->stop() ?>