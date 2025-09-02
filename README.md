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

## Come vedere i log dell'applicazione

Per visualizzare i log di tutti i servizi in tempo reale, esegui il seguente comando:

```bash
docker-compose logs -f
```

Questo comando mostrerà i log del frontend, del backend e del database. Per visualizzare i log di un servizio specifico, aggiungi il nome del servizio al comando (es. `docker-compose logs -f backend`).

## Migrazione dei dati da test a produzione

Per copiare i dati del database da un ambiente di test a uno di produzione, puoi seguire questi passaggi:

### 1. Creare un backup del database di test

Esegui questo comando nel terminale del tuo ambiente di test per creare un file di backup (`backup.sql`) del database:

```bash
docker-compose exec db sh -c 'exec mysqldump --user=${MYSQL_USER} --password=${MYSQL_PASSWORD} ${MYSQL_DATABASE}' > backup.sql
```

Questo comando utilizza `mysqldump` all'interno del container `db` per esportare il database.

### 2. Copiare il file di backup nell'ambiente di produzione

Trasferisci il file `backup.sql` dal tuo ambiente di test al tuo ambiente di produzione utilizzando un metodo a tua scelta (es. `scp`, `rsync`, o copia manuale).

### 3. Ripristinare il backup nel database di produzione

Una volta che il file `backup.sql` si trova nel tuo ambiente di produzione, esegui questo comando per importare i dati nel database di produzione:

```bash
cat backup.sql | docker-compose exec -T db sh -c 'exec mysql --user=${MYSQL_USER} --password=${MYSQL_PASSWORD} ${MYSQL_DATABASE}'
```

Questo comando importa i dati dal file `backup.sql` nel container `db` dell'ambiente di produzione.
