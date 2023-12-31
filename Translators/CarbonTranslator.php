<?php
namespace Wolfiesties\Translators;

use Wolfiesties\Formatters\Text;

class CarbonTranslator {

    public static function translate_post_meta($yaml_content) {
    	$code = '';
    	if (empty($yaml_content)) {
    		echo 'Sth wrong with ur yaml configuration';
    		return;
    	}

        // foreach list here 
        foreach ($yaml_content as $post_meta) {
        	$prefix = (isset($post_meta['prefix'])) ? $post_meta['prefix'].'_' : '';

	        $code .= "\n\tContainer::make('post_meta', __('" . $post_meta['name'] . "'))";
	        if (isset($post_meta['fields']) && is_array($post_meta['fields'])) {
	        	$code .= self::translate_fields($post_meta['fields'], true, $prefix);
	        }

	        // conditinal logic for 'where'
	        if (isset($post_meta['where']) && !empty($post_meta['where'])) {
	        	foreach ($post_meta['where'] as $where) {
	        		if (isset($where['state'])) {
	        			$state = (isset($where['state'])) ? $where['state'] : [] ;
	        			$code .= '->where('.self::to_imploded_array($state).')'; // wrap each word into '', 
	        		}
	        	}
	        }


	        // conditinal logic for 'where'
	        if (isset($post_meta['or_where']) && !empty($post_meta['or_where'])) {
	        	foreach ($post_meta['or_where'] as $where) {
	        		if (isset($where['state'])) {
	        			$state = (isset($where['state'])) ? $where['state'] : [] ;
	        			$code .= '->or_where('.self::to_imploded_array($state).')'; // wrap each word into '', 
	        		}
	        	}
	        }

	        if (isset($post_meta['context'])) {
	        		$code .= '->set_context("'.$post_meta['context'].'")'; // wrap each word into '', 
	        }

	        if (isset($post_meta['priority'])) {
	        		$code .= '->set_priority("'.$post_meta['priority'].'")'; // wrap each word into '', 
	        }

			if (isset($post_meta['tabs']) && is_array($post_meta['tabs'])) {
	            $code .= self::translate_tabs($post_meta['tabs'], $prefix);
	        }

	        $code .= ";\n\t";

        }

        echo $code;
    }

    public static function translate_term_meta($yaml_content) {
    	$code = '';
    	if (empty($yaml_content)) {
    		echo 'Sth wrong with ur yaml configureation';
    		return;
    	}

        // foreach list here 
        foreach ($yaml_content as $post_meta) {
        	$prefix = (isset($post_meta['prefix'])) ? $post_meta['prefix'].'_' : '';

	        $code .= "\n\tContainer::make('term_meta', __('" . $post_meta['name'] . "'))";
	        if (isset($post_meta['fields']) && is_array($post_meta['fields'])) {
	        	$code .= self::translate_fields($post_meta['fields'], true, $prefix);
	        }

	        // conditinal logic for 'where'
	        if (isset($post_meta['where']) && !empty($post_meta['where'])) {
	        	foreach ($post_meta['where'] as $where) {
	        		if (isset($where['state'])) {
	        			$state = (isset($where['state'])) ? $where['state'] : [] ;
	        			$code .= '->where('.self::to_imploded_array($state).')'; // wrap each word into '', 
	        		}
	        	}
	        }


	        // conditinal logic for 'where'
	        if (isset($post_meta['or_where']) && !empty($post_meta['or_where'])) {
	        	foreach ($post_meta['or_where'] as $where) {
	        		if (isset($where['state'])) {
	        			$state = (isset($where['state'])) ? $where['state'] : [] ;
	        			$code .= '->or_where('.self::to_imploded_array($state).')'; // wrap each word into '', 
	        		}
	        	}
	        }


			if (isset($post_meta['tabs']) && is_array($post_meta['tabs'])) {
	            $code .= self::translate_tabs($post_meta['tabs'], $prefix);
	        }

	        $code .= ";\n\t";

        }

        echo $code;
    }

