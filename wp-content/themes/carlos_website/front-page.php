<?php
/*
Template Name: Home
*/
get_header();
?>

<div class='w-4/5 mx-auto flex flex-col gap-8'>
    <h2 class='text-3xl font-bold text-white'>
        <?php the_title()?>
    </h2>

    <?php echo the_content()?>
    <hr />
    <hr />
</div>
<?php get_footer(); ?>