<?php
return [
    // 解析のためにクラスやメソッドの情報を取得するディレクトリ。
    // これらと、以下の exclude_analysis_directory_list で指定した
    // ディレクトリとの差分が解析チェックの対象となる
    'directory_list' => [
        'app',
        'vendor',
    ],

    // 解析チェックの対象から除外するディレクトリ。
    'exclude_analysis_directory_list' => [
        'app/Providers',
        'vendor',
    ],
];
