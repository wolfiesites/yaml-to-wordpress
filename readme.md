# yaml to wordpress
Manage your whole wordpress using single or multiple yaml files.<br>

## How to install?
### via composer package
1. go to ur active theme directory OR custom plugin and run:
```
composer require wolfiesites/yaml-to-wordpress
```
2. load the composer package and config file in ur root plugin_file.php or in thme functions.php:
```
// this if, prevents from error if u use same composer packages and same versions
if (!class_exists('ComposerAutoloaderInit228a8406a34a58cdfa0baa1563d5478e')) {
  require_once(__DIR__.'/vendor/autoload.php');
}
new Wolfiesites\YamlToWp(__DIR__ .'/config.yaml');
```
3. create config.yaml
4. paste ur configuration of wordpress to that file :)<br>
   this is good starter (just paste it to ur config.yaml):<br>
   <https://github.com/wolfiesites/yaml-to-wordpress/blob/main/examples/6.%20mix_of_examples/books__cpt_with_post_meta%2Btaxonomies/config.yaml> <br><br>
   all examples can be found here:<br>
  <https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/6.%20mix_of_examples>
5. adjust and enjoy :)
### want to load anothrconfig.yaml file?
instead of first configuration u can paste below:
```
// this if, prevents from error if u use same composer packages and same versions
if (!class_exists('ComposerAutoloaderInit228a8406a34a58cdfa0baa1563d5478e')) {
  require_once(__DIR__.'/vendor/autoload.php');
}
$plugin_prefix_y2wp = new Wolfiesites\YamlToWp(__DIR__ .'/config.yaml');
$plugin_prefix_y2wp->add_config(__DIR__.'/two.yaml');
```
You can add as many config.yaml files as u like!

## documentation:
<https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples>



## special thanks to:
* [automatic and wordpress](https://wordpress.org)
* [htmlburger/carbon-fields](https://carbonfields.net/)
* [symfony/yaml](https://symfony.com/doc/current/components/yaml.html)

<br>
wihtout those three amazing packages it wouldn't be possible.


## consider donation:
This plugin has to be GPL cause of wordpress restrictions but PLEASE consider it as MIT.<br>
If u build on top of it, IT is greatly advisable to mention authors of all the packages.<br>
you may buy me a coffe soon here: <https://wolfiesites.com>


## future features:
* registering sidebars
* registering templates (and for certain post types)
* registering gutenberg blocks and easier their development