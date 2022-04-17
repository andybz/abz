<?php 
$fields = get_fields();

$buckets = $fields['buckets'];
?>

<?php if ($buckets) { ?>
<section class="home-buckets">
  <div class="home-buckets-wrap grid-three">
    <?php foreach ($buckets as $bucket) { ?>
    <?php 
      $content = $bucket['content'];  
      $link = $bucket['link'];  
    ?>
    <div class="home-bucket grid-item">
      <div class="home-bucket-image" style="background-image: url(<?php echo $bucket['background_image']['sizes']['large'] ?>)"></div>
      <?php if ($content) { ?>
      <div class="home-bucket-content">
        <?php echo $content ?>
      </div>
      <?php } ?>
      <?php if ($link) { ?>
      <a href="<?php echo $link ?>"><span class="sr-only">View <?php echo str_replace("/","",$link) ?></span></a>
      <?php } ?>

    </div>
    <?php } ?>
  </div>
</section>
<?php } ?>