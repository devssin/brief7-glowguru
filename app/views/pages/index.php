<?php require APPROOT . "/views/inc/header.php"; ?>


<!-- Hero section -->
<div id="indicators-carousel" class="relative" data-carousel="slide" interval="2000">
    <!-- Carousel wrapper -->
    <div class="relative h-[85vh] overflow-hidden z-0">
        <!-- Item 1 -->
        <div class=" duration-[2s] ease-in-out h-full grid place-content-center space-y-5 text-center" data-carousel-item="active">
            <img src="<?= URLROOT ?>/public/img/slide-1.jpg" class="brightness-50 absolute top-0 z-[-1] h-full w-full object-cover " alt="">
            <h1 class="text-white text-4xl font-bold  z-10">The health of your body</h1>
            <p class="text-white text-xl font-medium">We make all cosmetics from natural ingredients and without the addition of dyes</p>
            <a href="" class="text-center text-white w-40 px-4 py-3 bg-primary mx-auto rounded-md hover:bg-sec transition duration-100"> Learn more</a>
        </div>
        <div class=" duration-[2s] ease-in-out h-full grid place-content-center space-y-6 text-center" data-carousel-item>
            <img src="<?= URLROOT ?>/public/img/slide-2.jpg" class="brightness-50 absolute top-0 z-[-1] h-full w-full object-cover " alt="">
            <h1 class="text-white text-4xl font-bold  z-10">The health of your skin face</h1>
            <p class="text-white text-xl font-medium">We make skincare for you with love, our products using natural ingredients with modern technologies </p>
            <a href="" class="text-white text-center w-40 px-4 py-3 bg-primary mx-auto rounded-md hover:bg-sec transition duration-100"> Learn more</a>
        </div>
        <div class=" duration-[2000ms] ease-in-out h-full grid place-content-center text-center space-y-6" data-carousel-item>
            <img src="<?= URLROOT ?>/public/img/slide-3.jpg" class="brightness-50 absolute top-0 z-[-1] h-full w-full object-cover " alt="">
            <h1 class="text-white text-4xl font-bold  z-10">Take control of your skin</h1>
            <p class="text-white text-xl font-medium">We believe that everybody has a beautiful skin , and with the help of our products you can take control of your skin</p>
            <a href="" class="text-white text-center w-40 px-4 py-3 bg- mx-auto bg-primary rounded-md hover:bg-sec transition duration-100"> Learn more</a>
        </div>


    </div>
    <!-- Slider indicators -->
    <div class="absolute z-1 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>

    </div>

</div>

<!-- About us section -->

<section id="about">
    <div class="md:max-w-5xl mx-auto  py-10">
        <h2 class="text-3xl font-medium text-center uppercase"> About us</h2>
        <div class="flex flex-col md:flex-row justify-between mt-10 gap-6 px-5 sm:px-0">
            <img src="https://images.unsplash.com/photo-1571875257727-256c39da42af?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=580&q=80" alt="" class="w-[200px] md:w-1/4 object-contain flex-1 shadow-md">
            <div class="flex-1 mt-5 p-4">
                <p class="text-gray-800 text-md leading-loose md:text-left">We are dedicated to providing high-quality beauty products that will enhance your natural features and boost your confidence. Our extensive selection includes makeup, skincare, hair care, and fragrance products from top brands around the world. We believe that everyone should have access to premium beauty products, and that's why we offer a wide range of options at affordable prices. Whether you're looking for the latest makeup trends or classic skincare staples, you'll find it all here. Our team of experts is always on hand to offer advice and help you find the perfect products to suit your individual needs. Thank you for choosing us as your go-to destination for all things beauty!</p>
                <a href="" class="block text-center w-40 px-4 py-3 bg-primary hover:bg-sec transition duration-100 rounded-md text-white mt-5"> Learn more</a>

            </div>
        </div>
    </div>
</section>


<!-- Features section -->

