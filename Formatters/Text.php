<?php

namespace Wolfiesites\Formatters;

class Text {

	// irregular plural words
    private static $irregularPlurals = [
        'child' 	=> 'children',
        'person' 	=> 'people',
        'ox' 		=> 'oxen',
        'radius' 	=> 'radii',
        'man' 		=> 'men',
        'woman' 	=> 'women',
        'tooth' 	=> 'teeth',
        'foot' 		=> 'feet',
        'mouse' 	=> 'mice',
        'goose' 	=> 'geese',
        'cactus' 	=> 'cacti',
        'focus' 	=> 'foci',
    ];
    // words that remains the same in plural
	private static $commonExceptions = [
        'series' 	=> 'series',   
        'species' 	=> 'species',
    ];

    public static function is_plural($word) {
        // Check if the word is an irregular plural
        if (in_array($word, self::$irregularPlurals)) {
            return true;
        }

        // Check if the word is a common exception
        if (in_array($word, self::$commonExceptions)) {
            return true;
        }

        // Check if the word ends with 's'
        if (substr($word, -1) === 's') {
            return true;
        }

        // Check if the word ends with 'ies' and the preceding character is not a vowel
        if (substr($word, -3) === 'ies' && !in_array(substr($word, -4, 1), ['a', 'e', 'i', 'o', 'u'])) {
            return true;
        }

        return false; // If no rules apply, assume it's not plural
    }

    public static function make_plural($singular) {
        // Check if the word is an irregular plural
        if (array_key_exists($singular, self::$irregularPlurals)) {
            return self::$irregularPlurals[$singular];
        }

        // Check if the word is a common exception
        if (array_key_exists($singular, self::$commonExceptions)) {
            return self::$commonExceptions[$singular];
        }

        // Check if the word ends with 'y' and change it to 'ies'
        if (substr($singular, -1) === 'y' && !in_array(substr($singular, -2, 1), ['a', 'e', 'i', 'o', 'u'])) {
            return substr($singular, 0, -1) . 'ies';
        }

        // Basic rule for pluralization: add 's' at the end
        return $singular . 's';
    }

    public static function make_singular($plural) {
        // Check if the word is an irregular singular
        $irregularSingulars = array_flip(self::$irregularPlurals);
        if (array_key_exists($plural, $irregularSingulars)) {
            return $irregularSingulars[$plural];
        }

        // Check if the word is a common exception
        $commonSingulars = array_flip(self::$commonExceptions);
        if (array_key_exists($plural, $commonSingulars)) {
            return $commonSingulars[$plural];
        }

        // Check if the word ends with 'ies' and change it to 'y'
        if (substr($plural, -3) === 'ies' && !in_array(substr($plural, -4, 1), ['a', 'e', 'i', 'o', 'u'])) {
            return substr($plural, 0, -3) . 'y';
        }

        // Basic rule for singularization: remove 's' at the end
        if (substr($plural, -1) === 's') {
            return substr($plural, 0, -1);
        }

        return $plural; // If no rules apply, return the same word
    }

    public static function make_spaces($string) {
        $formattedString = str_replace(['_', '-'], ' ', $string);
        return $formattedString;
    }

    public static function make_sentence($string) {
        $formattedString = self::make_spaces($string);
        $sentence = self::capitalize_first_letter($formattedString);
        return $sentence;
    }

    public static function capitalize($string) {
        $capitalizedString = ucwords($string);
        return $capitalizedString;
    }

    public static function capitalize_first_letter($sentence) {
        if (empty($sentence)) {
            return $sentence;
        }
        $sentence = ucfirst($sentence);
        return $sentence;
    }

    public static function to_uppercase($string) {
        $uppercaseString = strtoupper($string);
        return $uppercaseString;
    }

    public static function to_lowercase($string) {
        $lowercaseString = strtolower($string);
        return $lowercaseString;
    }

    public static function to_sentence($string) {
        $formattedString = self::make_spaces($string);
        $sentence = self::capitalize_first_letter($formattedString);
        return $sentence;
    }

    public static function to_snake_case($string) {
        $snakeCase = strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $string));
        return $snakeCase;
    }

    public static function to_kebab_case($string) {
        $kebabCase = strtolower(str_replace('_', '-', self::to_snake_case($string)));
        return $kebabCase;
    }

    public static function to_pascal_case($string) {
        $pascalCase = str_replace(' ', '', ucwords(str_replace(['_', '-'], ' ', $string)));
        return $pascalCase;
    }

    public static function to_camel_case($string) {
        $camelCase = lcfirst(self::to_pascal_case($string));
        return $camelCase;
    }
}