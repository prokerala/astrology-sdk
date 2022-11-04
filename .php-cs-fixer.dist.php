<?php

$header = <<<'EOF'
This file is part of Prokerala Astrology API PHP SDK

© Ennexa Technologies <support+api@ennexa.com>

This source file is subject to the MIT license that is bundled
with this source code in the file LICENSE.
EOF;

$finder = PhpCsFixer\Finder::create()
    ->exclude('tests/Fixtures')
    ->in(__DIR__)
    ->append([__DIR__.'/php-cs-fixer'])
;

$config = (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR1' => true,
        '@PSR2' => true,
        '@Symfony' => true,
        '@PhpCsFixer' => true,
        // '@PhpCsFixer:risky' => true,
        'date_time_immutable' => true,
        'cast_spaces' => ['space' => 'none'],
        'concat_space' => ['spacing' => 'one'],
        'class_definition' => true,
        'echo_tag_syntax' => false,
        'phpdoc_to_comment' => false,
        'phpdoc_separation' => false,
        'phpdoc_summary' => false,
        // 'declare_strict_types' => true,
        'semicolon_after_instruction' => false,
        'no_alternative_syntax' => false,
        'phpdoc_no_empty_return' => false,
        'phpdoc_no_alias_tag' => false,
        'phpdoc_add_missing_param_annotation' => false,
        'phpdoc_no_access' => false,
        'ordered_imports' => [
            'sort_algorithm' => 'alpha',
            'imports_order' => ['class', 'function', 'const'],
        ],
        'native_function_invocation' => [
            'include' => ['@compiler_optimized'],
            'scope' => 'namespaced',
        ],
    ])
    ->setFinder($finder)
;

return $config;
