# Я + R #

Website for Russel+Rizky

#### Task ####

From cli:

To start developing

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
gulp vendor # copy bower's packaged components to wp themes /content/themes/rdt-rnr15/script/vendor/
gulp image  # copy /src/image/**/*.{png,jpg,svg,gif} to /content/themes/rdt-rnr15/uploads/images

```

**Important notes:**

For the time being, everytime there is new package installed from bower, you have to manually run `gulp vendor` from the CLI.

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