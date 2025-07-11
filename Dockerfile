# Utilise une image PHP officielle avec FPM (par exemple, PHP 8.2-fpm-alpine pour une image légère)
FROM php:8.2-fpm-alpine

# Installe Nginx et d'autres outils nécessaires
RUN apk add --no-cache nginx curl

# Installe Composer directement dans l'image
# Télécharge l'installeur Composer, l'exécute, puis supprime l'installeur
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Définit le répertoire de travail à l'intérieur du conteneur.
# C'est là que votre code sera placé.
WORKDIR /var/www/html

# Copie tout votre code d'application depuis votre machine locale vers le conteneur.
# Assurez-vous que votre .gitignore est bien configuré pour ne pas inclure de fichiers inutiles ici.
COPY . /var/www/html

# Installe les dépendances Composer (si vous en avez)
# Décommentez la ligne suivante SI votre projet utilise un fichier composer.json
# RUN composer install --no-dev --optimize-autoloader

# Configure Nginx
# Copie le fichier de configuration Nginx que nous allons créer
COPY nginx.conf /etc/nginx/nginx.conf

# Configure PHP-FPM
# Copie le fichier de configuration PHP-FPM que nous allons créer
# (Le chemin /etc/php8/php-fpm.d/www.conf est correct pour php:8.2-fpm-alpine)
COPY www.conf /etc/php8/php-fpm.d/www.conf

# Expose le port 80 pour Nginx
EXPOSE 80

# Commande pour démarrer Nginx et PHP-FPM lorsque le conteneur démarre.
# php-fpm -D lance PHP-FPM en tant que démon.
# nginx -g "daemon off;" lance Nginx au premier plan pour que Docker puisse le surveiller.
CMD php-fpm -D && nginx -g "daemon off;"