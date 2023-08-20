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
|ユーザーコンテキスト|User|ユーザー|会員登録済みのWebサービスのユーザー。|
|ユーザーコンテキスト|Follow|フォロー|Userを選択し、そのUserがActivatorとして投稿したActivityを自身のTimelineに表示させる行為。|
|ユーザーコンテキスト|Follower|フォロワー|Followにおいて、Followが行われたUser|
|ユーザーコンテキスト|Followee|フォロイー|Followにおいて、Followが行ったUser|

# ディレクトリ構成
````
app/
    ├ Adapter/                          ← Clean Architectureの「Interface Adapters」層に該当するディレクトリ
    │    ├ Converter/                   ← プログラムの入力をハンドリングするクラス群、UsecaseInputのインターフェースを実現することでApplicationがAdapterに依存することを防いでいる
    │    │    ├ Request/                ← HTTPリクエストの入力値をハンドリングするクラス群
    │    │    └ Exception/              ← プログラムの入力値が不正など、プログラム実行に関する例外クラス群
    │    │
    │    ├ Gateway/                     ← データソースの永続化をハンドリングするクラス群、Repositoryのインターフェースを実現することでApplicationがAdapterに依存することを防いでいる
    │    │    ├ Query/                  ← データソースからデータモデルを取得し、ドメインモデルを生成するクラス群
    │    │    ├ Command/                ← ドメインモデルをデータソースに永続化するクラス群
    │    │    └ Exception/              ← データが存在しないなど、データソースに関する例外クラス群
    │    │
    │    └ Presenter/                   ← プログラムの出力をハンドリングするクラス群
    │         ├ Response/               ← HTTPリクエストのレスポンスをハンドリングするクラス群
    │         ├ Log/                    ← ログ出力をハンドリングするクラス群
    │         └ ViewModel/              ← ドメインモデルを出力値に変換するクラス群
    │    
    ├ Contexts/                         ← Clean Architectureの「Application Business Rules」層, 「Enterprise Business Rules」層に該当するディレクトリ、コンテキストごとにさらにディレクトリを分けている
    │    ├ Base/                        ← コンテキストに属さない「Application Business Rules」層, 「Enterprise Business Rules」層のクラス群
    │    │    ├ Application/            ← 「Application Business Rules」層に属するクラス群
    │    │    │    ├ Usecase/           ← ユースケース
    │    │    │    ├ UsecaseInput/      ← ユースケースの入力値
    │    │    │    └ UsecaseOutput/     ← ユースケースの出力値
    │    │    │    
    │    │    └ Domain/                 ← 「Enterprise Business Rules」層に属するクラス群
    │    │         ├ Model/             ← ドメインモデルクラス群
    │    │         │    ├ ValueObject/  ← 値オブジェクト
    │    │         │    ├ Entity/       ← エンティティ
    │    │         │    ├ Collection/   ← エンティティのコレクション
    │    │         │    └ Exception/    ← ドメインモデルのドメインルールに関する例外クラス群
    │    │         │
    │    │         └ Service/           ← ドメインサービスクラス群
    │    │              └  Repository/  ← ドメインモデルの永続化関連のインターフェース
    │    │
    │    ├ Activity/                    ← Activityコンテキストの「Application Business Rules」層, 「Enterprise Business Rules」層のクラス群、配下のディレクトリ構成はBaseと同様のため省略
    │    └ User/                        ← Userコンテキストの「Application Business Rules」層, 「Enterprise Business Rules」層のクラス群、配下のディレクトリ構成はBaseと同様のため省略
    │    
    └ Http/                             ← Laravel共通のHTTPリクエスト実行を処理するクラス群
         └ Controllers/                 ← コントローラークラス群
````

## ディレクトリ構成補足
### Contextsディレクトリ配下の依存関係について
* ContextsディレクトリにはBase(コンテキストに属さない共通処理)、Activity（アクティビティコンテキスト）、User（ユーザーコンテキスト）に分かれ、更にApplication（Application Business Rules）、Domain（Enterprise Business Rules）に分けれますがClean Architectureの依存関係規則に則り以下の依存関係のみを許容しています
  * Application（Application Business Rules）
    * コンテキストに属さないApplication（Application Business Rules）
    * 同コンテキストのApplication（Application Business Rules）
    * コンテキストに属さないDomain（Enterprise Business Rules）
    * 同コンテキストのDomain（Enterprise Business Rules）
  * Domain（Enterprise Business Rules）
    * コンテキストに属さないDomain（Enterprise Business Rules）
    * 同コンテキストのDomain（Enterprise Business Rules）
* 上述で許容している依存関係を違反していないかはphanにより静的解析を行っています
### Controllersに関して
* Clean ArchitectureではControllerもInterface Adaptersに属するため、本来であればAdapterディレクトリ下に配置されるべきかと思いますがLaravelのMiddlewareと同ディレクトリ内に配置するためにHttpディレクトリ下に配置してあります
 
