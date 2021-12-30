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
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore beatae aut harum expedita pariatur molestias officia fuga? Quos, quod voluptatibus. Quod necessitatibus neque veniam impedit?
                </p>
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
        <div class="hidden md:block h-80 w-2/4 top-32 right-0 lg:-bottom-28 lg:-right-28 overflow-hidden bg-indigo-200 rounded-l-full absolute"></div>
    </section>
</body>

</html>