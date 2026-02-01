<!DOCTYPE html>
<html lang="id">
<head>
  <!-- Mengatur karakter agar simbol seperti ÷ × bisa muncul -->
  <meta charset="UTF-8">

  <!-- Judul yang tampil di tab browser -->
  <title>Kalkulator + Riwayat</title>

  <style>
    /* ====== DESAIN HALAMAN UTAMA ====== */
    body {
      font-family: Arial, sans-serif; /* Font tulisan */
      background: #f2f2f2;           /* Warna latar belakang */
      display: flex;                /* Membuat kalkulator di tengah */
      justify-content: center;      /* Tengah horizontal */
      align-items: center;          /* Tengah vertikal */
      height: 100vh;               /* Tinggi penuh layar */
    }

    /* ====== KOTAK KALKULATOR ====== */
    .calculator {
      background: white;           /* Warna kotak */
      padding: 20px;               /* Ruang dalam */
      border-radius: 15px;         /* Sudut melengkung */
      box-shadow: 0 0 15px rgba(0,0,0,0.2); /* Bayangan */
      width: 330px;                /* Lebar kalkulator */
    }

    /* ====== LAYAR DISPLAY ====== */
    .display {
      width: 100%;                 /* Lebar penuh */
      height: 60px;                /* Tinggi layar */
      font-size: 25px;             /* Ukuran angka */
      text-align: right;           /* Angka rata kanan */
      padding: 10px;               /* Ruang dalam */
      border: none;                /* Hilangkan border */
      outline: none;               /* Hilangkan garis klik */
      background: #eee;            /* Warna layar */
      border-radius: 10px;         /* Sudut melengkung */
      margin-bottom: 15px;         /* Jarak bawah */
    }

    /* ====== TOMBOL GRID ====== */
    .buttons {
      display: grid;               /* Layout grid */
      grid-template-columns: repeat(4, 1fr); /* 4 kolom */
      gap: 10px;                   /* Jarak antar tombol */
    }

    /* ====== STYLE TOMBOL UMUM ====== */
    button {
      height: 55px;                /* Tinggi tombol */
      font-size: 20px;             /* Ukuran teks */
      border: none;                /* Tanpa border */
      border-radius: 10px;         /* Tombol melengkung */
      cursor: pointer;             /* Mouse jadi tangan */
      background: #ddd;            /* Warna tombol */
      transition: 0.2s;            /* Efek hover halus */
    }

    /* Efek saat mouse menyentuh tombol */
    button:hover {
      background: #bbb;
    }

    /* Tombol "=" dibuat hijau */
    .equal {
      background: #4CAF50;
      color: white;
    }

    /* Tombol "C" dibuat merah */
    .clear {
      background: #f44336;
      color: white;
    }

    /* ====== BAGIAN RIWAYAT ====== */
    .history {
      margin-top: 20px;            /* Jarak dari tombol */
      background: #fafafa;         /* Warna kotak riwayat */
      padding: 10px;              /* Ruang dalam */
      border-radius: 10px;         /* Sudut melengkung */
      max-height: 150px;           /* Tinggi maksimal */
      overflow-y: auto;            /* Bisa scroll */
    }

    /* Judul riwayat */
    .history h3 {
      margin: 5px 0;
      font-size: 18px;
      text-align: center;
    }

    /* Setiap item riwayat */
    .history-item {
      font-size: 16px;
      padding: 5px;
      border-bottom: 1px solid #ddd;
    }

    /* Tombol hapus riwayat */
    .clear-history {
      margin-top: 10px;
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 10px;
      background: black;
      color: white;
      cursor: pointer;
    }

    /* Hover tombol hapus riwayat */
    .clear-history:hover {
      background: #444;
    }
  </style>
</head>

<body>

  <!-- ====== KOTAK UTAMA KALKULATOR ====== -->
  <div class="calculator">

    <!-- DISPLAY: Tempat angka & hasil muncul -->
    <input type="text" id="display" class="display" disabled>

    <!-- ====== TOMBOL-TOMBOL ====== -->
    <div class="buttons">

      <!-- Tombol Clear: Menghapus layar -->
      <button class="clear" onclick="clearDisplay()">C</button>

      <!-- Operator matematika -->
      <button onclick="appendValue('/')">÷</button>
      <button onclick="appendValue('*')">×</button>
      <button onclick="appendValue('-')">−</button>

      <!-- Tombol angka -->
      <button onclick="appendValue('7')">7</button>
      <button onclick="appendValue('8')">8</button>
      <button onclick="appendValue('9')">9</button>
      <button onclick="appendValue('+')">+</button>

      <button onclick="appendValue('4')">4</button>
      <button onclick="appendValue('5')">5</button>
      <button onclick="appendValue('6')">6</button>

      <!-- Tombol "=" untuk menghitung -->
      <button onclick="calculateResult()" class="equal">=</button>

      <button onclick="appendValue('1')">1</button>
      <button onclick="appendValue('2')">2</button>
      <button onclick="appendValue('3')">3</button>

      <!-- Titik desimal -->
      <button onclick="appendValue('.')">.</button>

      <!-- Tombol 0 panjang -->
      <button onclick="appendValue('0')" style="grid-column: span 4;">0</button>
    </div>

    <!-- ====== RIWAYAT PERHITUNGAN ====== -->
    <div class="history">
      <h3>📜 Riwayat</h3>

      <!-- Semua hasil riwayat muncul di sini -->
      <div id="historyList"></div>
    </div>

    <!-- Tombol untuk menghapus semua riwayat -->
    <button class="clear-history" onclick="clearHistory()">
      Hapus Riwayat
    </button>

  </div>

  <!-- ====== JAVASCRIPT (LOGIKA PROGRAM) ====== -->
  <script>

    // Array untuk menyimpan riwayat perhitungan
    let historyList = [];

    // Fungsi menambahkan angka/operator ke display
    function appendValue(value) {
      document.getElementById("display").value += value;
    }

    // Fungsi menghapus isi display
    function clearDisplay() {
      document.getElementById("display").value = "";
    }

    // Fungsi menghitung hasil ketika tombol "=" ditekan
    function calculateResult() {

      // Ambil elemen display
      let display = document.getElementById("display");

      // Ambil ekspresi matematika yang ditulis user
      let expression = display.value;

      try {
        // Hitung ekspresi menggunakan eval()
        let result = eval(expression);

        // Jika hasil Infinity atau NaN → tampilkan Error
        if (result === Infinity || result === -Infinity || isNaN(result)) {
          display.value = "Error";
          return;
        }

        // Simpan ke riwayat
        historyList.push(expression + " = " + result);

        // Update tampilan riwayat
        updateHistory();

        // Tampilkan hasil di display
        display.value = result;

      } catch {
        // Jika input salah → Error
        display.value = "Error";
      }
    }

    // Fungsi untuk menampilkan riwayat ke halaman
    function updateHistory() {

      // Ambil div riwayat
      let historyDiv = document.getElementById("historyList");

      // Kosongkan dulu isi lama
      historyDiv.innerHTML = "";

      // Tampilkan riwayat terbaru di atas
      historyList.slice().reverse().forEach(item => {

        // Buat elemen div baru
        let div = document.createElement("div");

        // Beri class agar ada style
        div.className = "history-item";

        // Isi teks perhitungan
        div.textContent = item;

        // Tambahkan ke halaman
        historyDiv.appendChild(div);
      });
    }

    // Fungsi menghapus semua riwayat
    function clearHistory() {
      historyList = []; // Kosongkan array
      updateHistory();  // Update tampilan
    }

  </script>

</body>
</html>
