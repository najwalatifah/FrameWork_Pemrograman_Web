<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Gambar dengan Preview</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Dark Mode Styles */
        body.dark-mode {
            background-color: #121212;
            color: #e0e0e0;
        }

        .dark-mode .card,
        .dark-mode .alert,
        .dark-mode .form-control {
            background-color: #1e1e1e;
            color: #fff;
        }

        .dark-mode .btn-primary {
            background-color: #3f51b5;
            border-color: #3f51b5;
        }

        .dark-mode .btn-secondary {
            background-color: #666;
            border-color: #666;
        }
    </style>
</head>
<body>
<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Upload Gambar dengan Preview</h2>
        <button id="toggle-dark" class="btn btn-secondary">🌙 Dark Mode</button>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        <div class="mb-3">
            <strong>Gambar:</strong><br>
            <img src="{{ asset('images/' . session('image')) }}" width="200px">
        </div>
    @endif

    <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="image" class="form-label">Pilih Gambar:</label>
            <input type="file" name="image" id="imageInput"
                   class="form-control @error('image') is-invalid @enderror">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <img id="previewImage" src="#" alt="Preview Gambar" style="display: none; max-width: 300px; margin-top:10px;">
        </div>

        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>

<script>
    // Preview gambar sebelum upload
    document.getElementById('imageInput').addEventListener('change', function(event) {
        const [file] = this.files;
        if (file) {
            const preview = document.getElementById('previewImage');
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        }
    });

    // Toggle Dark Mode
    const toggleBtn = document.getElementById('toggle-dark');
    toggleBtn.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
        toggleBtn.textContent = 
            document.body.classList.contains('dark-mode') ? "☀️ Light Mode" : "🌙 Dark Mode";
        
        // Simpan preferensi ke localStorage
        localStorage.setItem('dark-mode', document.body.classList.contains('dark-mode'));
    });

    // Load preferensi dari localStorage
    if (localStorage.getItem('dark-mode') === 'true') {
        document.body.classList.add('dark-mode');
        toggleBtn.textContent = "☀️ Light Mode";
    }
</script>

</body>
</html>
