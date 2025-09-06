<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()->exclude([
    'bootstrap/cache',
    'node_modules',
    'resources/views',
    'storage',
])->in(__DIR__);

return (new PhpCsFixer\Config())
    ->setParallelConfig(PhpCsFixer\Runner\Parallel\ParallelConfigFactory::detect())
    ->setRules([
        // RuleSet
        '@PhpCsFixer' => true,
        '@Symfony' => true,
        '@PHP84Migration' => true,

        // PHPDoc
        /**
         * 帰り値がnullかvoidの時、PHPDocから@returnを削除する
         *
         * @see https://cs.symfony.com/doc/rules/phpdoc/phpdoc_no_empty_return.html
         */
        'phpdoc_no_empty_return' => false,
        /**
         * PHPDocから@packageと@subpackageを削除する
         * 特に@packageを拒否する理由もないのでとりあえず許容しています
         *
         * @see https://cs.symfony.com/doc/rules/phpdoc/phpdoc_no_package.html
         */
        'phpdoc_no_package' => false,
        /**
         * PHPDocのサマリ文章を".", "?", "!"で終わらせる
         * 日本語コメントだと「。」で終わるので意味がない
         *
         * @see https://cs.symfony.com/doc/rules/phpdoc/phpdoc_summary.html
         */
        'phpdoc_summary' => false,
        /**
         * アノテーションのないDocblockをコメントに変換する
         *
         * @see https://cs.symfony.com/doc/rules/phpdoc/phpdoc_to_comment.html
         */
        'phpdoc_to_comment' => false,

        // Whitespace
        /**
         * 予約後の前に空行を1行追加する
         * 空行を強制する必要まではないと考えるため
         *
         * @see https://cs.symfony.com/doc/rules/whitespace/blank_line_before_statement.html
         */
        'blank_line_before_statement' => false,

        // Semicolon
        /**
         * セミコロンの前の複数行の空白を禁止するか、連鎖呼び出しのためにセミコロンを新しい行に移動します
         *
         * @see https://cs.symfony.com/doc/rules/semicolon/multiline_whitespace_before_semicolons.html
         */
        'multiline_whitespace_before_semicolons' => ['strategy' => 'no_multi_line'],
    ])->setFinder($finder);
