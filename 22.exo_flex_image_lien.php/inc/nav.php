<nav>
    <div>
        <h1><a href=<?php
            echo (getcwd() == '/htdocs/presentielle/22.exo_flex_image_lien/' ? "../index.php" : "index.php")

        ?>>FlexBox</a></h1>
    </div>
    
    <div>
        <a href=<?php
            echo (getcwd() == '/htdocs/presentielle/22.exo_flex_image_lien/Vues' ? "audio.php" : "Vues/audio.php")
        ?>>Audio</a>
        <a href=<?php
            echo (getcwd() == '/htdocs/presentielle/22.exo_flex_image_lien/Vues' ? "video.php" : "Vues/video.php")
        ?>>Video</a>
        <a href=<?php
            echo (getcwd() == '/htdocs/presentielle/22.exo_flex_image_lien/Vues' ? "image.php" : "Vues/image.php")
        ?>>Image</a>
    </div>
</nav>