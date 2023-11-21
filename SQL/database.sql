CREATE DATABASE IF NOT EXISTS universitas;
USE universitas;

CREATE TABLE IF NOT EXISTS mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(10) NOT NULL,
    nama VARCHAR(50) NOT NULL,
    program_studi VARCHAR(50) NOT NULL
);
