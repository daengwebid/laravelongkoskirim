# RuangAPI Ongkos Kirim For Laravel

Package ini menggunakan service by RuangAPI.com

**Instalasi**

Download package dengan composer
```
composer require daengwebid/laravelongkoskirim
```
atau
```
{
	"require": {
		"daengwebid/laravelongkoskirim" : "dev-master"
	}
}
```
Sejak Laravel 5.5 ke atas, sudah dilengkapi fitur Package Discover sehingga tidak perlu me-register packagenya.

**OPSIONAL**

Adapun pengguna Laravel 5.4 ke bawah, tambahkan service provider ke config/app.php
```php
'providers' => [
	....
	
	Daengweb\OngkosKirim\OngkirServiceProvider::class,
]
```

Tambahkan juga alias ke config/app.php
```php
'aliases' => [
	....
	
	'RuangApi' => Daengweb\OngkosKirim\RuangApiFacade::class,
]
```
**END OPSIONAL**


Buat file `ruangapi.php` di folder config secara manual dan tambahkan code berikut
```php
<?php

return [
	/*
    | Dokumentasi : https://ruangapi.com/dokumentasi/ongkos-kirim
    */

	'ruangapi_shipping' => env('RUANGAPI_SHIPPING', 'https://ruangapi.com/api/v1/shipping'),
	'ruangapi_province' => env('RUANGAPI_SHIPPING', 'https://ruangapi.com/api/v1/provinces'),
	'ruangapi_city' => env('RUANGAPI_SHIPPING', 'https://ruangapi.com/api/v1/cities'),
	'ruangapi_district' => env('RUANGAPI_SHIPPING', 'https://ruangapi.com/api/v1/districts'),

	/*
    | Isi dengan APIKey yang didapatkan dari RuangAPI
    |
    */

	'api_key' => env('RUANGAPI_KEY', ''),
];
```

atau jalankan command artisan untuk publish config-nya secara otomatis
```
php artisan vendor:publish
```
Jika anda menggunakan command artisan diatas, anda akan dibuatkan file `ruangapi.php` di folder config


Tambahkan kode berikut di file `.env` untuk konfigurasi API ruangapi
```
'RUANGAPI_KEY' => 'isi_api_key_anda'
```
atau anda juga dapat langsung melakukan konfigurasi di file ruangapi.php di folder config seperti kode berikut.
```php
'api_key' => env('RUANGAPI_KEY', 'isi_key_anda_disini'),
```

**Cara Menggunakan**

Ambil data Provinsi
```php
$data = RuangApi::getProvinces();

//PASSING SECARA SPESIFIK BERDASARKAN ID PROPINSI
$data = RuangApi::getProvinces(1);
```

Ambil data Kota/Kabupaten
```php
$data = RuangApi::getCities(3, null, null);

//PARAMETER PERTAMA = ID PROPINSI
//PARAMETER KEDUA = ID KOTA (OPSIONAL)
//PARAMETER KETIGA = STRING NAMA KOTA (OPSIONAL)
```

Ambil data Kecamatan
```php
$data = RuangApi::getDistricts(157, null, 'airu');

//PARAMETER PERTAMA = ID KOTA
//PARAMETER KEDUA = ID KECAMATAN (OPSIONAL)
//PARAMETER KETIGA = STRING NAMA KECAMATAN (OPSIONAL)
```

Ambil Biaya Pengiriman
```php
$data = RuangApi::getCost([
        'origin' => 22, //ID KOTA PENGIRIMAN
        'destination' => 2137, //ID KECAMATAN TUJUAN PENGIRIMAN
        'weight' => 600, //BERAT DALAM SATUAN GRAM
        'courier' => 'jne,jnt' //KODE KURIR, PISAHKAN DENGAN KOMA
    ]);
```

Kunjungi [daengweb](https://daengweb.id/)

Documentasi akun [RuangAPI](https://ruangapi.com/dokumentasi/ongkos-kirim)
