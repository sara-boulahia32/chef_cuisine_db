

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chef_site_db</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@300..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
	<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <style>
        .fontsinista{
            font-family: Sansita Swashed;
        }
    </style>

</head>
<body >
    
     
<div class="flex justify-between items-center  bg-black px-8">
            <a href="#">
                <img src="img/cuisine_logo-removebg-preview.png" class="max-w-full h-auto w-[100px] " alt="logo">
            </a>
            <div class="block lg:hidden">
          <button id="menu-button" class="text-white focus:outline-none">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
              </svg>
          </button>
      </div>
            <div class="hidden fontsinista lg:flex space-x-8 leading-normal tracking-normal">
                
                <a href="menu.php" class="font-bold text-white lg:text-lg p-2 hover:bg-gray-700">Menu</a>
                <a href="activites.php" class="font-semibold text-white lg:text-lg p-2 hover:bg-gray-700">Book a table</a>
                <a href="reservations.php" class="font-semibold text-white lg:text-lg p-2 hover:bg-gray-700">Reservations</a>
                <a href="reservations.php" class="font-semibold text-white lg:text-lg p-2 hover:bg-gray-700">SHOP</a>
                <a href="about.html" class="font-semibold text-white lg:text-lg p-2 hover:bg-gray-700">The Chef</a>
                <a href="login.php" class="font-semibold text-white lg:text-lg p-2 hover:bg-gray-700">Contact</a>
                
                <div class="flex space-x-4 pt-2 text-white">
                    <a href="#" class="text-white w-[20px] h-[20px]">
                    <a href="client.php">
                    <img src="./img/User.png" alt="user logo"></a>
                </a>
                <!-- <a href="#"><i class='bx bxl-facebook-circle'></i></a>
                    <a href="#"><i class='bx bxl-pinterest'></i></a>
                    <a href="#"><i class='bx bxl-whatsapp'></i></a>
                    <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                     -->
                </div>
          
            </div>
        </div>
        
        
      
      <div id="menu" class="fixed top-0 left-0 h-screen w-[70%] bg-gray-800	  px-4 py-2 transform -translate-x-full transition-transform duration-300 ease-in-out lg:hidden flex-col justify-center items-center space-y-4 z-50 hidden pt-[20%]">
        <div class="text-center space-y-8 pt-[30%] fontsinista">
        <div><a href="#" class="font-semibold text-white hover:text-[#F7E0A1]">Menu</a></div>
          <div><a href="#" class="font-semibold text-white hover:text-[#F7E0A1]">Book a table</a></div>
          <div><a href="#" class="font-semibold text-white hover:text-[#F7E0A1]">Reservations</a></div>
          <div><a href="#" class="font-semibold text-white hover:text-[#F7E0A1]">SHOP</a></div>
          <div><a href="about.html" class="font-semibold text-white hover:text-[#F7E0A1]">The Chef</a></div>
          <div><a href="#" class="font-semibold text-white hover:text-[#F7E0A1]">Contact</a></div>
      </div>
      </div>
      <!-- Carousel Container -->
    <div data-carousel class="relative overflow-hidden  shadow-lg ">
        <!-- Slides Wrapper -->
        <div data-slides class="flex ">
            <!-- Slide 1 -->
            <div class="relative w-full flex-shrink-0 h-[690px] md:h-[490px]" data-active>
                <img src="img/CroppedFocusedImage160059050-50-GRR-SG-OCTOBER-2024-CHRISTMAS-DAY-FESTIVE-ROAST-TURKEY12-movxgx-web-171224-1.png" alt="Slide 1" class="w-full h-full object-cover">
                <div
                    class="absolute inset-0 bg-black bg-opacity-15 flex flex-col justify-center items-center  pl-14 h-[200px] md:h-[490px]">
                    <h1 class="text-5xl font-bold text-white uppercase mb-4">Behind the Dishes</h1>
                    <p class="text-xl text-white">EXPERIENCE THE MAGIC OF THE SEASON WITH AN UNFORGETTABLE CULINARY JOURNEY.</p>

                    

                    <button class="text-black flex justify-start content-center mt-3 hover:text-black">
                        <a href="#" class="bg-white w-32 h-10 flex items-center justify-center">
                            EXPLORE
                        </a>
                    </button>
                </div>
            </div>


            <!-- Slide 2 -->
            <div class="relative w-full flex-shrink-0 h-[200px] md:h-[490px]">
                <img src="img/A+pink+dessert+topped+with+small,+white+edible+flowers.jpeg" alt="Slide 2"
                    class="w-full h-full object-cover ">
                    <div
                    class="absolute inset-0 bg-black bg-opacity-15 flex flex-col justify-center items-center pl-14 h-[200px] md:h-[490px]">
                    <h1 class="text-5xl font-bold text-white uppercase mb-4">WELCOME 2025 IN STYLE</h1>
                    <p class="text-xl text-white">TREAT YOURSELF THIS NEW YEAR'S EVE TO FANTASTIC FOOD AND FUN.</p>

                    

                    <button class="text-black flex justify-start content-center mt-3 hover:text-black">
                        <a href="#" class="bg-white  w-32 h-10 flex items-center justify-center">
                            BOOK NOW
                        </a>
                    </button>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="relative w-full flex-shrink-0 h-[200px] md:h-[490px]">
                <img src="img/Bowl+of+soba+noodles+and+a+pair+of+chopsticks+on+a+white+tablecloth..jpeg" alt="Slide 3" class="w-full h-full object-cover ">
                <div
                    class="absolute inset-0 bg-black bg-opacity-15 flex flex-col justify-center items-center pl-14 h-[200px] md:h-[490px]">
                    <h1 class="text-5xl font-bold text-white uppercase mb-4">LUCKY CAT FESTIVE TREATS</h1>
                    <p class="text-xl text-white">JOIN US TO CELEBRATE THE FESTIVE SEASON.</p>

                    

                    <button class="text-black flex justify-start content-center mt-3 hover:text-black">
                        <a href="#" class="bg-white w-32 h-10 flex items-center justify-center">
                            BUY NOW
                        </a>
                    </button>
                </div>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <button data-carousel-button="prev"
            class="absolute top-1/2 left-4 transform -translate-y-1/2 text-white  text-[100px] p-3 hover:transform hover:scale-110  transition duration-300">
            ‹
        </button>
        <button data-carousel-button="next"
            class="absolute top-1/2 right-4 transform -translate-y-1/2 text-white  text-[100px] p-3 hover:transform hover:scale-110  transition duration-300">
            ›
        </button>
    </div>
    

    <main class="container mx-auto px-6 ">
        

        <section class="mb-12">
            <h2 class="text-3xl font-bold text-gray-800 uppercase mb-4 text-center">About Us</h2>
            <p class="text-xl text-gray-600 text-center mb-8">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
            <div class="flex flex-wrap justify-center">
                <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                    <div class="bg-white p-6 rounded shadow-md">
                        <h3 class="text-xl font-bold text-gray-800 uppercase mb-2">Traditional & Modern</h3>
                        <p class="text-gray-600">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                        <a href="#" class="inline-block mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">En savoir plus</a>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                    <div class="bg-white p-6 rounded shadow-md">
                        <h3 class="text-xl font-bold text-gray-800 uppercase mb-2">Healthy Food</h3>
                        <p class="text-gray-600">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                        <a href="#" class="inline-block mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">En savoir plus</a>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                    <div class="bg-white p-6 rounded shadow-md">
                        <h3 class="text-xl font-bold text-gray-800 uppercase mb-2">Our Special</h3>
                        <p class="text-gray-600">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                        <a href="#" class="inline-block mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">En savoir plus</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 uppercase mb-4">Our Menu</h2>
            <div class="flex flex-wrap justify-center">
                <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                    <div class="bg-white p-6 rounded shadow-md">
                        <h3 class="text-xl font-bold text-gray-800 uppercase mb-2">Fines Tartare Steak</h3>
                        <p class="text-gray-600">$50</p>
                        <a href="#" class="inline-block mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Commander</a>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                    <div class="bg-white p-6 rounded shadow-md">
                        <h3 class="text-xl font-bold text-gray-800 uppercase mb-2">Creamy Chicken Soup</h3>
                        <p class="text-gray-600">$40</p>
                        <a href="#" class="inline-block mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Commander</a>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                    <div class="bg-white p-6 rounded shadow-md">
                        <h3 class="text-xl font-bold text-gray-800 uppercase mb-2">Boiled Eggs on Toast</h3>
                        <p class="text-gray-600">$10</p>
                        <a href="#" class="inline-block mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Commander</a>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                    <div class="bg-white p-6 rounded shadow-md">
                        <h3 class="text-xl font-bold text-gray-800 uppercase mb-2">Best Roasted Rumsteak</h3>
                        <p class="text-gray-600">$30</p>
                        <a href="#" class="inline-block mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Commander</a>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                    <div class="bg-white p-6 rounded shadow-md">
                        <h3 class="text-xl font-bold text-gray-800 uppercase mb-2">Risotto & Mushrooms</h3>
                        <p class="text-gray-600">$20</p>
                        <a href="#" class="inline-block mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Commander</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="relative bg-customCream">
        <div class="absolute inset-0 bg-cover bg-center " style="background-image: url('image/__.jpeg');">
            <div class="absolute inset-0 backdrop-blur-sm bg-black bg-opacity-30"></div>
        </div>
        <!-- top footer -->
        <section class="relative z-5 flex flex-col md:flex-row items-center justify-between px-8 md:px-40 mb-5">
            <img src="img/cuisine_logo-removebg-preview.png" width="100" alt="logo" >
            <div class="text-white">
                <h3 class="text-2xl font-semibold fontsinista">Follow us</h3>
                <div class="flex space-x-4">
                    <a href="#"><i class='bx bxl-facebook-circle'></i></a>
                    <a href="#"><i class='bx bxl-pinterest'></i></a>
                    <a href="#"><i class='bx bxl-whatsapp'></i></a>
                    <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                </div>
            </div>
        </section>
        <div class="px-10">
            <hr class="border-t border-white opacity-80">
        </div>
    
        <!-- footer-body -->
        <section class="relative z-5  flex flex-col md:flex-row justify-between gap-10 sm:gap-20 px-14 py-10">
            <div class="flex flex-col sm:flex-row gap-10 md:gap-20 w-full">
                <div>
                    <h3 class="text-2xl font-semibold fontsinista mb-3 text-white">BLOC</h3>
                    <div class="text-2xl">
                        <div><a href="#" class="text-gray-700 hover:text-white">Home</a></div>
                        <div><a href="#" class="text-gray-700 hover:text-white">Favoris</a></div>
                        <div><a href="#" class="text-gray-700 hover:text-white">Modéles</a></div>
                        <div><a href="#" class="text-gray-700 hover:text-white">Services</a></div>
                        <div><a href="#" class="text-gray-700 hover:text-white">More</a></div>
                    </div>
                </div>
                <div>
                    <h3 class="text-2xl font-semibold fontsinista mb-3 text-white">ABOUT-US</h3>
                    <div class="text-2xl">
                        <p>(123) 456-7891</p>
                        <a href="#" class="text-gray-700 hover:text-white">BITEFOOD@gmail.co</a>
                        <p>Hay jerifate, Safi, Bouzid</p>
                        <div><a href="#" class="text-gray-700 hover:text-white">Careers</a></div>
                        <div><a href="#" class="text-gray-700 hover:text-white">Community</a></div>
                        <div><a href="#" class="text-gray-700 hover:text-white">Company</a></div>
                    </div>
                </div>
                
            </div>
            <div class="flex flex-col sm:flex-row gap-10 md:gap-10 sm:gap-4 w-full">
                <div>
                    <h3 class="text-2xl font-semibold fontsinista mb-3 text-white">DISCLAIMER</h3>
                    <div  class="text-2xl">
                        <p>Acess apps</p>
                        <a href="#" class="text-gray-700 hover:text-white">BITEFOOD@gmail.co</a>
                        <p>Dreaming Desktop</p>
                        <p>On the clouds</p>
                    </div>
                </div>
                <div>
                    <h3 class="text-2xl font-semibold fontsinista mb-3 text-white">SHOP</h3>
                    <div class="text-2xl">
                        <div><a href="#" class="text-gray-700 hover:text-white">Contact us</a></div>
                        <p>Subscribe</p>
                        <div><a href="#" class="text-gray-700 hover:text-white">Profil</a></div>
                    </div>
                </div>
                
            </div>
            
        </section>
        <div class="px-10">
            <hr class="border-t border-white opacity-80">
        </div>
    
        <!-- footer-bottom -->
        <div class="text-center py-10">
            <p class="relative z-5 text-lg text-gray-700 fontsinista font-semibold">© 2024 Codebenders. All rights reserved.</p>
        </div>
    </footer>
     
    <script src="scripts.js"></script>
    <script src="menu.js"></script>
</body>
</html>
