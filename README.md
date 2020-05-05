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

Tambahkan service provider ke config/app.php
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

Buat file ruangapi.php di folder config secara manual atau jalankan command artisan
```
php artisan vendor:publish
```
Jika anda menggunakan command artisan diatas, anda akan dibuatkan file ruangapi.php di folder config

Tambahkan kode berikut di file .env untuk konfigurasi API ruangapi
```
RAJAONGKIR_ENDPOINTAPI=isi_base_url_api_akun_anda_disini
RAJAONGKIR_APIKEY=isi_api_key_anda_disini
```
atau anda juga dapat langsung melakukan konfigurasi di file rajaongkir.php di folder config seperti kode berikut.
```php
'RUANGAPI_KEY' => 'isi_api_key_anda'
```

**Cara Menggunakan**

Ambil data Provinsi
```php
$data = RajaOngkir::Provinsi()->count();

//PASSING SECARA SPESIFIK BERDASARKAN ID PROPINSI
$data = RajaOngkir::Provinsi(1)->count();
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
