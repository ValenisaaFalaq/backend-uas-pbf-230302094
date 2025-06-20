# Backend Rumah Sakit - CodeIgniter 4

Repositori ini berisi proyek **backend REST API** menggunakan **CodeIgniter 4** untuk sistem informasi rumah sakit. Sistem ini menyediakan endpoint API untuk mengelola data **pasien** dan **obat**, serta siap dikonsumsi oleh frontend (Laravel atau lainnya).

---

##  Fitur

- CRUD **Pasien** (Create, Read, Update, Delete)
- CRUD **Obat**
- REST API
- Bisa diakses melalui frontend (Laravel, Postman)

---

##  Langkah Instalasi

### 1. Clone Project
```bash
git clone https://github.com/username/backend_rumahsakit.git
cd backend_rumahsakit
```

### 2. Install Dependency via Composer
```bash
composer install
```

### 3. Copy File .env
```bash
cp env .env
```

### 4. Konfigurasi Database di `.env`
```dotenv
database.default.hostname = localhost
database.default.database = db_rumahsakit_230302094
database.default.username = root
database.default.password =
```

### 5. Jalankan Server
```bash
php spark serve
```

---

## 🗂️ Struktur Folder

```
backend_rumahsakit/
├── app/
│   ├── Controllers/
│   │   ├── Pasien.php
│   │   └── Obat.php
│   ├── Models/
│   │   ├── PasienModel.php
│   │   └── ObatModel.php
│   └── Config/
│       └── Routes.php
├── public/
├── .env
└── README.md
```

---

## Struktur Tabel MySQL

```sql
CREATE DATABASE db_rumahsakit_230302094;

CREATE TABLE pasien (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100),
  alamat TEXT,
  tanggal_lahir DATE,
  jenis_kelamin ENUM('L', 'P'),
  foto VARCHAR(255)
);

CREATE TABLE obat (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama_obat VARCHAR(100),
  kategori VARCHAR(50),
  stok INT,
  harga DECIMAL(10,2)
);
```

---

## Routing API (app/Config/Routes.php)

```php
$routes->resource('pasien');
$routes->resource('obat');
```

---

## API Endpoint

###  Pasien

| Method | Endpoint       | Deskripsi              |
|--------|----------------|------------------------|
| GET    | /pasien        | Ambil semua pasien     |
| GET    | /pasien/{id}   | Detail pasien tertentu |
| POST   | /pasien        | Tambah pasien baru     |
| PUT    | /pasien/{id}   | Ubah data pasien       |
| DELETE | /pasien/{id}   | Hapus pasien           |

### Obat

| Method | Endpoint     | Deskripsi            |
|--------|--------------|----------------------|
| GET    | /obat        | Ambil semua obat     |
| GET    | /obat/{id}   | Detail obat tertentu |
| POST   | /obat        | Tambah data obat     |
| PUT    | /obat/{id}   | Ubah data obat       |
| DELETE | /obat/{id}   | Hapus obat           |

---

---

## Testing API (Postman)

### Pasien

- `GET /pasien`
- `POST /pasien`  
  Body:
  ```json
  {
    "nama": "Rizky",
    "alamat": "Cilacap",
    "tanggal_lahir": "2000-01-01",
    "jenis_kelamin": "L"
  }
  ```
- `PUT /pasien/{id}`
- `DELETE /pasien/{id}`

### Obat

- `GET /obat`
- `POST /obat`
- `PUT /obat/{id}`
- `DELETE /obat/{id}`

---