    public static function translate_user_meta($yaml_content) {
    	$code = '';
    	if (empty($yaml_content)) {
    		echo 'Sth wrong with ur yaml configureation';
    		return;
    	}

        // foreach list here 
        foreach ($yaml_content as $post_meta) {
        	$prefix = (isset($post_meta['prefix'])) ? $post_meta['prefix'].'_' : '';

	        $code .= "\n\tContainer::make('user_meta', __('" . $post_meta['name'] . "'))";
	        if (isset($post_meta['fields']) && is_array($post_meta['fields'])) {
	        	$code .= self::translate_fields($post_meta['fields'], true, $prefix);
	        }

	        // conditinal logic for 'where'
	        if (isset($post_meta['where']) && !empty($post_meta['where'])) {
	        	foreach ($post_meta['where'] as $where) {
	        		if (isset($where['state'])) {
	        			$state = (isset($where['state'])) ? $where['state'] : [] ;
	        			$code .= '->where('.self::to_imploded_array($state).')'; // wrap each word into '', 
	        		}
	        	}
	        }


	        // conditinal logic for 'where'
	        if (isset($post_meta['or_where']) && !empty($post_meta['or_where'])) {
	        	foreach ($post_meta['or_where'] as $where) {
	        		if (isset($where['state'])) {
	        			$state = (isset($where['state'])) ? $where['state'] : [] ;
	        			$code .= '->or_where('.self::to_imploded_array($state).')'; // wrap each word into '', 
	        		}
	        	}
	        }


			if (isset($post_meta['tabs']) && is_array($post_meta['tabs'])) {
	            $code .= self::translate_tabs($post_meta['tabs'], $prefix);
	        }

	        $code .= ";\n\t";

        }

        echo $code;
    }

    public static function translate_comment_meta($yaml_content) {
    	$code = '';
    	if (empty($yaml_content)) {
    		echo 'Sth wrong with ur yaml configureation';
    		return;
    	}

        // foreach list here 
        foreach ($yaml_content as $post_meta) {
        	$prefix = (isset($post_meta['prefix'])) ? $post_meta['prefix'].'_' : '';

	        $code .= "\n\tContainer::make('user_meta', __('" . $post_meta['name'] . "'))";
	        if (isset($post_meta['fields']) && is_array($post_meta['fields'])) {
	        	$code .= self::translate_fields($post_meta['fields'], true, $prefix);
	        }

	        // conditinal logic for 'where'
	        if (isset($post_meta['where']) && !empty($post_meta['where'])) {
	        	foreach ($post_meta['where'] as $where) {
	        		if (isset($where['state'])) {
	        			$state = (isset($where['state'])) ? $where['state'] : [] ;
	        			$code .= '->where('.self::to_imploded_array($state).')'; // wrap each word into '', 
	        		}
	        	}
	        }

	        // conditinal logic for 'where'
	        if (isset($post_meta['or_where']) && !empty($post_meta['or_where'])) {
	        	foreach ($post_meta['or_where'] as $where) {
	        		if (isset($where['state'])) {
	        			$state = (isset($where['state'])) ? $where['state'] : [] ;
	        			$code .= '->or_where('.self::to_imploded_array($state).')'; // wrap each word into '', 
	        		}
	        	}
	        }


			if (isset($post_meta['tabs']) && is_array($post_meta['tabs'])) {
	            $code .= self::translate_tabs($post_meta['tabs'], $prefix);
	        }

	        $code .= ";\n\t";

        }

        echo $code;
    }

    public static function translate_theme_options($yaml_content) {
    	$code = '';
    	if (empty($yaml_content)) {
    		echo 'Sth wrong with ur yaml configureation';
    		return;
    	}

        // foreach list here 
        foreach ($yaml_content as $theme_option) {
        	$prefix = (isset($theme_option['prefix'])) ? $theme_option['prefix'].'_' : '';

	        $code .= "\n\tContainer::make('theme_options', __('" . $theme_option['name'] . "'))";
	        if (isset($theme_option['fields']) && is_array($theme_option['fields'])) {
	        	$code .= self::translate_fields($theme_option['fields'], true, $prefix);
	        }

	        if (isset($theme_option['menu_title'])) {
	        	$code .= '->set_page_menu_title("'.$theme_option['menu_title'].'")';
	        }

	        if (isset($theme_option['parent'])) {
	        	$code .= '->set_page_parent("'.$theme_option['parent'].'")';
	        }

	        if (isset($theme_option['icon'])) {
	        	$code .= '->set_icon("'.$theme_option['icon'].'")';
	        }

	        if (isset($theme_option['order']) OR isset($theme_option['position_in_menu'])  ) {
	        	$order = (isset($theme_option['order'])) ? $theme_option['order'] : false ;
	        	$order = (isset($theme_option['position_in_menu'])) ? $theme_option['position_in_menu'] : $order ;
	        	$code .= '->set_page_menu_position('.$order.')';
	        }

			if (isset($theme_option['tabs']) && is_array($theme_option['tabs'])) {
	            $code .= self::translate_tabs($theme_option['tabs'], $prefix);
	        }

	        $code .= ";\n\t";

        }

        echo $code;
    }

