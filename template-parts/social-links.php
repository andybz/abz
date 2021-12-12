<?php if (!isset($option_fields)) {
  $option_fields = get_fields('options');
} ?>

<div class="social-links">
  <div class="footer-social-icons">
    <?php if ($facebook_url = $option_fields['facebook_url']) { ?>
    <a href="<?php echo $facebook_url ?>" target="_blank" rel="noopener" class="social-icon">
      <svg viewBox="0 0 486.39 486.39">
        <path
          d="M243.2 0C108.9 0 0 108.9 0 243.2s108.9 243.2 243.2 243.2 243.2-108.9 243.2-243.2C486.4 108.86 377.5 0 243.2 0zm62.86 243.16l-39.85.03-.02 145.9h-54.7V243.2h-36.47v-50.28l36.5-.03-.07-29.62c0-41.04 11.12-66 59.43-66h40.25v50.3h-25.16c-18.82 0-19.73 7.03-19.73 20.13l-.05 25.18h45.23l-5.32 50.28z" />
      </svg>
      <span class="sr-only">Facebook profile</span>
    </a>
    <?php } ?>
    <?php if ($twitter_url = $option_fields['twitter_url']) { ?>
    <a href="<?php echo $twitter_url ?>" target="_blank" rel="noopener" class="social-icon">
      <svg viewBox="0 0 486.39 486.39">
        <path
          d="M243.2 0C108.9 0 0 108.9 0 243.2s108.9 243.2 243.2 243.2 243.2-108.9 243.2-243.2C486.4 108.86 377.5 0 243.2 0zm121 188.6l.17 7.75c0 79.16-60.22 170.36-170.36 170.36-33.8 0-65.26-9.9-91.77-26.9 4.68.55 9.46.86 14.3.86 28.05 0 53.86-9.58 74.35-25.63-26.2-.5-48.3-17.8-55.94-41.6 3.68.7 7.4 1.05 11.28 1.05 5.47 0 10.76-.7 15.78-2.07-27.4-5.52-48.03-29.7-48.03-58.7v-.75c8.08 4.5 17.3 7.17 27.1 7.5-16.04-10.72-26.62-29.05-26.62-49.82 0-10.97 2.95-21.25 8.1-30.1 29.5 36.24 73.65 60.08 123.4 62.57-1.02-4.38-1.54-8.97-1.54-13.65 0-33.04 26.82-59.86 59.9-59.86 17.2 0 32.77 7.26 43.7 18.9 13.63-2.7 26.46-7.7 38.04-14.53-4.47 14-13.95 25.72-26.32 33.14 12.06-1.42 23.65-4.68 34.38-9.42-8.03 11.98-18.2 22.53-29.9 30.92z" />
      </svg>
      <span class="sr-only">Twitter profile</span>
    </a>
    <?php } ?>
    <?php if ($linkedin_url = $option_fields['linkedin_url']) { ?>
    <a href="<?php echo $linkedin_url ?>" target="_blank" rel="noopener" class="social-icon">
      <svg version="1" viewBox="0 0 486 486">
        <path
          d="M243 0a243 243 0 1 0 0 486 243 243 0 0 0 0-486zm-61 361h-60V148h60v213zm-28-226a28 28 0 1 1 0-57 28 28 0 0 1 0 57zm241 226h-61V229c0-15-4-26-23-26-31 0-37 26-37 26v132h-61V148h61v21c8-7 30-21 60-21 20 0 61 12 61 83v130z" />
      </svg>
      <span class="sr-only">LinkedIn profile</span>
    </a>
    <?php } ?>
    <?php if ($instagram_url = $option_fields['instagram_url']) { ?>
    <a href="<?php echo $instagram_url ?>" target="_blank" rel="noopener" class="social-icon">
      <svg version="1" viewBox="0 0 50 50">
        <path d="M25 30a5 5 0 0 0 0-10 5 5 0 0 0 0 10z" />
        <path d="M36 19v-5h-5v5z" />
        <path d="M25 0a25 25 0 1 0 0 50 25 25 0 0 0 0-50zm14 22v11c0 3-3 6-6 6H16c-3 0-5-3-5-6V16c0-3 2-5 5-5h17c3 0 6 2 6 5v6z" />
        <path d="M33 25a8 8 0 1 1-15-3h-5v11c0 2 2 3 3 3h17c2 0 3-1 3-3V22h-4l1 3z" /></svg>
      <span class="sr-only">Instagram profile</span>
    </a>
    <?php } ?>
    <?php if ($pinterest_url = $option_fields['pinterest_url']) { ?>
    <a href="<?php echo $pinterest_url ?>" target="_blank" rel="noopener" class="social-icon">
      <svg viewBox="0 0 533.33 533.33">
        <path
          d="M266.67 0C119.39 0 0 119.4 0 266.67s119.39 266.66 266.67 266.66c147.27 0 266.66-119.39 266.66-266.66C533.33 119.39 413.94 0 266.67 0zm25.85 356.31c-24.23-1.88-34.4-13.88-53.38-25.42-10.45 54.78-23.21 107.3-61.01 134.73-11.67-82.8 17.13-144.98 30.5-211-22.8-38.38 2.74-115.64 50.84-96.6 59.18 23.42-51.25 142.72 22.89 157.62 77.4 15.56 109-134.3 61-183.04-69.35-70.36-201.87-1.6-185.57 99.15 3.96 24.63 29.41 32.1 10.17 66.1-44.39-9.85-57.63-44.85-55.93-91.52 2.75-76.4 68.64-129.88 134.73-137.28 83.59-9.35 162.04 30.68 172.87 109.31 12.2 88.75-37.73 184.86-127.1 177.95z" />
      </svg>
      <span class="sr-only">Pinterest profile</span>
    </a>
    <?php } ?>
    <?php if ($youtube_url = $option_fields['youtube_url']) { ?>
    <a href="<?php echo $youtube_url ?>" target="_blank" rel="noopener" class="social-icon">
      <svg viewBox="0 0 512 512">
        <path d="M224 304l83-48-83-48zm0 0"/>
        <path d="M256 0a256 256 0 100 512 256 256 0 000-512zm160 256s0 52-7 77c-3 14-14 25-28 28-25 7-125 7-125 7s-100 0-125-7c-14-4-25-14-28-28-7-25-7-77-7-77s0-52 7-77c3-14 14-25 28-28 25-7 125-7 125-7s100 0 125 7c14 4 25 14 28 28 7 25 7 77 7 77zm0 0"/>
      </svg>
      <span class="sr-only">LinkedIn profile</span>
    </a>
    <?php } ?>
  </div>
</div>
