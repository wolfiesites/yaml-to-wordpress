<?php
namespace Wolfiesites;

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Symfony\Component\Yaml\Yaml;

require_once __DIR__ . '/../../vendor/autoload.php';

class YamlToWp {
	protected $main_config_path;
	protected $other_configs = [];
	protected $yaml_content;


	public function __construct($file_path_to_main_config=__DIR__) {
		$this->set_path_to_main_config($file_path_to_main_config);
		$this->set_yaml_content([$file_path_to_main_config]);
		$this->include_all('classes',['build','built']);
		$this->init();
	}

	private function init() {
    	// write here actions
		add_action('after_setup_theme', [$this, 'crb_load'] );
		add_action('carbon_fields_register_fields', [$this, 'merge_yaml_files'] );
		add_action('carbon_fields_register_fields', [$this, 'execute'] );
		add_action('carbon_fields_register_fields', [$this, 'test'] );
		add_action('admin_footer', [$this, 'footer_scripts'] );

	}

	public function translate() {
		return YamlTranslator::translate($this->yaml_content);
	}

	public function execute() {
		$translatedCode = $this->translate();

		if ($translatedCode) {
        	// echo '<pre style="grid-column:12/1;background:blue;color:white;">';
        	// print_r($translatedCode);
        	// echo '</pre>';
			eval($translatedCode);
		} else {
			echo "Invalid YAML structure or missing required elements.";
		}
	}

	public function merge_yaml_files() {
		$file_paths = array_merge([$this->main_config_path], $this->other_configs);
		$mergedData = [];


		foreach ($file_paths as $filePath) {
			$yamlContent = file_get_contents($filePath);
			$parsedData = Yaml::parse($yamlContent);

	        // Merge data based on the first-level key
			$mergedData = array_merge_recursive($mergedData, $parsedData);
		}

	    // Convert the merged data back to YAML format
		$mergedYaml = Yaml::dump($mergedData, YAML::DUMP_MULTI_LINE_LITERAL_BLOCK);

		$this->set_yaml_content($mergedYaml);
		return $mergedYaml;
	}

    // setters
	private function set_yaml_content($yaml_content) {
		$this->yaml_content = $yaml_content;
	}

	private function set_path_to_main_config($file_path_to_main_config) {
		$this->main_config_path = $file_path_to_main_config;
	}

    // helpers
	private function include_all($directory, $exclude_dirs = []) {
		$iterator = new \RecursiveIteratorIterator(
			new \RecursiveDirectoryIterator(__DIR__ . '/' . $directory, \RecursiveDirectoryIterator::SKIP_DOTS),
			\RecursiveIteratorIterator::SELF_FIRST
		);

		$phpFiles = [];

		$exclude_dirs = array_merge(['vendor', 'node_modules'], $exclude_dirs);

		foreach ($iterator as $file) {
			if ($file->isFile() && $file->getExtension() === 'php') {
				$path = $file->getPathname();
				$phpFiles[] = $path;

				$excludeFile = false;
				foreach ($exclude_dirs as $exclude_dir) {
					if (str_contains($path, $exclude_dir)) {
						$excludeFile = true;
						break;
					}
				}

				if (!$excludeFile) {
					include $path;
				}
			}
		}

		return $phpFiles;
	}

	public function crb_load() {
		\Carbon_Fields\Carbon_Fields::boot();
	}

	public function add_config($config) {
		$this->other_configs[] = $config;
	}

	public function footer_scripts() {
		?>
		<script>
    	// fix taxonomy pages not collapsing parent pages
			jQuery(document).ready(function($) {
				function getCookie(name) {
					var cookies = document.cookie.split(';');
					for (var i = 0; i < cookies.length; i++) {
						var cookie = cookies[i].trim();
						if (cookie.indexOf(name + '=') === 0) {
							return decodeURIComponent(cookie.substring(name.length + 1));
						}
					}
					return null;
				}

				function deleteCookie(name) {
					document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";
				}

				function removeCookie(name) {
					document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";
				}

				function setSessionCookie(name, value) {
					var cookieString = name + '=' + encodeURIComponent(value) + '; path=/';
					document.cookie = cookieString;
				}

				function collapseParent() {
					let parentID = getCookie('wolfie_tmp_menu_parent');
					let childText = getCookie('wolfie_tmp_menu_child');
					if (!parentID && !childText) {
						return false;
					}
					$('#'+parentID).addClass('wp-has-current-submenu wp-menu-open').removeClass('wp-not-current-submenu');
					$('#'+parentID+'> a').addClass('wp-has-current-submenu').removeClass('wp-not-current-submenu');
					$('.wp-has-submenu li:contains('+childText+')').addClass('current');
				}

				$('.wp-has-submenu .wp-submenu li').on('click', function(e){
					let parent = $(this).closest('.wp-has-submenu');
					let parentID = parent.attr('id');
					let childText = $(this).text();
					setSessionCookie('wolfie_tmp_menu_parent', parentID);
					setSessionCookie('wolfie_tmp_menu_child', childText);
				});

				collapseParent();
				deleteCookie('wolfie_tmp_menu_parent');
				deleteCookie('wolfie_tmp_menu_child');

			});
		</script>

		<?php
	}
	public function test() {

		// Container::make( 'theme_options', 'Slider Data' )
		// ->add_fields( array(
		// 	Field::make( 'complex', 'crb_media' )
		// 	->add_fields( 'photograph', array(
		// 		Field::make( 'text', 'caption', __( 'Caption' ) ),
		// 		Field::make( 'image', 'image', __( 'Image' ) )
		// 		->set_value_type( 'url' ),
		// 	) )
		// 	->add_fields( 'movie', array(
		// 		Field::make( 'text', 'length', __( 'Length' ) ),
		// 		Field::make( 'text', 'title', __( 'Title' ) ),
		// 		Field::make( 'file', 'video', __( 'Video' ) )
		// 		->set_value_type( 'url' ),
		// 	) )
		// ));

	}
}

// example of use:
// $yaml_to_wordpress = new YamlToWp(__DIR__.'/index.yaml');
// $yaml_to_wordpress->add_config(__DIR__.'/two.yaml');
// $yaml_to_wordpress->add_config(__DIR__.'/examples/6. mix_of_examples/books__cpt_with_post_meta+taxonomies/config.yaml');
