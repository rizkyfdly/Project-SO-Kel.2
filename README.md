# Sistem Peminjaman Barang UKKI

## Menjalankan Sistem

### 1. Clone Repository

```bash
git clone https://github.com/rizkyfdly/Project-SO-Kel.2.git
```

### 2. Masuk ke Folder Project

```bash
cd Project-SO-Kel.2
```

### 3. Jalankan Docker

```bash
docker compose up -d --build
```

### 4. Import Database

Windows PowerShell:

```powershell
Get-Content .\database\ukki_db.sql | docker exec -i ukki_db mysql -u root -proot ukki_db
```

### 5. Akses Aplikasi

Web Application:

```
http://localhost:8080
```

phpMyAdmin:

```
http://localhost:8081
```

### Menjalankan Kembali Project

Jika project sudah pernah dijalankan sebelumnya:

```bash
docker compose up -d
```

### Menghentikan Project

```bash
docker compose down
```
