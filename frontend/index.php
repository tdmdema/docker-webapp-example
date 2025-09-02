<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contatore Semplice</title>
    <style>
        body { font-family: sans-serif; display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100vh; }
        #counter { font-size: 3rem; margin-bottom: 1rem; }
        button { font-size: 1.5rem; padding: 0.5rem 1rem; }
    </style>
</head>
<body>

    <h1>Contatore</h1>
    <div id="counter">Caricamento...</div>
    <button id="addButton">Aggiungi</button>

    <script>
        const counterElement = document.getElementById('counter');
        const addButton = document.getElementById('addButton');
        const backendUrl = 'http://localhost:8081'; // L'URL del backend

        // Funzione per ottenere il valore corrente
        async function getValue() {
            try {
                const response = await fetch(backendUrl);
                const data = await response.json();
                counterElement.textContent = data.value;
            } catch (error) {
                console.error('Errore nel recuperare il valore:', error);
                counterElement.textContent = 'Errore';
            }
        }

        // Funzione per incrementare il valore
        async function incrementValue() {
            try {
                const response = await fetch(backendUrl, { method: 'POST' });
                const data = await response.json();
                counterElement.textContent = data.value;
            } catch (error) {
                console.error('Errore nell\'incrementare il valore:', error);
            }
        }

        // Event listener per il pulsante
        addButton.addEventListener('click', incrementValue);

        // Ottieni il valore iniziale al caricamento della pagina
        getValue();
    </script>

</body>
</html>
