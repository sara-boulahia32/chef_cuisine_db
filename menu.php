<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'client') {
    header("Location: login.php");
    exit();
}
?>


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
                
                <a href="index.php" class="font-bold text-white lg:text-lg p-2 hover:bg-gray-700">Menu</a>
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
      


      
    <section class="bg-white lg:px-40 mt-10">
    <div class="mt-5 text-center lg:flex "> <a href="#"
            class="fontsinista px-3 md:py-1 mb-2 mx-auto font-semibold text-4xl ">Asiatic menu</a>
    </div>
    <div class=" w-full lg:hidden ">
        <div>
            <div class="flex justify-end gap-3 items-center pt-6">

                <button id="prev" class="text-2xl text-[#A66D2E80]"><i class="fa-solid fa-less-than "></i></button>

                <button id="next" class="text-2xl text-[#A66D2E80]"><i class="fa-solid fa-greater-than"></i></button>
            </div>

        </div>
        <div class="flex justify-center items-center h-full ">
            <div class="relative w-80 overflow-hidden max-w-md">
                <div class="flex items-center justify-between absolute top-0 z-10 p-4">

                </div>
                <div id="carousel" class="flex ">
                    <div class="min-w-full">
                        <img src="img/Chicken_dumplings_in_broth_with_noodles_and_chilli_oil_1000x.webp" alt="Image 1" class="w-full">
                        <div class="flex justify-between text-center font-semibold mx-4">
                            <p class="">Chicken dumplings</p>
                            <p>183.5$ </p>
                            <button class="text-black flex justify-start content-center mt-3 hover:text-black mx-4">
                    <a href="#" class="bg-white border border-black  w-32 h-10 flex items-center justify-center mx-4">
                        BOOK NOW
                    </a>
                </button>
                    </button>
                        </div>
                    </div>
                    <div class="min-w-full">
                        <img src="img/advocaat_2_1000x.webp" alt="Image 2" class="w-full">
                        <div class="flex justify-between text-center font-semibold mx-4">
                            <p class="text-center">Lasagna blue cheese</p>
                            <p>39.5$ </p>
                            <button class="text-black flex justify-start content-center mt-3 hover:text-black">
                    <a href="#" class="bg-white border border-black  w-32 h-10 flex items-center justify-center">
                        BOOK NOW
                    </a>
                </button>
                        </div>
                    </div>
                    <div class="min-w-full">
                        <img src="img/Biscuits.webp" alt="Image 3" class="w-full">
                        <div class="flex justify-between text-center font-semibold mx-4">
                            <p class="text-center">Green soop purpple onions</p>
                            <p>67.5$ </p>
                        </div>
                        <button class="text-black flex justify-start content-center mt-3 hover:text-black">
                    <a href="#" class="bg-white border border-black  w-32 h-10 flex items-center justify-center">
                        BOOK NOW
                    </a>
                </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>


    

    <section class=" hidden lg:block bg-white lg:px-40 mt-10 ">
        <div class="lg:shadow grid grid-cols-4 mt-5 bg-[#A66D2E0D] h-[400px] justify-center">

            <!--the card-->
            <div class="flex flex-col  justify-center">
                <div class="">
                    <img src="img/Chicken_dumplings_in_broth_with_noodles_and_chilli_oil_1000x.webp" class="shadow ml-4 w-[350px]" alt="">
                </div>
                <div>
                    <p class="font-semibold ml-4 ">Chicken dumplings<br>80 $</p>
                </div>
                <button class="text-black flex justify-start content-center mt-3 hover:text-black">
                    <a href="#" class="bg-white border border-black  w-32 h-10 flex items-center justify-center">
                        BOOK NOW
                    </a>
                </button>

            </div>
            <!--the card-->
            <div class="flex flex-col  justify-center">
                <div class="">
                    <img src="img/panettone_3_1000x.webp" class="shadow ml-4 w-[350px]" alt="">
                </div>
                <div>
                    <p class="font-semibold ml-4 ">Lasagna blue cheese<br>39.5 $</p>
                </div>
                <button class="text-black flex justify-start content-center mt-3 hover:text-black">
                    <a href="#" class="bg-white border border-black  w-32 h-10 flex items-center justify-center">
                        BOOK NOW
                    </a>
                </button>

            </div>
            <!--the card-->
            <div class="flex flex-col  justify-center">
                <div class="">
                    <img src="img/Fricassee_tuna_melt_1000x.webp" class="shadow ml-4 w-[350px]" alt="">
                </div>
                <div>
                    <p class="font-semibold ml-4 ">Xeese and tuna sandwich<br>67,78 $</p>
                </div>
                <button class="text-black flex justify-start content-center mt-3 hover:text-black">
                    <a href="#" class="bg-white border border-black  w-32 h-10 flex items-center justify-center">
                        BOOK NOW
                    </a>
                </button>

            </div>
            <!--the card-->
            <div class="flex flex-col  justify-center">
                <div class="">
                    <img src="img/Fresh_turmeric_and_peppercorn_curry_with_prawns_and_asparagus_1000x.webp" class="shadow ml-4 w-[350px]" alt="">
                </div>
                <div class="">
                    <p class="font-semibold  ml-7">Green soup purpple onions<br>150 $</p>
                </div>
                <button class="text-black flex justify-start content-center mt-3 hover:text-black">
                    <a href="#" class="bg-white border border-black  w-32 h-10 flex items-center justify-center">
                        BOOK NOW
                    </a>
                </button>

            </div>
           


        </div>

    </section>
    
    <section class="bg-white lg:px-40 mt-10">
    <div class="mt-5 text-center lg:flex "> <a href="#"
            class="px-3 md:py-1 mb-2 mx-auto font-semibold text-4xl ">Italian menu</a>
    </div>
    <div class=" w-full lg:hidden ">
        <div>
            <div class="flex justify-end gap-3 items-center pt-6">

                <button id="prev" class="text-2xl text-[#A66D2E80]"><i class="fa-solid fa-less-than "></i></button>

                <button id="next" class="text-2xl text-[#A66D2E80]"><i class="fa-solid fa-greater-than"></i></button>
            </div>

        </div>
        <div class="flex justify-center items-center h-full ">
            <div class="relative w-80 overflow-hidden max-w-md">
                <div class="flex items-center justify-between absolute top-0 z-10 p-4">

                </div>
                <div id="carousel" class="flex ">
                    <div class="min-w-full">
                        <img src="img/Chicken_dumplings_in_broth_with_noodles_and_chilli_oil_1000x.webp" alt="Image 1" class="w-full">
                        <div class="flex justify-between text-center font-semibold mx-4">
                            <p class="">Chicken dumplings</p>
                            <p>183.5$ </p>
                            <button class="text-black flex justify-start content-center mt-3 hover:text-black">
                    <a href="#" class="bg-white border border-black  w-32 h-10 flex items-center justify-center">
                        BOOK NOW
                    </a>
                </button>
                        </div>
                    </div>
                    <div class="min-w-full">
                        <img src="img/advocaat_2_1000x.webp" alt="Image 2" class="w-full">
                        <div class="flex justify-between text-center font-semibold mx-4">
                            <p class="text-center">Lasagna blue cheese</p>
                            <p>39.5$ </p>
                            <button class="text-black flex justify-start content-center mt-3 hover:text-black">
                    <a href="#" class="bg-white border border-black  w-32 h-10 flex items-center justify-center">
                        BOOK NOW
                    </a>
                </button>
                        </div>
                    </div>
                    <div class="min-w-full">
                        <img src="img/Biscuits.webp" alt="Image 3" class="w-full">
                        <div class="flex justify-between text-center font-semibold mx-4">
                            <p class="text-center">Green soop purpple onions</p>
                            <p>67.5$ </p>
                        </div>
                        <button class="text-black flex justify-start content-center mt-3 hover:text-black">
                    <a href="#" class="bg-white border border-black  w-32 h-10 flex items-center justify-center">
                        BOOK NOW
                    </a>
                </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>


    

    <section class=" hidden lg:block bg-white lg:px-40 mt-10 ">
        <div class="lg:shadow grid grid-cols-4 mt-5 bg-[#A66D2E0D] h-[400px] justify-center">

            <!--the card-->
            <div class="flex flex-col  justify-center">
                <div class="">
                    <img src="img/Chicken_dumplings_in_broth_with_noodles_and_chilli_oil_1000x.webp" class="shadow ml-4 w-[350px]" alt="">
                </div>
                <div>
                    <p class="font-semibold ml-4 ">Chicken dumplings<br>80 $</p>
                </div>
                <button class="text-black flex justify-start content-center mt-3 hover:text-black">
                    <a href="#" class="bg-white border border-black  w-32 h-10 flex items-center justify-center">
                        BOOK NOW
                    </a>
                </button>

            </div>
            <!--the card-->
            <div class="flex flex-col  justify-center">
                <div class="">
                    <img src="img/panettone_3_1000x.webp" class="shadow ml-4 w-[350px]" alt="">
                </div>
                <div>
                    <p class="font-semibold ml-4 ">Lasagna blue cheese<br>39.5 $</p>
                </div>
                <button class="text-black flex justify-start content-center mt-3 hover:text-black">
                    <a href="#" class="bg-white border border-black  w-32 h-10 flex items-center justify-center">
                        BOOK NOW
                    </a>
                </button>

            </div>
            <!--the card-->
            <div class="flex flex-col  justify-center">
                <div class="">
                    <img src="img/Fricassee_tuna_melt_1000x.webp" class="shadow ml-4 w-[350px]" alt="">
                </div>
                <div>
                    <p class="font-semibold ml-4 ">Xeese and tuna sandwich<br>67,78 $</p>
                </div>
                <button class="text-black flex justify-start content-center mt-3 hover:text-black">
                    <a href="#" class="bg-white border border-black  w-32 h-10 flex items-center justify-center">
                        BOOK NOW
                    </a>
                </button>

            </div>
            <!--the card-->
            <div class="flex flex-col  justify-center">
                <div class="">
                    <img src="img/Fresh_turmeric_and_peppercorn_curry_with_prawns_and_asparagus_1000x.webp" class="shadow ml-4 w-[350px]" alt="">
                </div>
                <div class="">
                    <p class="font-semibold  ml-7">Green soup purpple onions<br>150 $</p>
                </div>
                <button class="text-black flex justify-start content-center mt-3 hover:text-black">
                    <a href="#" class="bg-white border border-black  w-32 h-10 flex items-center justify-center">
                        BOOK NOW
                    </a>
                </button>

            </div>
           


        </div>

    </section>
    
    <section class="bg-white lg:px-40 mt-10">
    <div class="mt-5 text-center lg:flex "> <a href="#"
            class="px-3 md:py-1 mb-2 mx-auto font-semibold text-4xl ">Mexican menu</a>
    </div>
    <div class=" w-full lg:hidden ">
        <div>
            <div class="flex justify-end gap-3 items-center pt-6">

                <button id="prev" class="text-2xl text-[#A66D2E80]"><i class="fa-solid fa-less-than "></i></button>

                <button id="next" class="text-2xl text-[#A66D2E80]"><i class="fa-solid fa-greater-than"></i></button>
            </div>

        </div>
        <div class="flex justify-center items-center h-full ">
            <div class="relative w-80 overflow-hidden max-w-md">
                <div class="flex items-center justify-between absolute top-0 z-10 p-4">

                </div>
                <div id="carousel" class="flex ">
                    <div class="min-w-full">
                        <img src="img/Chicken_dumplings_in_broth_with_noodles_and_chilli_oil_1000x.webp" alt="Image 1" class="w-full">
                        <div class="flex justify-between text-center font-semibold mx-4">
                            <p class="">Chicken dumplings</p>
                            <p>183.5$ </p>
                            <button class="text-black flex justify-start content-center mt-3 hover:text-black">
                    <a href="#" class="bg-white border border-black  w-32 h-10 flex items-center justify-center">
                        BOOK NOW
                    </a>
                </button>
                        </div>
                    </div>
                    <div class="min-w-full">
                        <img src="img/panettone_3_1000x.webp" alt="Image 2" class="w-full">
                        <div class="flex justify-between text-center font-semibold mx-4">
                            <p class="text-center">Lasagna blue cheese</p>
                            <p>39.5$ </p>
                            <button class="text-black flex justify-start content-center mt-3 hover:text-black">
                    <a href="#" class="bg-white border border-black  w-32 h-10 flex items-center justify-center">
                        BOOK NOW
                    </a>
                </button>
                        </div>
                    </div>
                    <div class="min-w-full">
                        <img src="img/panettone_3_1000x.webp" alt="Image 3" class="w-full">
                        <div class="flex justify-between text-center font-semibold mx-4">
                            <p class="text-center">Green soop purpple onions</p>
                            <p>67.5$ </p>
                        </div>
                        <button class="text-black flex justify-start content-center mt-3 hover:text-black">
                    <a href="#" class="bg-white border border-black  w-32 h-10 flex items-center justify-center">
                        BOOK NOW
                    </a>
                </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>


    

    <section class=" hidden lg:block bg-white lg:px-40 mt-10 ">
        <div class="lg:shadow grid grid-cols-4 mt-5 bg-[#A66D2E0D] h-[400px] justify-center">

            <!--the card-->
            <div class="flex flex-col  justify-center">
                <div class="">
                    <img src="img/Chicken_dumplings_in_broth_with_noodles_and_chilli_oil_1000x.webp" class="shadow ml-4 w-[350px]" alt="">
                </div>
                <div>
                    <p class="font-semibold ml-4 ">Chicken dumplings<br>80 $</p>
                </div>
                <button class="text-black flex justify-start content-center mt-3 hover:text-black">
                    <a href="#" class="bg-white border border-black  w-32 h-10 flex items-center justify-center">
                        BOOK NOW
                    </a>
                </button>

            </div>
            <!--the card-->
            <div class="flex flex-col  justify-center">
                <div class="">
                    <img src="img/panettone_3_1000x.webp" class="shadow ml-4 w-[350px]" alt="">
                </div>
                <div>
                    <p class="font-semibold ml-4 ">Lasagna blue cheese<br>39.5 $</p>
                </div>
                <button class="text-black flex justify-start content-center mt-3 hover:text-black">
                    <a href="#" class="bg-white border border-black  w-32 h-10 flex items-center justify-center">
                        BOOK NOW
                    </a>
                </button>

            </div>
            <!--the card-->
            <div class="flex flex-col  justify-center">
                <div class="">
                    <img src="img/Fricassee_tuna_melt_1000x.webp" class="shadow ml-4 w-[350px]" alt="">
                </div>
                <div>
                    <p class="font-semibold ml-4 ">Xeese and tuna sandwich<br>67,78 $</p>
                </div>
                <button class="text-black flex justify-start content-center mt-3 hover:text-black">
                    <a href="#" class="bg-white border border-black  w-32 h-10 flex items-center justify-center">
                        BOOK NOW
                    </a>
                </button>

            </div>
            <!--the card-->
            <div class="flex flex-col  justify-center">
                <div class="">
                    <img src="img/Fresh_turmeric_and_peppercorn_curry_with_prawns_and_asparagus_1000x.webp" class="shadow ml-4 w-[350px]" alt="">
                </div>
                <div class="">
                    <p class="font-semibold  ml-7">Green soup purpple onions<br>150 $</p>
                </div>
                <button class="text-black flex justify-start content-center mt-3 hover:text-black">
                    <a href="#" class="bg-white border border-black  w-32 h-10 flex items-center justify-center">
                        BOOK NOW
                    </a>
                </button>

            </div>
           


        </div>

    </section>
    
    <section class="bg-white lg:px-40 mt-10">
    <div class="mt-5 text-center lg:flex "> <a href="#"
            class="px-3 md:py-1 mb-2 mx-auto font-semibold text-4xl ">Moroccan menu</a>
    </div>
    <div class=" w-full lg:hidden ">
        <div>
            <div class="flex justify-end gap-3 items-center pt-6">

                <button id="prev" class="text-2xl text-[#A66D2E80]"><i class="fa-solid fa-less-than "></i></button>

                <button id="next" class="text-2xl text-[#A66D2E80]"><i class="fa-solid fa-greater-than"></i></button>
            </div>

        </div>
        <div class="flex justify-center items-center h-full ">
            <div class="relative w-80 overflow-hidden max-w-md">
                <div class="flex items-center justify-between absolute top-0 z-10 p-4">

                </div>
                <div id="carousel" class="flex ">
                    <div class="min-w-full">
                        <img src="img/Chicken_dumplings_in_broth_with_noodles_and_chilli_oil_1000x.webp" alt="Image 1" class="w-full">
                        <div class="flex justify-between text-center font-semibold mx-4">
                            <p class="">Chicken dumplings</p>
                            <p>183.5$ </p>
                            <button class="text-black flex justify-start content-center mt-3 hover:text-black">
                    <a href="#" class="bg-white border border-black  w-32 h-10 flex items-center justify-center">
                        BOOK NOW
                    </a>
                </button>
                    </button>
                        </div>
                    </div>
                    <div class="min-w-full">
                        <img src="img/advocaat_2_1000x.webp" alt="Image 2" class="w-full">
                        <div class="flex justify-between text-center font-semibold mx-4">
                            <p class="text-center">Lasagna blue cheese</p>
                            <p>39.5$ </p>
                            <button class="text-black flex justify-start content-center mt-3 hover:text-black">
                    <a href="#" class="bg-white border border-black  w-32 h-10 flex items-center justify-center">
                        BOOK NOW
                    </a>
                </button>
                        </div>
                    </div>
                    <div class="min-w-full">
                        <img src="img/Biscuits.webp" alt="Image 3" class="w-full">
                        <div class="flex justify-between text-center font-semibold mx-4">
                            <p class="text-center">Green soop purpple onions</p>
                            <p>67.5$ </p>
                        </div>
                        <button class="text-black flex justify-start content-center mt-3 hover:text-black">
                    <a href="#" class="bg-white border border-black  w-32 h-10 flex items-center justify-center">
                        BOOK NOW
                    </a>
                </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>


    

    <section class=" hidden lg:block bg-white lg:px-40 mt-10 ">
        <div class="lg:shadow grid grid-cols-4 mt-5 bg-[#A66D2E0D] h-[400px] justify-center">

            <!--the card-->
            <div class="flex flex-col  justify-center">
                <div class="">
                    <img src="img/Chicken_dumplings_in_broth_with_noodles_and_chilli_oil_1000x.webp" class="shadow ml-4 w-[350px]" alt="">
                </div>
                <div>
                    <p class="font-semibold ml-4 ">Chicken dumplings<br>80 $</p>
                </div>
                <button class="text-black flex justify-start content-center mt-3 hover:text-black">
                    <a href="#" class="bg-white border border-black  w-32 h-10 flex items-center justify-center">
                        BOOK NOW
                    </a>
                </button>

            </div>
            <!--the card-->
            <div class="flex flex-col  justify-center">
                <div class="">
                    <img src="img/panettone_3_1000x.webp" class="shadow ml-4 w-[350px]" alt="">
                </div>
                <div>
                    <p class="font-semibold ml-4 ">Lasagna blue cheese<br>39.5 $</p>
                </div>
                <button class="text-black flex justify-start content-center mt-3 hover:text-black">
                    <a href="#" class="bg-white border border-black  w-32 h-10 flex items-center justify-center">
                        BOOK NOW
                    </a>
                </button>

            </div>
            <!--the card-->
            <div class="flex flex-col  justify-center">
                <div class="">
                    <img src="img/Fricassee_tuna_melt_1000x.webp" class="shadow ml-4 w-[350px]" alt="">
                </div>
                <div>
                    <p class="font-semibold ml-4 ">Xeese and tuna sandwich<br>67,78 $</p>
                </div>
                <button class="text-black flex justify-start content-center mt-3 hover:text-black">
                    <a href="#" class="bg-white border border-black  w-32 h-10 flex items-center justify-center">
                        BOOK NOW
                    </a>
                </button>

            </div>
            <!--the card-->
            <div class="flex flex-col  justify-center">
                <div class="">
                    <img src="img/Fresh_turmeric_and_peppercorn_curry_with_prawns_and_asparagus_1000x.webp" class="shadow ml-4 w-[350px]" alt="">
                </div>
                <div class="">
                    <p class="font-semibold  ml-7">Green soup purpple onions<br>150 $</p>
                </div>
                <button class="text-black flex justify-start content-center mt-3 hover:text-black">
                    <a href="#" class="bg-white border border-black  w-32 h-10 flex items-center justify-center">
                        BOOK NOW
                    </a>
                </button>

            </div>
           


        </div>

    </section>
    

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
