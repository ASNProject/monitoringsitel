### Monitoringsintel

##### Clone Project
```
 git clone https://github.com/ASNProject/monitoringsitel.git
```
<b > Jika menggunakan xampp/ Windows, download file dan simpan di dalam C:/xampp/htdocs</b>

- Rename .env.example dengan .env dan sesuaikan pengaturan DB seperti dibawah
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_radius
DB_USERNAME=root
DB_PASSWORD=
```
- Download database di folder ```sql``` dan import di mysql

##### Run Project
- Run Composer
```
composer update
```

- Install dependency
```
composer require maatwebsite/excel
```

- Run server
```
php artisan serve
```
- Development
```
php artisan serve --host=0.0.0.0 --port=8000
```

#### Route
##### Monitoring
- Post
```
Route : http://127.0.0.1:8000/api/monitoring

Body: 
{
    "cel1": "1",
    "cel2": "2",
    "cel3": "3",
    "cel4": "4",
    "total": "10",
    "current": "11",
    "soc": "12",
    "resistance": "13",
    "temperature": "14",
    "fuzzy": "15"
}
```

##### NOTE
Export Create
```
php artisan make:export MonitoringExport --model=Monitoring
```