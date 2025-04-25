<?php 
require_once __DIR__ . '/database.php';

$logFile = 'migration_log.txt'; // File Log Akan Ditulis
$log = file_exists($logFile) ? file($logFile, FILE_IGNORE_NEW_LINES) : []; // Pesan Log Yang Akan Ditulis Di LogFile

$migrationFile = glob(__DIR__ . '/migrations/*.sql');
sort($migrationFile);

foreach($migrationFile as $table){
    $filename = basename($table);

    if(in_array($filename, $log)){
        continue;
    }

    echo "Migration file $table\n";
    $sql = file_get_contents($table);

    try{
        $pdo->exec($sql);
        file_put_contents($logFile, $filename . PHP_EOL, FILE_APPEND);
        echo "Success Migration File $table\n";
    }catch(PDOException $error){
        echo "Failed Migration\nError: " . $error->getMessage();
        break; 
    }
}

?>