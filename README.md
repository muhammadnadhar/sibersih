# SIBERSIH

### Tech Stack

<p align="center">
  <a href="https://skillicons.dev" target="_blank" rel="noopener noreferrer">
    <img
      src="https://skillicons.dev/icons?i=php,laravel,js,bootstrap&perline=4"
      alt="Stack: php , laravel, javascript, bootstrap "
    />
  </a>
</p>

1. laravel : framework php
2. Boostrap : framework CSS
3. bootstrap Icon : untuk Icon di project ini
4. Mysql : untuk Database
5. chart.js : library chart dari JS
6. axios : untuk management Api di sisi Client
7. alexpechkarev/google-maps : handle Api untuk Map

### controller || model || Route

base controler **Utama**

- UserControleer : untuk handle user Route
    1. profile : handle untuk tampilan profile
    2. peta lokasi
    3. sign-in : handle untuk login
    4. sign-up : handle untuk reqister
    5. laporan : untk petugas dan user , dia menghandle di controller terpisah
- PetugasControler : untuk handle petugas Route
- AdminControler : untuk handle admin controller

### Middleware

Ini middleware utama kami :

- `UserLogin` : middleare untuk pengecekan login user
- `PetugasLogin` : middleare untuk pengecekan login petugas
- `AdminLogin` : middlware untuk pengecekan login Admin

### Note

- untuk blade kawan kawan coba perhatikan di layout.blade.php dan dashboard.blade.php , ini buatnya bentuknya seperti di dashboard , bungkus di tag <x-layout> </x-layout>

### Color App

Teks utama: #1E293B
Biru utama sidebar: #2B68FF
Hijau sukses: #34D399
Kuning proses: #FBBF24
Merah urgent: #F87171
Abu konten background: #F8FAFC
Putih kartu: #FFFFFF

### kelompok - 8

- muhammad nadhar (230705083)
