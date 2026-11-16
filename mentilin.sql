CREATE DATABASE IF NOT EXISTS mentilin_db
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE mentilin_db;

CREATE TABLE IF NOT EXISTS pesan_kontak (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    nama VARCHAR(60) NOT NULL,
    email VARCHAR(254) NOT NULL,
    telepon VARCHAR(13) NOT NULL,
    topik ENUM('edukasi', 'program', 'kolaborasi', 'lainnya') NOT NULL,
    pesan VARCHAR(300) NOT NULL,
    status ENUM('baru', 'dibaca', 'ditindaklanjuti') NOT NULL DEFAULT 'baru',
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    INDEX idx_pesan_created_at (created_at),
    INDEX idx_pesan_status (status)
) ENGINE=InnoDB;
