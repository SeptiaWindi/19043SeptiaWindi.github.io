<?php

// Set the timezone to Asia/Jakarta
date_default_timezone_set('Asia/Jakarta');

// Get the current date and time
$tanggalSekarang = date("Y-m-d H:i:s"); // Dynamically gets the current date and time

// Convert the current date and time to a Unix timestamp
$newTanggalSekarang = strtotime($tanggalSekarang);

// Define the number of hours you want to add
$maxJam = 6; // You can change this value or make it dynamic

// Convert the number of hours to seconds (1 hour = 3600 seconds)
$NewmaxJam = 3600 * $maxJam;

// Calculate the new date and time by adding the number of seconds to the current timestamp
$hasilJumlah = $newTanggalSekarang + $NewmaxJam;

// Format the result into a readable date and time
$tampilHasil = date("Y-m-d H:i:s", $hasilJumlah);

// Display the current time and the new calculated time
echo "Tanggal Sekarang : $tanggalSekarang <br/>";
echo "Jumlah max. $maxJam jam : $tampilHasil";

?>
