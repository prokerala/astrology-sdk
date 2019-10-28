<?php

// for more info see:
// https://github.com/FriendsOfPHP/PHP-CS-Fixer#usage
// https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/master/UPGRADE.md

$finder = PhpCsFixer\Finder::create()
	->in(__DIR__)
;

return PhpCsFixer\Config::create()
	->setRules([
		'@PSR1' => true,
		'@PSR2' => true,
		'@Symfony' => true,
		'@PhpCsFixer' => true,
		'@PHP71Migration' => true,
		'cast_spaces' => ['space' => 'none'],
		'concat_space' => ['spacing' => 'one'],
	 	'class_definition' => true,
		'phpdoc_separation' => false,
		'phpdoc_summary' => false,
		'semicolon_after_instruction' => false,
		'no_short_echo_tag' => false,
		'no_alternative_syntax' => false,
	])
	->setLineEnding("\n")
	->setFinder($finder)
;
