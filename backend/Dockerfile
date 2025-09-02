# Usa un'immagine PHP ufficiale con Apache
FROM php:8.2-apache

# Installa l'estensione pdo_mysql per la connessione al database
RUN docker-php-ext-install pdo_mysql

# Copia il codice dell'applicazione nella directory del server web
COPY . /var/www/html/

# Imposta i permessi corretti per la directory
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html
