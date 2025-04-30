<?php
/* Template Name: お知らせ */
get_header();
?>
<div class="bg-white w-full">
  <div class="w-full">
    <img class="w-full aspect-[3/1] object-cover" src="<?php echo get_stylesheet_directory_uri(); ?>/images/mv-info.webp" alt="mv-info">
    <h2 class="text-3xl font-bold mb-6"><?php echo strtoupper(get_post_field('post_name', get_post())); ?></h2>
    <h1 class="text-3xl font-bold mb-6"><?php the_title(); ?></h1>
  </div>
  <main class="mx-auto max-w-3xl p-6">

    <?php
    $news = new WP_Query(['post_type' => 'post', 'posts_per_page' => 5]);
    if ($news->have_posts()):
      echo '<ul class="space-y-4">';
      while ($news->have_posts()): $news->the_post(); ?>
        <li class="border-l-4 border-sky-500 pl-4">
          <a class="text-lg font-medium hover:underline" href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
          </a>
          <p class="text-sm text-gray-500"><?php the_time('Y/m/d'); ?></p>
        </li>
    <?php endwhile;
      echo '</ul>';
      wp_reset_postdata();
    else:
      echo '<p class="text-center text-gray-600">お知らせはありません。</p>';
    endif;
    ?>
  </main>
</div>
<?php get_footer(); ?>