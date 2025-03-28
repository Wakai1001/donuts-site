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