# Boost Starter Theme :rocket:

It's a slim starter theme for wordpress development. Supports Svelte by default.

(Excludes Woocommerce, My Account Functionality, & More)

### Install / update pnpm

```bash
npm install -g pnpm
```

### Install dependencies

```bash
pnpm install
```

### Start dev server

```bash
pnpm run start
```

### Deploy to live server

First update config in scripts/deploy.js

```bash
# runs npm run build
pnpm run deploy

# does not run npm run build
pnpm run deploy-skip-build
```

### Create production theme zip file

```bash
pnpm run package
```

### Project Structure

```bash
┌── acf-json                     # Automatically generate ACF fields in json format
├── assets                       # Static files
├── build                        # Production js / css (do not touch)
├── cpt                          # Custom Post Types
├── library
│   ├── enqueue-scripts.php      # Enqueues files
│   └── theme-setup.php          # Base setup / functions
├── node_modules                 # Node modules
├── packaged                     # Packaged theme files
├── scripts
│   ├── deploy.js                # Deploys theme on server
│   └── ssl.sh                   # Generates certificate / key for localhost
├── src
│   ├── admin/admin.scss         # Wordpress editor styles (optional. enqueue first.)
│   ├── components               # Svelte components
│   ├── routes                   # Routes
│   │   ├── common.js            # JS that will run on EVERY page
│   │   └── <xxx>.js             # JS that will run on pages with <xxx> slug
│   ├── styles                   # SCSS
│   │   ├── _reset.scss
│   │   ├── _pagination.scss
│   │   └── ...
│   ├── util
│   │   ├── camelCase.js         # Helper function for Router, DO NOT TOUCH
│   │   └── Router.js            # HTML5 Router, DO NOT TOUCH
│   ├── _media-queries.scss      # Media queries
│   ├── _style.scss              # Main styles
│   ├── app.scss                 # SCSS style entry point
│   └── index.js                 # JavaScript entry point
├── template-parts               # Reusable partials
├── templates                    # Template files
├── woocommerce                  # Woocommerce template overrides
├── .eslintrc                    # eslint config
├── .gitignore                   # Files to exclude from git repo
├── .prettierrc                  # Prettier config
├── package.json                 # Node.js dependencies
├── rollup.config.js             # Rollup js build config
└── ...
```
