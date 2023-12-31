 # quickstart
## explanation:
* All commented lines in yaml files are optional
* it means u can remove all the comments and declarations. it will still work.

## installation and usage
1. install via composer (in ur theme or plugin): 
```
composer require wolfiesites/yaml-to-wordpress
```
2. add in functions.php or main file.php. It defines path to ur config.yaml and load all packages:
```
// this if, prevents from error if u use same composer packages and same versions
if (!class_exists('ComposerAutoloaderInit7c319c193a9312d9a487ea6724a4ee27')) {
  require_once(__DIR__.'/vendor/autoload.php');
}
new Wolfiesites\YamlToWp(__DIR__ .'/config.yaml');
 ```
3. Define ur config.yaml (paste below and adjust to ur will):
```
# example:
taxonomy:                   # register custom taxonomy each name is seprate taxonomy and can be added to subpage to settings_page # optional
  - name: wolfie-event
    singular: event
    plural: events
    public: true
    hierarchical: true
    rewrite:
      slug: wolfie-events-category
    show_in_menu:  crb_carbon_fields_container_wolfie_events.php      # display it as subpage to setting page
    position_in_menu: 1
  - name: wolfie-event-tag
    singular: event
    plural: events
    public: true
    hierarchical: false
    rewrite:
      slug: wolfie-events-tag
    show_in_menu:  crb_carbon_fields_container_wolfie_events.php
    position_in_menu: 1


post_type:                # register custom post type # optional
  - name: wolfie-event
    singular: event
    plural: events
    show_in_menu: crb_carbon_fields_container_wolfie_events.php     # it adds default list of the posts to parent page (optional)
    taxonomies: # this are only names of already registered taxonomies | it connects post type to taxonomies | taxonomy ealier needs to be declared # optional
     - wolfie-event
     - wolfie-event-tag

settings_page:                       # each name is spreate page # optional
  - name: Wolfie Events              # required
    prefix: wolfieevents             # optional
    # menu_title: fix images         # optional
    # parent: tools.php              # optional
    # order: 9999                    # optional
    icon: dashicons-carrot           # optional dashicons class or url to image
    # fields:                        # optional
    #   - type: text
    #     name: First Name
    #     # label: 'First Name'
    #   - type: text
    #     name: Last Name
    #     # label: 'Last Name'
    #   - type: text
    #     name: Position
    #     # label: 'Position'
  - name: Wolfie Events Settings
    prefix: wolfieevents                                              # optional
    menu_title: Settings                                              # optional
    parent: crb_carbon_fields_container_wolfie_events.php             # optional - added ad submenu of above setting page
    # order: 9999                                                     # optional
    # icon: dashicons-carrot                                          # optional dashicons class or url to image
    fields:
      - type: text
        name: First Name
        # label: 'First Name'                                         # optional
      - type: text
        name: Last Name
        # label: 'Last Name'                                          # optional
      - type: text
        name: Position
        # label: 'Position'                                           # optional

```
4. explore more (how to define):
* [field_types](https://gitlab.com/pw-wp-plugins/yaml-to-wordpress/-/tree/master/examples/1.%20field_types?ref_type=heads)
* [settings_page]()
* [post_type](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/3.%20post_type)
* [post_meta](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/4.%20metas/1.%20post_meta)
* [term_meta](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/4.%20metas/2.%20term_meta)
* [user_meta](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/4.%20metas/3.%20user_meta)
* [comment_meta](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/4.%20metas/4.%20comment_meta)
* [taxonomy](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/5.%20taxonomy)
* [examples](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/6.%20mix_of_examples)

5. how to get values from fields?
  - post meta
```
// Assuming you have a field with the name 'custom_field_name' attached to a post
$custom_field_value = carbon_get_post_meta(get_the_ID(), 'custom_field_name');

// Now you can use $custom_field_value as needed
echo 'Custom Field Value: ' . $custom_field_value;
```
  - theme options
```
// Assuming you have a field with the name 'theme_option_name' set in the theme options
$theme_option_value = carbon_get_theme_option('theme_option_name');

// Now you can use $theme_option_value as needed
echo 'Theme Option Value: ' . $theme_option_value;

```

for more info of getting values check the carbon fields documentation: 


## tips:
* try to use unique "name" or prefix the names with ur plugin name "prefix" or theme name "prefix"
* 'fields' property can be used within 'settings_page' or 'post_meta', 'user_meta', 'term_meta'