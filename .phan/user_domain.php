<?php
/**
 * UserコンテキストのDomain (Enterprise Business Rules)が依存関係違反をしていないかを判定するためのphanのconfig
 *  app/Contexts/User/Domainに属するクラスは下記に属するクラスへの依存のみ許容する
 *  ・app/Contexts/User/Domain (Enterprise Business Rules)
 *  ・app/Contexts/Base/Domain (Enterprise Business Rules)
 */
return [
    'directory_list' => [
        'app/Contexts/Base/Domain',
        'app/Contexts/User/Domain',
    ],
];
