<footer class="bg-white pt-14 pb-12 border-t border-gray-100 ">
    <div class="containner grid md:grid-cols-3 gap-6">
        <!-- Footer text -->
        <div class="col-span-1 space-y-8">
            <a href="/">
                <h2 class="font-black">Glow<span class="font-poppins text-primary">Guru</span></h2>
            </a>
            <p class="text-gray-500">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt molestiae fuga in rem laudantium ea, corporis voluptas modi possimus reprehenderit vel quia nemo! Autem, eos! Iusto perferendis nostrum commodi sapiente!
            </p>


        </div>
        <!-- Footer text end -->


        <!-- Footer Likns  -->
        <div class="col-span-1 space-y-3">
            <h3 class="text-lg text-gray-600 font-medium">Site Map</h3>
            <div class="flex flex-col space-y-4">
                <a href="" class="text-gray-600 text-sm hover:text-primary transition">
                    <i class="fas fa-home ml-4 mr-2"></i> Home
                </a>
                <a href="" class="text-gray-600 text-sm hover:text-primary transition">
                    <i class="fas fa-shopping-cart ml-4 mr-2"></i> Shop
                </a>
                <a href="" class="text-gray-600 text-sm hover:text-primary transition">
                    <i class="far fa-heart ml-4 mr-2"></i> Wishlist
                </a>
                <a href="" class="text-gray-600 text-sm hover:text-primary transition">
                    <i class="fas fa-user ml-4 mr-2"></i> Account
                </a>
            </div>

        </div>
        <!-- Footer Likns end -->

        <!-- Footer contact info -->
        <div class="col-span-1 space-y-4">
            <h3 class="text-xl text-gray-600 font-medium">Contact Infos</h3>
            <p class="text-gray-500 text-sm">
                <i class="fa-solid fa-location-dot"></i>
                1634 Central Ave Middletown, Ohio(OH),
            </p>
            <p class="text-gray-500 text-sm">
                <i class="fa-solid fa-envelope"></i>
                contact@sinmkt.com
            </p>

            <p class="text-gray-500 text-sm">
                <i class="fa-solid fa-phone"></i>
                567-414-2699
            </p>

            <div class="flex space-x-6">
                <a href="" class="text-gray-400 hover:text-gray-500">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="" class="text-gray-400 hover:text-gray-500">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="text-gray-400 hover:text-gray-500">
                    <i class="fab fa-pinterest"></i>
                </a>
                <a href="" class="text-gray-400 hover:text-gray-500">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </div>
        </div>
        <!-- Footer contact info end -->
    </div>
</footer>

<!-- Copyright -->
<div class="bg-primary py-4">
    <div class="containner flex items-center justify-center">
        <p class="text-white text-sm font-medium font-roboto"> GlowGuru &copy; Copyright <?php echo date('Y') ?></p>
    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/flowbite.min.js"></script>
<script src="<?= URLROOT?>/public/js/jquery.js"></script>
<script src="<?php echo URLROOT ?>/public/js/index.js"></script>


</body>

</html>