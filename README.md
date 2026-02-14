# 🎓 scholarAyy - Enterprise Academic Guidance Management System

[![Framework](https://img.shields.io/badge/Framework-CodeIgniter%203-EE4323?style=for-the-badge&logo=codeigniter&logoColor=white)](https://codeigniter.com/)
[![Language](https://img.shields.io/badge/Language-PHP%207.4+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![Database](https://img.shields.io/badge/Database-MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![Frontend](https://img.shields.io/badge/UI-Bootstrap%204-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com/)

**scholarAyy** adalah platform manajemen akademik berbasis web yang dirancang untuk mendigitalisasi alur bimbingan proyek antara mahasiswa, dosen, dan institusi secara profesional, transparan, dan terorganisir.

---

## 🚀 Fitur Utama & Hak Akses (RBAC)

Sistem ini menggunakan **Role-Based Access Control** untuk memastikan efisiensi kerja setiap pengguna:

| Fitur Utama | 👨‍🎓 Mahasiswa | 👨‍🏫 Dosen | 🛠️ Koordinator |
| :--- | :---: | :---: | :---: |
| **Upload Proposal/Laporan** | ✅ | ✅ (Review) | ✅ |
| **Presensi & Log Bimbingan** | ✅ | ✅ (Approval) | ✅ |
| **Tanda Tangan Digital** | ❌ | ✅ | ❌ |
| **Manajemen User & Akun** | ❌ | ❌ | ✅ |
| **E-Library (Buku & Template)** | ✅ | ✅ | ✅ |

---

## 🏗️ Arsitektur Teknis

### 1. Backend & Logic
- **MVC Architecture**: Menggunakan framework **CodeIgniter 3** untuk pemisahan logika (Controller), data (Model), dan tampilan (View) yang bersih.
- **Security**: Keamanan akun menggunakan **Bcrypt hashing** dan manajemen sesi (session) yang terenkripsi.
- **Data Integrity**: Validasi data input di sisi server menggunakan pustaka **CI Form Validation**.

### 2. Frontend & Design
- **Responsive Dashboard**: Antarmuka modern yang sepenuhnya responsif menggunakan **Bootstrap 4**.
- **Dynamic Tables**: Integrasi **jQuery DataTables** untuk pengolahan data mahasiswa dalam jumlah besar secara instan.
- **Iconography**: Visualisasi menu menggunakan **FontAwesome 5**.

### 3. Database Design (ERD Overview)
Hubungan antar data utama dalam sistem:
```mermaid
erDiagram
    USER ||--o{ USER_DATA : has
    USER ||--|| USER_ROLE : assigned
    USER_DATA ||--o{ BIMBINGAN : tracks
    ADMIN ||--o{ BIMBINGAN : supervises