    private static function translate_tabs($tabs, $prefix='crb_') {
        $tabsCode = '';

        foreach ($tabs as $tab) {
        	$fields = (isset($tab['fields'])) ? $tab['fields'] : false;
            $tabsCode .= "\n\t->add_tab('" . $tab['name'] . "', array(";
            $tabsCode .= self::translate_fields($fields, false, $prefix);
            $tabsCode .= "\n\t))";
        }

        return $tabsCode;
    }

    private static function translate_fields($yaml_content, $wrapper=false, $prefix='crb_') {
    		$code = '';
    		if (!$yaml_content) {
    			$code .= "Field::make('html', 'empty_tab_".self::randomid()."', 'empty tab')";
		        $code .= "->set_html('<p>you need to specify some fields in ur tabs: yaml configuration file</p>')";
				return $code;
    		}


    		if ($wrapper) {
            	$code .= "\n\t->add_fields(array(";
    		}

            foreach ($yaml_content as $field) {
                $code .= "\n\t\t";

                // adjust somme variables
                $name = $field['name'];
                $field['name'] = self::make_snake_case($prefix.$field['name']);
                $field['label'] = (isset($field['label'])) ? $field['label'] : self::make_spaces($name);

                // Check field type and generate code accordingly
                switch ($field['type']) {

                	case 'association':
                        $code .= "Field::make('association', '" . $field['name'] . "')";
                         if (isset($field['options']['min'])) {
                            $code .= "->set_min(" . $field['options']['min'] . ")";
                        }
                        if (isset($field['options']['max'])) {
                            $code .= "->set_max(" . $field['options']['max'] . ")";
                        }
                        if (isset($field['options']['duplicates_allowed'])) {
                            $code .= "->set_duplicates_allowed(" . ($field['options']['duplicates_allowed'] ? 'true' : 'false') . ")";
                        }
                        if (isset($field['options']['types']) && is_array($field['options']['types'])) {
                            $code .= "->set_types(" . self::arrayToPhpArray($field['options']['types']) . ")";
                        }
                        break;

                    case 'checkbox':
                        $code .= "Field::make('checkbox', '" . $field['name'] . "', '" . $field['label'] . "')";
                        if (isset($field['options']['value'])) {
                            $code .= "->set_option_value('" . $field['options']['value'] . "')";
                        }
                        break;

                    case 'color':
                        $code .= "Field::make('color', '" . $field['name'] . "', '" . $field['label'] . "')";
                        if (isset($field['options']['palette']) && is_array($field['options']['palette'])) {
                            $code .= "->set_palette(" . json_encode($field['options']['palette']) . ")";
                        }
						if (isset($field['options']['alpha_enabled']) && $field['options']['alpha_enabled']) {
                            $code .= "->set_alpha_enabled(true)";
                        }
                        break;

                    case 'date':
                        $code .= "Field::make('date', '" . $field['name'] . "', '" . $field['label'] . "')";
                        if (isset($field['options']) && is_array($field['options'])) {
                            // Options specific to the 'date' field type
                            if (isset($field['options']['placeholder'])) {
                                $code .= "->set_attribute('placeholder', '" . $field['options']['placeholder'] . "')";
                            }
                            if (isset($field['options']['storage_format'])) {
                                $code .= "->set_storage_format('" . $field['options']['storage_format'] . "')";
                            }
                            if (isset($field['options']['input_format']) && is_array($field['options']['input_format'])) {
                                $code .= "->set_input_format(" . self::arrayToPhpString($field['options']['input_format']) . ")";
                            }
                            if (isset($field['options']['picker_options']) && is_array($field['options']['picker_options'])) {
                                $code .= "->set_picker_options(" . self::arrayToPhpArray($field['options']['picker_options']) . ")";
                            }
                        }
                        break;

                    case 'date_time':
                        $code .= "Field::make('date_time', '" . $field['name'] . "', '" . $field['label'] . "')";
                        if (isset($field['options']) && is_array($field['options'])) {
                            // Options specific to the 'date' field type
                            if (isset($field['options']['placeholder'])) {
                                $code .= "->set_attribute('placeholder', '" . $field['options']['placeholder'] . "')";
                            }
                            if (isset($field['options']['storage_format'])) {
                                $code .= "->set_storage_format('" . $field['options']['storage_format'] . "')";
                            }
                            if (isset($field['options']['input_format']) && is_array($field['options']['input_format'])) {
                                $code .= "->set_input_format(" . self::arrayToPhpString($field['options']['input_format']) . ")";
                            }
                            if (isset($field['options']['picker_options']) && is_array($field['options']['picker_options'])) {
                                $code .= "->set_picker_options(" . self::arrayToPhpArray($field['options']['picker_options']) . ")";
                            }
                        }
                        break;

                    case 'file':
                        $code .= "Field::make('file', 'crb_file', 'File')";
                        if (isset($field['options']['types']) && is_array($field['options']['types'])) {
                            $code .= "->set_type(" . self::arrayToPhpArray($field['options']['types']) . ")";
                        }
                        if (isset($field['options']['value_type'])) {
                            $code .= "->set_value_type('" . $field['options']['value_type'] . "')";
                        }
                        break;

                    case 'footer_scripts':
                        $code .= "Field::make('footer_scripts', '" . $field['name'] . "', '" . $field['label'] . "')";
                        break;

                    case 'gravity_form':
                        $code .= "Field::make('gravity_form', '" . $field['name'] . "', '" . $field['label'] . "')";
                        break;

                    case 'header_scripts':
                        $code .= "Field::make('header_scripts', '" . $field['name'] . "', '" . $field['label'] . "')";
                        if (isset($field['options']['hook_name'])) {
                            $code .= "->set_hook_name('" . $field['options']['hook_name'] . "')";
                        }
                        if (isset($field['options']['hook_priority'])) {
                            $code .= "->set_hook_priority(" . $field['options']['hook_priority'] . ")";
                        }
                        if (isset($field['options']['hook'])) {
                            $code .= "->set_hook('" . $field['options']['hook'] . "')";
                        }
                        break;



					case 'rich_text':
                        $code .= "Field::make('rich_text', '" . $field['name'] . "', '" . $field['label'] . "')";
                        break;

					case 'text':
					    $code .= "Field::make('text', '" . $field['name'] . "', '" . $field['label'] . "')";
					    if (isset($field['options']['data'])) {
					        $code .= "->set_attribute('data-*', '" . $field['options']['data'] . "')";
					    }
					    if (isset($field['options']['type'])) {
					        $code .= "->set_attribute('type', '" . $field['options']['type'] . "')";
					    }
					    if (isset($field['options']['placeholder'])) {
					        $code .= "->set_attribute('placeholder', '" . $field['options']['placeholder'] . "')";
					    }
					    if (isset($field['options']['maxLength'])) {
					        $code .= "->set_attribute('maxLength', " . $field['options']['maxLength'] . ")";
					    }
					    if (isset($field['options']['minLength'])) {
					        $code .= "->set_attribute('minLength', " . $field['options']['minLength'] . ")";
					    }
					    if (isset($field['options']['pattern'])) {
					        $code .= "->set_attribute('pattern', '" . $field['options']['pattern'] . "')";
					    }
					    if (isset($field['options']['readOnly'])) {
					        $code .= "->set_attribute('readOnly', " . ($field['options']['readOnly'] ? 'true' : 'false') . ")";
					    }
					    break;

					case 'hidden':
					    $code .= "Field::make('hidden', '" . $field['name'] . "', '" . $field['label'] . "')";
					    if (isset($field['options']['data'])) {
					        $code .= "->set_attribute('data-*', '" . $field['options']['data'] . "')";
					    }
					    break;

					case 'html':
					    $code .= "Field::make('html', '" . $field['name'] . "', '" . $field['label'] . "')";
					    if (isset($field['html'])) {
					        $code .= "->set_html('" . $field['html'] . "')";
					    }
					    break;

					case 'image':
					    $code .= "Field::make('image', '" . $field['name'] . "', '" . $field['label'] . "')";
					    if (isset($field['options']['types']) && is_array($field['options']['types'])) {
					        $code .= "->set_type(" . self::arrayToPhpArray($field['options']['types']) . ")";
					    }
					    if (isset($field['options']['value_type'])) {
					        $code .= "->set_value_type('" . $field['options']['value_type'] . "')";
					    }
					    break;

					case 'map':
					    $code .= "Field::make('map', '" . $field['name'] . "', '" . $field['label'] . "')";
						if (isset($field['position'])) {
                    		$code .= "->set_position(" . $field['position'] . ")";
                		}
					    break;

					case 'media_gallery':
					    $code .= "Field::make('media_gallery', '" . $field['name'] . "', '" . $field['label'] . "')";
					    if (isset($field['options']['types']) && is_array($field['options']['types'])) {
					        $code .= "->set_type(" . self::arrayToPhpArray($field['options']['types']) . ")";
					    }
					    if (isset($field['options']['duplicates_allowed'])) {
					        $code .= "->set_duplicates_allowed(" . ($field['options']['duplicates_allowed'] ? 'true' : 'false') . ")";
					    }
					    break;

					case 'multiselect':
					    $code .= "Field::make('multiselect', '" . $field['name'] . "', '" . $field['label'] . "')";
					    if (isset($field['options']) && is_array($field['options'])) {
					        $code .= "->add_options(" . self::arrayToPhpArray($field['options']) . ")";
					    }
					    break;

					case 'oembed':
					    $code .= "Field::make('oembed', '" . $field['name'] . "', '" . $field['label'] . "')";
					    break;

					case 'radio':
					    $code .= "Field::make('radio', '" . $field['name'] . "', '" . $field['label'] . "')";
					    if (isset($field['options']) && is_array($field['options'])) {
					        $code .= "->add_options(" . self::arrayToPhpArray($field['options']) . ")";
					    }
					    break;

					case 'radio_image':
					    $code .= "Field::make('radio_image', '" . $field['name'] . "', '" . $field['label'] . "')";
					    if (isset($field['options']) && is_array($field['options'])) {
					        $code .= "->set_options(" . self::arrayToPhpArray($field['options']) . ")";
					    }
					    break;

					case 'select':
					    $code .= "Field::make('select', '" . $field['name'] . "', '" . $field['label'] . "')";
					    if (isset($field['options']) && is_array($field['options'])) {
					        $code .= "->add_options(" . self::arrayToPhpArray($field['options']) . ")";
					    }
					    break;

					case 'separator':
					    $code .= "Field::make('separator', '" . $field['name'] . "', '" . $field['label'] . "')";
					    break;

					case 'set':
					    $code .= "Field::make('set', '" . $field['name'] . "', '" . $field['label'] . "')";
					    if (isset($field['options']) && is_array($field['options'])) {
					        $code .= "->add_options(" . self::arrayToPhpArray($field['options']) . ")";
					    }
					    break;

					case 'sidebar':
					    $code .= "Field::make('sidebar', '" . $field['name'] . "', '" . $field['label'] . "')";
					    if (isset($field['exclude'])) {
					        $code .= "->set_excluded_sidebars(" . self::arrayToPhpArray([$field['exclude']]) . ")";
					    }
					    break;

					case 'textarea':
					    $code .= "Field::make('textarea', '" . $field['name'] . "', '" . $field['label'] . "')";
					    if (isset($field['options']['data'])) {
					        $code .= "->set_attribute('data-*', '" . $field['options']['data'] . "')";
					    }
					    if (isset($field['options']['placeholder'])) {
					        $code .= "->set_attribute('placeholder', '" . $field['options']['placeholder'] . "')";
					    }
					    if (isset($field['options']['maxLength'])) {
					        $code .= "->set_attribute('maxLength', " . $field['options']['maxLength'] . ")";
					    }
					    if (isset($field['options']['minLength'])) {
					        $code .= "->set_attribute('minLength', " . $field['options']['minLength'] . ")";
					    }
					    if (isset($field['options']['readOnly'])) {
					        $code .= "->set_attribute('readOnly', " . ($field['options']['readOnly'] ? 'true' : 'false') . ")";
					    }
					    if (isset($field['options']['row'])) {
					        $code .= "->set_rows(". $field['options']['row'] . ")";
					    }
					    break;

					case 'time':
                        $code .= "Field::make('time', '" . $field['name'] . "', '" . $field['label'] . "')";
                        if (isset($field['options']) && is_array($field['options'])) {
                            // Options specific to the 'time' field type
                            if (isset($field['options']['placeholder'])) {
                                $code .= "->set_attribute('placeholder', '" . $field['options']['placeholder'] . "')";
                            }
                            if (isset($field['options']['storage_format'])) {
                                $code .= "->set_storage_format('" . $field['options']['storage_format'] . "')";
                            }
                            if (isset($field['options']['input_format']) && is_array($field['options']['input_format'])) {
                                $code .= "->set_input_format(" . self::arrayToPhpString($field['options']['input_format']) . ")";
                            }
                            if (isset($field['options']['picker_options']) && is_array($field['options']['picker_options'])) {
                                $code .= "->set_picker_options(" . self::arrayToPhpArray($field['options']['picker_options']) . ")";
                            }
                        }
                        break;

					case 'complex':
						$field['name'] = $name;
						$code .= self::generateComplexFieldCode($field, $prefix);
            			break;

                    default:
                        // Handle unknown field types if needed
                        break;
                }
                // add here common logic to all fields
                if (isset($field['conditional_logic']) && is_array($field['conditional_logic'])) {
                    $code .= "->set_conditional_logic(" . self::arrayToPhpArray($field['conditional_logic']) . ")";
                }
                if (isset($field['help'])) {
                    $code .= "->set_help_text('" . $field['help'] . "')";
                }
                if (isset($field['default'])) {
                    $code .= "->set_default_value('" . $field['default'] . "')";
                }
                if (isset($field['required'])) {
                    $code .= "->set_required(" . $field['required'] . ")";
                }
                if (isset($field['width'])) {
                    $code .= "->set_width('" . $field['width'] . "')";
                }
                if (isset($field['classes'])) {
                    $code .= "->set_classes('" . $field['classes'] . "')";
                }
                
                $code .= ",";
            }

			if ($wrapper) {
            	$code .= "\n\t))";
    		}
            

        return $code;
    }

