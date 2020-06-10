<?php

// Database instellingen
define('DB_TYPE', 'mysql');        // Wat voor type database gebruik je?
define('DB_HOST', '127.0.0.1'); // Wat is het IP adres van de server (127.0.0.1 is de lokae machine)
define('DB_NAME', 'manege'); // Wat is de database naam
define('DB_USER', 'root');        // Wat is de database gebruiker
define('DB_PASS', '');            // Wat is het database wachtwoord
define('DB_CHARSET', 'utf8');    // Welke karakterset wordt gebruikt

define('URL_PUBLIC_FOLDER', 'public');    // De public folder is de folder waar alle bestanden in staan die via de adresbalk direct aangevraagd kunnen worden, denk aan CSS, JS, afbeeldingen etc...
define('URL_PROTOCOL', '//');            // Het URL protocol bepaalt of een site via HTTP of HTTPS wordt opgevraagd. Bij '//' wordt de gebruikte methode gebruikt
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);    // Dit bepaald de URL van de website
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME']))); // Dit bepaalt de subfolder van de website. Bijvoorbeeld of jij de website op: 127.0.0.1/webapp hebt draaien. 
define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER); // Dit genereerd de standaard URL van de applicatie

define('DEFAULT_CONTROLLER', 'Home'); // Dit is de standaard controller waarmee de webapplictie wordt opgestart

// andere instellingen
define('COST_PER_HOUR', 55); // 55 euro per uur
define('MAX_TIME', 3); // 3 uur paard rijden is max
// TIME FORMAT voor SQL
define('SQL_TIME_FORMAT', 'Y-m-d H:i:s');
define('TIME_FORMAT', 'd M Y H:i');
//
define('VERSCHIL_PAARD_EN_PONY', 'Of een dier een paard of pony is, is bij onze manege afhankelijk van de gemiddelde volwassen schofthoogte die hoort bij het ras waartoe het dier behoort. Tot 147,5 cm gaat het om een pony ras. Ik weet dat dit door ruiters die zich bezighouden met de springsport per individueel dier wordt bekeken, maar dat is voor het fokken simpelweg niet praktisch. Er bestaat een lijst waarop per ras de gemiddelde schofthoogte staat vermeld.');