# Utilise une image PHP officielle avec FPM (par exemple, PHP 8.2-fpm-alpine pour une image légère)
FROM php:8.2-fpm-alpine

# Installe Nginx et d'autres outils nécessaires
RUN apk add --no-cache nginx curl

# --------- DÉBUT DE LA MODIFICATION ICI ---------
# Installe Composer directement dans l'image
# Télécharge l'installeur Composer, l'exécute, puis supprime l'installeur
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# --------- FIN DE LA MODIFICATION ICI ---------


# Définit le répertoire de travail à l'intérieur du conteneur.
WORKDIR /var/www/html

# Copie tout votre code d'application depuis votre machine locale vers le conteneur.
COPY . /var/www/html

# Installe les dépendances Composer (si vous en avez)
# Cette ligne est toujours commentée comme nous l'avions fait précédemment
# Si vous avez un composer.json et que vous voulez installer les dépendances, décommentez cette ligne
# RUN composer install --no-dev --optimize-autoloader

# Configure Nginx
COPY nginx.conf /etc/nginx/nginx.conf

# Configure PHP-FPM
COPY www.conf /etc/php8/php-fpm.d/www.conf # Ajustez ce chemin si votre version de PHP est différente

# Expose le port 80 pour Nginx
EXPOSE 80

# Commande pour démarrer Nginx et PHP-FPM
CMD php-fpm -D && nginx -g "daemon off;"