# ... (les lignes précédentes restent inchangées)

# Installe Composer (si vous utilisez Composer pour les dépendances PHP)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définit le répertoire de travail à l'intérieur du conteneur.
WORKDIR /var/www/html

# Copie tout votre code d'application depuis votre machine locale vers le conteneur.
COPY . /var/www/html

# >>> Supprimez ou commentez cette ligne si vous n'avez PAS de composer.json <<<
# RUN composer install --no-dev --optimize-autoloader

# Configure Nginx
COPY nginx.conf /etc/nginx/nginx.conf

# ... (les lignes suivantes restent inchangées)