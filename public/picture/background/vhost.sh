#!/bin/sh
# Fichier "administration"

echo "Entrer le domaine"
read domaine

echo "Entrer l'url pour creer le dossier sans finir par /"
read url


if ! [ -d "$url/$domaine" ];then
	echo "Le dossier $url n'existe pas!";
	mkdir "$url/$domaine"
	echo "Dossier creer";
fi

if [ -f "/etc/apache2/sites-available/$domaine.conf" ];then
	echo "Le fichier $domaine.conf existe !";
	rm "/etc/apache2/sites-available/$domaine.conf"
	echo "$domaine.conf supprimer !";
fi

echo "
    <VirtualHost *:80>
      ServerAdmin webmaster@$domaine
      ServerName www.$domaine
      ServerAlias $domaine
      DocumentRoot $url/$domaine
      <Directory $url/$domaine/>
	Options Indexes FollowSymLinks MultiViews
        AllowOverride All
        Require all granted
      </Directory>
      ErrorLog /var/log/apache2/$domaine-error.log
      LogLevel warn
      CustomLog  /var/log/apache2/$domaine-access.log combined
      ServerSignature Off
    </VirtualHost>
    <ifModule mod_rewrite.c>
	RewriteEngine On
    </ifModule>
" >> "/etc/apache2/sites-available/$domaine.conf"

sed -i "1i127.0.0.1 	$domaine" "/etc/hosts"

echo "Activation du virtual host"
ext=.conf
cd "/etc/apache2/sites-available/"
a2ensite "$domaine$ext"
echo "Redemarage apache2"
service apache2 restart

echo "Entrer 1 pour creer l'index php de test"
read creerIndex


if [ $creerIndex = 1 ]
then
echo "sa fonctionne pour $domaine" >> "$url/$domaine/index.php"
fi




