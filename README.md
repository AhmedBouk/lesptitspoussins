# Les P'tits Poussins

Les P'tits Poussins est une projet scolaire de la NFactory School (2018/2019) de six semaines sur l'uberisation de la recherche de crèches et d'assistantes maternelles.

## Getting Started

Ces instructions vous fourniront une copie du projet opérationnel sur votre ordinateur local à des fins de développement et de test.

### Prerequisites
Ce dont vous allez avoir besoin 

```
PHP 7.2
Node JS
Composer
Yarn
SQLite
```

### Installation

La procedure étapes par étapes pour installer le projet en devellopement

Cloner le Git

```
https://github.com/Jonathan-Renault/lesptitspoussins.git
```

Installation des fondations

```
composer update
yarn install
```

Instalation du Front

```
yarn add bootstrap
yarn add jquery
yarn add popper.js
```

Ajout Back Office

```
composer require sonata-project/admin-bundle
```

Ajout calendrier

```
yarn add fullcalendar
yarn add moment
```

Compilation CSS & JS

```
yarn run dev 
```

Base de donnée

```
Supprimer le contenu du dossier /src/Migrations sauf le fichier .gitignore
Créer un fichier data.db dans le dossier var 
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```

## Fait avec

* [Bootstrap](https://getbootstrap.com/) - La boite à outils HTML, CSS & JS
* [Symfony](https://symfony.com/) - Le Framework leader pour PHP

## Auteurs

* [Ahmed Bouknana](https://github.com/mimoo76) - Chef de projet et developpeur
* [Arthur Brunet](https://github.com/ArthurBrunet) - SCRUM Master et developpeur
* [Jonathan Renault](https://github.com/Jonathan-Renault) - Git Master et developpeur
* [Amina Benrebia](https://github.com/cappoccino) - Developpeuse
* [Alexandre Conte](https://github.com/ConteAlexandre) - Developpeur
* [Quentin Fermey](https://github.com/FermeyQ) - Developpeur

Avec l'aide de 
* [Frederic Noel](https://github.com/fredericnoel) - Formateur & guide


