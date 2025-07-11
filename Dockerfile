# Utilise une image PHP officielle avec FPM (par exemple, PHP 8.2-fpm-alpine pour une image légère)
FROM php:8.2-fpm-alpine

# Installe Nginx et d'autres outils nécessaires
RUN apk add --no-cache nginx curl

# Installe Composer (si vous utilisez Composer pour les dépendances PHP)
# Ceci copie l'exécutable composer depuis une image temporaire
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définit le répertoire de travail à l'intérieur du conteneur.
# C'est là que votre code sera placé.
WORKDIR /var/www/html

# Copie tout votre code d'application depuis votre machine locale vers le conteneur.
# Assurez-vous que votre .gitignore est bien configuré pour ne pas inclure de fichiers inutiles ici.
COPY . /var/www/html

# Installe les dépendances Composer (si vous en avez)
# Cette commande ne sera exécutée que si un fichier composer.json est présent.
RUN composer install --no-dev --optimize-autoloader

# Configure Nginx
# Copie le fichier de configuration Nginx que nous allons créer
COPY nginx.conf /etc/nginx/nginx.conf

# Configure PHP-FPM
# Copie le fichier de configuration PHP-FPM que nous allons créer
# (Le chemin peut varier légèrement selon la version de PHP, mais pour alpine c'est souvent phpX/php-fpm.d/)
COPY www.conf /etc/php8/php-fpm.d/www.conf

# Expose le port 80 pour Nginx
EXPOSE 80

# Commande pour démarrer Nginx et PHP-FPM lorsque le conteneur démarre.
# php-fpm -D lance PHP-FPM en tant que démon.
# nginx -g "daemon off;" lance Nginx au premier plan pour que Docker puisse le surveiller.
CMD php-fpm -D && nginx -g "daemon off;"