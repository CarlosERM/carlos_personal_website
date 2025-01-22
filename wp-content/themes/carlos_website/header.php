<!DOCTYPE html>
<html lang="en" class='font-poppins'>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(''); ?> | <?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="/wp-content/themes/carlos_website/style.css">
    <?php
    wp_head()
    ?>
</head>

<body class='bg-background '>
    <header class='pt-8 px-8 pb-4 flex justify-between text-white'>
        <h2 class='text-2xl font-bold'>Carlos <span class='text-primary-carlos'>Miranda</span></h2>

        <button class='md:hidden'>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>

        <div class='hidden md:flex items-center gap-6'>
            <?php wp_nav_menu(
                array(
                    'theme_location' => 'header-menu',
                    'container' => 'nav',
                    'menu_class' => 'flex gap-2',
                    'list_item_class' => '',
                    'link_class' => 'text-base py-2 px-3 hover:bg-background-black rounded'
                ));
            ?>
            <section class='flex items-center gap-4'>
                <a class='hover:bg-background-black p-1 rounded' href='https://github.com/CarlosERM' target="_blank"
                    rel="noopener noreferrer">
                    <img src='/wp-content/themes/carlos_website/icons/github_white.svg' />
                </a>
                <button class='hover:bg-background-black p-1 rounded'>
                    <img src='/wp-content/themes/carlos_website/icons/language_white.svg' />
                </button>
                <button class='hover:bg-background-black p-1 rounded'>
                    <img src='/wp-content/themes/carlos_website/icons/light.svg' />
                </button>
                <a class='hover:bg-background-black p-1 rounded' href='https://www.linkedin.com/in/carloserm/'
                    target="_blank" rel="noopener noreferrer">
                    <img src='/wp-content/themes/carlos_website/icons/linkedin_white.png' />
                </a>
            </section>

        </div>
    </header>