# Overview
DDD, CleanArchitectureを採用したSNSアプリケーションを想定したWebAPIの実装リポジトリ（逐次実装中）

# 環境
### ローカル環境構築

```
$ git clone https://github.com/SuzukiCecil/sns-api.git
$ cd sns-api
$ composer install
$ php artisan serve --host=127.0.0.1 --port=10000
```

# ユースケース図
![SNSユースケース図 drawio](https://github.com/SuzukiCecil/sns-api/assets/46370648/78d6c205-0b39-4a53-9d13-562850040633)

# ER図
![SNS ER図 drawio](https://github.com/SuzukiCecil/sns-api/assets/46370648/b4183abc-6aeb-4fd7-8477-33ed61ae6b29)

# ユビキタス言語辞書
|コンテキスト|単語|日本語表記|意味|
---|---|---|---
|アクティビティコンテキスト|Activity|アクティビティ|ユーザーによる投稿全般。ActivityにはContribution, Share, Replyの3種類が存在する。|
|アクティビティコンテキスト|Contribution|コントリビューション|Activityの1種。投稿。|
|アクティビティコンテキスト|Share|シェア|Activityの1種。単一のContributionを自身のActivityに追加する。|
|アクティビティコンテキスト|Reply|リプライ|Activityの1種。単一のContributionに対する返信。|
|アクティビティコンテキスト|Activator|アクティベータ|Activityの投稿者として紐づくUser。アクティビティコンテキストでは個人情報の取り扱いを一切行わない。|
|アクティビティコンテキスト|Timeline|タイムライン|フォロイーのアクティビティの一覧。|
|会員管理コンテキスト|User|ユーザー|会員登録済みのWebサービスのユーザー。|
|会員管理コンテキスト|Follow|フォロー|Userを選択し、そのUserがActivatorとして投稿したActivityを自身のTimelineに表示させる行為。|
|会員管理コンテキスト|Follower|フォロワー|Followにおいて、Followが行われたUser|
|会員管理コンテキスト|Followee|フォロイー|Followにおいて、Followが行ったUser|

# ディレクトリ構成
TODO：READMEの作成
