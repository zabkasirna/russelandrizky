# Я + R #

Website for Russel+Rizky

#### To start developing ####

From cli:

``` bash
composer update
npm install
bower install
gulp first
gulp

```

Specific tasks:

``` bash
gulp markups         # run gulp markup:template & gulp markup:plugin sequentially
gulp markup:template # copy /src/template/**/*.php to /content/themes/rdt-rnr15/
gulp markup:plugin   # copy /src/plugin/**/*.php to /content/plugin/rdt-rnr15/
gulp styles          # run gulp style:modern & gulp markup:old sequentially
gulp style:modern    # compile scss to css
gulp style:old       # compile scss to css, converting 'rem' to 'px' unit, producing '.ie.css' files
gulp style:wp-admin  # compile scss to css, with px unit, for wp admin styles
gulp script          # run browserify once without watchify
gulp vendor          # copy bower's packaged components to /content/themes/rdt-rnr15/script/vendor/
gulp image           # copy /src/image/**/*.{png,jpg,svg,gif} to /content/themes/rdt-rnr15/uploads/images
gulp font            # copy /src/style/font/**/*.{ttf,woff,eot,svg,woff2} to /content/themes/rdt-rnr15/font
gulp first           # run gulp image, gulp font, gulp vendor, sequentially

```


**Important notes:**

For the time being, every packages installed from bower have to be copied manually by running `gulp vendor` from the cli.


#### Sitemap ####

```
□ home
□ philosophy
□ projects
   □ identity
   □ motion
   □ web
   □ advertising
□ zine
□ contact

```

#### WP Plugins ####

| Name            | Current version | via Composer |
| --------------- | --------------- | ------------ |
| Advanced Custom Fields Pro | 5.2.6 | No |
| WP Admin Ui Customize | 1.5.3 | Yes |
| WP Optimize | 1.8.9.10 | Yes |
| WPBakery Visual Composer | 4.5.2 | No |
| Disable Google Fonts | 1.1 | Yes |

#### Theme's Original Plugins ####

| Name            | Current version |
| --------------- | --------------- |
| RNR Project Type | 0.0 |
| RNR Project | 0.0 |