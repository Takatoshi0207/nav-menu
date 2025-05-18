<?php
// child-theme/single.php
// 「投稿（post）」のテンプレートを丸ごと差し替えたいときは、
// 子テーマに single.php を配置します。
get_header();
$news_url = home_url('/news');
?>

<main class="container mx-auto px-2 py-4 space-y-12">
  <?php
  if (have_posts()):
    while (have_posts()): the_post();
  ?>
      <article <?php post_class('prose lg:prose-xl mx-auto'); ?>>
        <!-- サムネイル -->
        <?php if (has_post_thumbnail()): ?>
          <div class="mb-8 overflow-hidden rounded-lg shadow-lg">
            <?php the_post_thumbnail('large', ['class' => 'w-full object-cover']); ?>
          </div>
        <?php endif; ?>

        <!-- タイトル -->
        <header class="mb-6 text-center">
          <h1 class="!text-2xl md:!text-4xl font-extrabold mb-2"><?php the_title(); ?></h1>
          <p class="text-gray-500">
            <time datetime="<?php echo get_the_date('c'); ?>">
              <?php echo get_the_date('Y.m.d'); ?>
            </time>
          </p>
        </header>

        <!-- 本文 -->
        <div class="mb-12 flex flex-col">
          <?php the_content(); ?>
        </div>

        <!-- タグ -->
        <?php if (has_tag()): ?>
          <footer class="mt-12 border-t pt-6">
            <h2 class="text-lg font-medium mb-2">タグ</h2>
            <ul class="flex flex-wrap gap-2">
              <?php
              foreach (get_the_tags() as $tag):
                printf(
                  '<li><a class="px-3 py-1 bg-gray-200 rounded-full hover:bg-gray-300" href="%s">%s</a></li>',
                  esc_url(get_tag_link($tag)),
                  esc_html($tag->name)
                );
              endforeach;
              ?>
            </ul>
          </footer>
        <?php endif; ?>
        <div class="flex justify-center">
          <a
            href="<?php echo esc_url($news_url); ?>"
            class="!bg-black !text-white text-base font-bold w-1/3 max-w-48 h-[48px] flex items-center justify-center rounded-2xl shadow-md">
            <img
              src="<?php echo get_stylesheet_directory_uri(); ?>/svg/left_arrow.svg"
              alt="←"
              class="2xl:w-8 2xl:h-8 w-7 h-7 filter invert animate-[pulse_3s_ease-out_infinite]" />
            <span class="ml-2">戻る</span>
          </a>
        </div>
      </article>

  <?php
    endwhile;
  endif;
  ?>
</main>
<style>
  #page .site-content {
    flex-grow: 0;
  }
</style>
<?php
get_footer();
