<?php
// Funzione per caricare il file .env
function loadEnv($path)
{
    if (!file_exists($path)) {
        throw new Exception("Il file .env non esiste.");
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $env = [];

    foreach ($lines as $line) {
        // Ignora le righe che iniziano con # (commenti)
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        // Divide la riga in chiave e valore
        list($key, $value) = explode('=', $line, 2);
        $key = trim($key);
        $value = trim($value);

        // Aggiunge la coppia chiave-valore all'array
        $env[$key] = $value;
    }
  

    return $env;
}
