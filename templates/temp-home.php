<?php /* Template Name: Temp Home */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
  <?php // fix slideout logged in style ?>
  <?php if (is_user_logged_in()) { ?>
  <style>
  @media screen and (max-width: 600px) {
    #wpadminbar {
      position: fixed !important;
    }
  }
  </style>
  <?php } ?>
</head>

<body <?php body_class(); ?>>
<?php while ( have_posts() ) : the_post(); ?>
<?php $option_fields = get_fields('options'); ?>
<main id="main_content">
  <div class="main">
    <div class="inner-wrap">
        <div class="flex">
            <div class="logo">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            viewBox="0 0 760.9 134.6" style="enable-background:new 0 0 760.9 134.6;" xml:space="preserve">
                    <g>
                        <path d="M131.9,73.9c-23.7,0-47.4,0.5-71,1c-11.5,0.2-23.1,0.5-34.6,0.7c-5.6,0.1-11.5,0.6-17.1,0.1c-2.4-0.2-5.8-0.7-7.6-2.6
                            c-1.7-1.8-2.1-4.7-0.4-6.6c3.3-3.5,8.7-5.7,13-7.6c17.2-8,35.8-13.7,54.4-17.5c10.1-2.1,20.5-3.5,30.8-3.7
                            c10.2-0.2,22.4,0.3,29.7,8.5c5.3,5.9,6.7,14.4,6.3,22.5c10.8,0,21.6,0.1,32.4,0.5c0.4,0,0.9,0,1.3,0c10.4-11.1,20.4-22.6,30.3-34.2
                            c9-10.6,18.1-21.4,26.7-32.3c0.4-0.8,0.9-1.5,1.3-2.3c0.7-1.2,2.9,3.1,2.1,4.5c0,0.1-0.1,0.2-0.1,0.3c0,0.3-0.1,0.5-0.2,0.7
                            c-0.2,0.3-0.4,0.6-0.6,0.8c-3.9,6.7-7.6,13.5-11.3,20.3c-8,14.7-15.7,29.5-23.3,44.4c1.6,0.3,3.4,0.7,4.7,1.7
                            c1.6,1.3,2.9,4.6,1.2,6.2c-0.7,0.7-1.6-0.6-2.1-2c-1.5-0.4-3.8-1.1-4.3-1.2c-0.6-0.1-1.1-0.2-1.7-0.2c-0.9,1.8-1.9,3.6-2.8,5.5
                            c-6.4,12.7-13.1,25.5-18.2,38.8c-0.7,1.9-2.7-2.6-2.4-3.8c1.9-6.3,5.1-12.3,7.9-18.3c3.6-7.6,7.4-15.2,11.2-22.7
                            c-1.8-0.2-3.5-0.3-5.3-0.4c-3.8-0.3-7.6-0.4-11.4-0.6c-0.1,0.1-0.2,0.2-0.3,0.3c-9.3,9.9-18.9,19.6-29.1,28.7
                            c-7.6,6.7-15.6,13.5-24.7,18c-1.1,0.6-2.6-3-2-4.4c-0.1-0.5-0.1-1,0-1.4c3-6.2,6.1-12.3,9-18.5C126.8,89.9,130.3,82,131.9,73.9z
                            M132.6,68.7c0.4-4.3,0.2-8.7-1-12.9c-3.5-12.3-19.4-13.2-29.9-13.1C81.1,43,60.6,47.8,41.1,54.2c-8,2.6-15.9,5.5-23.6,9
                            c-4.1,1.8-8.9,3.8-12.6,6.6c1,0.3,1.9,0.6,2.9,0.7c0.6,0.1,1.2,0.1,1.8,0.1c2.6,0.1,5.2,0,7.8,0c23.2-0.3,46.4-1,69.7-1.4
                            C102.2,69,117.4,68.7,132.6,68.7z M134.9,73.9c-0.3,2-0.7,4-1.1,5.9c-2.8,11.9-8.5,23-14,34c8.6-5.2,16.4-12.2,23.7-19
                            c7.2-6.6,14.1-13.5,20.9-20.6c-5.6-0.1-11.3-0.2-16.9-0.2C143.3,73.9,139.1,73.9,134.9,73.9z M175.1,69.5c4.8,0.2,9.7,0.5,14.5,1.2
                            c4.2-8.3,8.6-16.6,12.9-24.9c3.5-6.7,7-13.4,10.6-20.1C200.8,40.6,188.2,55.3,175.1,69.5z M197.7,74.5c0.1-0.1,0.1-0.1,0.1-0.1
                            C197.8,74.4,197.7,74.4,197.7,74.5z M198.7,77.6c0,0,0,0-0.1,0C198.6,77.6,198.7,77.7,198.7,77.6z"/>
                        <path d="M260.3,86.1c-4.4,1.9-9,3.2-13.5,4.9c-4.5,1.7-9,3.4-13.5,5c-2.9,1-6.2,2.5-8.9,0c-3.3-3-2.2-7-0.9-10.8
                            c-4.9,2.6-9.2,5.9-13.2,9.9c-1.4,1.4-2.6-3.5-2.1-4.5c2.3-4.5,4.7-8.9,7.1-13.4c0.6-1.1,2.8,2.8,2.2,4c-0.5,0.9-0.9,1.8-1.4,2.7
                            c3-2.1,6.3-4,9.7-5.5c1.4-0.6,2.2,3.2,2.1,4c-0.5,2.9-1.5,5.5-2.5,8.3c-0.3,0.7-0.6,1.1-0.2,1.6c0.3,0.4,1.5,0.3,2,0.3
                            c0.3,0,0.6-0.1,0.9-0.2c2.7-0.7,5.4-1.9,8-2.9c4-1.5,8-3,12-4.5c3.4-1.3,7-2.8,10.6-3.5C260.3,81,261.7,85.5,260.3,86.1z"/>
                        <path d="M297.1,39.3c-11.4,28.6-28.4,54.4-37.4,84.1c-0.6,1.9-2.9-2.6-2.5-3.9c3.2-11,7.5-21.5,12.4-31.8c-2,2.1-4.1,4.1-6.4,5.9
                            c-2.5,1.9-6.1,5-9.3,4c-1.5-0.5-2-3.1-1.7-4.4c1.5-6.2,6-14,12.5-16.2c2.5-0.9,4.7,0.7,5.7,2.9c4.3-5.2,7.9-11,11.1-17
                            c3-5.6,5.7-11.4,8.3-17.2c1.6-3.6,3-7.3,5.1-10.6C295.6,33.7,297.6,38.3,297.1,39.3z M266.2,81.8c-1,0.4-2.1,1.1-2.9,1.8
                            c-1.3,1-2.5,2.1-3.6,3.4c-1.4,1.6-2.5,3.4-3.4,5.2c2.5-1.1,5-3.3,6.5-4.6c1.6-1.3,3-2.7,4.4-4.2c-0.1-0.7,0-1.3,0.3-1.5
                            C268.8,80.7,266.7,81.6,266.2,81.8z"/>
                        <path d="M338.5,86c-7.9,4-16.2,7.7-24.2,11.8c-3.7,7.5-8.2,14.6-12.9,21.5c-2.6,3.8-5.3,7.7-8.5,11c-2,2.1-5.7,5.9-8.8,3.5
                            c-2.3-1.8-3.1-5.8-3.2-8.7c-0.4-10.1,8.2-17.8,15.9-23c4.9-3.4,10.2-6.2,15.5-8.9c1.3-2.5,2.5-5.1,3.4-7.7c0.6-1.7,1.5-4.1,1.3-5.9
                            c-0.6-3.7-3.6,0-4.9,1.2c-4.8,4.7-9.2,10.9-15.5,13.9c-4.8,2.3-6.5-3.2-5.6-7c0.8-3.4,2.7-6.7,4.6-9.6c0.8-1.2,2.5,3,1.9,4.1
                            c-1,1.8-2,3.7-2.8,5.6c-0.2,0.5-0.4,1.5-0.7,2.4c0,0,0.1,0,0.1,0c1.1-0.3,2.3-1.2,3.2-1.9c3.9-2.7,7-6.2,10.2-9.6
                            c1.9-2.1,5.5-7.2,8.8-5.3c2.8,1.6,3.3,5.7,3.2,8.6c-0.1,2.9-0.8,5.7-1.8,8.4c6.4-3.2,12.8-6.5,19.3-9.5
                            C338.2,80.5,339.9,85.3,338.5,86z M307.7,101.4c-3.4,1.9-6.7,3.9-9.8,6.1c-6.3,4.4-15.2,12.2-14.3,20.5c0.1,1.1,0.2,1.8,2.1,1.3
                            c3.6-0.8,6.8-5.5,8.9-8.3C299.4,114.9,303.8,108.2,307.7,101.4z"/>
                        <path d="M509.2,111c-7.2,3.3-16.3,7.4-24.5,6.9c-7-0.4-9.5-7.9-8.3-13.9c1.4-7,6.4-13.7,11.1-18.8c3.9-4.3,8.3-8,13.2-11
                            c-7.8-0.2-15.7-0.3-23.5-0.3c-1,2-2.1,4.1-3.1,6.1c-4.5,9.1-9.1,18.1-13.6,27.2c-1.2,2.4-2.4,4.8-3.6,7.2c-0.7,1.7-1.5,3.4-2.3,5.1
                            c-0.9,1.9-3.1-2.6-2.4-3.9c0.1-0.2,0.2-0.4,0.2-0.5c0-0.1,0-0.2,0.1-0.3c0.2-0.4,0.4-0.7,0.5-1.1c0.1-0.3,0.2-0.5,0.4-0.8
                            c4.6-10.5,8.2-21.8,9.8-33.2c0.3-1.9,0.4-3.8,0.6-5.7c-28.8,0.1-57.7,0.8-86.5,1.4c-9.2,0.2-18.4,0.5-27.5,0.4
                            c-3.5,0-8.6-0.1-10.9-3c-4.3-5.7,4.4-9.9,8.3-12.2c19.5-11.4,42.4-18.8,64.7-21.9c16.8-2.3,40-4.1,49.8,13.1c3,5.2,4.4,11.1,4.8,17
                            c3,0,6,0,9,0c5-9.9,10-19.9,15-29.8c3-5.9,5.9-11.8,8.9-17.7c0-0.2,0.1-0.4,0.2-0.5c3.4-6.8,6.8-13.5,10.2-20.3
                            c0.9-1.9,3,2.5,2.4,3.8c-1.7,3.3-3.3,6.6-5,9.9c5.7-4.3,11.9-7.6,18.8-9.8c4.4-1.4,9.1-2.2,13.7-2.6c3.3-0.2,7.2-0.1,9.5,2.7
                            c6.4,7.5-2.8,16.1-8,21c-10.4,9.8-21.5,18.9-33.1,27.3c3.9-1.2,7.9-2.3,12-3.2c8.5-1.7,18.4-3,26.8-0.1c6.1,2.2,10.5,7,11.6,13.4
                            c1.2,7.2-2.4,14.2-7,19.5C540.4,95.4,524.4,104,509.2,111z M401.7,69.7c20.7-0.4,41.4-0.9,62.1-0.9c-0.4-9.6-3.7-18.7-13.5-23.2
                            c-9.4-4.3-20.9-3.6-31-2.6c-12.8,1.2-25.4,4.2-37.6,8.2c-10.1,3.3-20,7.3-29.4,12.3c-3.1,1.7-6.3,3.4-9.1,5.6
                            c-0.3,0.3-0.7,0.6-1,0.9c0.1,0,0.2,0,0.3,0.1c6.4,1.4,13.5,0.6,19.9,0.5C375.6,70.3,388.6,70,401.7,69.7z M472.8,73.9
                            c-0.1,0-0.2,0-0.3,0c-2,0-4,0-6,0c-0.1,5.7-1,11.5-2.2,16.9C467.2,85.2,470,79.5,472.8,73.9z M497.6,110c6.9-2.3,13.5-5.6,19.9-8.9
                            c12.2-6.4,25.3-14.2,33.6-25.5c3.8-5.2,7.7-13.5,1.5-18.5c-4.9-3.9-12.1-4.4-18.2-4.1c-15.4,0.6-30,6.4-44.2,11.9
                            c-1.5,0.6-2.9-4.1-1.6-4.9c10.1-6.4,19.9-13.2,29.2-20.6c8.8-7,17.8-14.3,25.6-22.5c1.7-1.7,4.5-4.5,4.8-7c0.5-3.5-4.1-3.3-6.5-3.2
                            c-5,0.3-10,1.2-14.7,2.7c-9.6,3-18,8.5-25.2,15.4c-7.4,14.7-14.7,29.3-22.1,44c5.3,0,10.7,0.1,16,0.2c10.8,0.2,21.7,0.3,32.4,1.8
                            c2.4,0.3,5.3,0.6,7.4,2c1.8,1.2,3.4,4.7,1.6,6.5c-0.7,0.7-1.7-0.7-2.2-2.1c-0.5-0.2-1.1-0.4-1.5-0.5c-1.5-0.4-3.1-0.6-4.6-0.8
                            c-4.7-0.6-9.4-0.9-14-1.2c-2-0.1-4.1-0.2-6.1-0.3c0,0.6-0.2,1.1-0.5,1.3c-6.7,3.4-12.8,7.9-17.9,13.4c-4.7,5-10.3,11.9-11.4,18.8
                            C477.6,116.7,493.6,111.3,497.6,110z M535.3,74.6 M536.2,77.5C536,77.9,536.6,77.6,536.2,77.5C536.2,77.5,536.2,77.5,536.2,77.5z"
                            />
                        <path d="M608,85.7c-3.2,3-6.4,6.1-9.6,9.1c-4.1,3.9-9.7,8.6-15.6,9.1c-4.9,0.4-7.4-4.1-7.8-8.4c-0.2-2.6,0.3-5.3,1.2-7.7
                            c0.3-0.9,0.7-1.7,1.1-2.6c-1.5,0.3-3.1,0.6-4.7,0.7c-3.5,0.2-7-0.5-8.8-3.8c-1.2-2.1-1.4-5.1,0.4-7.1c1.1-1.3,2.6-1.1,3.9-0.1
                            c1.2,1,2.1,3.1,1.5,4.7c-0.2,0.6-0.6,1.1-1,1.5c3.8,0.4,9-1.7,11.7-1.9c1.9-0.1,2.9,1.4,3,3.3c0.3,2.6-2.6,4.9-3.6,7.2
                            c-1.8,3.6-4.2,9.9,2,9.2c5.8-0.6,10.9-5.3,15-9.1c3-2.9,6.1-5.7,9.1-8.5C607.2,79.9,609.2,84.6,608,85.7z"/>
                        <path d="M646.6,86.2c-5.2,5.7-11.6,10.5-18,14.9c-3.8,2.7-12.7,10-17.2,5.4c-4-4.1-2.7-9.9-1.1-14.8c0.4-1.2,0.8-2.4,1.3-3.5
                            c-0.2,0.2-0.4,0.3-0.6,0.5c-1.7,1.4-3.7,3.4-6,2.4c-1.3-0.5-2.3-3.1-1.7-4.4c1.4-2.9,5.1-9.6,9.1-9.1c0.9,0.1,1.8,0.9,2.4,1.9
                            c0.8-0.6,1.6-1.3,2.4-1.9c1.4-1.1,3.1,3.5,2.1,4.5c-2.7,2.7-4.2,7.5-5.5,10.9c-0.9,2.4-1.8,4.9-2.2,7.4c-0.3,2.3,0.5,3.1,3.5,2.4
                            c5.5-1.4,10.8-5.7,15.3-9c5-3.7,9.7-7.7,14.2-12C645.7,80.6,647.5,85.1,646.6,86.2z"/>
                        <path d="M668.5,81c-4.8,4.7-9.4,9.4-14.5,13.6c1.8,0,3.6,0,5.4,0c1.3,0,2.6,4.8,1.3,4.9c-4.4,0.5-8.8,0.3-13.2,0
                            c-1.3-0.1-2.7-4.1-1.6-4.9c4.6-3.3,8.8-7,12.8-10.8c-3.7,0.7-7.5,1.2-11.1,1c-1.4,0-2.5-4.7-1.2-4.8c6.8-0.1,13.9-1.6,20.3-3.8
                            C668.1,75.7,669.4,80.1,668.5,81z"/>
                        <path d="M716,86.5c-2,0.8-5.9,2.5-8.5,3.6c-8.8,3.5-17.6,7.4-26.6,10.1c-3.8,1.1-6.3-1.9-6.1-5.8c0.2-3.2,1.8-6.7,3.1-9.7
                            c0.9-2.1,1.9-4.1,2.9-6.1c0.5-1,0.9-2.4,1.9-2.9c0.2,0,0.4,0,0.6,0.2c0.1,0.1,0.2,0.1,0.2,0.2c1.1,1,1.9,3,1.2,4.4
                            c0,0.1-0.1,0.1-0.1,0.2c-0.2,0.3-0.4,0.2-0.7-0.1c-0.2,1.3-4.9,11.3-5.3,12.5c-0.3,0.8-0.5,1.6-0.7,2.4c0.3-0.1,0.7-0.1,0.8-0.1
                            c4.2-1.1,8.2-2.9,12.2-4.4c7.9-3,15.8-6.1,23.5-9.3C715.8,81.1,717.5,85.9,716,86.5z M677.5,95.6C677.5,95.6,677.4,95.6,677.5,95.6
                            C677.4,95.6,677.4,95.6,677.5,95.6z M684.1,67.7c2.7-3.5,6.6-7.6,11.2-8.4c1.5-0.3,2.8,3.9,1.5,4.5c-3.8,1.9-6.8,4.1-9.5,7.2
                            c0,0.5-0.2,0.9-0.6,1.1c-0.2,0.1-0.5,0.2-0.7,0.3C684.4,72.9,683.4,68.6,684.1,67.7z"/>
                        <path d="M716.8,85.8c-0.4,2.5-0.4,5,0.3,7.3c1.7,5.6,5.9,5.9,10.6,4.3c10.4-3.5,19.5-10.5,28.6-16.5c1-0.7,2.9,3.8,1.8,4.7
                            c-5.8,4.6-12.2,8.6-18.6,12.2c-4.5,2.5-12,7.3-17.4,5.5c-5.7-1.9-8.1-10.3-8.2-15.5c-0.2-7.1,2.3-14,5.1-20.4
                            c3.4-7.7,7.2-15.3,11.9-22.2c2.9-4.2,6.1-8.4,9.8-11.9c3.1-2.9,7.1-6.2,11.6-6.4c7.5-0.3,9.6,8.6,8,14.4c-1.1,3.9-3.6,7.6-5.9,10.8
                            C744.6,65.8,731,76.8,716.8,85.8z M718.7,78.6c12.5-8.4,24.2-18.4,33-30.5c2.2-3,4.4-6.2,5.7-9.7c1-2.7,0.9-6.2-2.8-6.6
                            c-4.1-0.4-8.1,2.7-10.9,5.2c-10.9,9.8-18.2,24.2-23.6,37.7C719.6,76.1,719.1,77.3,718.7,78.6z"/>
                    </g>
                </svg>
                <h2>graphic design &bull; web development &bull; photography</h2>
                <a href="mailto:iamandybrazil@gmail.com" class="btn">Get in Touch</a>
            </div>
        </div>
    </div>
  </div>
</div>
</main>


<!-- conditional polyfills for svelte -->
<script>
if (!('customElements' in window)) {
  window.requestAnimationFrame = window.requestAnimationFrame.bind(window);
  window.setTimeout = window.setTimeout.bind(window);
  document.write(
    '<script src="https://cdn.jsdelivr.net/combine/npm/promise-polyfill@8.1.0/dist/polyfill.min.js,npm/classlist-polyfill@1.2.0/src/index.js,npm/mdn-polyfills@5.19.0/Array.prototype.fill.js,npm/@webcomponents/webcomponentsjs@2.4.1/webcomponents-bundle.min.js"><\/script>'
  )
}
</script>

<?php wp_footer(); ?>
<?php if ($footer_code = $option_fields['footer_code']) {
  // additional footer code for analytics and whatnot
  echo $footer_code;
} ?>
<?php endwhile; ?>
</body>
</html>