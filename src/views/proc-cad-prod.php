<?php 
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 

require_once '../routes/conexao.php'; 
require_once '../models/admin.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $nome = $_POST['nome'] ?? null; 
    $preco = $_POST['preco'] ?? null; 
    $estoque = $_POST['estoque'] ?? null; 
    $categoria = $_POST['categoria'] ?? null; 
    $descricao = $_POST['descricao'] ?? null; 
    
    $nome_imagem_final = 'sem-foto.jpg'; 

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] !== UPLOAD_ERR_NO_FILE) {
        if ($_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
            $diretorio_destino = __DIR__ . '/images/'; 
            
            if (!is_dir($diretorio_destino)) { 
                mkdir($diretorio_destino, 0775, true); 
            } 

            $extensao = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION)); 
            $extensoes_permitidas = ['jpg', 'jpeg', 'png', 'webp']; 

            if (in_array($extensao, $extensoes_permitidas)) { 
                $nome_limpo = strtolower(preg_replace('/[^a-zA-Z0-9-]/', '', $nome)); 
                if (empty($nome_limpo)) {
                    $nome_limpo = 'produto';
                }
                $nome_imagem_final = $nome_limpo . '-' . uniqid() . '.' . $extensao; 
                
                if (!move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio_destino . $nome_imagem_final)) {
                    echo "<p style='color:red;'>Erro ao mover a imagem para a pasta images/.</p>";
                    exit;
                }
            } else { 
                echo "<p style='color:red;'>Formato de imagem inválido. Use JPG, JPEG, PNG ou WEBP.</p>"; 
                exit; 
            } 
        } else {
            echo "<p style='color:red;'>Erro no upload da imagem (Código: " . $_FILES['imagem']['error'] . ").</p>";
            exit;
        }
    }

    if (!empty($nome) && $preco !== null && $preco !== '') { 
        $admService = new ADM($conn); 
        $admService->cadastrarProduto($nome, $preco, $estoque, $categoria, $descricao, $nome_imagem_final); 
        
        echo "<script> 
            alert('Produto cadastrado com sucesso!'); 
            window.location.href = 'catalogo.php'; 
        </script>"; 
        exit; 
    } else { 
        echo "<p style='color:red;'>Por favor, preencha todos os campos obrigatórios.</p>"; 
    } 
} else { 
    echo "<p style='color:red;'>Método de requisição inválido.</p>"; 
} 
?>
