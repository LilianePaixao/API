<?php
//conexão
include_once 'db_connect.php';
include_once 'execute_connection.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="/base/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio17</title>
</head>
<body>
    <h1>Exercício 17</h1>
    <p> Criar o(s) campo(s) e pedir para o usuario digitar.</p>
    <p> Fazer a lógica de php que checa qual é o maior e menor.</p>
    <p> Fazer a lógica de php para calcular o % de numeros pares e media dos elementos.</p>
    <p> Exibir msg na tela com os resultados</p>
    <div>
        <form action = "/exercicio17/index.php" method="POST">
            <fieldset>
                <label for="numero"> Informe 20 números separados com ",":</label>
                <input type ="text" size= "100" maxlength ="80" name = "numeros_digitados">
                <input type="submit" value="enviar" class="enviar">
            </fieldset>
        </form>
        
        <?php

            if (!empty($_POST["numeros_digitados"])){ 
                
                if ($_POST["numeros_digitados"] >= 0){
                
                    $numerosInformados = $_POST["numeros_digitados"];
                        
                    $array_numeros = explode (",", $numerosInformados);
                                                    
                    foreach($array_numeros as $numero){    
                        if ($numero % 2 == 0){
                            $par[] = $numero;
                        } else {
                            $impar[] = $numero;
                        }
                        $sum += $numero;
                    }
                    $menorNumero = min($array_numeros);
                    $maiorNumero = max($array_numeros);
                    $media = $sum/20;
                    $porcentagem = count($par)*5;
                    
                    //Trata os valores informados para evitar sql injection
                    $numerosDigitados = mysqli_escape_string($connect, $_POST['numeros_digitados']);
                    $menorNumero = mysqli_escape_string($connect, $menorNumero);
                    $maiorNumero = mysqli_escape_string($connect, $maiorNumero);
                    $media = mysqli_escape_string($connect, $media);
                    $porcentagem = mysqli_escape_string($connect, $porcentagem);
                    
                    //Insert on DB
                    $sql = "INSERT INTO exercicio17 (`numeros_digitados`, `menorNumero`, `maiorNumero`, `media`, `porcentagem`) VALUES ('$numerosDigitados', '$menorNumero','$maiorNumero', '$media','$porcentagem')";

                    execute_connection($connect, $sql);

            } else {
                echo "Os números informados devem ser positivos.";
            }
        }    
        
            //Print datas
            $sql = "SELECT * FROM exercicio17";
            $resultado = execute_connection($connect, $sql);

            while ($dados = mysqli_fetch_array($resultado)){
       ?>
                <table>
                <tr>
                    <th> id </th>  
                    <th> Os Números digitados </th>
                    <th> O Menor número informado </th> 
                    <th> O Maior número informado </th> 
                    <th> A média dos números informados </th> 
                    <th> A porcentagem de números pares </th>  
                </tr>
                <tr>
                    <td><?= $dados['id'];?> </td>
                    <td><?= $dados['numeros_digitados'];?> </td>
                    <td><?= $dados['menorNumero'];?> </td>
                    <td><?= $dados['maiorNumero'];?></td>
                    <td><?= $dados['media'];?></td>
                    <td><?= $dados['porcentagem'];?></td>
                </tr>
                </table>  
        <?php     
        }
        ?>
    </div>
</body>
</html>
