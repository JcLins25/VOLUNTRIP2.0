<?php
function upload_fotos (array $_files, string $pasta){

$foto = $_files['image']['tmp_name'];

$tamanho_permitido = 1024000; //1 MB
$novoDestino = "";

if (!empty($foto)){
    $file = getimagesize($foto);

    //TESTA O TAMANHO DO ARQUIVO
    if($_files['image']['size'] > $tamanho_permitido){
        echo "erro - arquivo muito grande";
        exit();
    }

    //TESTA A EXTENSÃO DO ARQUIVO
    if(!preg_match('/^image\/(?:gif|jpg|jpeg|png)$/i', $file['mime'])){
        echo "erro - extensão não permitida";
        exit();
    }

    //CAPTURA A EXTENSÃO DO ARQUIVO
    $extensao = str_ireplace("/", "", strchr($file['mime'], "/"));

    //MONTA O CAMINHO DO NOVO DESTINO
    $novoDestino = "{$pasta}/foto_arquivo_".uniqid('', true) . '.' . $extensao;  
    move_uploaded_file ($foto , $novoDestino );
 }
    return $novoDestino;
}
function upload_multiples_fotos(array $_files, string $pasta, string $key){
    $file_ary = array();
    $file_count = count($_files['name']);
    $file_key = array_keys($_files);
   
    // Looping all files
 for($i=0;$i<$file_count;$i++){
    $filename = $_FILES['files']['name'][$i];
 
    // Pega extensão da imagem
    preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $filename, $ext);
    // Gera um nome único para a imagem
    $file_imagem = md5(uniqid(time())) . "." . $ext[1];
    
    $file_ary[$i] = $file_imagem;
    // Upload file
    move_uploaded_file($_FILES['files']['tmp_name'][$i],$pasta.'/'.$file_imagem);

     
  }
  return $file_ary;
    // for($i=0;$i<$file_count;$i++)
    // {
    //     // foreach($file_key as $val)
    //     // {
    //         // $foto = $_files[$val][$i];
    //         $foto = $_files['name'][$i];
    //         // var_dump ($foto);
    //          $file_ary[$i][$val] = $foto;
    //         $file_ary[$i] = $foto;
        
    // foreach($_FILES as $name => $file) {
    //     foreach($file as $property => $keys) {
    //         foreach($keys as $key => $value) {
    //             $file_ary [$key]=$value;
    //         }
    //     }
    // }
    // var_dump ($file_ary);

    // foreach($_files as $foto){
    // // // // Recupera os dados dos campos
    // // $foto = $foto_uploaded[$up_index];
    
    // // Se a foto estiver sido selecionada
    // var_dump ($foto);
    // if (!empty($foto['name'])) {
    
    //     // Largura máxima em pixels
    //     $largura = 2000;
    //     // Altura máxima em pixels
    //     $altura = 1080;
    //     // Tamanho máximo do arquivo em bytes
    //     $tamanho = 1000;
    
    //     // Verifica se o arquivo é uma imagem
    //     if(!preg_match("^image\/(pjpeg|jpeg|png|gif|bmp)$", $foto["type"])){
    //        $error[1] = "Isso não é uma imagem.";
    //     } 
    
    //     // Pega as dimensões da imagem
    //     $dimensoes = getimagesize($foto["tmp_name"]);
    
    //     // Verifica se a largura da imagem é maior que a largura permitida
    //     if($dimensoes[0] > $largura) {
    //         $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
    //     }
    
    //     // Verifica se a altura da imagem é maior que a altura permitida
    //     if($dimensoes[1] > $altura) {
    //         $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
    //     }
    
    //     // Verifica se o tamanho da imagem é maior que o tamanho permitido
    //     if($arquivo["size"] > $tamanho) {
    //         $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
    //     }
    
    //     // Se não houver nenhum erro
    //     if (count($error) == 0) {
    
    //         // Pega extensão da imagem
            // preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
    
            // Gera um nome único para a imagem
            //  $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
    
    //         // Caminho de onde ficará a imagem
    //         $caminho_imagem = $pasta.'/' . $nome_imagem;
    //         var_dump ($foto["tmp_name"]);
    
    //         // Faz o upload da imagem para seu respectivo caminho
    //         move_uploaded_file($foto["tmp_name"], $caminho_imagem);
    //     }
    
    //     // Se houver mensagens de erro, exibe-as
    //     if (count($error) != 0) {
    //         foreach ($error as $erro) {
    //             echo $erro . "<br />";
    //             }
    //         }
    //     }
    // }
}


?>