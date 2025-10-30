@props(['isSidebar' => false, 'isFooter' => false, 'title' => 'SIBERSIh'])
 {{-- Layout utama App --}}

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title ?? 'SIBERSIH' }}</title>
     <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    <main class="flex gap-2">



    @if ("isSidebar")
    {{-- sidebar untuk destop start  --}}
    {{-- Sidebar (Desktop) --}}
  <div class="hidden md:flex flex-col  h-screen w-60 bg-blue-600 text-white p-5">
    <h4 class="text-center font-bold text-lg mb-6">🧹 SIBERSIH</h4>
    <nav class="flex flex-col space-y-2">
      <a href="#" class="px-3 py-2 rounded-lg hover:bg-blue-500 bg-blue-500/40">Dashboard</a>
      <a href="#" class="px-3 py-2 rounded-lg hover:bg-blue-500">Laporan Sampah</a>
      <a href="#" class="px-3 py-2 rounded-lg hover:bg-blue-500">Petugas</a>
      <a href="#" class="px-3 py-2 rounded-lg hover:bg-blue-500">Peta Lokasi</a>
      <a href="#" class="px-3 py-2 rounded-lg hover:bg-blue-500">Profil</a>
    </nav>
  </div>

  {{-- Bottom Navbar (Mobile) --}}
  <div class="fixed bottom-0 left-0 w-full bg-blue-600 text-white flex justify-around items-center py-2 md:hidden">
    <a href="#" class="flex flex-col items-center text-sm">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M3 12l2-2m0 0l7-7 7 7M13 5v14" />
      </svg>
      Dashboard
    </a>

    <a href="#" class="flex flex-col items-center text-sm">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M9 12h6m2 0a2 2 0 002-2V6a2 2 0 00-2-2H7a2 2 0 00-2 2v4a2 2 0 002 2m10 0v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6" />
      </svg>
      Laporan
    </a>

    <a href="#" class="flex flex-col items-center text-sm">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M12 12c2.28 0 4-1.72 4-4s-1.72-4-4-4-4 1.72-4 4 1.72 4 4 4zM6 20v-2a4 4 0 014-4h4a4 4 0 014 4v2" />
      </svg>
      Petugas
    </a>

    <a href="#" class="flex flex-col items-center text-sm">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M12 11c0-3.866 3.134-7 7-7m0 0a7 7 0 010 14m0 0c-3.866 0-7-3.134-7-7m0 0a7 7 0 01-7 7" />
      </svg>
      Peta
    </a>

    <a href="#" class="flex flex-col items-center text-sm">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M5.121 17.804A9 9 0 1112 21a9 9 0 01-6.879-3.196z" />
      </svg>
      Profil
    </a>
  </div>
    {{-- sidebar untuk destop end  --}}
   

            {{-- sidebar untuk mobile start  --}}
           
  <div class="fixed bottom-0 left-0 w-full bg-[#2B68FF] text-white flex justify-around items-center py-2 shadow-lg md:hidden">
    
    <a href="#" class="flex flex-col items-center text-xs text-white opacity-100">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mb-1" fill="currentColor" viewBox="0 0 24 24">
        <path d="M3 13h18v8H3zm0-8h18v5H3z"/>
      </svg>
      <span class="font-semibold">Dashboard</span>
    </a>

    <a href="#" class="flex flex-col items-center text-xs text-white/80 hover:text-white transition">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mb-1" fill="currentColor" viewBox="0 0 24 24">
        <path d="M11 2v20h2V2h-2zm-8 8v12h2V10H3zm16 4v6h2v-6h-2z"/>
      </svg>
      <span>laporan</span>
    </a>

    <a href="#" class="flex flex-col items-center text-xs text-white/80 hover:text-white transition">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mb-1" fill="currentColor" viewBox="0 0 24 24">
        <path d="M12 12c2.28 0 4-1.72 4-4s-1.72-4-4-4-4 1.72-4 4 1.72 4 4 4zM6 20v-2a4 4 0 014-4h4a4 4 0 014 4v2"/>
      </svg>
      <span>petugas</span>
    </a>

    <a href="#" class="flex flex-col items-center text-xs text-white/80 hover:text-white transition">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mb-1" fill="currentColor" viewBox="0 0 24 24">
        <path d="M12 2C8.1 2 5 5.1 5 9c0 6.6 7 13 7 13s7-6.4 7-13c0-3.9-3.1-7-7-7zM12 11.5c-1.4 0-2.5-1.1-2.5-2.5S10.6 6.5 12 6.5s2.5 1.1 2.5 2.5S13.4 11.5 12 11.5z"/>
      </svg>
      <span>peta</span>
    </a>

    <a href="#" class="flex flex-col items-center text-xs text-white/80 hover:text-white transition">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mb-1" fill="currentColor" viewBox="0 0 24 24">
        <path d="M12 12c2.67 0 8 1.34 8 4v4H4v-4c0-2.66 5.33-4 8-4zm0-2a4 4 0 110-8 4 4 0 010 8z"/>
      </svg>
      <span>profile</span>
    </a>
  </div>
            {{-- sidebar untuk mobile end --}}
        </nav>
    </div>
        
    @endif


    {{ $slot }}
    <!-- Slot utama, isi halaman atau isi di dalamnya -->
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @if ("isNavbar")
    <footer>
        <p>exmaple aja</p>
    </footer>
        
    @endif
    
</body>