<section class="bg-gray-100">
    <div class="md:max-w-5xl mx-auto  py-20">
        <div class="w-10/12 grid md:grid-cols-3 gap-6 mx-auto justify-center">
            <div class="border border-primary rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                <i class="fa-solid fa-leaf text-primary text-5xl"></i>

                <div>
                    <h4 class="font-medium text-lg capitalize">100% Natural</h4>
                    <p class="text-sm text-gray-700">We use natural ingridients</p>
                </div>
            </div>
            <div class="border border-primary rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                <i class="fa-solid fa-truck-fast text-primary text-5xl"></i>
                <div>
                    <h4 class="font-medium text-lg capitalize">Free shipping</h4>
                    <p class="text-sm text-gray-700">Order over 500DH</p>
                </div>
            </div>
            <div class="border border-primary rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                <i class="fa-solid fa-leaf text-primary text-3xl"></i>

                <div>
                    <h4 class="font-medium text-lg capitalize">100% Natural</h4>
                    <p class="text-sm text-gray-700">We use natural ingridients</p>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- Categories section -->
<section>
    <div class="md:max-w-5xl mx-auto  py-10 ">

        <h2 class="text-3xl font-medium text-center uppercase">Shop by Category</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-6 px-10 sm:px-0">
            <div class="relative rounded-md max-h-80  group overflow-hidden">
                <img src="<?= URLROOT ?>/public/img/hair.jpg" alt="" class="w-full h-full shadow-md group-hover:scale-105 transition duration-150">
                <a href="" class="absolute inset-0 bg-sec bg-opacity-40 flex justify-center items-center text-white text-xl font-roboto font-medium group-hover:bg-opacity-70  transition duration-700">Hair</a>

            </div>
            <div class="relative rounded-md max-h-80  group">
                <img src="<?= URLROOT ?>/public/img/hands.jpg" alt="" class="w-full h-full shadow-md ">
                <a href="" class="absolute inset-0 bg-sec bg-opacity-40 flex justify-center items-center text-white text-xl font-roboto font-medium group-hover:bg-opacity-70  transition duration-700">Hands</a>

            </div>
            <div class="relative rounded-md max-h-80  group">
                <img src="<?= URLROOT ?>/public/img/face.jpg" alt="" class="w-full h-full shadow-md">
                <a href="" class="absolute inset-0 bg-sec bg-opacity-40 flex justify-center items-center text-white text-xl font-roboto font-medium group-hover:bg-opacity-70  transition duration-700">Face</a>

            </div>
            <div class="relative rounded-md max-h-80  group">
                <img src="<?= URLROOT ?>/public/img/parfums.jpg" alt="" class="w-full h-full shadow-md">
                <a href="" class="absolute inset-0 bg-sec bg-opacity-40 flex justify-center items-center text-white text-xl font-roboto font-medium group-hover:bg-opacity-70  transition duration-700">Parfums</a>

            </div>
        </div>

    </div>
</section>


<!-- Latest Products Section -->
<section class="bg-gray-100">
    <div class="md:max-w-5xl mx-auto  py-10">

        <h2 class="text-3xl font-medium text-center uppercase">Latest Products</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-6 px-10 sm:px-0">
            <?php foreach($data['products']  as $product) :?>
            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow group hover:scale-105 transition duration-150 overflow-hidden">
                <a href="<?=URLROOT?>/shop/product/<?=$product->id?>" class="relative ">
                    <img class="rounded-t-lg group-hover:scale-105 transistion duration-100" src="<?= $product->image ?>" alt="product image" />
                    <div class="bg-primary bg-opacity-0 w-full h-full group-hover:bg-opacity-40 transistion duration-100 absolute inset-0 rounded-t-lg"></div>
                </a>
                <div class="px-5 pb-5 mt-4">
                    <a href="#">
                        <h5 class="text-lg font-semibold tracking-tight "><?= $product->name?></h5>
                    </a>

                    <div class="flex items-center justify-between mt-4">
                        <span class="text-xl font-bold text-gray-900 ">$<?= $product->price ?></span>
                        <a href="<?=URLROOT?>/shop/product/<?=$product->id?>" class="text-white font-medium rounded-lg text-sm bg-primary hover:bg-sec transition duration-100 px-5 py-2 ">View </a>
                    </div>
                </div>
            </div>
            <?php endforeach ;?>

        </div>

        <a href="#" class=" block w-40 text-center mx-auto mt-6 text-white font-medium rounded-lg text-md bg-primary hover:bg-sec transition duration-100 px-5 py-2 ">See all Products </a>
    </div>
</section>










<?php require APPROOT . "/views/inc/footer.php"; ?>