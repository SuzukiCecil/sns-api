<?php
// Activityコンテキストが依存関係違反をしていないかを判定するためのphanのconfig
return [
    'directory_list' => [
        'app/Contexts/Base',
        'app/Contexts/Activity',
    ],
];
