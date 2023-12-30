# yaml to wordpress
Manage your whole wordpress using single or multiple yaml files.<br>

## How to install?
Choose one option:
* as composer package (recommended)<br>
  it allows you to incorporate it into ur new custom plugin or custom theme.<br>
  Then within ur plugin u load all dependencies and can use settings pages and all. Manage wordpress.
* as wordpress plugin<br>
  it quickly grants u ability to specify single yaml file (either in active theme or plugin)<br>
  and manage wordpress via this single .yaml file

### via composer package (recommended)
1. go to ur active theme directory OR custom plugin and run:
```
composer requrie wolfiesites/yaml-to-wordpress
```
2. load the composer pachage and config file:
```
 require_once(__DIR__.'/vendor/autoload.php');
 $yaml_to_wordpress = new YamlToWp(__DIR__.'/config.yaml');
 $yaml_to_wordpress->add_config(__DIR__.'/another_config.yaml');
```
3. create config.yaml
4. paste ur configuration of wordpress to that file :)<br>
   examples can be found here:<br> <https://gitlab.com/pw-wp-plugins/yaml-to-wordpress/-/tree/master/examples/6.%20mix_of_examples?ref_type=heads>
5. adjust and enjoy :)


### via wordpress plugin
1. install plugin yaml-to-wordpress via wordpress
2. in ur active theme create `config.yaml`
3. paste ur configuration of wordpress to that file :)<br>
   examples can be found here:<br> <https://gitlab.com/pw-wp-plugins/yaml-to-wordpress/-/tree/master/examples/6.%20mix_of_examples?ref_type=heads>

## documentation:
<https://gitlab.com/pw-wp-plugins/yaml-to-wordpress/-/tree/master/examples?ref_type=heads>



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