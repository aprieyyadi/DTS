# DTS
News website ini merupakan website yang berisi informasi-informasi dalam bentuk berita. Website ini dibagi menjadi 2 level sistem login atau disebut sebagai multilevel login, yaitu level admin yang bertugas untuk membuat berita dan mengaktifkan berita serta level operator yang bertugas untuk membuat berita.

# Requirements
Website ini dibangun dengan menggunakan sebagai berikut :
1. HTML
2. CSS
3. PHP
4. LARAVEL
5. BOOTSTRAP
6. MySQL

# Installation Laravel
1. Tahap untuk mengintal Laravel dalam windows, pertama buka command prompt kemudian dimulai dengan menginstall composer terlebih dahulu dengan download filenya dan jalankan composer.exe.
2. Kemudian ketikkan perintah berikut untuk menginstall laravel

		composer create-project --prefer-dist laravel/laravel DTS

	Keterangan	:
	--prefer-dist digunakan untuk versi laravel yang direferensikan/stabil
	DTS adalah nama folder yang akan kita buat 

3. Setelah proses folder project telah dibuat, langkah selanjutnya buka folder tersebut lalu buka command prompt dan masuk kedalan folder project itu. Dalam command prompt ketik

		php artisan serve

	maka akan muncul url, url tersebut copy dan paste pada browser. Maka akan terbuka Halaman Laravel dan proses instalasi telah berhasil.
4. Dalam project ini kami mengerjakan secara team sehingga pengerjaannya dilakukan secara kolaborasi. Maka dari itu kami menggunakan Github, tahap selanjutnya setelah menginstall laravel yaitu melakukan clone. Team kami menggunakan Github Desktop sehingga prosesnya clone lebih mudah dengan klik button clone pada repository yg ingin d clone
5. Kemudian, setelah berhasil melakukan clone, tahap berikutnya install depedency. Depedensi adalah sekumpulan library yang dibutuhkan oleh aplikasi laravel kita, termasuk framework Laravel itu sendiri. List depedensi dapat dilihat pada berkas 

		composer.json

	Untuk menginstall semua depedensi, gunakan perintah 

		composer install 

	composer akan melakukan penelusuran depedensi apa saja yang dibutuhkan aplikasi, lalu mengunduhnya kedalam folder vendor. Maka dalam command prompt akan muncul tahapan library yang diintall kedalam folder seperti ini :

		Loading composer repositories with package information
		Installing dependencies (including require-dev) from lock file
		Package operations: 59 installs, 0 updates, 0 removals
			Installing doctrine/inflector (v1.1.0): Downloading (100%)
			Installing erusev/parsedown (1.6.1): Downloading (100%)
		..............panjang sekali disini, dan butuh waktu lama.........

	Di tahap ini, biasanya prosesnya cukup lama. Tergantung koneksi internet, dan cache si composer.
6. Setelah depedency sukses terinstall, kemudian melakukan setup environment variable. Membuat file

		.env

	di folder aplikasi kita. Namun, biasanya sudah ada file sampelnya kita cukup menyalin file itu saja dengan printah berikut.

		cp .env.example .env

	Kemudian isikan semua pengaturan yang perlu kamu masukkan, biasanya yang penting adalah pengaturan koneksi database.
7. Setelah semua sudah berhasil, langkah selanjutnya jalankan local server dengan perintah

		php artisan serve


# Fitur
1. Pada Halaman User
- HOME / Halaman Utama
- POSTS
- ABOUT
- DTS TEAM
- LOGIN
- REGISTER

	![Annotation 2019-10-22 134535](https://user-images.githubusercontent.com/56539329/67263416-4afe4c80-f4d2-11e9-83b5-1ecb9d48bfd0.png)

2. Pada Halaman Admin
- Main Navigations
	- Dashboard
	- Tag
	- Category
	- Posts
	- Pending Posts
	- Favorite Posts
	- Comments
	- Author
	- Subscribers
- System
	- Settings
	- Logout

	![Annotation 2019-10-22 135931](https://user-images.githubusercontent.com/56539329/67264073-391da900-f4d4-11e9-8b30-db3755309948.png)

3. Pada Halaman Author
- Main Navigations
	- Dashboard
	- Favorite Posts
	- Comments
- System
	- Settings
	- Logout

	![Annotation 2019-10-22 135842](https://user-images.githubusercontent.com/56539329/67264103-49ce1f00-f4d4-11e9-9ac2-4278b0fc3eca.png)

# Alur Sistem dengan Struktur Data
1. Halaman User
	
	![Annotation 2019-10-21 190245](https://user-images.githubusercontent.com/56539329/67204709-569d3500-f438-11e9-9532-746163176cd0.png)

2. Halaman Author

	![Annotation 2019-10-21 191818](https://user-images.githubusercontent.com/56539329/67204816-8ba98780-f438-11e9-9be9-ba9936b857ac.png)

3. Halaman Admin
	
	![Annotation 2019-10-21 192138](https://user-images.githubusercontent.com/56539329/67204855-9cf29400-f438-11e9-90da-7ff6c0c2c92c.png)

# Data Dictionary
1. Tabel categories
	- id int(10) primary key
	- name varchar(191)
	- slug varchar(191)
	- image varchar(191)
	- created_at timestamp
	- updated_at timestamp

2. Tabel category_post
	- id int(10) primary key
	- post_id int(11)
	- category int(11)
	- created_at timestamp
	- updated_at timestamp

3. Tabel comments
	- id int(10) primary key
	- post_id int(10)
	- user_id int(10)
	- comment text
	- created_at timestamp
	- updated_at timestamp

4. Tabel jobs
	- id bigint(20)
	- queue varchar(191)
	- payload longtext
	- attempts tinyint(3)
	- reserved_at int(10)
	- available_at int(10)
	- created_at int(10)

5. Tabel migrations
	- id int(10) primary key
	- migration varchar(191)
	- batch int(11)

6. Tabel password_resets
	- email varchar(191)
	- token varchar(191)
	- created_at timestamp

7. Tabel posts
	- id int(10) primary key
	- user_id int(10)
	- title varchar(191)
	- slug varchar(191)
	- image varchar(191)
	- body text
	- view_count int(11)
	- status tinyint(1)
	- is_approved tinyint(1)
	- created_at timestamp
	- updated_at timestamp

8. Tabel post_tag
	- id int(10) primary key
	- post_id int(11)
	- tag_id int(11)
	- created_at timestamp
	- updated_at timestamp

9. Tabel post_user
	- id int(10) primary key
	- post_id int(10)
	- user_id int(11)
	- created_at timestamp
	- updated_at timestamp

10. Tabel roles
	- id int(10) primary key
	- name varchar(191)
	- slug varchar(191)
	- created_at timestamp
	- updated_at timestamp

11. Tabel subscribers
	- id int(10)
	- email varchar(191)
	- created_at timestamp
	- updated_at timestamp

12. Tabel tags
	- id int(10) primary key
	- name varchar(191)
	- slug varchar(191)
	- created_at timestamp
	- updated_at timestamp

13. Tabel users
	- id int(10) primary key
	- role_id int(11)
	- name varchar(191)
	- username varchar(191)
	- email varchar(191)
	- password varchar(191)
	- image varchar(191)
	- about text
	- remember_token varchar(100)
	- created_at timestamp
	- updated_at timestamp