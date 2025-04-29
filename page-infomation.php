<?php
/* Template Name: お知らせ */
get_header(); ?>
<main class="mx-auto max-w-3xl p-6">
  <h1 class="text-3xl font-bold mb-6"><?php the_title(); ?></h1>

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
    echo '<p class="text-base text-red-600">お知らせはありません!!</p>';
  endif;
  ?>
</main>
<?php get_footer(); ?>