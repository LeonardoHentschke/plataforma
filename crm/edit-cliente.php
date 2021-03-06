<?php
    session_start();
    require '../config.php';
    require '../classes/usuarios.class.php';

    $usuarios = new Usuarios($pdo);
    $usuarios->setUsuario($_SESSION['logado']);

    if(!isset($_SESSION['logado'])) {
        header("Location: ../login.php");
        exit;
    }elseif ($usuarios->temSistema('CRM')) {
        
    }else{
        header("Location: ../index.php");
        exit;
    }

    if(isset($_GET['id_empresa']) && empty($_GET['id_empresa'])==false )
    {
      $id_empresa=addslashes($_GET['id_empresa']);
    }


    if(isset($_POST['razao_social']) && empty($_POST['razao_social'])==false ){

        $razao_social           =addslashes($_POST['razao_social']);      
        $tipo                   =addslashes($_POST['tipo']);
        $cnpj_cpf               =addslashes($_POST['cnpj_cpf']);
        $inscricao_estadual     =addslashes($_POST['inscricao_estadual']);
        $endereco               =addslashes($_POST['endereco']);
        $bairro                 =addslashes($_POST['bairro']);
        $numero                 =addslashes($_POST['numero']);
        $complemento            =addslashes($_POST['complemento']);
        $segmento               =addslashes($_POST['segmento']);
        $estado                 =addslashes($_POST['estado']);
        $cidade                 =addslashes($_POST['cidade']);
        $email                  =addslashes($_POST['email']);
        $telefone               =addslashes($_POST['telefone']);
        $whats_app              =addslashes($_POST['whats_app']);
        $observacoes            =addslashes($_POST['observacoes']);
        $ultima_edicao          =date('Y/m/d');
        $ultima_edicao_feitopor =$_SESSION['nome'];
     
        
        $sql = "UPDATE empresas_crm SET        
        razao_social           = '$razao_social',       
        tipo                   = '$tipo', 
        cnpj_cpf               = '$cnpj_cpf',
        inscricao_estadual     = '$inscricao_estadual',
        endereco               = '$endereco',
        bairro                 = '$bairro',
        numero                 = '$numero',
        complemento            = '$complemento',
        segmento               = '$segmento',
        estado                 = '$estado',
        cidade                 = '$cidade',
        email                  = '$email',
        telefone               = '$telefone',
        whats_app              = '$whats_app',
        observacoes            = '$observacoes',
        ultima_edicao          = '$ultima_edicao',
        ultima_edicao_feitopor = '$ultima_edicao_feitopor'
        WHERE id_empresa       = '$id_empresa'
        ";        

        $pdo-> query($sql);
        header("Location: oportunidades.php");
    }


    $sql = "SELECT * FROM empresas_crm WHERE id_empresa = '$id_empresa'";
    $sql = $pdo -> query($sql);

    if($sql -> rowCount() > 0 )
	{		 
		$dado = $sql -> fetch();        
    }
    else
    {
        header("Location: index.php");
    }


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">

    <title> Sistemas | Visualiza????o</title>

