# field types
* [association](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/1.%20field_types/association)
* [checkbox](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/1.%20field_types/checkbox)
* [color](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/1.%20field_types/color)
* [complex](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/1.%20field_types/complex)
* [date](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/1.%20field_types/date)
* [date_time](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/1.%20field_types/date_time)
* [file](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/1.%20field_types/file)
* [footer_scripts](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/1.%20field_types/footer_scripts)
* [gravity_form](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/1.%20field_types/gravity_form)
* [header_scripts](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/1.%20field_types/header_scripts)
* [hidden](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/1.%20field_types/hidden)
* [html](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/1.%20field_types/html)
* [image](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/1.%20field_types/image)
* [map](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/1.%20field_types/map)
* [media_gallery](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/1.%20field_types/media_gallery)
* [multiselect](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/1.%20field_types/multiselect)
* [oembed](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/1.%20field_types/oembed)
* [radio](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/1.%20field_types/radio)
* [radio_image](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/1.%20field_types/radio_image)
* [rich_text](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/1.%20field_types/rich_text)
* [select](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/1.%20field_types/select)
* [separator](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/1.%20field_types/separator)
* [set](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/1.%20field_types/set)
* [sidebar](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/1.%20field_types/sidebar)
* [text](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/1.%20field_types/text)
* [textarea](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/1.%20field_types/textarea)
* [time](https://github.com/wolfiesites/yaml-to-wordpress/tree/main/examples/1.%20field_types/time)


## example of all fields:
with basic options in one file to choose:<br>
[config.yaml](https://github.com/wolfiesites/yaml-to-wordpress/blob/main/examples/1.%20field_types/config.yaml)

## how to retrieve values from fields?
 * post meta
```
// Assuming you have a field with the name 'custom_field_name' attached to a post
$custom_field_value = carbon_get_post_meta(get_the_ID(), 'custom_field_name');

// Now you can use $custom_field_value as needed
echo 'Custom Field Value: ' . $custom_field_value;
```
  * theme options
```
// Assuming you have a field with the name 'theme_option_name' set in the theme options
$theme_option_value = carbon_get_theme_option('theme_option_name');

// Now you can use $theme_option_value as needed
echo 'Theme Option Value: ' . $theme_option_value;

```