/**
 * データベースの初期化
 *  データベース名：hoteldb
 *  接続ユーザ：hoteldb_admin@localhost
 *  接続パスワード：admin123
 */ 
drop database if exists hoteldb;
drop user if exists hoteldb_admin@localhost;
create database hoteldb character set utf8;
grant all privileges on hoteldb.* to 'hoteldb_admin'@'localhost' identified by 'admin123';

use hoteldb;

drop table if exists hotels;

create table hotels (
  id      integer not null unique auto_increment,
  name    varchar(255) not null,
  price   integer not null,      /* 宿泊料 */
  pref    varchar(10) not null,  /* 所在地情報のうち都道府県名の部分：例）埼玉県 */
  city    varchar(15) not null,  /* 所在地情報のうち市区町村名の部分：例）新座市 */
  address varchar(200) not null, /* 所在地情報のうち都道府県名と市区町村名を除いた部分：例）東北2-33-10 */
  memo    varchar(100),                  /* 詳細情報 */
  image   varchar(255) not null,  /* 画像ファイル名：画像ファイルはimgaeディレクトリ内に格納されている */
  Primary Key (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into hotels( id, name, price, pref, city, address, memo, image ) values( 1, 'ビジネスホテル大井町', 7000, '東京都', '品川区', '大井 11-11-11', null, '1.png' );
insert into hotels( id, name, price, pref, city, address, memo, image ) values( 2, 'グレースイン蒲田', 7200, '東京都', '大田区', '蒲田 11-11-11', null, '2.png' );
insert into hotels( id, name, price, pref, city, address, memo, image ) values( 3, 'ビジネスイン赤坂見附', 9500, '東京都', '港区', '赤坂 11-11-11', null, '3.png' );
insert into hotels( id, name, price, pref, city, address, memo, image ) values( 4, '西新宿ステーションホテル', 8500, '東京都', '新宿区', '西新宿 11-11-11', '最寄駅：新宿駅、西新宿駅から徒歩5分', '4.png' );
insert into hotels( id, name, price, pref, city, address, memo, image ) values( 5, 'ホテル蒲田IN', 6200, '東京都', '大田区', '蒲田 22-22-22', null, '5.png' );
insert into hotels( id, name, price, pref, city, address, memo, image ) values( 6, 'ホテル南新宿', 5500, '東京都', '新宿区', '南新宿 11-11-11', '最寄駅：新宿駅東口から徒歩9分', '6.png' );
