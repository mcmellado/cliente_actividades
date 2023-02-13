<?php
$vote = $_REQUEST['vote'];

$filename = "resultado.txt";
$content = file($filename);

$array = explode("||", $content[0]);
$madrid = $array[0];
$barcelona = $array[1];
$atletico = $array[2];
$sevilla = $array[3];


$array[$vote]++;
  
$insertvote = implode("||", $array);
$fp = fopen($filename,"w");
fputs($fp,$insertvote);
fclose($fp);


$denominador = intval($madrid) + intval($barcelona) + intval($atletico) + intval($sevilla);

$tantomadrid = 100 * round($madrid / $denominador, 2);
$tantobarcelona = 100 * round($barcelona / $denominador, 2);
$tantoatletico = 100 * round($atletico / $denominador, 2);
$tantosevilla = 100 * round(intval($sevilla) / $denominador, 2);
?>

<h2 align="center">resultados:</h2>
<table border="1" align="center">
<tr>
<td>Real Madrid:</td>
<td><img src="poll.gif" width='<?php echo ($tantomadrid); ?>'height='20'>
<?php echo($tantomadrid); ?>%
</td>
</tr>
<tr>

<td>Barcelona:</td>
<td><img src="poll.gif"
width='<?php echo ($tantobarcelona); ?>'
height='20'>
<?php echo($tantobarcelona); ?>%
</td>
</tr>

<td>Atlético de Madrid:</td>
<td><img src="poll.gif"
width='<?php echo ($tantoatletico); ?>'
height='20'>
<?php echo($tantoatletico); ?>%
</td>
</tr>

<td>Sevilla:</td>
<td><img src="poll.gif"
width='<?php echo ($tantosevilla); ?>'
height='20'>
<?php echo($tantosevilla); ?>%
</td>
</tr>
</table>
<p align="center">Total de votos: <?php echo ($denominador); ?></p>
<p align="center"><a href="encuesta.html">Volver a votar</a></p>