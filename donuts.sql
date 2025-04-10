-- 「donuts」というデータベースがあったら削除する
DROP DATABASE IF EXISTS donuts;
-- 「donuts」というデータベースを作成。文字コードをutf8に指定。並び順の指定
CREATE DATABASE donuts DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

-- 「donuts」というユーザーがいたら削除する
DROP USER IF EXISTS 'donuts'@'localhost';
-- 「donuts」というユーザーを作成。パスワードを「password」に設定
CREATE USER 'donuts'@'localhost' identified BY 'password';
-- 「donuts」にデータベースのすべてのテーブルに対するすべての権限を付与
GRANT all ON donuts.*TO 'donuts'@'localhost';
-- 作成したデータベースへの接続
USE donuts;


-- 「customer」という名前のテーブルの作成
CREATE TABLE customer(
  -- id：「顧客番号」int（整数）AUTO_INCREMENT（自動で上から振られる番号）PRIMARY KEY（主キー）
  -- name：「顧客名」varchar(100)（100文字までの文字列）NOT null（空欄にならない）
  -- kana：「顧客名フリガナ」varchar(100)（100文字までの文字列）NOT null（空欄にならない）
  -- post_code：「郵便番号」varchar(100)（100文字までの文字列）NOT null（空欄にならない）
  -- address：「住所」varchar(200)（200文字までの文字列）NOT null（空欄にならない）
  -- mail：「メールアドレス(ログイン時に使用)」varchar(100)（100文字までの文字列）NOT null（空欄にならない）UNIQUE（他の行と同じ値は入れられない）
  -- password：「パスワード(ログイン時に使用)」varchar(255)（255文字までの文字列）NOT null（空欄にならない）
  id int AUTO_INCREMENT PRIMARY KEY,
  name varchar(100) NOT null,
  kana varchar(100) NOT null,
  post_code varchar(100) NOT null,
  address varchar(200) NOT null,
  mail varchar(100) NOT null UNIQUE,
  password varchar(255) NOT null
);


-- 「product」という名前のテーブルの作成
CREATE TABLE product(
  -- id：「商品番号」int（整数）AUTO_INCREMENT（自動で上から振られる番号）PRIMARY KEY（主キー）
  -- name：「商品名」varchar(200)（200文字までの文字列）NOT null（空欄にならない）
  -- price：「価格」int（整数）NOT null（空欄にならない）
  -- description：「商品説明」varchar(1000)（1000文字までの文字列）NOT null（空欄にならない）
  id int AUTO_INCREMENT PRIMARY KEY,
  name varchar(200) NOT null,
  price int NOT null,
  description varchar(1000) NOT null
);


-- 「card」という名前のテーブルの作成
CREATE TABLE card(
  -- id：「顧客番号」int（整数）PRIMARY KEY（主キー）※customerテーブルのid（カードの持ち主の顧客番号）が入るので、AUTO_INCREMENTは設定しない
  -- idへ外部キー設定（customerテーブルのid列内に存在する値以外は入れられない）
  -- card_name：「契約者氏名」varchar(100)（100文字までの文字列）NOT null（空欄にならない）
  -- card_type：「カード種類(JCB・VISA・Mastercard)」varchar(100)（100文字までの文字列）NOT null（空欄にならない）
  -- card_no：「カード番号」varchar(22)（22文字までの文字列）NOT null（空欄にならない）UNIQUE（他の行と同じ値は入れられない）
  -- card_month：「有効期限-月」int（整数）NOT null（空欄にならない）
  -- card_year：「有効期限-年」int（整数）NOT null（空欄にならない）
  -- card_security_code：「セキュリティコード」int（整数）NOT null（空欄にならない）
  id int PRIMARY KEY,
  FOREIGN KEY (id) REFERENCES customer(id),
  card_name varchar(100) NOT null,
  card_type varchar(100) NOT null,
  card_no varchar(22) NOT null UNIQUE,
  card_month int NOT null,
  card_year int NOT null,
  card_security_code int NOT null
);

