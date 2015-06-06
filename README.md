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
gulp markup # copy /src/**/*.php to /content/themes/rdt-rnr15/
gulp styles # compile scss to css
gulp script # run browserify once without watchify
gulp vendor # copy bower's packaged components to /content/themes/rdt-rnr15/script/vendor/
gulp image  # copy /src/image/**/*.{png,jpg,svg,gif} to /content/themes/rdt-rnr15/uploads/images

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