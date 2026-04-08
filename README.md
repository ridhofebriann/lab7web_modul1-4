# lab7web_modul 1-4

# Lab7Web - Praktikum CodeIgniter 4 Lanjutan
**Nama:** M. Ridho Febrian  
**NIM:** 312410500  
**Mata Kuliah:** Pemrograman Web 2 - Universitas Pelita Bangsa  

---

## Deskripsi Repository
Repository ini berisi hasil pengerjaan modul praktikum Pemrograman Web 2 menggunakan *framework* CodeIgniter 4. Proyek ini mencakup implementasi sistem CRUD, perapihan desain menggunakan *View Layout* & *View Cell*, serta pengamanan sistem menggunakan modul *Login Authentication* & *Filter*.

## 1. Praktikum 3: View Layout dan View Cell

Pada tahap ini, saya merapikan struktur antarmuka pengguna (UI) agar lebih modular dan mudah di-*maintenance*.

### Penggunaan View Layout
Menggunakan fitur `extend` dan `section` dari CodeIgniter 4 untuk menerapkan prinsip DRY (*Don't Repeat Yourself*). Header, Navbar, dan Footer dipusatkan dalam satu *layout* utama, sehingga konten halaman (seperti Home, About, Artikel) hanya perlu me-*render* bagian isinya saja.

**Tampilan Web dengan Layout:**

<img width="1918" height="1029" alt="layout" src="https://github.com/user-attachments/assets/74522359-50b7-484b-8fbc-e82608eac2af" />


**Q&A Praktikum 3:**
* **Manfaat View Layout:** Menghemat penulisan kode berulang dan memudahkan perubahan desain secara masal (terpusat).
* **Perbedaan View dan View Cell:** View biasa pasif dan bergantung pada data dari Controller utama. View Cell bersifat independen dan memiliki *logic* pengolahan datanya sendiri (cocok untuk *widget* statis/dinamis).

---

## 2. Praktikum 4: Sistem Login dan Authentication (Filter)

Tahap ini berfokus pada keamanan rute admin agar tidak sembarang orang bisa menambah, mengubah, atau menghapus artikel.

### Modul Login
Membuat tabel `user` beserta *Seeder* untuk data admin awal. Sandi diamankan menggunakan fungsi enkripsi bawaan `password_hash()`. Ketika *user* berhasil login, sistem akan mencatat informasi sesi (*session*).

**Tampilan Form Login:**
<img width="1914" height="1028" alt="login" src="https://github.com/user-attachments/assets/ee4b2187-52cd-4b79-b9de-c23489f195b6" />

### Fitur Auth Filter
Membuat kelas `Auth` yang mengimplementasikan `FilterInterface`. Filter ini disisipkan pada `Routes.php` khusus untuk *group* rute `/admin`. 

Jika *user* mencoba mengakses halaman admin tanpa sesi login yang valid, sistem (*Filter*) akan otomatis menahan permintaan tersebut dan me-*redirect* pengunjung kembali ke halaman login.

**Tampilan Dashboard Admin (Setelah Login):**
<img width="1914" height="1031" alt="admin" src="https://github.com/user-attachments/assets/f977be4d-377f-4c0e-bf99-9b0e24520c7d" />


---
