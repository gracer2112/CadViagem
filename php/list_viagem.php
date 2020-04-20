<?php
function lista()
{
include_once ("conexao.php");

try {

    $pdo=  conexao();

    //busca o codigo da viagem
    $execsql=$pdo->query("SELECT * FROM lis_pro_via");
    $data = $execsql->fetchAll(PDO::FETCH_ASSOC);
    
    if ($execsql->rowCount() != 0){

        foreach ($data as $row) {
            $intcodvia=$row['int_tb_via_cod'];
            $strnmevia=$row['str_tb_via_nome'];
	    $strviaft1=$row['str_tb_via_foto_1'];
            $intviaft1=$row['int_tb_via_foto_1'];
            $strviaft2=$row['str_tb_via_foto_2'];
            $intviaft2=$row['int_tb_via_foto_2'];
            $strviaft3=$row['str_tb_via_foto_3'];
            $intviaft3=$row['int_tb_via_foto_3'];
            $strviaft4=$row['str_tb_via_foto_4'];
            $intviaft4=$row['int_tb_via_foto_4'];
            $strviaft5=$row['str_tb_via_foto_5'];
            $intviaft5=$row['int_tb_via_foto_5'];
            $strviaft6=$row['str_tb_via_foto_6'];
            $intviaft6=$row['int_tb_via_foto_6'];
            $strrotdtavia=$row['str_tb_rot_data_viagem'];	   
            $strdesrot=$row['str_tb_rot_roteiro'];	  
            $strrotinc=$row['str_tb_rot_incluso'];	   
            $strrotninc=$row['str_tb_rot_nincluso'];	   
            $strrotdtaemb=$row['str_tb_rot_datahora_embarque'];	   
            $strrotdtademb=$row['str_tb_rot_datahora_desembarque'];	   
            $strrotlocemb=$row['str_tb_rot_local_embarque'];	   
            $strrotlocdemb=$row['str_tb_rot_local_desembarque'];   
            $strrotpar=$row['int_tb_rot_parceiro'];	   
            $strrotnmepar=$row['str_tb_rot_nmepar'];   
            $strrotpos=$row['int_tb_rot_pos'];
            $strprehos1=$row['str_tb_pre_hospedagem_1'];
            $intprehos1=$row['dec_tb_pre_hospedagem_1'];
            $strprepag1=$row['str_tb_pre_desc_1'];
            $strprehos2=$row['str_tb_pre_hospedagem_2'];
            $intprehos2=$row['dec_tb_pre_hospedagem_2'];
            $strprepag2=$row['str_tb_pre_desc_2'];
            $strprehos3=$row['str_tb_pre_hospedagem_3'];
            $intprehos3=$row['dec_tb_pre_hospedagem_3'];
            $strprepag3=$row['str_tb_pre_desc_3'];
            $strprehos4=$row['str_tb_pre_hospedagem_4'];
            $intprehos4=$row['dec_tb_pre_hospedagem_4'];
            $strprepag4=$row['str_tb_pre_desc_4'];
            $strprehos5=$row['str_tb_pre_hospedagem_5'];
            $intprehos5=$row['dec_tb_pre_hospedagem_5'];
            $strprepag5=$row['str_tb_pre_desc_5'];
            $strprehos6=$row['str_tb_pre_hospedagem_6'];
            $intprehos6=$row['dec_tb_pre_hospedagem_6'];
            $strprepag6=$row['str_tb_pre_desc_6'];
            $strprehos7=$row['str_tb_pre_hospedagem_7'];
            $intprehos7=$row['dec_tb_pre_hospedagem_7'];
            $strprepag7=$row['str_tb_pre_desc_7'];
            $strprehos8=$row['str_tb_pre_hospedagem_8'];
            $intprehos8=$row['dec_tb_pre_hospedagem_8'];
            $strprepag8=$row['str_tb_pre_desc_8'];
            $strprehos9=$row['str_tb_pre_hospedagem_9'];
            $intprehos9=$row['dec_tb_pre_hospedagem_9'];
            $strprepag9=$row['str_tb_pre_desc_9'];
            $strprehos10=$row['str_tb_pre_hospedagem_10'];
            $intprehos10=$row['dec_tb_pre_hospedagem_10'];	   
            $strprepag10=$row['str_tb_pre_desc_10'];

        echo "<pre>";
        print_r($intcodvia);
        print_r($strdesrot);
        echo "</pre>";
           
        };
    } else{
        
        echo "não há viagens";
    }

}
catch (Exception $erro)
{
    echo 'passei por aqui 1<br>';
    return 'Erro:'.$erro->getMessage();
    //var_dump($erro);
}

catch (PDOException $erro) 
{
    //echo 'passei por aqui 3<br>';
    return 'Erro:'.$execsql->errorInfo();
    //var_dump($erro);
}

}
?>