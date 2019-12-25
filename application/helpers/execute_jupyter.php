<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Fungsi untuk eksekusi file jupyter di dalam php
function analisis($file = "data.csv")
{
    $isRunning = exec('jupyter nbconvert '.$file.' --to html --no-input --post serve');

    if($isRunning){
        echo 'sukses';
    }
} 


function dir()
{
   $lokasi = exec('cd');
   echo $lokasi;
}