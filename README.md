# Français
## Presentation

Voici un widget dont je me sers pour afficher mon calendrier Google. Je l'utilise principalement dans KDE Plasma, en tant que plasmoid avec "Tranche de Web".

## Dependances

Dans le dossier, vous trouverez :
- class.iCalReader.php  
Fichier venant de http://code.google.com/p/ics-parser/. De nombreuses modifications ont été faites de mon côté.

- When.php et When_Iterator.php  
Ces outils viennent de http://github.com/tplaner/When. Une petite modification sans conséquence à été effectué de mon côté.

## Utilisation

Vous devez avoir un serveur web gérant PHP 5. 

Dans agenda.php, configurer vos calendriers, sous la forme d'un tableau avec d'abord la couleur souhaitée, et ensuite le lien fournit par Google vers le fichier iCal. Vous pouvez avoir plusieurs calendriers, sous la forme d'un tableau de tableaux.

Placez où vous voulez dans votre serveur web les quatre fichiers php.

Et voilà !


# English
## Presentation

This is a widget that I'm using to display my Google calendars. I'm using it in KDE Plasma, as a plasmoid with "Slice of Web".

## Dependencies

In the folder you will find :
- class.iCalReader.php  
File coming from http://code.google.com/p/ics-parser/. There are a lot of modification on my side.

- When.php et When_Iterator.php  
This tools come from http://github.com/tplaner/When. A tiny modification has been done on my side.

## Using

You need a web server with PHP 5.

In agenda.php, you need to configure your timezone, the days of the week in your language, and your calendars. The calendars configuration is an array, with first the color you want to use, and next the link provided to the calendar file iCal. You can use several calendars by configuring those in an array of arrays.

Place where you want in your web server the four php files

Done !