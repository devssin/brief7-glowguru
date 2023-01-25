<nav class="bg-white px-2 sm:px-4 py-2.5 sticky w-full z-10 top-0 left-0 border-b border-gray-200">
  <div class="container flex flex-wrap items-center justify-between mx-auto">
    <a href="<?=URLROOT?>" class="flex items-center">
      <img src="<?= URLROOT ?>/public/img/logo.png" class="h-8 mr-3 md:h-12" alt="Logo">
      <span class="self-center text-xl font-semibold whitespace-nowrap hidden md:block">GlowGuru</span>
    </a>
    <div class="flex md:order-2">
      <?php if (isLoggedIn()) : ?>
        <a href="<?= URLROOT ?>/users/logout" class="text-white bg-primary hover:bg-sec focus:ring-4 focus:outline-none focus:ring-primary font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0"> <i class="fa-solid fa-right-from-bracket mr-2"></i> Logout</a>
      <?php else : ?>
        <a href="<?= URLROOT ?>/users/login" class="text-white bg-primary hover:bg-sec focus:ring-4 focus:outline-none focus:ring-primary font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0"> <i class="fa-solid fa-right-to-bracket mr-2"></i> Admin Space</a>
      <?php endif; ?>
      <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
        </svg>
      </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
      <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white">
        <li>
          <a href="<?=URLROOT?>" class="block py-2 pl-3 pr-4 hover:text-primary  bg-sec rounded md:bg-transparent md:p-0" aria-current="page">Home</a>
        </li>
        <li>
          <a href="<?=URLROOT ?>/#about" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-primary md:p-0">About</a>
        </li>
        <li>
          <a href="<?=URLROOT?>/shop" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-primary md:p-0">Shop</a>
        </li>
        <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-primary md:p-0">Services</a>
        </li>

        <?php if (isLoggedIn()) : ?>
          <li>
            <a href="<?=URLROOT?>/dashboard" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-primary md:p-0">Dashboard</a>
          </li>
        <?php endif; ?>


      </ul>
    </div>
  </div>
</nav>