<?php
// Userコンテキストが依存関係違反をしていないかを判定するためのphanのconfig test
return [
    'directory_list' => [
        'app/Contexts/Base',
        'app/Contexts/User',
    ],
];
