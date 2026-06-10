CREATE DATABASE IF NOT EXISTS ukki_db;
USE ukki_db;

-- ==========================
-- TABEL ADMIN
-- ==========================

CREATE TABLE admin (
    id_admin INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nama_admin VARCHAR(100) NOT NULL
);

-- ==========================
-- TABEL BARANG
-- ==========================

CREATE TABLE barang (
    id_barang INT AUTO_INCREMENT PRIMARY KEY,
    nama_barang VARCHAR(100) NOT NULL,
    deskripsi TEXT,
    stok INT NOT NULL DEFAULT 0,
    kondisi ENUM(
        'Baik',
        'Rusak Ringan',
        'Rusak Berat'
    ) DEFAULT 'Baik',
    gambar VARCHAR(255)
);

-- ==========================
-- TABEL PEMINJAM
-- ==========================

CREATE TABLE peminjam (
    id_peminjam INT AUTO_INCREMENT PRIMARY KEY,
    nama_peminjam VARCHAR(100) NOT NULL,
    nim VARCHAR(30) NOT NULL,
    no_hp VARCHAR(20) NOT NULL
);

-- ==========================
-- TABEL PEMINJAMAN
-- ==========================

CREATE TABLE peminjaman (
    id_peminjaman INT AUTO_INCREMENT PRIMARY KEY,
    id_peminjam INT NOT NULL,
    tanggal_pinjam DATE NOT NULL,
    tanggal_kembali DATE NOT NULL,

    status ENUM(
        'Pending',
        'Disetujui',
        'Ditolak',
        'Dikembalikan'
    ) DEFAULT 'Pending',

    CONSTRAINT fk_peminjaman_peminjam
    FOREIGN KEY (id_peminjam)
    REFERENCES peminjam(id_peminjam)
    ON UPDATE CASCADE
    ON DELETE CASCADE
);

-- ==========================
-- DETAIL PEMINJAMAN
-- ==========================

CREATE TABLE detail_peminjaman (
    id_detail INT AUTO_INCREMENT PRIMARY KEY,

    id_peminjaman INT NOT NULL,
    id_barang INT NOT NULL,

    jumlah INT NOT NULL,

    CONSTRAINT fk_detail_peminjaman
    FOREIGN KEY (id_peminjaman)
    REFERENCES peminjaman(id_peminjaman)
    ON UPDATE CASCADE
    ON DELETE CASCADE,

    CONSTRAINT fk_detail_barang
    FOREIGN KEY (id_barang)
    REFERENCES barang(id_barang)
    ON UPDATE CASCADE
    ON DELETE CASCADE
);

INSERT INTO admin (
    username,
    password,
    nama_admin
)
VALUES (
    'admin',
    MD5('admin123'),
    'Administrator UKKI'
);

INSERT INTO barang
(nama_barang, deskripsi, stok, kondisi)
VALUES
('Speaker', 'Speaker aktif UKKI', 5, 'Baik'),
('Proyektor', 'Proyektor kegiatan UKKI', 2, 'Baik'),
('Mikrofon', 'Mic wireless', 10, 'Baik');