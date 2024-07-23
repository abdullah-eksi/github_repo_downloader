<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $repoUrl = $_POST['repoUrl'];
    $branch = $_POST['branch'];

    // GitHub repo URL'sinin geçerli olduğunu kontrol et
    if (filter_var($repoUrl, FILTER_VALIDATE_URL)) {
        // GitHub API URL'si oluştur
        $apiUrl = $repoUrl . '/zipball/' . $branch;

        // URL'den kullanıcı adını çıkar
        $urlParts = parse_url($repoUrl);
        $pathParts = explode('/', trim($urlParts['path'], '/'));
        $userName = $pathParts[0];
        $repoName = $pathParts[1];

        // Dosya ismi belirle
        $zipFile = $userName . '-' . $repoName . '-' . $branch . '.zip';

        // Dosya indir ve kaydet
        if (file_put_contents($zipFile, fopen($apiUrl, 'r'))) {
            echo "Dosyanız hazır, indirebilirsiniz: <a href='$zipFile' class='text-blue-500 hover:underline'>Dosya indir</a>";
        } else {
            echo "<p>Repo indirilemedi. Lütfen URL ve branch ismini kontrol edin.</p>";
        }
    } else {
        echo "<p>Geçersiz URL. Lütfen geçerli bir GitHub repo URL'si girin.</p>";
    }
} else {
    echo "<p>Geçersiz istek.</p>";
}
?>