-- 「purchase」という名前のテーブルの作成
CREATE TABLE purchase(
  -- id：「購入番号」int（整数）AUTO_INCREMENT（自動で上から振られる番号）PRIMARY KEY（主キー）
  -- customer_id：「顧客番号」int（整数）NOT null（空欄にならない）
  -- customer_idへ外部キー設定（customerテーブルのid列内に存在する値以外は入れられない）
  id int AUTO_INCREMENT PRIMARY KEY,
  customer_id int NOT null,
  FOREIGN KEY (customer_id) REFERENCES customer(id)
);

-- 「purchase_detail」という名前のテーブルの作成
CREATE TABLE purchase_detail(
  -- purchase_id：「購入番号」int（整数）
  -- purchase_idへ外部キー設定（purchaseテーブルのid列内に存在する値以外は入れられない）
  -- product_id：「商品番号」int（整数）
  -- product_idへ外部キー設定（productテーブルのid列内に存在する値以外は入れられない）
  -- purchase_idとproduct_idを複合主キーに設定
  -- count：「個数」int（整数）NOT null（空欄にならない）
  purchase_id int,
  FOREIGN KEY (purchase_id) REFERENCES purchase(id) ,
  product_id int,
  FOREIGN KEY (product_id) REFERENCES product(id),
  PRIMARY KEY (purchase_id, product_id),
  count int NOT null
);

-- insert 商品情報

