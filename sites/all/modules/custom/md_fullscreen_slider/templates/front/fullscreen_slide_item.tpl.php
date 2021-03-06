<?php
/**
 * @author: MegaDrupal
 * @file: fullscreen_slide_item.tpl.php
 */
?>
<?php if (!empty($item["opacity"])):?>
  <div style="<?php print $item["opacity"];?>">
<?php endif;?>
  <div class="<?php print $classes; ?>" <?php print $data; ?>>
    <?php if ($item["type"] == "text"): ?>
      <?php if (!empty($item["link"])): ?>
        <a href="<?php print $item["link"];?>"<?php if (!empty($item["linkCustomClass"])) print " class='{$item["linkCustomClass"]}'";?><?php if (!empty($item["linkTarget"])) print " target='{$item["linkTarget"]}'";?>>
          <?php print $item["title"]; ?>
        </a>
      <?php else: ?>
        <?php print $item["title"]; ?>
      <?php endif; ?>
    <?php elseif ($item["type"] == "image"): ?>
      <?php
      $image_alt = t('Background Slide');
      $image_title = t('Title Slider');
      if (isset($slide['settings']['bgFid']) && $slide['settings']['bgFid'] > 0) {
        $file = file_load($slide['settings']['bgFid']);
        $field_file_image_alt_text = field_get_items('file', $file, 'field_file_image_alt_text');
        $field_file_image_title_text = field_get_items('file', $file, 'field_file_image_title_text');
        $image_alt = $field_file_image_alt_text[0]['safe_value'];
        $image_title = $field_file_image_title_text[0]['safe_value'];
      }
      ?>
      <?php if (!empty($item["link"])): ?>
        <a href="<?php print $item["link"]; ?>"<?php if (!empty($item["linkCustomClass"])) print " class='{$item["linkCustomClass"]}'";?><?php if (!empty($item["linkTarget"])) print " target='{$item["linkTarget"]}'";?>>
          <img src="<?php print $item["thumb"]; ?>" alt="<?php print $image_alt; ?>" title="<?php print $image_title; ?>"/>
        </a>
      <?php else: ?>
        <img src="<?php print $item["thumb"]; ?>" alt="<?php print htmlentities($item["title"], ENT_QUOTES, "UTF-8"); ?>"/>
      <?php endif; ?>
    <?php
    elseif ($item["type"] == "video"): ?>
      <a title="<?php print htmlentities($item["title"], ENT_QUOTES, "UTF-8"); ?>" class="mdf-video" href="<?php print $item["video_url"]; ?>" videoid="<?php print $item["fileid"]; ?>">
        <img src="<?php print $item["thumb"]; ?>" alt="<?php print $item["title"]; ?>"/>
        <span class="mdf-playbtn"><img src="<?php print base_path().drupal_get_path("module", "md_fullscreen_slider")."/js/front/images/play.png";?>" alt="" /></span>
      </a>
    <?php endif; ?>
  </div>
<?php if (!empty($item["opacity"])):?>
  </div>
<?php endif;?>