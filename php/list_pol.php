<select id="f_doc" name="f_doc[]" multiple class="form-control form-group-sm">

<?php

include_once ("conexao.php");

try {

    $pdo=conexao();

    //busca o codigo da viagem
    $execsql=$pdo->query("SELECT * FROM lis_pol");
    $data = $execsql->fetchAll(PDO::FETCH_ASSOC);
    
    if ($execsql->rowCount() != 0){
        $ctlpol=1;

        $qtdpol=$execsql->rowCount();

        foreach ($data as $row) {
            $intcodpol=$row['int_tb_doc_cod'];
            $strnmepol=$row['str_tb_doc_nme_doc'];
            
            if ($ctlpol == 1) {
 ?>
            <option selected value="<?php echo $intcodpol?>"><?php echo $strnmepol?></option>
<?php
            $ctlpol = 0;
            } else {
 ?>
            <option value="<?php echo $intcodpol?>"><?php echo $strnmepol?></option>
<?php
            }
        }
    } else { 
?>
            <option selected value="0">Não existem politicas cadastradas</option>
    <?php
    }
}
catch (Exception $erro)
{
    //echo 'passei por aqui 1<br>';
    //var_dump($erro);
    return 'Erro:'.$erro->getMessage();

}

catch (PDOException $erro) 
{
    //echo 'passei por aqui 3<br>';
    //var_dump($erro);
    return 'Erro:'.$execsql->errorInfo();

}


?>

</select>

        

  