insert into product values(null,'CCドーナツ 当店オリジナル（5個入り）',1500,'当店のオリジナル商品、CCドーナツは、サクサクの食感が特徴のプレーンタイプのドーナツです。素材にこだわり、丁寧に揚げた生地は軽やかでサクッとした食感が楽しめます。一口食べれば、口の中に広がる甘くて香ばしい香りと、口どけの良い食感が感じられます。');
insert into product values(null,'チョコレートデライト（5個入り）',1600,'チョコレートデライトは、当店自慢のプレーンドーナツに濃厚なチョコレートをたっぷりとコーティングした、甘さと香りが絶妙に調和した逸品です。サクサクのプレーン生地と、滑らかでリッチなチョコレートのコンビネーションが、口の中でとろけるような贅沢なひとときをお届けします。コーヒーやミルクとの相性も抜群で、ティータイムやおやつにぴったり。
一口食べれば、甘いチョコレートの魅力が広がり、まるで至福の瞬間が訪れるような美味しさです。');
insert into product values(null,'キャラメルクリーム（5個入り）',1600,'キャラメルクリームは、当店自慢のプレーンドーナツに、まろやかなクリームと、香ばしいキャラメルソースを贅沢にトッピングした一品です。サクサクの生地に、甘くて濃厚なキャラメルが絡み、口の中でとろけるような美味しさが広がります。クリーミーで優しい味わいと、キャラメルのコクが絶妙に調和し、ひと口ごとに贅沢な気分を楽しめます。
お茶やコーヒーとの相性も抜群で、日常のちょっとした贅沢にぴったりのドーナツです。ぜひ、特別な時間にお召し上がりください。');
insert into product values(null,'プレーンクラシック（5個入り）',1500,'プレーンクラシックは、ココアの風味が広がるチョコ生地のシンプルなドーナツです。飽きのこない素朴な味わいが特徴で、一口食べるとチョコレートの深い味わいが広がり、思わずもう一つ手が伸びてしまう美味しさ。サクサクとした食感の中に、しっとりとしたコクが感じられ、どこか懐かしい味わいが楽しめます。
軽いおやつやティータイムにぴったりで、どんな飲み物とも相性抜群。シンプルだからこそ、素材の美味しさが引き立つ、究極の「定番」ドーナツです。');
insert into product values(null,'【新作】サマーシトラス（5個入り）',1600,'サマーシトラスは、夏にぴったりな爽やかさが特徴の新作ドーナツです。ドーナツに、フレッシュなシトラス風味のコーティングが施され、ひと口食べるごとに広がる爽やかな香りが心地よいひとときを演出します。さらに、カリッとしたナッツがアクセントとなり、食感の変化とともに、ナッツの香ばしさが加わり、まるで夏の陽気を感じるような美味しさです。
見た目も涼しげで、これからの季節にぴったりな爽快な味わい。新作の「サマーシトラス」で、夏の贅沢なおやつタイムをお楽しみください。');
insert into product values(null,'ストロベリークラッシュ（5個入り）',1800,'ストロベリークラッシュは、プレーンクラシックにクリーミーなクリームをトッピングし、さらにストロベリー風味のスプレーチョコをふんだんにかけた、見た目も味も楽しめるドーナツです。サクサクのプレーン生地と、甘さ控えめなクリームが絶妙に調和し、食べるたびに豊かな味わいが広がります。
ストロベリー風味のカラフルなスプレーチョコが、見た目にも華やかで、ほんのり甘いストロベリーの風味が加わり、クリームと生地の美味しさを引き立てます。食感のアクセントとしても楽しめ、まるで果実をかじったかのような爽やかな味わいが広がります。
おやつやティータイムにぴったりで、華やかなひとときを演出してくれる、特別な一品です。');
insert into product values(null,'フルーツドーナツセット（12個入り）',3500,'新鮮で豊かなフルーツをたっぷりと使用した贅沢な12個入りセットです。このセットには、季節の最高のフルーツを厳選し、ドーナツに取り入れました。口に入れた瞬間にフルーツの風味と生地のハーモニーが広がります。色鮮やかな見た目も魅力の一つです。');
insert into product values(null,'フルーツドーナツセット（14個入り）',4000,'季節ごとの新鮮なフルーツをふんだんに使用した贅沢なセットです。選び抜かれたフルーツをドーナツにたっぷりと取り入れ、その風味を最大限に引き出しました。フルーツのジューシーさと、生地のふわっとした軽やかな食感が絶妙に調和し、ひと口食べるごとに幸せな気分に包まれます。
さらに、見た目も華やかな色合いで、どんなシーンでも楽しいひとときを演出。14個のドーナツは、家族や友人とシェアして楽しむのにぴったりな量です。贅沢なフルーツの香りとともに、特別な時間をお楽しみください。');
insert into product values(null,'ベストセレクションボックス（4個入り）',1200,'当店自慢の厳選された4種類のドーナツを詰め込んだ特別なセットです。どれも手間ひまかけて作り上げた自信作ばかりで、サクサクの生地と、贅沢なトッピングが絶妙に調和した美味しさをお楽しみいただけます。
シンプルなプレーンドーナツから、カラフルなものや上品なチョコレートのドーナツまで、さまざまな風味を少しずつ楽しめる贅沢なセット。ちょっとしたお土産やギフトにもぴったりです。
大切な人への贈り物や、自分へのご褒美に、最高の味わいをお届けする一品です。

');
insert into product values(null,'チョコクラッシュボックス（7個入り）',2400,'チョコレート好きにはたまらない、贅沢な3種類のチョコが楽しめるドーナツセットです。サクサクのプレーン生地に、濃厚なチョコがかかり、チョコレートの深い味わいを存分に楽しめます。
各ドーナツにかけられたチョコの種類ごとに異なる味わいと食感が楽しめ、一度にさまざまなチョコレートの美味しさを堪能できます。7個入りなので、シェアして楽しむのにもぴったり。贅沢なチョコレートタイムをお楽しみください。

');
insert into product values(null,'クリームボックス（4個入り）',1400,'クリーム好きにぴったりな、3種類のクリームが楽しめる贅沢なドーナツセットです。ふわっと軽い生地に、濃厚で甘いクリームがたっぷりとトッピングされ、ひと口食べるごとにクリームの美味しさが広がります。
バニラ、ストロベリー、シュガーを使ったクリームが、それぞれ異なる風味と食感を楽しませてくれます。4個入りなので、おやつやちょっとしたギフトにぴったりなサイズ感。贅沢でクリーミーなひとときをお楽しみください。');
insert into product values(null,'クリームボックス（9個入り）',2800,'贅沢なクリームが楽しめるドーナツのセットです。バニラ、チョコレート、シュガーに加え、濃厚なキャラメルクリームやリッチなチョコレートクリームがたっぷりとトッピングされたドーナツが9個も入った、ボリューム満点のセットです。
それぞれのドーナツは、サクサクの生地と甘くて濃厚なクリームが絶妙にマッチし、一口食べるごとに幸せな気分に包まれます。チョコやキャラメルのリッチな風味と、フルーツクリームやバニラクリームの優しい甘さがバランスよく楽しめるので、どのドーナツも飽きることなく最後まで楽しめます。
たくさんのフレーバーを一度に楽しめる贅沢なセットで、おやつタイムやおもてなしにもぴったりです。');