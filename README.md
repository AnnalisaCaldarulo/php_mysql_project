1. start localhost in php:  php -S localhost:8000, nella cartella del progetto php
2. creazione e connessione al db: 

db_connect.php
- new PDO(...): Crea una nuova connessione al database utilizzando l'estensione PDO (PHP Data Objects). PDO è un'interfaccia per accedere ai database in modo uniforme, indipendentemente dal tipo di database (MySQL, PostgreSQL, SQLite, ecc.).
- setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION): Imposta la modalità di gestione degli errori per PDO.
- PDO::ATTR_ERRMODE: Una costante che indica l'attributo da impostare (in questo caso, la modalità di gestione degli errori).
- PDO::ERRMODE_EXCEPTION: Una costante che fa sì che PDO lanci un'eccezione (PDOException) in caso di errore, rendendo più facile il debug.

- $connect->exec($sql): Esegue la query SQL passata come stringa. Il metodo exec è utilizzato per eseguire comandi SQL che non restituiscono risultati (ad esempio, CREATE TABLE, DROP TABLE, INSERT, ecc.).