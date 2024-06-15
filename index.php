<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reprodutor de Vídeos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        video {
            width: 80%;
            max-width: 800px;
            margin: 20px 0;
        }
        .video-list {
            list-style-type: none;
            padding: 0;
        }
        .video-list li {
            margin: 5px 0;
        }
        .video-list a {
            text-decoration: none;
            color: #007BFF;
        }
        .video-list a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Reprodutor de Vídeos</h1>
    <video id="videoPlayer" controls>
        <source id="videoSource" src="" type="video/mp4">
        Seu navegador não suporta o elemento de vídeo.
    </video>
    <ul class="video-list">
        <?php
        $dir = 'videos/';
        $files = scandir($dir);
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..' && preg_match('/\.(mp4|webm|ogg)$/i', $file)) {
                echo "<li><a href=\"#\" onclick=\"playVideo('$dir$file')\">$file</a></li>";
            }
        }
        ?>
    </ul>

    <script>
        function playVideo(file) {
            const videoPlayer = document.getElementById('videoPlayer');
            const videoSource = document.getElementById('videoSource');
            videoSource.src = file;
            videoPlayer.load();
            videoPlayer.play();
        }
    </script>
</body>
</html>
