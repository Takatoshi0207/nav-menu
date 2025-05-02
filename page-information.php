<?php
/* Template Name: お知らせ */
get_header();
?>
<div class="relative w-full border-solid border-b-4 border-b-[#FCCC78]">
  <img
    class="w-full aspect-[3/1] object-cover"
    src="<?php echo get_stylesheet_directory_uri(); ?>/images/mv-info.webp"
    alt="mv-info">
  <!-- 薄暗いオーバーレイ -->
  <div class="absolute inset-0 bg-[#0000004a]"></div>
  <!-- 文字-->
  <div class="absolute inset-0 flex flex-col items-center justify-center animate-fade-up animate-twice ">
    <h2 class="text-3xl !text-white font-bold mb-4">
      <?php echo strtoupper(get_post_field('post_name', get_post())); ?>
    </h2>
    <h1 class="md:!text-6xl !text-4xl !text-white font-extrabold mb-6 inline"><?php the_title(); ?></h1>
  </div>
</div>
<div class="
    bg-[url('<?php echo get_stylesheet_directory_uri(); ?>/images/bgImage.webp')] 
    bg-cover bg-center bg-repeat  flex justify-center
    ">

  <!-- コンテンツ -->
  <div class="bg-white w-3/4 px-8 py-12 space-y-8">
    <?php
    $news = new WP_Query([
      'post_type'      => 'post',
      'posts_per_page' => 5,
      'orderby'        => 'date',
      'order'          => 'DESC',
    ]);

    if ($news->have_posts()):
      while ($news->have_posts()) : $news->the_post();
        $i = $news->current_post; // 0 始まりのインデックス

        /*** 1件目：フィーチャー表示 ***/
        if (0 === $i):
          echo '<div class="flex gap-6 w-full">';
    ?>
          <article class="overflow-hidden rounded-lg shadow-md">
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail('large', ['class' => 'w-full h-64 object-cover']); ?>
              <div class="p-4">
                <h2 class="text-2xl font-bold"><?php the_title(); ?></h2>
                <p class="text-gray-500 mt-1"><?php echo get_the_date('Y/m/d'); ?></p>
              </div>
            </a>
          </article>

          <!-- 2・3件目：2カラムグリッド -->
        <?php elseif (1 === $i || 2 === $i):

          // 2件目（$i===1）のタイミングでグリッドを開く
          if (1 === $i):
            echo '<ul class="flex-1 space-y-4">';
          endif;
        ?>
          <li class="flex place-items-stretch w-full border-l-4 border-gray-100 pl-4">
            <a href="<?php the_permalink(); ?>" class="flex-shrink-0 w-[200px] aspect-[1/1] overflow-hidden">
              <?php the_post_thumbnail('thumbnail', ['class' => 'w-full object-cover']); ?>
            </a>
            <div class="mx-4 mt-4 flex flex-1 flex-col justify-between">
              <div>
                <p class="text-gray-500 text-xl"><?php echo get_the_date('Y/m/d'); ?></p>
                <h4 class="text-[#090914] text-2xl font-medium hover:underline"><?php the_title(); ?></h4>
              </div>
              <button class="ml-auto bg-black w-[60px] h-[24px] flex items-center justify-center">
                <img
                  src="<?php echo get_stylesheet_directory_uri(); ?>/svg/right_arrow.svg"
                  alt="→"
                  class="w-5 h-5 filter invert">
              </button>
            </div>
          </li>
          <?php
          // 3件目（$i===2）のタイミングでグリッドを閉じ、リストを開く
          if (2 === $i):
            echo '</div>';                   // grid 終了
            echo '<ul class="mt-8 space-y-4">'; // list 開始
          endif;

          /*** 4件目以降：リスト表示 ***/
        else: ?>
          <li class="flex items-center border-l-4 border-gray-100 pl-4">
            <a href="<?php the_permalink(); ?>" class="flex-shrink-0 w-24 h-16 overflow-hidden">
              <?php the_post_thumbnail('thumbnail', ['class' => 'w-full h-full object-cover']); ?>
            </a>
            <div class="ml-4">
              <h4 class="text-lg font-medium hover:underline"><?php the_title(); ?></h4>
              <p class="text-gray-500 text-sm"><?php echo get_the_date('Y/m/d'); ?></p>
            </div>
          </li>
    <?php endif;

      endwhile;

      // もし4件目以降のリストを開いたなら、必ず閉じる
      if ($news->post_count > 3) {
        echo '</ul>';
      }

      wp_reset_postdata();

    else:
      echo '<p class="text-center py-16 text-gray-600 text-xl">お知らせはありません。</p>';
    endif;
    ?>
  </div>
  <?php get_footer(); ?>
  <script src="https://cdn.tailwindcss.com">
  </script>