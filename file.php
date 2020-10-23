<?php
// Obs: Ordem correta para funcionamento é 'logintude,latitude'.

$from = '-55.916290,-13.066770';
$to = '-55.725403,-12.538478';


$json_file = file_get_contents("https://router.project-osrm.org/route/v1/driving/".$from.";".$to."?exclude=motorway&annotations=false");
$json_str = json_decode($json_file, true);



$rota = $json_str['routes'][0];

$distance = $rota['distance'];
$duration = $rota['duration'];
print_r('<b>Distance:</b> '.$distance.' Metros');
echo '<br />';
print_r('<b>Duration:</b> '.$duration.' Segundos');

echo '<br />';
echo '<br />';
echo '______________________________________';
echo '<br />';
echo '<br />';

$distanceKm = round($distance, 0);
$distanceKm = $distanceKm / 1000;
$distanceKm = round($distanceKm, 0);
print_r('<b>Distance:</b> '.$distanceKm.' KM');
echo '<br />';

$total = $duration;
$horas = floor($total / 3600);
$minutos = floor(($total - ($horas * 3600)) / 60);
$segundos = floor($total % 60);
print_r('<b>Duration: </b>'.$horas . ":" . $minutos . ":" . $segundos);
