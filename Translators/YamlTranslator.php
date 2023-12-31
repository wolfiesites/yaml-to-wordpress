<?php
namespace Wolfiesties\Translators;

use Symfony\Component\Yaml\Yaml;
use Wolfiesites\Translators\CarbonTranslator;
use Wolfiesites\Translators\PostTranslator;
use Wolfiesites\Translators\SidebarTranslator;

class YamlTranslator {
	protected $yaml_content;

	public static function translate($yaml_content) {
		$php_string = '';
		$parsed_yaml = Yaml::parse($yaml_content);
        $first_level_keys = array_keys($parsed_yaml);
		$first_level_keys = self::reorderArray($first_level_keys,['taxonomy', 'post_type','sidebar']);


        ob_start();
        echo "\n\tuse Carbon_Fields\Container;";
        echo "\n\tuse Carbon_Fields\Field;";
        if (!empty($first_level_keys)) {
        	foreach ($first_level_keys as $key) {
        		switch ($key) {
        			case 'settings_page':
        				CarbonTranslator::translate_theme_options($parsed_yaml['settings_page']);
        				break;
        			case 'post_meta':
        				CarbonTranslator::translate_post_meta($parsed_yaml['post_meta']);
        				break;
        			case 'term_meta':
        				CarbonTranslator::translate_term_meta($parsed_yaml['term_meta']);
        				break;
        			case 'user_meta':
        				CarbonTranslator::translate_user_meta($parsed_yaml['user_meta']);
        				break;
        			case 'comment_meta':
        				CarbonTranslator::translate_comment_meta($parsed_yaml['comment_meta']);
        				break;
        			case 'post_type':
        				PostTranslator::translate($parsed_yaml['post_type']);
        				break;
        			case 'taxonomy':
        				PostTranslator::register_taxonomy($parsed_yaml['taxonomy']);
        				break;
        			case 'sidebar':
        				SidebarTranslator::translate($parsed_yaml['sidebar']);
        				break;
        			default:
        				break;
        		}
        	}
        }
        $php_string = ob_get_clean();
        return $php_string;
	}

	public static function execute($yaml_content) {
		eval(self::translate($yaml_content));
	}

	public static function reorderArray($inputArray, $order) {
		$outputArray = [];
		foreach ($order as $item) {
		    if (in_array($item, $inputArray)) {
		        $outputArray[] = $item;
		    }
		}

		foreach ($inputArray as $item) {
		    if (!in_array($item, $outputArray)) {
		        $outputArray[] = $item;
		    }
		}

		return $outputArray;
	}
}