    private static function generateComplexFieldCode($complexField, $prefix='crb_') {
	    $code = '';
	    $prefix = isset($complexField['prefix']) ? $complexField['prefix'].'_' : $prefix ;
	    $complexName = $complexField['name'];
	    $complexField['name'] = self::make_snake_case($prefix . $complexName);
	    $complexField['label'] = (isset($complexField['label'])) ? $complexField['label'] : self::make_spaces($complexName);
	    $singular = Text::make_singular($complexName); 

        if (isset($complexField['fields']) && is_array($complexField['fields'])) {
	    	$code = "Field::make('complex', '" . $complexField['name'] . "')";
            if (isset($complexField['options']['duplicates_allowed'])) {
                $code .= "->set_duplicate_groups_allowed(" . ($complexField['options']['duplicates_allowed'] ? 'true' : 'false') . ")";
            }
            $code .= "->add_fields('".$singular."',array(";
	    	$code .= self::translate_fields($complexField['fields'], false, $prefix);
	    	$code .= "\n\t\t))";
         }

	    return $code;
	}
    // utils
    private static function arrayToPhpArray($array) {
        return var_export(json_decode(json_encode($array), true), true);
    }

    private static function arrayToPhpString($array) {
    	$string = var_export(json_decode(json_encode($array), true), true);
    	$string = json_encode($array, JSON_PRETTY_PRINT);
    	$string = str_replace(['[',']'],'',$string);
        return $string;
    }

    private static function randomid($length = 6) {
    	$characters = 'abcdefghijklmnopqrstuvwxyz0123456789-_';
    	$randomString = '';

	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, strlen($characters) - 1)];
	    }

	    return $randomString;
	}

	private static function make_spaces($string) {
    	$formattedString = str_replace(['_', '-'], ' ', $string);
    	return $formattedString;
	}

	private static function make_snake_case($string) {
    	$formattedString = strtolower(str_replace([' ', '-'], '_', $string));
    	return $formattedString;
	}

	 private static function to_imploded_array($inputString) {
	 	if (!is_string($inputString)) {
	 		return false;
	 	}
        $words = explode(' ', $inputString);
        $quotedWords = array_map(function($word) {
            return "'$word'";
        }, $words);
        return implode(', ', $quotedWords);
    }

}