</head>
<body style="background-color: #DCDCDC; color: #000">
    <div class="container">

        <br>
        <div class="row justify-content-center">
            <h3>Dados do cliente</h3>
        </div>

        

        <div class="row justify-content-center">            
            <div class="col">

            <form method="POST">

                    <div class="form-row">
                        <div class="col-md-6">
                            <label>Raz??o Social:</label>
                            <input type="text" name="razao_social" class="form-control" value="<?php echo $dado['razao_social']; ?>"/>
                        </div>

                        <div class="col-md-3">                
                            <label>Tipo:</label>
                            <select class="form-control" name="tipo">
                              <option><?php echo $dado['tipo']; ?></option>
                              <option value="">  </option>
                              <option> Fisica </option>
                              <option> Juridica </option>
                            </select>                            
                        </div>

                        <div class="col-md-3">
                            <label>CNPJ / CPF:</label>
                            <input type="text" name="cnpj_cpf" class="form-control" value="<?php echo $dado['cnpj_cpf']; ?>" />
                        </div>
                    </div>

                    <br>

                    <div class="form-row">
                        <div class="col-md-3">
                            <label>Inscri????o Estadual:</label>
                            <input type="text" name="inscricao_estadual" class="form-control" value="<?php echo $dado['inscricao_estadual']; ?>"/>
                        </div>
                        
                        <div class="col-md-4">
                            <label>Endere??o:</label>
                            <input type="text" name="endereco" class="form-control" value="<?php echo $dado['endereco']; ?>" />
                        </div>

                        <div class="col-md-2">
                            <label>Bairro:</label>
                            <input type="text" name="bairro" class="form-control" value="<?php echo $dado['bairro']; ?>" />
                        </div>

                        <div class="col-md-1">
                            <label>N??mero:</label>
                            <input type="text" name="numero" class="form-control" value="<?php echo $dado['numero']; ?>" />
                        </div>

                        <div class="col-md-2">
                            <label>Complemento:</label>
                            <input type="text" name="complemento" class="form-control" value="<?php echo $dado['complemento']; ?>" />
                        </div>
                    </div>

                    <br>

                    <div class="form-row">

                        <div class="col-md-6">                
                            <label>Segmento:</label>
                            <select class="form-control" name="segmento">
                              <option><?php echo $dado['segmento']; ?></option>
                              <option value="">  </option>
                                <option> Monitoramento/Vigil??ncia </option>
                                <option> Presta????o de Servi??os </option>
                                <option> Consultoria </option>
                                <option> Loca????o </option>
                            </select>                            
                        </div>
                        
                        <div class="col-md-3">           
                            <label>Estado:</label>
                            <input type="text" name="estado" class="form-control" value="<?php echo $dado['estado']; ?>" readonly/>                            
                        </div>

                        <div class="col-md-3">                
                            <label>Cidade:</label>
                                <select class="form-control" name="cidade">
                                    <option><?php echo $dado['cidade']; ?></option>
                                    <option value="">  </option>
                                    <option>Acegu??,RS,BRASIL</option>
                                <option>??gua Santa,RS,BRASIL</option>
                                <option>Agudo,RS,BRASIL</option>
                                <option>Ajuricaba,RS,BRASIL</option>
                                <option>Alecrim,RS,BRASIL</option>
                                <option>Alegrete,RS,BRASIL</option>
                                <option>Alegria,RS,BRASIL</option>
                                <option>Almirante Tamandar?? do Sul,RS,BRASIL</option>
                                <option>Alpestre,RS,BRASIL</option>
                                <option>Alto Alegre,RS,BRASIL</option>
                                <option>Alto Feliz,RS,BRASIL</option>
                                <option>Alvorada,RS,BRASIL</option>
                                <option>Amaral Ferrador,RS,BRASIL</option>
                                <option>Ametista do Sul,RS,BRASIL</option>
                                <option>Andr?? da Rocha,RS,BRASIL</option>
                                <option>Anta Gorda,RS,BRASIL</option>
                                <option>Ant??nio Prado,RS,BRASIL</option>
                                <option>Arambar??,RS,BRASIL</option>
                                <option>Araric??,RS,BRASIL</option>
                                <option>Aratiba,RS,BRASIL</option>
                                <option>Arroio do Meio,RS,BRASIL</option>
                                <option>Arroio do Padre,RS,BRASIL</option>
                                <option>Arroio do Sal,RS,BRASIL</option>
                                <option>Arroio do Tigre,RS,BRASIL</option>
                                <option>Arroio dos Ratos,RS,BRASIL</option>
                                <option>Arroio Grande,RS,BRASIL</option>
                                <option>Arvorezinha,RS,BRASIL</option>
                                <option>Augusto Pestana,RS,BRASIL</option>
                                <option>??urea,RS,BRASIL</option>
                                <option>Bag??,RS,BRASIL</option>
                                <option>Balne??rio Pinhal,RS,BRASIL</option>
                                <option>Bar??o de Cotegipe,RS,BRASIL</option>
                                <option>Bar??o do Triunfo,RS,BRASIL</option>
                                <option>Bar??o,RS,BRASIL</option>
                                <option>Barra do Guarita,RS,BRASIL</option>
                                <option>Barra do Quara??,RS,BRASIL</option>
                                <option>Barra do Ribeiro,RS,BRASIL</option>
                                <option>Barra do Rio Azul,RS,BRASIL</option>
                                <option>Barra Funda,RS,BRASIL</option>
                                <option>Barrac??o,RS,BRASIL</option>
                                <option>Barros Cassal,RS,BRASIL</option>
                                <option>Benjamin Constant do Sul,RS,BRASIL</option>
                                <option>Bento Gon??alves,RS,BRASIL</option>
                                <option>Boa Vista das Miss??es,RS,BRASIL</option>
                                <option>Boa Vista do Buric??,RS,BRASIL</option>
                                <option>Boa Vista do Cadeado,RS,BRASIL</option>
                                <option>Boa Vista do Incra,RS,BRASIL</option>
                                <option>Boa Vista do Sul,RS,BRASIL</option>
                                <option>Bom Jesus,RS,BRASIL</option>
                                <option>Bom Princ??pio,RS,BRASIL</option>
                                <option>Bom Progresso,RS,BRASIL</option>
                                <option>Bom Retiro do Sul,RS,BRASIL</option>
                                <option>Boqueir??o do Le??o,RS,BRASIL</option>
                                <option>Bossoroca,RS,BRASIL</option>
                                <option>Bozano,RS,BRASIL</option>
                                <option>Braga,RS,BRASIL</option>
                                <option>Brochier,RS,BRASIL</option>
                                <option>Buti??,RS,BRASIL</option>
                                <option>Ca??apava do Sul,RS,BRASIL</option>
                                <option>Cacequi,RS,BRASIL</option>
                                <option>Cachoeira do Sul,RS,BRASIL</option>
                                <option>Cachoeirinha,RS,BRASIL</option>
                                <option>Cacique Doble,RS,BRASIL</option>
                                <option>Caibat??,RS,BRASIL</option>
                                <option>Cai??ara,RS,BRASIL</option>
                                <option>Camaqu??,RS,BRASIL</option>
                                <option>Camargo,RS,BRASIL</option>
                                <option>Cambar?? do Sul,RS,BRASIL</option>
                                <option>Campestre da Serra,RS,BRASIL</option>
                                <option>Campina das Miss??es,RS,BRASIL</option>
                                <option>Campinas do Sul,RS,BRASIL</option>
                                <option>Campo Bom,RS,BRASIL</option>
                                <option>Campo Novo,RS,BRASIL</option>
                                <option>Campos Borges,RS,BRASIL</option>
                                <option>Candel??ria,RS,BRASIL</option>
                                <option>C??ndido God??i,RS,BRASIL</option>
                                <option>Candiota,RS,BRASIL</option>
                                <option>Canela,RS,BRASIL</option>
                                <option>Cangu??u,RS,BRASIL</option>
                                <option>Canoas,RS,BRASIL</option>
                                <option>Canudos do Vale,RS,BRASIL</option>
                                <option>Cap??o Bonito do Sul,RS,BRASIL</option>
                                <option>Cap??o da Canoa,RS,BRASIL</option>
                                <option>Cap??o do Cip??,RS,BRASIL</option>
                                <option>Cap??o do Le??o,RS,BRASIL</option>
                                <option>Capela de Santana,RS,BRASIL</option>
                                <option>Capit??o,RS,BRASIL</option>
                                <option>Capivari do Sul,RS,BRASIL</option>
                                <option>Cara??,RS,BRASIL</option>
                                <option>Carazinho,RS,BRASIL</option>
                                <option>Carlos Barbosa,RS,BRASIL</option>
                                <option>Carlos Gomes,RS,BRASIL</option>
                                <option>Casca,RS,BRASIL</option>
                                <option>Caseiros,RS,BRASIL</option>
                                <option>Catu??pe,RS,BRASIL</option>
                                <option>Caxias do Sul,RS,BRASIL</option>
                                <option>Centen??rio,RS,BRASIL</option>
                                <option>Cerrito,RS,BRASIL</option>
                                <option>Cerro Branco,RS,BRASIL</option>
                                <option>Cerro Grande do Sul,RS,BRASIL</option>
                                <option>Cerro Grande,RS,BRASIL</option>
                                <option>Cerro Largo,RS,BRASIL</option>
                                <option>Chapada,RS,BRASIL</option>
                                <option>Charqueadas,RS,BRASIL</option>
                                <option>Charrua,RS,BRASIL</option>
                                <option>Chiapetta,RS,BRASIL</option>
                                <option>Chu??,RS,BRASIL</option>
                                <option>Chuvisca,RS,BRASIL</option>
                                <option>Cidreira,RS,BRASIL</option>
                                <option>Cir??aco,RS,BRASIL</option>
                                <option>Colinas,RS,BRASIL</option>
                                <option>Colorado,RS,BRASIL</option>
                                <option>Condor,RS,BRASIL</option>
                                <option>Constantina,RS,BRASIL</option>
                                <option>Coqueiro Baixo,RS,BRASIL</option>
                                <option>Coqueiros do Sul,RS,BRASIL</option>
                                <option>Coronel Barros,RS,BRASIL</option>
                                <option>Coronel Bicaco,RS,BRASIL</option>
                                <option>Coronel Pilar,RS,BRASIL</option>
                                <option>Cotipor??,RS,BRASIL</option>
                                <option>Coxilha,RS,BRASIL</option>
                                <option>Crissiumal,RS,BRASIL</option>
                                <option>Cristal do Sul,RS,BRASIL</option>
                                <option>Cristal,RS,BRASIL</option>
                                <option>Cruz Alta,RS,BRASIL</option>
                                <option>Cruzaltense,RS,BRASIL</option>
                                <option>Cruzeiro do Sul,RS,BRASIL</option>
                                <option>David Canabarro,RS,BRASIL</option>
                                <option>Derrubadas,RS,BRASIL</option>
                                <option>Dezesseis de Novembro,RS,BRASIL</option>
                                <option>Dilermando de Aguiar,RS,BRASIL</option>
                                <option>Dois Irm??os das Miss??es,RS,BRASIL</option>
                                <option>Dois Irm??os,RS,BRASIL</option>
                                <option>Dois Lajeados,RS,BRASIL</option>
                                <option>Dom Feliciano,RS,BRASIL</option>
                                <option>Dom Pedrito,RS,BRASIL</option>
                                <option>Dom Pedro de Alc??ntara,RS,BRASIL</option>
                                <option>Dona Francisca,RS,BRASIL</option>
                                <option>Doutor Maur??cio Cardoso,RS,BRASIL</option>
                                <option>Doutor Ricardo,RS,BRASIL</option>
                                <option>Eldorado do Sul,RS,BRASIL</option>
                                <option>Encantado,RS,BRASIL</option>
                                <option>Encruzilhada do Sul,RS,BRASIL</option>
                                <option>Engenho Velho,RS,BRASIL</option>
                                <option>Entre Rios do Sul,RS,BRASIL</option>
                                <option>Entre-Iju??s,RS,BRASIL</option>
                                <option>Erebango,RS,BRASIL</option>
                                <option>Erechim,RS,BRASIL</option>
                                <option>Ernestina,RS,BRASIL</option>
                                <option>Erval Grande,RS,BRASIL</option>
                                <option>Erval Seco,RS,BRASIL</option>
                                <option>Esmeralda,RS,BRASIL</option>
                                <option>Esperan??a do Sul,RS,BRASIL</option>
                                <option>Espumoso,RS,BRASIL</option>
                                <option>Esta????o,RS,BRASIL</option>
                                <option>Est??ncia Velha,RS,BRASIL</option>
                                <option>Esteio,RS,BRASIL</option>
                                <option>Estrela Velha,RS,BRASIL</option>
                                <option>Estrela,RS,BRASIL</option>
                                <option>Eug??nio de Castro,RS,BRASIL</option>
                                <option>Fagundes Varela,RS,BRASIL</option>
                                <option>Farroupilha,RS,BRASIL</option>
                                <option>Faxinal do Soturno,RS,BRASIL</option>
                                <option>Faxinalzinho,RS,BRASIL</option>
                                <option>Fazenda Vilanova,RS,BRASIL</option>
                                <option>Feliz,RS,BRASIL</option>
                                <option>Flores da Cunha,RS,BRASIL</option>
                                <option>Floriano Peixoto,RS,BRASIL</option>
                                <option>Fontoura Xavier,RS,BRASIL</option>
                                <option>Formigueiro,RS,BRASIL</option>
                                <option>Forquetinha,RS,BRASIL</option>
                                <option>Fortaleza dos Valos,RS,BRASIL</option>
                                <option>Frederico Westphalen,RS,BRASIL</option>
                                <option>Garibaldi,RS,BRASIL</option>
                                <option>Garruchos,RS,BRASIL</option>
                                <option>Gaurama,RS,BRASIL</option>
                                <option>General C??mara,RS,BRASIL</option>
                                <option>Gentil,RS,BRASIL</option>
                                <option>Get??lio Vargas,RS,BRASIL</option>
                                <option>Giru??,RS,BRASIL</option>
                                <option>Glorinha,RS,BRASIL</option>
                                <option>Gramado dos Loureiros,RS,BRASIL</option>
                                <option>Gramado Xavier,RS,BRASIL</option>
                                <option>Gramado,RS,BRASIL</option>
                                <option>Gravata??,RS,BRASIL</option>
                                <option>Guabiju,RS,BRASIL</option>
                                <option>Gua??ba,RS,BRASIL</option>
                                <option>Guapor??,RS,BRASIL</option>
                                <option>Guarani das Miss??es,RS,BRASIL</option>
                                <option>Harmonia,RS,BRASIL</option>
                                <option>Herval,RS,BRASIL</option>
                                <option>Herveiras,RS,BRASIL</option>
                                <option>Horizontina,RS,BRASIL</option>
                                <option>Hulha Negra,RS,BRASIL</option>
                                <option>Humait??,RS,BRASIL</option>
                                <option>Ibarama,RS,BRASIL</option>
                                <option>Ibia????,RS,BRASIL</option>
                                <option>Ibiraiaras,RS,BRASIL</option>
                                <option>Ibirapuit??,RS,BRASIL</option>
                                <option>Ibirub??,RS,BRASIL</option>
                                <option>Igrejinha,RS,BRASIL</option>
                                <option>Iju??,RS,BRASIL</option>
                                <option>Il??polis,RS,BRASIL</option>
                                <option>Imb??,RS,BRASIL</option>
                                <option>Imigrante,RS,BRASIL</option>
                                <option>Independ??ncia,RS,BRASIL</option>
                                <option>Inhacor??,RS,BRASIL</option>
                                <option>Ip??,RS,BRASIL</option>
                                <option>Ipiranga do Sul,RS,BRASIL</option>
                                <option>Ira??,RS,BRASIL</option>
                                <option>Itaara,RS,BRASIL</option>
                                <option>Itacurubi,RS,BRASIL</option>
                                <option>Itapuca,RS,BRASIL</option>
                                <option>Itaqui,RS,BRASIL</option>
                                <option>Itati,RS,BRASIL</option>
                                <option>Itatiba do Sul,RS,BRASIL</option>
                                <option>Ivor??,RS,BRASIL</option>
                                <option>Ivoti,RS,BRASIL</option>
                                <option>Jaboticaba,RS,BRASIL</option>
                                <option>Jacuizinho,RS,BRASIL</option>
                                <option>Jacutinga,RS,BRASIL</option>
                                <option>Jaguar??o,RS,BRASIL</option>
                                <option>Jaguari,RS,BRASIL</option>
                                <option>Jaquirana,RS,BRASIL</option>
                                <option>Jari,RS,BRASIL</option>
                                <option>J??ia,RS,BRASIL</option>
                                <option>J??lio de Castilhos,RS,BRASIL</option>
                                <option>Lagoa Bonita do Sul,RS,BRASIL</option>
                                <option>Lagoa dos Tr??s Cantos,RS,BRASIL</option>
                                <option>Lagoa Vermelha,RS,BRASIL</option>
                                <option>Lago??o,RS,BRASIL</option>
                                <option>Lajeado do Bugre,RS,BRASIL</option>
                                <option>Lajeado,RS,BRASIL</option>
                                <option>Lavras do Sul,RS,BRASIL</option>
                                <option>Liberato Salzano,RS,BRASIL</option>
                                <option>Lindolfo Collor,RS,BRASIL</option>
                                <option>Linha Nova,RS,BRASIL</option>
                                <option>Ma??ambar??,RS,BRASIL</option>
                                <option>Machadinho,RS,BRASIL</option>
                                <option>Mampituba,RS,BRASIL</option>
                                <option>Manoel Viana,RS,BRASIL</option>
                                <option>Maquin??,RS,BRASIL</option>
                                <option>Marat??,RS,BRASIL</option>
                                <option>Marau,RS,BRASIL</option>
                                <option>Marcelino Ramos,RS,BRASIL</option>
                                <option>Mariana Pimentel,RS,BRASIL</option>
                                <option>Mariano Moro,RS,BRASIL</option>
                                <option>Marques de Souza,RS,BRASIL</option>
                                <option>Mata,RS,BRASIL</option>
                                <option>Mato Castelhano,RS,BRASIL</option>
                                <option>Mato Leit??o,RS,BRASIL</option>
                                <option>Mato Queimado,RS,BRASIL</option>
                                <option>Maximiliano de Almeida,RS,BRASIL</option>
                                <option>Minas do Le??o,RS,BRASIL</option>
                                <option>Miragua??,RS,BRASIL</option>
                                <option>Montauri,RS,BRASIL</option>
                                <option>Monte Alegre dos Campos,RS,BRASIL</option>
                                <option>Monte Belo do Sul,RS,BRASIL</option>
                                <option>Montenegro,RS,BRASIL</option>
                                <option>Morma??o,RS,BRASIL</option>
                                <option>Morrinhos do Sul,RS,BRASIL</option>
                                <option>Morro Redondo,RS,BRASIL</option>
                                <option>Morro Reuter,RS,BRASIL</option>
                                <option>Mostardas,RS,BRASIL</option>
                                <option>Mu??um,RS,BRASIL</option>
                                <option>Muitos Cap??es,RS,BRASIL</option>
                                <option>Muliterno,RS,BRASIL</option>
                                <option>N??o-Me-Toque,RS,BRASIL</option>
                                <option>Nicolau Vergueiro,RS,BRASIL</option>
                                <option>Nonoai,RS,BRASIL</option>
                                <option>Nova Alvorada,RS,BRASIL</option>
                                <option>Nova Ara????,RS,BRASIL</option>
                                <option>Nova Bassano,RS,BRASIL</option>
                                <option>Nova Boa Vista,RS,BRASIL</option>
                                <option>Nova Br??scia,RS,BRASIL</option>
                                <option>Nova Candel??ria,RS,BRASIL</option>
                                <option>Nova Esperan??a do Sul,RS,BRASIL</option>
                                <option>Nova Hartz,RS,BRASIL</option>
                                <option>Nova P??dua,RS,BRASIL</option>
                                <option>Nova Palma,RS,BRASIL</option>
                                <option>Nova Petr??polis,RS,BRASIL</option>
                                <option>Nova Prata,RS,BRASIL</option>
                                <option>Nova Ramada,RS,BRASIL</option>
                                <option>Nova Roma do Sul,RS,BRASIL</option>
                                <option>Nova Santa Rita,RS,BRASIL</option>
                                <option>Novo Barreiro,RS,BRASIL</option>
                                <option>Novo Cabrais,RS,BRASIL</option>
                                <option>Novo Hamburgo,RS,BRASIL</option>
                                <option>Novo Machado,RS,BRASIL</option>
                                <option>Novo Tiradentes,RS,BRASIL</option>
                                <option>Novo Xingu,RS,BRASIL</option>
                                <option>Os??rio,RS,BRASIL</option>
                                <option>Paim Filho,RS,BRASIL</option>
                                <option>Palmares do Sul,RS,BRASIL</option>
                                <option>Palmeira das Miss??es,RS,BRASIL</option>
                                <option>Palmitinho,RS,BRASIL</option>
                                <option>Panambi,RS,BRASIL</option>
                                <option>Pantano Grande,RS,BRASIL</option>
                                <option>Para??,RS,BRASIL</option>
                                <option>Para??so do Sul,RS,BRASIL</option>
                                <option>Pareci Novo,RS,BRASIL</option>
                                <option>Parob??,RS,BRASIL</option>
                                <option>Passa-Sete,RS,BRASIL</option>
                                <option>Passo do Sobrado,RS,BRASIL</option>
                                <option>Passo Fundo,RS,BRASIL</option>
                                <option>Paulo Bento,RS,BRASIL</option>
                                <option>Paverama,RS,BRASIL</option>
                                <option>Pedras Altas,RS,BRASIL</option>
                                <option>Pedro Os??rio,RS,BRASIL</option>
                                <option>Peju??ara,RS,BRASIL</option>
                                <option>Pelotas,RS,BRASIL</option>
                                <option>Picada Caf??,RS,BRASIL</option>
                                <option>Pinhal da Serra,RS,BRASIL</option>
                                <option>Pinhal Grande,RS,BRASIL</option>
                                <option>Pinhal,RS,BRASIL</option>
                                <option>Pinheirinho do Vale,RS,BRASIL</option>
                                <option>Pinheiro Machado,RS,BRASIL</option>
                                <option>Pinto Bandeira,RS,BRASIL</option>
                                <option>Pirap??,RS,BRASIL</option>
                                <option>Piratini,RS,BRASIL</option>
                                <option>Planalto,RS,BRASIL</option>
                                <option>Po??o das Antas,RS,BRASIL</option>
                                <option>Pont??o,RS,BRASIL</option>
                                <option>Ponte Preta,RS,BRASIL</option>
                                <option>Port??o,RS,BRASIL</option>
                                <option>Porto Alegre,RS,BRASIL</option>
                                <option>Porto Lucena,RS,BRASIL</option>
                                <option>Porto Mau??,RS,BRASIL</option>
                                <option>Porto Vera Cruz,RS,BRASIL</option>
                                <option>Porto Xavier,RS,BRASIL</option>
                                <option>Pouso Novo,RS,BRASIL</option>
                                <option>Presidente Lucena,RS,BRASIL</option>
                                <option>Progresso,RS,BRASIL</option>
                                <option>Prot??sio Alves,RS,BRASIL</option>
                                <option>Putinga,RS,BRASIL</option>
                                <option>Quara??,RS,BRASIL</option>
                                <option>Quatro Irm??os,RS,BRASIL</option>
                                <option>Quevedos,RS,BRASIL</option>
                                <option>Quinze de Novembro,RS,BRASIL</option>
                                <option>Redentora,RS,BRASIL</option>
                                <option>Relvado,RS,BRASIL</option>
                                <option>Restinga Seca,RS,BRASIL</option>
                                <option>Rio dos ??ndios,RS,BRASIL</option>
                                <option>Rio Grande,RS,BRASIL</option>
                                <option>Rio Pardo,RS,BRASIL</option>
                                <option>Riozinho,RS,BRASIL</option>
                                <option>Roca Sales,RS,BRASIL</option>
                                <option>Rodeio Bonito,RS,BRASIL</option>
                                <option>Rolador,RS,BRASIL</option>
                                <option>Rolante,RS,BRASIL</option>
                                <option>Ronda Alta,RS,BRASIL</option>
                                <option>Rondinha,RS,BRASIL</option>
                                <option>Roque Gonzales,RS,BRASIL</option>
                                <option>Ros??rio do Sul,RS,BRASIL</option>
                                <option>Sagrada Fam??lia,RS,BRASIL</option>
                                <option>Saldanha Marinho,RS,BRASIL</option>
                                <option>Salto do Jacu??,RS,BRASIL</option>
                                <option>Salvador das Miss??es,RS,BRASIL</option>
                                <option>Salvador do Sul,RS,BRASIL</option>
                                <option>Sananduva,RS,BRASIL</option>
                                <option>Santa B??rbara do Sul,RS,BRASIL</option>
                                <option>Santa Cec??lia do Sul,RS,BRASIL</option>
                                <option>Santa Clara do Sul,RS,BRASIL</option>
                                <option>Santa Cruz do Sul,RS,BRASIL</option>
                                <option>Santa Margarida do Sul,RS,BRASIL</option>
                                <option>Santa Maria do Herval,RS,BRASIL</option>
                                <option>Santa Maria,RS,BRASIL</option>
                                <option>Santa Rosa,RS,BRASIL</option>
                                <option>Santa Tereza,RS,BRASIL</option>
                                <option>Santa Vit??ria do Palmar,RS,BRASIL</option>
                                <option>Santana da Boa Vista,RS,BRASIL</option>
                                <option>Sant'Ana do Livramento,RS,BRASIL</option>
                                <option>Santiago,RS,BRASIL</option>
                                <option>Santo ??ngelo,RS,BRASIL</option>
                                <option>Santo Ant??nio da Patrulha,RS,BRASIL</option>
                                <option>Santo Ant??nio das Miss??es,RS,BRASIL</option>
                                <option>Santo Ant??nio do Palma,RS,BRASIL</option>
                                <option>Santo Ant??nio do Planalto,RS,BRASIL</option>
                                <option>Santo Augusto,RS,BRASIL</option>
                                <option>Santo Cristo,RS,BRASIL</option>
                                <option>Santo Expedito do Sul,RS,BRASIL</option>
                                <option>S??o Borja,RS,BRASIL</option>
                                <option>S??o Domingos do Sul,RS,BRASIL</option>
                                <option>S??o Francisco de Assis,RS,BRASIL</option>
                                <option>S??o Francisco de Paula,RS,BRASIL</option>
                                <option>S??o Gabriel,RS,BRASIL</option>
                                <option>S??o Jer??nimo,RS,BRASIL</option>
                                <option>S??o Jo??o da Urtiga,RS,BRASIL</option>
                                <option>S??o Jo??o do Pol??sine,RS,BRASIL</option>
                                <option>S??o Jorge,RS,BRASIL</option>
                                <option>S??o Jos?? das Miss??es,RS,BRASIL</option>
                                <option>S??o Jos?? do Herval,RS,BRASIL</option>
                                <option>S??o Jos?? do Hort??ncio,RS,BRASIL</option>
                                <option>S??o Jos?? do Inhacor??,RS,BRASIL</option>
                                <option>S??o Jos?? do Norte,RS,BRASIL</option>
                                <option>S??o Jos?? do Ouro,RS,BRASIL</option>
                                <option>S??o Jos?? do Sul,RS,BRASIL</option>
                                <option>S??o Jos?? dos Ausentes,RS,BRASIL</option>
                                <option>S??o Leopoldo,RS,BRASIL</option>
                                <option>S??o Louren??o do Sul,RS,BRASIL</option>
                                <option>S??o Luiz Gonzaga,RS,BRASIL</option>
                                <option>S??o Marcos,RS,BRASIL</option>
                                <option>S??o Martinho da Serra,RS,BRASIL</option>
                                <option>S??o Martinho,RS,BRASIL</option>
                                <option>S??o Miguel das Miss??es,RS,BRASIL</option>
                                <option>S??o Nicolau,RS,BRASIL</option>
                                <option>S??o Paulo das Miss??es,RS,BRASIL</option>
                                <option>S??o Pedro da Serra,RS,BRASIL</option>
                                <option>S??o Pedro das Miss??es,RS,BRASIL</option>
                                <option>S??o Pedro do Buti??,RS,BRASIL</option>
                                <option>S??o Pedro do Sul,RS,BRASIL</option>
                                <option>S??o Sebasti??o do Ca??,RS,BRASIL</option>
                                <option>S??o Sep??,RS,BRASIL</option>
                                <option>S??o Valentim do Sul,RS,BRASIL</option>
                                <option>S??o Valentim,RS,BRASIL</option>
                                <option>S??o Val??rio do Sul,RS,BRASIL</option>
                                <option>S??o Vendelino,RS,BRASIL</option>
                                <option>S??o Vicente do Sul,RS,BRASIL</option>
                                <option>Sapiranga,RS,BRASIL</option>
                                <option>Sapucaia do Sul,RS,BRASIL</option>
                                <option>Sarandi,RS,BRASIL</option>
                                <option>Seberi,RS,BRASIL</option>
                                <option>Sede Nova,RS,BRASIL</option>
                                <option>Segredo,RS,BRASIL</option>
                                <option>Selbach,RS,BRASIL</option>
                                <option>Senador Salgado Filho,RS,BRASIL</option>
                                <option>Sentinela do Sul,RS,BRASIL</option>
                                <option>Serafina Corr??a,RS,BRASIL</option>
                                <option>S??rio,RS,BRASIL</option>
                                <option>Sert??o Santana,RS,BRASIL</option>
                                <option>Sert??o,RS,BRASIL</option>
                                <option>Sete de Setembro,RS,BRASIL</option>
                                <option>Severiano de Almeida,RS,BRASIL</option>
                                <option>Silveira Martins,RS,BRASIL</option>
                                <option>Sinimbu,RS,BRASIL</option>
                                <option>Sobradinho,RS,BRASIL</option>
                                <option>Soledade,RS,BRASIL</option>
                                <option>Taba??,RS,BRASIL</option>
                                <option>Tapejara,RS,BRASIL</option>
                                <option>Tapera,RS,BRASIL</option>
                                <option>Tapes,RS,BRASIL</option>
                                <option>Taquara,RS,BRASIL</option>
                                <option>Taquari,RS,BRASIL</option>
                                <option>Taquaru??u do Sul,RS,BRASIL</option>
                                <option>Tavares,RS,BRASIL</option>
                                <option>Tenente Portela,RS,BRASIL</option>
                                <option>Terra de Areia,RS,BRASIL</option>
                                <option>Teut??nia,RS,BRASIL</option>
                                <option>Tio Hugo,RS,BRASIL</option>
                                <option>Tiradentes do Sul,RS,BRASIL</option>
                                <option>Toropi,RS,BRASIL</option>
                                <option>Torres,RS,BRASIL</option>
                                <option>Tramanda??,RS,BRASIL</option>
                                <option>Travesseiro,RS,BRASIL</option>
                                <option>Tr??s Arroios,RS,BRASIL</option>
                                <option>Tr??s Cachoeiras,RS,BRASIL</option>
                                <option>Tr??s Coroas,RS,BRASIL</option>
                                <option>Tr??s de Maio,RS,BRASIL</option>
                                <option>Tr??s Forquilhas,RS,BRASIL</option>
                                <option>Tr??s Palmeiras,RS,BRASIL</option>
                                <option>Tr??s Passos,RS,BRASIL</option>
                                <option>Trindade do Sul,RS,BRASIL</option>
                                <option>Triunfo,RS,BRASIL</option>
                                <option>Tucunduva,RS,BRASIL</option>
                                <option>Tunas,RS,BRASIL</option>
                                <option>Tupanci do Sul,RS,BRASIL</option>
                                <option>Tupanciret??,RS,BRASIL</option>
                                <option>Tupandi,RS,BRASIL</option>
                                <option>Tuparendi,RS,BRASIL</option>
                                <option>Turu??u,RS,BRASIL</option>
                                <option>Ubiretama,RS,BRASIL</option>
                                <option>Uni??o da Serra,RS,BRASIL</option>
                                <option>Unistalda,RS,BRASIL</option>
                                <option>Uruguaiana,RS,BRASIL</option>
                                <option>Vacaria,RS,BRASIL</option>
                                <option>Vale do Sol,RS,BRASIL</option>
                                <option>Vale Real,RS,BRASIL</option>
                                <option>Vale Verde,RS,BRASIL</option>
                                <option>Vanini,RS,BRASIL</option>
                                <option>Ven??ncio Aires,RS,BRASIL</option>
                                <option>Vera Cruz,RS,BRASIL</option>
                                <option>Veran??polis,RS,BRASIL</option>
                                <option>Vespasiano Corr??a,RS,BRASIL</option>
                                <option>Viadutos,RS,BRASIL</option>
                                <option>Viam??o,RS,BRASIL</option>
                                <option>Vicente Dutra,RS,BRASIL</option>
                                <option>Victor Graeff,RS,BRASIL</option>
                                <option>Vila Flores,RS,BRASIL</option>
                                <option>Vila L??ngaro,RS,BRASIL</option>
                                <option>Vila Maria,RS,BRASIL</option>
                                <option>Vila Nova do Sul,RS,BRASIL</option>
                                <option>Vista Alegre do Prata,RS,BRASIL</option>
                                <option>Vista Alegre,RS,BRASIL</option>
                                <option>Vista Ga??cha,RS,BRASIL</option>
                                <option>Vit??ria das Miss??es,RS,BRASIL</option>
                                <option>Westf??lia,RS,BRASIL</option>
                                <option>Xangri-l??,RS,BRASIL</option>
                                </select>                            
                        </div>

                    </div>

                    <br>

                    <div class="form-row">
                        <div class="col-md-6">
                            <label>E-mail:</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $dado['email']; ?>"/>
                        </div>

                        <div class="col-md-3">                
                            <label>Telefone:</label>
                            <input type="text" name="telefone" class="form-control" value="<?php echo $dado['telefone']; ?>"/>                            
                        </div>

                        <div class="col-md-3">
                            <label>Whats App:</label>
                            <input type="text" name="whats_app" class="form-control" value="<?php echo $dado['whats_app']; ?>" />
                        </div>
                    </div>

                    <br>

                    <div class="form-row">
                        <div class="col-md-12">
                            <label>Observa????o:</label>
                            <textarea class="form-control" rows="3" name="observacoes"><?php echo $dado['observacoes']; ?></textarea>
                        </div>
                    </div>                  

                   

                    <hr>
                    

                    <div class="form-row">
                                                   
                        <div class="col-md-6 mb-3">
                            <a href="allclientes.php" class="btn btn-secondary form-control">Voltar</a>
                        </div>

                        <div class="col-md-6 mb-3">
                            <input type="submit" value="Salvar" class="btn btn-primary btn-block"/>
                        </div>

                    </div>
                
            </form>
        </div>
        </div> 
        
   <!-- fim do container -->
    </div>
    <br><br>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>-->
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>