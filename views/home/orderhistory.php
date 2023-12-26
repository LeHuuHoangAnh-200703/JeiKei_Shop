<?php $this->layout("layouts/home", ["title" => "Order history"]) ?>
 
<?php $this->start("page") ?>
<div class="mx-auto mb-5 p-5">
    <div class="relative w-full flex justify-center mb-3">
        <h1 class="text-[30px] font-semibold">Order history</h1>
        <div class="absolute bottom-0 w-[200px] h-1 bg-[#DC143C]"></div>
    </div>

    <?php
    foreach ($orders as $order) {
    ?>
        <div class="max-w-full h-full grid grid-cols-1 md:grid-cols-3 gap-7 border rounded-sm p-5 shadow-lg mb-5">
            <div class="w-full flex items-center justify-center">
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($order['image']); ?>" />
            </div>
            <div class="col-span-2 flex flex-col gap-2">
                <h1 class="text-xl font-bold"><?php echo $this->e($order->name); ?></h1>
                <p class="text-[18px] font-bold">Price : <span class="text-[#DC143C]">$<?php echo $this->e($order->price); ?></span></p>
                <div class="flex justify-start items-center gap-x-2 font-bold">
                    <p>Quantiy: </p>
                    <p class="text-[#DC143C]"><?php echo $this->e($order->amount) ?></p>
                </div>
                <div class="flex justify-start items-center gap-x-1">
                    <p>Delivery method: </p>
                    <b>
                        <?php echo $this->e($order->payment) ?>
                    </b>
                </div>
                <div class="flex justify-start items-center gap-x-1">
                    <p>Address:</p>
                    <b>
                        <?php echo $this->e($order->address) ?>
                    </b>
                </div>
                <div class="flex justify-start items-center gap-x-1">
                    <p>Phone:</p>
                    <b>
                        <?php echo $this->e($order->phone) ?>
                    </b>
                </div>
            </div>
        </div>
    <?php } ?>

</div>
<?php $this->stop() ?>