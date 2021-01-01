<html>
<head>
<title>Analisis Pelanggan</title>
<link type="text/css" rel="stylesheet" href="<? echo base_url(); ?>includes/css/bootstrap.css" />
</head>
<body>
<div class="row uppermost">
<div class="col-md-offset-1 col-md-10 boxing content-title"><center><h2>ANALISIS PELANGGAN</h2></center></div>
</div>


<?php
//$command = escapeshellcmd('C:/Users/TITAAYU/PERCOBAAN TERAKHIR.ipynb');
//$output = shell_exec($command);
//echo $output;
    $lines = file('analisis\hasil_cluster.txt');
    foreach ($lines as $line_number=>$line){
    //$try = print_r(explode("|",$line)){
    //print" " . $try . "<br />\n"};}

    //$string = "Contoh PHP EXPLODE";
    $PecahStr = explode("|",$line);

    ?>
        <table class="table table-striped" id="mytable">
            <thead>
                <table border="1">
                <tr>
                <?php for($i=0;$i< count($PecahStr);$i++){ ?> 
                    <th width="250px"><?= $PecahStr[$i] ."<br/>";?></th>
                <?php } ?>
                </tr>
                </table>
            </thead>
        </table>
<?php
        }
    
?>
</html>