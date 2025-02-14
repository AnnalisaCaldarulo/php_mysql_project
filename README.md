1. start localhost in php:  php -S localhost:8000, nella cartella del progetto php
2. creazione e connessione al db: 

db_connect.php
- new PDO(...): Crea una nuova connessione al database utilizzando l'estensione PDO (PHP Data Objects). PDO è un'interfaccia per accedere ai database in modo uniforme, indipendentemente dal tipo di database (MySQL, PostgreSQL, SQLite, ecc.).
- setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION): Imposta la modalità di gestione degli errori per PDO.
- PDO::ATTR_ERRMODE: Una costante che indica l'attributo da impostare (in questo caso, la modalità di gestione degli errori).
- PDO::ERRMODE_EXCEPTION: Una costante che fa sì che PDO lanci un'eccezione (PDOException) in caso di errore, rendendo più facile il debug.

- $connect->exec($sql): Esegue la query SQL passata come stringa. Il metodo exec è utilizzato per eseguire comandi SQL che non restituiscono risultati (ad esempio, CREATE TABLE, DROP TABLE, INSERT, ecc.).

process_signin
- $stmt->fetch(PDO::FETCH_ASSOC) = recupera la prima riga del risultato come array associativo.

Se la password è corretta:

session_start(): Avvia la sessione (se non è già stata avviata).

$_SESSION['user_id'] = $result['id']: Memorizza l'ID dell'utente nella sessione.

header("Location: contacts.php"): Reindirizza l'utente alla pagina contacts.php.

exit(): Termina l'esecuzione dello script.
