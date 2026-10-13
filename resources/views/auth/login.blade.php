<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator - Aplikasi Sertifikasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-secondary d-flex align-items-center py-4" style="height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow border-0 rounded-4">
                    <div class="card-body p-4">
                        <h3 class="text-center fw-bold mb-4">Login Admin</h3>

                        @if($errors->any())
                            <div class="alert alert-danger py-2 auto-dismiss-alert">
                                <ul class="mb-0 small">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ url('/login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Email Administrator</label>
                                <!-- Email tidak akan hilang jika login gagal -->
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <!-- Password dikosongkan untuk keamanan -->
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary py-2 fw-bold">Masuk</button>
                                <!-- Tombol Kembali ke Beranda sesuai permintaan guru -->
                                <a href="{{ url('/') }}" class="btn btn-outline-secondary py-2">Kembali ke Beranda</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script Auto-Fade untuk Pesan Error Login -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const alertBox = document.querySelector('.auto-dismiss-alert');
            if (alertBox) {
                setTimeout(function () {
                    alertBox.style.transition = "opacity 0.8s ease";
                    alertBox.style.opacity = "0";
                    setTimeout(function () {
                        alertBox.remove();
                    }, 800);
                }, 3000); // Pesan error akan memudar setelah 3 detik
            }
        });
    </script>
</body>
</html>
