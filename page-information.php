<?php
/* Template Name: お知らせ */
get_header();
// ページ番号取得 
$paged = max(1, get_query_var('paged'), get_query_var('page'));
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

<!-- 背景 -->
<div class="
    bg-[url('<?php echo get_stylesheet_directory_uri(); ?>/images/bgImage.webp')] 
    bg-cover bg-center bg-repeat  flex justify-center
    ">

  <!-- コンテンツ -->
  <div class="bg-white w-[90%] lg:w-3/4 max-w-8xl px-4 lg:px-8 py-12 space-y-8">
    <?php
    $news = new WP_Query([
      'post_type'      => 'post',
      'posts_per_page' => 11,
      'orderby'        => 'date',
      'order'          => 'DESC',
      'paged'          => $paged,
    ]);

    if ($news->have_posts()):

      if (1 === $paged): //1ページ目

        while ($news->have_posts()) : $news->the_post();
          $i = $news->current_post; // 0 始まりのインデックス

          /*** 1件目：フィーチャー表示 ***/
          if (0 === $i):
            echo '<div class="md:flex gap-6 w-full py-10 2xl:justify-center">';
    ?>
            <article class="mb-16 md:mb-0 relative overflow-hidden max-w-3xl w-full md:w-1/3 aspect-square rounded-lg shadow-md">
              <a href="<?php the_permalink(); ?>" class="block">
                <!-- サムネイル -->
                <?php the_post_thumbnail('large', ['class' => 'absolute inset-0 w-full h-full object-cover']); ?>

                <!-- オーバーレイ -->
                <div class="absolute inset-0 bg-black bg-opacity-25"></div>

                <!-- ここに文字やボタンなども重ねてもOK -->
                <div class="absolute inset-0 flex flex-col justify-end p-4 text-white">
                  <p class="text-xl font-semibold"><?php echo get_the_date('Y/m/d'); ?></p>
                  <h2 class="text-3xl text-white font-bold"><?php the_title(); ?></h2>
                  <?php get_template_part('template-parts/button/arrow-button'); ?>
                </div>
              </a>
            </article>

            <!-- 2・3件目：2カラムグリッド -->
          <?php elseif (1 === $i || 2 === $i):

            // 2件目（$i===1）のタイミングでグリッドを開く
            if (1 === $i):
              echo '<ul class="space-y-4 max-w-3xl w-full md:w-2/3">';
            endif;
          ?>
            <li class="flex place-items-stretch w-full max-w-[750px] border-l-4 border-gray-100 pl-0 lg;pl-4">
              <a href="<?php the_permalink(); ?>" class="flex-shrink-0 w-1/3 md:w-[200px] aspect-[1/1] overflow-hidden flex items-center justify-center ">
                <?php the_post_thumbnail('thumbnail', ['class' => 'w-full object-cover rounded-lg shadow-md']); ?>
              </a>
              <div class="mx-4 mt-4 flex flex-1 flex-col justify-between">
                <div>
                  <p class="text-gray-500 text-base md:text-xl"><?php echo get_the_date('Y/m/d'); ?></p>
                  <h4 class="text-[#090914] text-xl md:text-2xl font-medium hover:underline"><?php the_title(); ?></h4>
                </div>
                <?php get_template_part('template-parts/button/arrow-button'); ?>
              </div>
            </li>
            <?php
            // 3件目（$i===2）のタイミングでグリッドを閉じ、リストを開く
            if (2 === $i):
              echo '</div>';                   // grid 終了
              echo '<hr class="border-2 border-gray-400 h-0.5" />';
              echo '<ul class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">'; // list 開始
            endif; ?>

            <!-- /*** 4件目以降：リスト表示 ***/ -->
          <?php else: ?>
            <li class="flex place-items-stretch w-full max-w-[750px] border-l-4 border-gray-100 pl-0 lg;pl-4">
              <a href="<?php the_permalink(); ?>" class="flex-shrink-0 w-1/3 md:w-[150px] aspect-[1/1] overflow-hidden flex items-center justify-center d">
                <?php the_post_thumbnail('thumbnail', ['class' => 'w-full object-cover rounded-lg shadow-m']); ?>
              </a>
              <div class="mx-4 mt-4 flex flex-1 flex-col justify-between">
                <div>
                  <p class="text-gray-500 text-base md:text-xl"><?php echo get_the_date('Y/m/d'); ?></p>
                  <h4 class="text-[#090914] text-xl md:text-2xl font-medium hover:underline"><?php the_title(); ?></h4>
                </div>
                <?php get_template_part('template-parts/button/arrow-button'); ?>
              </div>
            </li>
          <?php endif;
        endwhile;

        if ($news->post_count > 3) {
          echo '</ul>';
        }
        wp_reset_postdata();

      else:

        // <!-- 2ページ目以降 -->
        echo '<ul class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-2">';
        while ($news->have_posts()) : $news->the_post(); ?>
          <li class="flex place-items-stretch w-full max-w-[750px] border-l-4 border-gray-100 pl-0 lg;pl-4">
            <a href="<?php the_permalink(); ?>"
              class="flex-shrink-0 w-1/3 lg:w-[150px] aspect-square overflow-hidden flex items-center justify-center ">
              <?php the_post_thumbnail('thumbnail', ['class' => 'w-full object-cover rounded-lg shadow-md']); ?>
            </a>
            <div class="ml-4 flex flex-1 flex-col justify-between">
              <div>
                <p class="text-gray-500 text-base lg:text-xl"><?php echo get_the_date('Y/m/d'); ?></p>
                <h4 class=" text-base lg:text-2xl font-medium text-[#090914] hover:underline"><?php the_title(); ?></h4>
              </div>
              <?php get_template_part('template-parts/button/arrow-button'); ?>
            </div>
          </li>
        <?php endwhile;
        echo '</ul>';
        wp_reset_postdata();

      endif;
      $links = paginate_links([
        'base'      => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
        'format'    => '?paged=%#%',
        'current'   => $paged,
        'total'     => $news->max_num_pages,
        'prev_text' => '« 前へ',
        'next_text' => '次へ »',
        'type'      => 'array',
        'mid_size'  => 1,
      ]);

      if ($links):
        ?>
        <nav class="pt-12">
          <ul class="flex justify-center space-x-4 text-base lg;text-2xl">
            <?php foreach ($links as $link):
              if (str_contains($link, 'current')):
                $link = str_replace(
                  'page-numbers current',
                  'page-numbers current bg-black p-3 lg:px-6 lg:py-4 font-extrabold text-white rounded-md',
                  $link
                );
              endif;
            ?>
              <li><?php echo $link; ?></li>
            <?php endforeach; ?>
          </ul>
        </nav>
      <?php endif;

    else: ?>
      <p class="text-center py-16 text-gray-600 text-xl">お知らせはありません。</p>
    <?php endif; ?>
  </div>
</div>
<?php get_footer(); ?>
<script src="https://cdn.tailwindcss.com">
</script>