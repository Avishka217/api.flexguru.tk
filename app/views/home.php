<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo SITENAME; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <style type="text/tailwindcss">
        * {
        font-family: "Poppins", sans-serif;
      }
      @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
      .container {
        @apply mx-auto px-4;
      }
      .btn {
        @apply shadow-md py-3 px-6 rounded-md transition duration-300;
      }

      .btn-purple {
        @apply bg-indigo-500 text-white;
      }

      .btn-white {
        @apply bg-gray-100 text-gray-600;
      }
    </style>
</head>

<body>
    <!-- Header  -->
    <header>
        <nav class="container flex items-center py-4 mt-4 sm:mt-12">
            <div class="py-1">
                <h1 class="text-indigo-500 text-2xl">Flexguru</h1>
            </div>
            <ul class="
            hidden
            sm:flex
            flex-1
            justify-end
            items-center
            gap-12
            text-gray-600
            uppercase
            text-xs
          ">
                <li class="cursor-pointer">Website</li>
                <li class="cursor-pointer">Services</li>
                <li class="cursor-pointer">Help</li>
                <li class="cursor-pointer">About</li>
                <button type="button" class="bg-indigo-500 text-white rounded-md px-7 py-3 uppercase">
                    Contact
                </button>
            </ul>
            <div class="flex sm:hidden flex-1 justify-end">
                <i class="text-2xl text-gray-600 fas fa-bars"></i>
            </div>
        </nav>
    </header>

    <!-- Hero  -->
    <section class="relative">
        <div class="
          container
          flex flex-col-reverse
          lg:flex-row
          items-center
          gap-12
          mt-14
          lg:mt-28
        ">
            <!-- Content  -->
            <div class="flex flex-1 flex-col items-center lg:items-start">
                <h2 class="
              text-indigo-500 text-3xl
              md:text-4
              lg:text-5xl
              text-center
              lg:text-left
              mb-6
            ">
                    Flexguru API Services
                </h2>
                <p class="text-gray-600 text-lg text-center lg:text-left mb-6">
                    Flexguru is a tutor freelancing platform where students can find the best tutors to fullfill their requirements in a much more flexible manner and provide a platform for enthusiastic tutors to distribute knowledge in whatever the area they are good at. Flexguru API gives you the information about tutors and students nearby and many more. </p>
                <div class="flex justify-center flex-wrap gap-6">
                    <button class="btn btn-purple hover:bg-gray-100 hover:text-gray-600" type="button">
                        Visit our website
                    </button>
                    <button class="btn btn-white hover:bg-indigo-500 hover:text-white" type="button">
                        Get it on your project
                    </button>
                </div>
            </div>
            <!-- Image -->
            <div class="flex justify-center flex-1 mb-10 md:mb-16 lg:mb-0 z-10">
                <img class="w-5/6 h-5/6 sm:w-3/4 sm:h-3/4 md:w-full md:h-full" src="<?php echo URLROOT . "/public/img/hero-bg.svg" ?>" alt="API Services">
            </div>
        </div>
        <!-- Rounded Rectangle  -->
        <div class="hidden md:block h-80 w-2/4 top-32 right-0 lg:-bottom-28 overflow-hidden bg-indigo-200 rounded-l-full absolute"></div>
    </section>

    <!-- Services -->
    <section class="bg-gray-100 py-20 mt-20 lg:mt-60">
        <!-- Heading -->
        <div class="sm:w-3/4 lg:w-5/12 mx-auto px-2">
            <h1 class="text-3xl text-center text-indigo-500">Services</h1>
            <p class="text-center text-gray-600 mt-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo tempore repellendus vel quae impedit, eligendi eius dolorem, excepturi rem necessitatibus quaerat veritatis repudiandae, consectetur hic.</p>
        </div>
        <!-- Service #1 -->
        <div class="relative mt-20 lg:mt-24">
            <div class="container flex flex-col lg:flex-row items-center justify-center gap-x-24">
                <!-- Image -->
                <div class="flex flex-1 justify-center z-10 mb-10 lg:mb-0">
                    <img class="w-5/6 h-5/6 sm:w-3/4 sm:h-3/4 md:w-full md:h-full" src="<?php echo URLROOT . "/public/img/services.svg" ?>" alt="Services">
                </div>
                <div class="flex flex-1 flex-col items-center lg:items-start">
                    <h1 class="text-3xl text-indigo-500 text-center">Educational information gallery</h1>
                    <p class="text-gray-600 my-4 text-center lg:text-left sm:w-3/4 lg:w-full">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis vitae, a assumenda qui distinctio possimus provident aut quia voluptatum necessitatibus nesciunt eius asperiores eos quidem.
                    </p>
                    <button class="btn btn-purple hover:bg-gray-100 hover:text-gray-600" type="button">
                        More Info
                    </button>
                </div>
                <!-- Rounded Rectangle  -->
                <div class="hidden lg:block h-80 w-2/4 -bottom-24 -left-36 overflow-hidden bg-indigo-200 rounded-r-full absolute"></div>

            </div>
        </div>

    </section>
</body>

</html>