<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header(); ?>

<main id="main_content" class="main-content-wrap">
  <div class="main">
    <div class="inner-wrap">
      <div class="error404-page-content-wrap">
        
        <!-- <aside>
          <div>
            <p>sidebar content/ theme image here<p>
          </div>
        </aside> -->
        
        <article class="page-default-content">
          <span><strong>Error: 404</strong></span>
          <h1>Whoops, nothing To See Here.</h1>
          <p>Sorry, the page you are looking for might have been removed, had its name changed, or may be temporarily unavailable. </p>
          <div class="error-search">
            <?php //get_search_form(); ?>
            <form role="search" method="get" class="search-form" action="//localhost:3000/">
              <label>
                <span class="screen-reader-text">Search for:</span>
                <input type="search" class="search-field" placeholder="Search …" value="" name="s">
              </label>
              <!-- <input type="submit" class="btn search-submit" value="Search"> -->
              <button type="submit" class="btn nav-search__button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1500 1495.5"><path d="M1739.38,1584.77c98.24,0,195.9-30.31,279.72-88.89L2604.26,2081A85.37,85.37,0,1,0,2725,1960.31l-585.16-585.16c133.39-190.82,116-455.72-54.26-625.9-184.93-184.93-507.44-184.93-692.37,0-190.93,190.85-190.93,501.52,0,692.37C1488.67,1537.08,1614,1584.77,1739.38,1584.77Zm-255.63-745a361.52,361.52,0,0,1,511.27,0c141,141,141,370.28,0,511.27s-370.36,140.91-511.27,0S1342.76,980.79,1483.75,839.8Z" transform="translate(-1250 -610.55)" fill="#fff"></path></svg>
                <span class="sr-only">search</span>
              </button>
            </form>
          </div>
          <p>Or you can return to our <a href="/">Home Page</a>, or <a href="/contact">Contact Us</a> if you can't find what you are looking for.</p>
        </article>

      </div>
    </div>
  </div>
</main>

<?php get_footer();