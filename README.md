# SIBUTET - Sistem Buku Tamu Elektronik

<p align="center">
  <img src="https://github.com/user-attachments/assets/03bc8ff9-a6a4-44ca-99a9-65a85b7f5a64" alt="SIBUTET Logo" width="600">
</p>

## Tentang SIBUTET

SIBUTET (Sistem Buku Tamu Elektronik) adalah aplikasi web untuk mencatat kunjungan tamu di Pengadilan Tata Usaha Negara Medan. Aplikasi ini menyediakan formulir digital untuk berbagai jenis tamu:

- **Tamu Sidang** - Untuk menghadiri persidangan
- **Layanan PTSP** - Pendaftaran, informasi, dan layanan lainnya  
- **Tamu Dinas** - Untuk keperluan kedinasan
- **Tamu Mahasiswa** - Untuk riset, magang, atau studi

## 🚀 Deployed with GitHub Pages

Aplikasi ini telah dikonversi dari Laravel ke HTML statis untuk deployment di GitHub Pages:

**Live Demo:** [https://ruminas99.github.io](https://ruminas99.github.io)

## ✨ Features

- **Responsive Design** - Tampilan menyesuaikan dengan berbagai ukuran layar
- **Animated UI** - Antarmuka dengan animasi yang menarik
- **Form Validation** - Validasi input untuk memastikan data yang benar
- **Dynamic Dropdowns** - Dropdown yang saling terkait (khusus form tamu sidang)
- **Success Feedback** - Notifikasi setelah pengiriman form berhasil

## 🛠️ Deployment Instructions

### Untuk GitHub Pages:

1. **Fork atau Clone repository ini**
2. **Aktifkan GitHub Pages:**
   - Buka Settings repository
   - Scroll ke bagian "Pages"
   - Pilih source "Deploy from a branch"
   - Pilih branch "main" dan folder "/ (root)"
   - Klik Save

3. **Akses aplikasi:** `https://[username].github.io/[repository-name]`

### Untuk Development Lokal:

```bash
# Clone repository
git clone https://github.com/Ruminas99/ruminas99.github.io.git
cd ruminas99.github.io

# Jalankan local server
python3 -m http.server 8000

# Buka browser ke http://localhost:8000
```

## 📁 File Structure (Static Version)

```
├── index.html          # Dashboard utama
├── pihak.html         # Form tamu sidang
├── ptsp.html          # Form layanan PTSP
├── dinas.html         # Form tamu dinas
├── mahasiswa.html     # Form tamu mahasiswa
├── public/
│   └── image/         # Logo dan gambar
└── README.md          # Dokumentasi
```

## 🔧 Tech Stack

- **Frontend:** HTML5, CSS3, JavaScript (ES6+)
- **Styling:** Tailwind CSS (via CDN)
- **Animations:** CSS Animations + Animate.css
- **Deployment:** GitHub Pages

## 💾 Original Laravel Version

Aplikasi ini awalnya dibuat dengan Laravel framework. File Laravel asli masih tersedia di repository untuk referensi pengembangan lebih lanjut:

- Laravel Routes: `routes/web.php`
- Blade Templates: `resources/views/`
- Controllers: `app/Http/Controllers/`
- Database: `database/`

## 🤝 Contributing

1. Fork the project
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📧 Contact

Untuk pertanyaan atau dukungan teknis, silakan hubungi:
- **Pengadilan Tata Usaha Negara Medan**
- **Email:** info@ptun-medan.go.id
- **Repository:** [https://github.com/Ruminas99/ruminas99.github.io](https://github.com/Ruminas99/ruminas99.github.io)

## 📄 License

Project ini menggunakan lisensi MIT. Lihat file `LICENSE` untuk detail lebih lanjut.

---

**SIBUTET** - Mempermudah administrasi kunjungan tamu di Pengadilan Tata Usaha Negara Medan
