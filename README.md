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

For the time being, every packages installed from bower have to manually copied by running `gulp vendor` from the cli.


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