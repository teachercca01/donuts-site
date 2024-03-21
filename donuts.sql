drop database if exists donuts;
create database donuts default character set utf8 collate utf8_general_ci;
drop user if exists 'donuts'@'localhost';
create user 'donuts'@'localhost' identified by 'password';
grant all on donuts.* to 'donuts'@'localhost';
use donuts;

create table customer (
	id int not null auto_increment primary key unique, 
	name varchar(100) not null, 
 kana varchar(100) not null,
 post_code varchar(100) not null,
	address varchar(200) not null,
 mail varchar(100) not null unique,
	password varchar(255) not null
);

create table product (
	id int not null auto_increment primary key unique, 
	name varchar(200) not null, 
	price int not null,
 description varchar(1000) not null
);

create table card (
 id int not null primary key unique, 
 card_name  varchar(100) not null, 
 card_type varchar(100) not null, 
 card_no varchar(22) not null unique, 
 card_month int not null, 
 card_year int not null, 
 card_security_code int not null,
 foreign key(id) references customer(id)
);

create table purchase (
	id int not null primary key, 
	customer_id int not null, 
	foreign key(customer_id) references customer(id)
);

create table purchase_detail (
	purchase_id int not null, 
	product_id int not null, 
	count int not null, 
	primary key(purchase_id, product_id), 
	foreign key(purchase_id) references purchase(id), 
	foreign key(product_id) references product(id)
);

insert into product values(null, 'CCドーナツ 当店オリジナル（5個入り）', 1500,'当店のオリジナル商品、CCドーナツは、サクサクの食感が特徴のプレーンタイプのドーナツです。素材にこだわり、丁寧に揚げた生地は軽やかでサクッとした食感が楽しめます。一口食べれば、口の中に広がる甘くて香ばしい香りと、口どけの良い食感が感じられます。');
insert into product values(null, 'チョコレートデライト（5個入り）', 1600,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit');
insert into product values(null, 'キャラメルクリーム（5個入り）', 1600,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit');
insert into product values(null, 'プレーンクラシック （5個入り）', 1500,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit');
insert into product values(null, '【新作】サマーシトラス（5個入り）', 1600,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit');
insert into product values(null, 'ストロベリークラッ シュ（5個入り）', 1800,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit');
insert into product values(null, 'フルーツドーナツセット（12個入り）', 3500,'新鮮で豊かなフルーツをたっぷりと使用した贅沢な12個入りセットです。このセットには、季節の最高のフルーツを厳選し、ドーナツに取り入れました。口に入れた瞬間にフルーツの風味と生地のハーモニーが広がります。色鮮やかな見た目も魅力の一つです。');
insert into product values(null, 'フルーツドーナツセット（14個入り）', 4000,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit');
insert into product values(null, 'ベストセレクションボックス（4個入り）', 1200,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit');
insert into product values(null, 'チョコクラッシュボックス（7個入り）', 2400,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit');
insert into product values(null, 'クリームボックス（4 個入り）', 1400,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit');
insert into product values(null, 'クリームボックス（9 個入り）', 2800,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit');

insert into customer values(null, '熊木 和夫','クマキ カズオ','1111111', '東京都新宿区西新宿2-8-1', 'kumaki@gmail.com', 'BearTree1');
insert into customer values(null, '鳥居 健二','トリイ ケンジ','2222222', '神奈川県横浜市中区日本大通1', 'torii@gmail.com', 'BearTree2');
insert into customer values(null, '鷺沼 美子','サギヌマ ヨシコ','3333333', '大阪府大阪市中央区大手前2', 'saginuma@gmail.com', 'EgretPond3');
