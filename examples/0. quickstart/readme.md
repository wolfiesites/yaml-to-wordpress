 # quickstart
## explanation:
* All commented lines in yaml files are optional
* it means u can remove all the comments and declarations. it will still work.

## installation and usage
1. install via composer (in ur theme or plugin): 
```
composer requrie wolfiesites/yaml-to-wordpress
```
2. add in functions.php or main file.php or the plugin and define path to ur config.yaml:
```
require_once(__DIR__.'/vendor/autoload.php');
$yaml_to_wordpress = new YamlToWp(__DIR__.'/config.yaml');
$yaml_to_wordpress->add_config(__DIR__.'/another_config.yaml');
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
* [post_type](https://gitlab.com/pw-wp-plugins/yaml-to-wordpress/-/tree/master/examples/3.%20post_type?ref_type=heads)
* [post_meta](https://gitlab.com/pw-wp-plugins/yaml-to-wordpress/-/tree/master/examples/4.%20metas/1.%20post_meta?ref_type=heads)
* [term_meta](https://gitlab.com/pw-wp-plugins/yaml-to-wordpress/-/tree/master/examples/4.%20metas/2.%20term_meta?ref_type=heads)
* [user_meta](https://gitlab.com/pw-wp-plugins/yaml-to-wordpress/-/tree/master/examples/4.%20metas/3.%20user_meta?ref_type=heads)
* [taxonomy](https://gitlab.com/pw-wp-plugins/yaml-to-wordpress/-/tree/master/examples/5.%20taxonomy?ref_type=heads)
* [examples](https://gitlab.com/pw-wp-plugins/yaml-to-wordpress/-/tree/master/examples/6.%20mix_of_examples?ref_type=heads)

5. how to get values from fields?
* post meta
* term meta
* user meta
* settings page

## tips:
* try to use unique "name" or prefix the names with ur plugin name "prefix" or theme name "prefix"
* 'fields' property can be used within 'settings_page' or 'post_meta', 'user_meta', 'term_meta'