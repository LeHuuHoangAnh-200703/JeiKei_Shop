<?php $this->layout("layouts/admin", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<div class="w-[95%] mx-auto h-[100%]">
    <div class="text-center py-4">
        <h2 class="text-[#333] font-bold text-2xl">Đánh giá của người dùng</h2>
    </div>
    <div id="all_products" class="w-full overflow-x-scroll overflow-y-scroll">
        <div class="border shadow-md rounded-md">
            <?php
            foreach ($feedbacks as $feedback) {
            ?>
                <div class="m-5 pb-3 border-b-2">
                    <div class="flex gap-2">
                        <div id="user_info" class="w-10 h-10 border border-1 border-slate-950 rounded-full flex justify-center items-center cursor-pointer bg-center bg-cover" style="background-image:url('../<?php echo ($feedback['image_user']); ?>')"></div>
                        <div>
                            <p class="text-[#333f48] text-[14px] font-semibold"><?php echo $this->e($feedback->username); ?></p>
                            <p class="text-[#333f48] text-[10px] font-semibold">Cập nhật lúc : <?php echo $this->e($feedback->up_date); ?></p>
                        </div>
                    </div>
                    <div class="flex flex-col lg:flex-row">
                        <img src="../assets/<?php echo ($feedback['image']); ?>" alt="" class="w-[120px] lg:w-[150px]">
                        <div class="flex flex-col items-start justify-center">
                            <p class="text-[#333f48] text-[16px] font-semibold"><?php echo $this->e($feedback->name); ?></p>
                            <p class="text-[#333f48] text-[14px] font-medium">Chất lượng : <span class="font-semibold text-[#DC143C]"><?php echo $this->e($feedback->quality); ?></span></p>
                            <p class="text-[#333f48] text-[14px] font-semibold my-3">"<?php echo $this->e($feedback->description); ?>"</p>
                            <p class="text-[14px] font-semibold text-[#4169E1]"><i class="fa-solid fa-location-dot"></i> <?php echo $this->e($feedback->address_user); ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- ALERT BOX -->
<?php $this->stop() ?>