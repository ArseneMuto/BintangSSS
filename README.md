# 🏢 Aplikasi Manajemen Karyawan - BintangSSS

Aplikasi web sederhana berbasis Laravel untuk mengelola data karyawan dan jabatan. Project ini dibuat untuk memenuhi tugas [Sebutkan Mata Kuliah/UAS].

---

## ✨ Fitur Utama

Aplikasi ini memiliki fitur CRUD (Create, Read, Update, Delete) lengkap:
-   ✅ **Dashboard:** Menampilkan daftar karyawan dengan pagination.
-   ✅ **Pencarian:** Mencari karyawan berdasarkan nama, posisi, atau jabatan.
-   ✅ **Tambah Karyawan:** Input data karyawan baru beserta jabatan.
-   ✅ **Edit Data:** Memperbarui informasi karyawan yang sudah ada.
-   ✅ **Hapus Data:** Menghapus data karyawan dengan konfirmasi.
-   ✅ **Custom Styling:** Desain antarmuka menggunakan Tailwind CSS dengan tema warna **Emerald**.

---

## 📸 Screenshot Hasil Pengerjaan

Berikut adalah tampilan aplikasi setelah berhasil diperbaiki dan dikustomisasi:

### 1. Halaman Utama (Daftar Karyawan)
<img width="905" height="667" alt="image" src="https://github.com/user-attachments/assets/d5f07f85-7885-4d7d-9109-8cc53dc9edb5" />


### 2. Form Tambah Karyawan
<img width="905" height="667" alt="image" src="https://github.com/user-attachments/assets/d310e013-a513-40ce-85d0-180c8d763c95" />

## 🛠️ Stack Teknologi

-   **Backend:** Laravel [Sebutkan Versi, misal 10.x]
-   **Database:** [Sebutkan, misal MySQL / PostgreSQL]
-   **Frontend:** Tailwind CSS (via CDN)
-   **OS:** Ubuntu [Versi, misal 22.04 LTS]

## 🚀 Cara Menjalankan Project

Jika Anda ingin menjalankan project ini di lokal, ikuti langkah berikut:

1.  **Clone Repositori:**
    ```bash
    git clone [https://github.com/username-anda/uas-manajemen-karyawan.git](https://github.com/username-anda/uas-manajemen-karyawan.git)
    cd uas-manajemen-karyawan
    ```
2.  **Install Dependency:**
    ```bash
    composer install
    ```
3.  **Konfigurasi Environment:**
    Salin file `.env.example` menjadi `.env`, lalu sesuaikan konfigurasi database Anda.
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
4.  **Migrate & Seed Database (Jika ada):**
    ```bash
    php artisan migrate
    # php artisan db:seed (Jika Anda membuat seeder untuk jabatan)
    ```
5.  **Jalankan Server:**
    ```bash
    php artisan serve
    ```
    Akses aplikasi di `http://127.0.0.1:8000`.
