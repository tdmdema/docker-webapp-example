-- Crea la tabella per il contatore se non esiste già
CREATE TABLE IF NOT EXISTS counter (
    id INT PRIMARY KEY AUTO_INCREMENT,
    value INT NOT NULL DEFAULT 0
);

-- Inserisci il valore iniziale se la tabella è vuota
INSERT INTO counter (value)
SELECT 0
WHERE NOT EXISTS (SELECT * FROM counter);
