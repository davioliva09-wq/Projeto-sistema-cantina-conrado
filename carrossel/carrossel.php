<?php ?> 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>carrossel</title> 
</head> 
<body> 
    <div class="carusel-container" id="carusel-container"> 
        <?php foreach($itens as $item => $result): ?> 
            <div class="carrossel-slide"> 
                <img src="<?= htmlspecialchars($result["imagem"]) ?>" alt="<?= htmlspecialchars($result["nome"] ?? 'Imagem do carrossel') ?>"> 
            </div> 
        <?php endforeach; ?> 
    </div> 
</body> 
</html>
