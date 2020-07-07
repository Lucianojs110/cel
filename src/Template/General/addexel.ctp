<br>
<br>
<?php

$conn = mysqli_connect("localhost","root","","cel");
$base = __DIR__ . '/';
require_once ($base.'excel_reader2.php');
require_once ($base.'SpreadsheetReader.php');



if (isset($_POST["import"]))
{
    
    
  $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'C:\xampp\htdocs\CEL\vendor\import\uploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        for($i=0;$i<$sheetCount;$i++)
        {
            
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
          
                $sched = "";
                if(isset($Row[0])) {
                    $sched = mysqli_real_escape_string($conn,$Row[0]);
                }
                
                $arrive = "";
                if(isset($Row[1])) {
                    $arrive = mysqli_real_escape_string($conn,$Row[1]);
                }

                $number = "";
                if(isset($Row[2])) {
                    $number = mysqli_real_escape_string($conn,$Row[2]);
                }
                
                $product = "";
                if(isset($Row[3])) {
                    $product = mysqli_real_escape_string($conn,$Row[3]);
                }
                $client = "";
                if(isset($Row[4])) {
                    $client = mysqli_real_escape_string($conn,$Row[4]);
                }
                $carga = "";
                if(isset($Row[5])) {
                    $carga = mysqli_real_escape_string($conn,$Row[5]);
                }
                $carrier = "";
                if(isset($Row[6])) {
                    $carrier = mysqli_real_escape_string($conn,$Row[6]);
                }
                $boxusa = "";
                if(isset($Row[7])) {
                    $boxusa = mysqli_real_escape_string($conn,$Row[7]);
                }
                
                $cita = "";
                if(isset($Row[8])) {
                    $cita = mysqli_real_escape_string($conn,$Row[8]);
                }
                $origen = "";
                if(isset($Row[9])) {
                    $origen = mysqli_real_escape_string($conn,$Row[9]);
                }
                $destino = "";
                if(isset($Row[10])) {
                    $destino = mysqli_real_escape_string($conn,$Row[10]);
                }
                
                $pickup = "";
                if(isset($Row[11])) {
                    $pickup = mysqli_real_escape_string($conn,$Row[11]);
                }
               
                $poanexo = "";
                if(isset($Row[12])) {
                    $poanexo= mysqli_real_escape_string($conn,$Row[12]);
                }
                $cajanac = "";
                if(isset($Row[13])) {
                    $cajanac = mysqli_real_escape_string($conn,$Row[13]);
                }
                $colocacion = "";
                if(isset($Row[14])) {
                    $colocacion = mysqli_real_escape_string($conn,$Row[14]);
                }
                $peso = "";
                if(isset($Row[15])) {
                    $peso = mysqli_real_escape_string($conn,$Row[15]);
                }
                $bultos= "";
                if(isset($Row[16])) {
                    $bultos = mysqli_real_escape_string($conn,$Row[16]);
                }
                $entrega = "";
                if(isset($Row[17])) {
                    $entrega = mysqli_real_escape_string($conn,$Row[17]);
                }

                if (!empty($sched) || !empty($arrive)) {
                    $query = "insert into general(sched,arrive,number,product,client,carga,carrier,boxusa,cita,origen,destino,pickup,poanexo,cajanac,colocacion,peso,bultos,entrega) values('".$sched."',
                    '".$arrive."',
                    '".$number."',
                    '".$product."',
                    '".$client."',
                    '".$carga."',
                    '".$carrier."',
                    '".$boxusa."',
                    '".$cita."',
                    '".$origen."',
                    '".$destino."',
                    '".$pickup."',
                    '".$poanexo."',
                    '".$cajanac."',
                    '".$colocacion."',
                    '".$peso."',
                    '".$bultos."',
                    '".$entrega."')";


                    $result = mysqli_query($conn, $query);
                
                    if (! empty($result)) {
                        $type = "success";
                        $message = "El archivo se importo a la base de datos";
                    } else {
                        $type = "error";
                        $message = "hay un problema con el archivo";
                    }
                }
             }
        
         }
  }
  else
  { 
        $type = "error";
        $message = "Tipo de archivo invalido, elija un archivo exel.";
  }
}
?>

<!DOCTYPE html>
<html>    
<head>
<style>    
body {
	font-family: Arial;
	
}

.outer-container {
	background: #F0F0F0;
	border: #e0dfdf 1px solid;
	padding: 40px 20px;
	border-radius: 2px;
}

.btn-submit {
	background: #333;
	border: #1d1d1d 1px solid;
    border-radius: 2px;
	color: #f0f0f0;
	cursor: pointer;
    padding: 5px 20px;
    font-size:0.9em;
}

.tutorial-table {
    margin-top: 40px;
    font-size: 0.8em;
	border-collapse: collapse;
	width: 100%;
}

.tutorial-table th {
    background: #f0f0f0;
    border-bottom: 1px solid #dddddd;
	padding: 8px;
	text-align: left;
}

.tutorial-table td {
    background: #FFF;
	border-bottom: 1px solid #dddddd;
	padding: 8px;
	text-align: left;
}

#response {
    padding: 10px;
    margin-top: 10px;
    border-radius: 2px;
    display:none;
}

.success {
    background: #c7efd9;
    border: #bbe2cd 1px solid;
}

.error {
    background: #fbcfcf;
    border: #f3c6c7 1px solid;
}

div#response.display-block {
    display: block;
}
</style>
</head>

<body>
<div  Class="container-panel">
    <h3 class="text-secondary">Importar archivo EXEL</h3>
    
    <div class="outer-container">
        <form action="" method="post"
            name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <div>
            <label>Elegir archivo Exel</label> <input type="file" name="file"
                    id="file" accept=".xls,.xlsx">
                <button type="submit" id="submit" name="import"
                    class="btn-submit">Importar</button>
        
            </div>
        
        </form>
        
    </div>
    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
    
         


</body>
</html>
<hr>
<div class="row">
    <div class="col-lg-4">
    <?=  $this->Html->link('Volver al listado', ['controller' => 'General', 'action' => 'index'], ['class' => 'btn btn-lg btn-primary btn-block']) ?>
</div>        
</div>
</div>
