<?php

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/core/Logger.php';
require_once __DIR__ . '/core/RateLimiter.php';

echo "Starting database fix...\n";

try {
    global $pdo;
    
    // 1. Create Users Table
    $sql = file_get_contents(__DIR__ . '/migrations/init.sql');
    $pdo->exec($sql);
    echo "Users table created successfully.\n";

    // 2. Ensure Logger Table
    $logger = new Logger();
    $logger->ensureTableExists();
    echo "Logger table verified.\n";

    // 3. Ensure RateLimiter Table
    $limiter = new RateLimiter();
    // Re-instantiate to trigger constructor which calls ensureTableExists
    // or we can't access private method, but the constructor does it.
    echo "RateLimiter table verified.\n";

    echo "Database fixed successfully!\n";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}
