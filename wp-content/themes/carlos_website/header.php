<!DOCTYPE html>
<html lang="pt-br" class='font-poppins'>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/wp-content/themes/carlos_website/style.css">
    <?php wp_head() ?>
</head>

<body class='bg-background'>
    <header class='mb-16 pt-8 px-8 pb-4 flex justify-between items-center text-white border-b-2 border-light-grey'>
        <a href=<?php echo home_url() ?>>
            <h2 class='select-none text-xl leading-none md:text-2xl font-bold'>Carlos
                <span class='text-primary-carlos'>
                    Miranda
                </span>
            </h2>
        </a>
        <!-- BURGUER BUTTON -->
        <button id='burguerButton' class='md:hidden hover:bg-background-black p-1 rounded'>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-14">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>
        <!-- BURGUER BUTTON -->

        <div class='hidden md:flex items-center gap-6'>
            <?php wp_nav_menu(
                array(
                    'theme_location' => 'header-menu',
                    'container' => 'nav',
                    'menu_class' => 'flex gap-2',
                    'link_class' => 'text-base py-2 px-3 hover:bg-background-black rounded'
                ));
            ?>

            <section class='flex items-center gap-4'>
                <a class='hover:bg-background-black p-1 rounded' href='https://github.com/CarlosERM' target="_blank"
                    rel="noopener noreferrer">
                    <img src='/wp-content/themes/carlos_website/icons/github_white.svg' />
                </a>
                <a class='hover:bg-background-black p-1 rounded' href='https://www.linkedin.com/in/carloserm/'
                    target="_blank" rel="noopener noreferrer">
                    <img src='/wp-content/themes/carlos_website/icons/linkedin_white.png' />
                </a>
                <ul class='flex gap-4 list-none'>
                    <?php pll_the_languages( array( 'show_flags' => 1, 'show_names' => 0 ) ); ?>
                </ul>
            </section>
        </div>
    </header>
    <!-- MODAL -->
    <div id='modal'
        class='hidden flex flex-col-reverse w-screen h-screen fixed top-0 right-0 text-white bg-background p-4 z-50'>
        <section class='flex items-center justify-center gap-4'>
            <!-- CLOSE BUTTON -->
            <button id='closeButton' class='absolute top-8 right-8 hover:bg-background-black p-1 rounded'>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-14">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
            <!-- CLOSE BUTTON -->
            <a class='hover:bg-background-black p-1 rounded' href='https://github.com/CarlosERM' target="_blank"
                rel="noopener noreferrer">
                <img src='/wp-content/themes/carlos_website/icons/github_white.svg' />
            </a>
            <!-- <button class='hover:bg-background-black p-1 rounded'>
                <img src='/wp-content/themes/carlos_website/icons/language_white.svg' />
            </button>
            <button class='hover:bg-background-black p-1 rounded'>
                <img src='/wp-content/themes/carlos_website/icons/light.svg' />
            </button> -->
            <a class='hover:bg-background-black p-1 rounded' href='https://www.linkedin.com/in/carloserm/'
                target="_blank" rel="noopener noreferrer">
                <img src='/wp-content/themes/carlos_website/icons/linkedin_white.png' />
            </a>
            <ul class='flex gap-4 list-none'>
                <?php  pll_the_languages( array( 'show_flags' => 1, 'show_names' => 0 ) ); ?>
            </ul>
        </section>
        <?php wp_nav_menu(
            array(
                'theme_location' => 'header-menu',
                'container' => 'nav',
                'container_class' => 'w-full h-full pt-4',
                'menu_class' => 'flex flex-col gap-5 items-center justify-center w-full h-full bg-background p-4',
                'link_class' => 'text-3xl py-2 px-3 hover:bg-background-black rounded'
            ));
        ?>
    </div>
    <!-- MODAL -->