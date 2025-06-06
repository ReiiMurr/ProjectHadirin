{{-- resources/views/scan_kehadiran.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Scan QR Kehadiran</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <!-- library html5-qrcode -->
  <script src="https://unpkg.com/html5-qrcode"></script>
  <!-- axios untuk AJAX -->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    body {
      font-family: sans-serif;
      padding: 1rem;
      background: #f4f4f4;
      text-align: center;
    }
    #reader {
      width: 100%;
      max-width: 400px;
      margin: 1rem auto;
    }
    .message {
      margin-top: 20px;
      font-weight: bold;
    }
    .btn {
      display: inline-block;
      padding: 0.5rem 1rem;
      margin-top: 1rem;
      border: none;
      background-color: #007bff;
      color: white;
      border-radius: 4px;
      cursor: pointer;
    }
    .btn:disabled {
      background-color: #aaa;
      cursor: not-allowed;
    }
  </style>
</head>
<body>

  <h2>Scan QR Code untuk Absensi</h2>
  <div id="reader"></div>

  <div class="message" id="resultMessage"></div>

  <button id="start-button" class="btn">MULAI SCANNER</button>
  <button id="stop-button" class="btn" disabled>HENTIKAN SCANNER</button>

<script>
  const resultMessage = document.getElementById('resultMessage');
  const startButton   = document.getElementById('start-button');
  const stopButton    = document.getElementById('stop-button');
  let html5QrcodeScanner = null;

  function showMessage(msg, type = 'info') {
    resultMessage.innerText = msg;
    const colorMap = {
      success: 'green',
      warning: 'orange',
      error:   'red',
      info:    'black'
    };
    resultMessage.style.color = colorMap[type] || 'black';
  }

  function clearMessage() {
    resultMessage.innerText = '';
  }

  // Fungsi untuk memulai html5-qrcode setelah izin diberikan
  function startScanner() {
    clearMessage();
    html5QrcodeScanner = new Html5Qrcode("reader");
    const config = { fps: 10, qrbox: 250 };

    Html5Qrcode.getCameras().then(devices => {
      if (!devices || devices.length === 0) {
        showMessage("❌ Kamera tidak ditemukan.", 'error');
        startButton.disabled = false;
        return;
      }
      // Pilih kamera belakang jika ada
      let backCam = devices.find(d => d.label.toLowerCase().includes('back'));
      let cameraId = backCam ? backCam.id : devices[0].id;

      html5QrcodeScanner.start(
        cameraId,
        config,
        qrCodeMessage => {
          // Setiap kali QR terbaca:
          html5QrcodeScanner.pause(); // pause sementara, jangan langsung stop agar bisa resume
          clearMessage();

          axios.post("{{ route('kehadiran.store') }}", {
            user_id: qrCodeMessage,
          }, {
            headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name=\"csrf-token\"]').content }
          }).then(res => {
            const data = res.data;
            if (data.status === 'success') {
              showMessage(`✅ ${data.nama} hadir pada ${data.waktu_absen}`, 'success');
            } else if (data.status === 'duplicate') {
              showMessage(data.message, 'warning');
            } else {
              showMessage('Gagal absen.', 'error');
            }
          }).catch(err => {
            if (err.response && err.response.data && err.response.data.message) {
              showMessage(`❌ ${err.response.data.message}`, 'error');
            } else {
              showMessage('❌ Terjadi kesalahan server saat absensi.', 'error');
            }
          }).finally(() => {
            // Setelah 3 detik, resume scan untuk QR berikutnya
            setTimeout(() => {
              html5QrcodeScanner.resume();
              clearMessage();
            }, 3000);
          });
        },
        errorMessage => {
          // Kesalahan saat membaca frame QR, abaikan atau bisa debug:
          // console.warn(`Reading error: ${errorMessage}`);
        }
      ).then(() => {
        showMessage("Scanner aktif. Arahkan kamera ke QR code.", 'info');
        startButton.disabled = true;
        stopButton.disabled = false;
      }).catch(err => {
        console.error("Gagal memulai pemindaian:", err);
        showMessage("❌ Tidak dapat memulai scanner.", 'error');
        startButton.disabled = false;
      });
    }).catch(err => {
      console.error("Error mendapatkan daftar kamera:", err);
      showMessage("❌ Gagal mengakses daftar kamera.", 'error');
      startButton.disabled = false;
    });
  }

  // Tombol Start: minta izin kamera dulu
  startButton.addEventListener('click', function() {
    startButton.disabled = true;
   	showMessage("Meminta izin akses kamera...", 'info');

    // Minta izin menggunakan getUserMedia
    navigator.mediaDevices.getUserMedia({ video: true })
      .then(stream => {
        // Jika izin diterima, hentikan dulu track-nya (kita hanya butuh izin)
        stream.getTracks().forEach(track => track.stop());
        clearMessage();
        // Lalu jalankan scanner
        startScanner();
      })
      .catch(err => {
        console.error("Izin kamera ditolak:", err);
        showMessage("❌ Izin akses kamera ditolak.", 'error');
        startButton.disabled = false;
      });
  });

  // Tombol Stop: hentikan scanner
  stopButton.addEventListener('click', function() {
    if (html5QrcodeScanner) {
      html5QrcodeScanner.stop().then(() => {
        showMessage("Scanner dihentikan.", 'warning');
        stopButton.disabled = true;
        startButton.disabled = false;
      }).catch(err => {
        console.error("Gagal menghentikan scanner:", err);
        showMessage("❌ Gagal menghentikan scanner.", 'error');
      });
    }
  });

  // Optional: jika ingin langsung meminta izin saat halaman di-load,
  // Anda bisa panggil startButton.click() di sini, tapi biasanya kita tunggu klik user.
  // startButton.click();
</script>

</body>
</html>
