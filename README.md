# Progetto Contatore Semplice con Docker

Questo è un semplice progetto di esempio che dimostra un'architettura a tre container con Docker:
-   **Frontend:** Un'applicazione PHP che mostra un contatore e un pulsante.
-   **Backend:** Un'API PHP che gestisce la logica del contatore e interagisce con il database.
-   **Database:** Un'istanza di MySQL per memorizzare il valore del contatore.

## Prerequisiti

Assicurati di avere installato sul tuo sistema:
-   [Docker](https://docs.docker.com/get-docker/)
-   [Docker Compose](https://docs.docker.com/compose/install/)

## Come avviare il progetto

1.  **Clona o scarica questo repository.**

2.  **Crea un file `.env`** nella directory principale del progetto (se non esiste già) copiando il contenuto di `.env.example` (se fornito) o usando i seguenti valori:

    ```
    MYSQL_DATABASE=app_db
    MYSQL_USER=user
    MYSQL_PASSWORD=password
    MYSQL_ROOT_PASSWORD=rootpassword
    ```

3.  **Avvia i container Docker.** Apri un terminale nella directory principale del progetto e esegui il seguente comando:

    ```bash
    docker-compose up -d --build
    ```

    Questo comando compilerà le immagini per il frontend e il backend e avvierà tutti e tre i container in background.

4.  **Accedi all'applicazione.** Una volta che i container sono in esecuzione, puoi accedere al frontend aprendo il tuo browser e navigando a:

    [http://localhost:8080](http://localhost:8080)

    Dovresti vedere una pagina con il valore del contatore (inizialmente 0) e un pulsante "Aggiungi". Cliccando sul pulsante, il valore verrà incrementato.

## Come fermare il progetto

Per fermare i container, esegui il seguente comando dalla directory principale del progetto:

```bash
docker-compose down
```
