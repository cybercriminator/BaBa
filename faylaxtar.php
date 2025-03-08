<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dizin ve Dosya Listeleme</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1e1e1e;
            color: #d4d4d4;
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }
        input, button {
            margin: 5px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #333;
        }
        button {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .container {
            max-height: 500px;
            overflow-y: auto;
            border: 1px solid #444;
            border-radius: 5px;
            padding: 10px;
            background-color: #252526;
            white-space: pre-wrap;
            font-family: monospace;
        }
    </style>
</head>
<body>
    <h2>Dizin ve Dosya Listeleme</h2>
    <form method="POST">
        <label for="directory">Dizin:</label>
        <input type="text" id="directory" name="directory" required>
        <br>
        <label for="search">Dosya Ara (Opsiyonel):</label>
        <input type="text" id="search" name="search">
        <br>
        <button type="submit">Listele</button>
    </form>

    <?php
    set_time_limit(0); // İşlem süresini sınırsız yap

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $directory = htmlspecialchars($_POST['directory']);
        $search = isset($_POST['search']) ? htmlspecialchars($_POST['search']) : '';

        function listFiles($dir, $search) {
            echo "<div class='container'>";
            $iterator = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
                RecursiveIteratorIterator::SELF_FIRST
            );

            foreach ($iterator as $path) {
                $type = $path->isDir() ? "[Dizin]" : "[Dosya]";
                $filename = $path->getFilename();
                if ($search === '' || stripos($filename, $search) !== false) {
                    echo htmlspecialchars($type . ' ' . $path->getPathname()) . "\n";
                }
                flush(); // Bellek yönetimini iyileştirir
            }
            echo "</div>";
        }

        if (is_dir($directory)) {
            echo "<h3>Sonuçlar:</h3>";
            listFiles($directory, $search);
        } else {
            echo "<p style='color:red;'>Geçersiz dizin!</p>";
        }
    }
    ?>
</body>
</html>
