<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

# Projet AP4
## Developement API <i class="bi bi-broadcast-pin"></i>


## Sommaire
- [Projet AP4](#projet-ap4)
  - [Developement API ](#developement-api-)
  - [Sommaire](#sommaire)
- [Information](#information)
- [Les API (GET)](#les-api-get)
  - [Clients](#clients)
  - [Recette](#recette)
  - [Restaurant](#restaurant)
  - [Autre](#autre)
- [Les API (Envoie / modification / suppression de données)](#les-api-envoie--modification--suppression-de-données)
  - [Commande](#commande)
  - [Serveur](#serveur)
  - [Table](#table)
  - [Restaurant](#restaurant-1)
  - [Recette](#recette-1)
- [Login](#login)
  - [CLIENT](#client)
    - [Reponse](#reponse)
    - [success](#success)
    - [fail](#fail)
  - [STAFF](#staff)
    - [Reponse](#reponse-1)
    - [success](#success-1)
    - [fail](#fail-1)
- [Test Unitaire](#test-unitaire)
  - [Lancée les test](#lancée-les-test)
  - [Crée une nouvelle classe de test](#crée-une-nouvelle-classe-de-test)

---

# Information

Cette api a été developer avec php en utilisant le framework [laravel](https://laravel.com/)

---
# Les API (GET)


## Clients
|Api | Réponse| Disponibilité |
|---|---|---|
| api/clients | liste des clients |✅|
| api/client/{idClient}| Information d'un client|✅|
| api/client/{id client}/favori | liste des favoris du client |✅|
| api/client/{idClient}/commandes| liste des commandes du client|✅|
| api/client/{idClient}/NonPayerCommandes| liste des commandes non payer du client|✅|

---
## Recette

|Api | Réponse|Disponibilité |
|---|---|---|
| api/recettes|liste de toute les recettes|✅|
| api/recette/categories| liste des catégories disponible|✅|
| api/recette/{id Recette} | les information d'une rectte en particuliére |✅|
| api/recette/{id Recette}/ingrediants | liste des ingrediant présent dans la recette|✅|
| api/recette/{id Recette}/allergenes| liste des alergenes dans la recette|✅|
|api/recette/{id Recette}/categories|liste des catégorie qui est lier a cette recette|✅|
|api/recette/restaurant/{id Restaurant}|liste les recette lier a un resaturant|✅|


---

## Restaurant

|Api | Réponse|Disponibilité |
|---|---|---|
| api/restaurants | liste des restaurant |✅|
| api/restaurant/{id Restaurant} | Information d'un restaurant |✅|
| api/restaurant/{id Restaurant}/recettes/ | liste des recette disponible par restaurant |✅|

## Autre

serveur:

|Api | Réponse|Disponibilité |
|---|---|---|
| api/serveurs/{idRestaurant}| liste des serveur d'un restaurant |✅|

table:

|Api | Réponse|Disponibilité |
|---|---|---|
| api/Tables/{idRestaurant}| liste des tables d'un restaurant |✅|


---
# Les API (Envoie / modification / suppression de données)

## Favori

|Api |paramètre| Réponse |Disponibilité |
|---|---|---|---|
| /api/client/newFav|ID, ID_RESTAURANT |Ajout de favoris|✅|
| /api/client/delFav|ID, ID_RESTAURANT |suprimer favoris|✅|

## Commande

|Api |paramètre| Réponse |Disponibilité |
|---|---|---|---|
|||Creation commande a emporter||
|||Creation commande sur place||
|||||

## Serveur

||Api |paramètre| Réponse | Disponibilité |
|---|---|---|---|---|
| POST | api/serveur/New/ | name, email, password, ID_RESTAURANT |ajout d'un serveur|✅|
| PUT | api/serveur/Change/ | ID, name, email, password*, ID_RESTAURANT| modification d'un compte serveur|✅|
| DELETE | api/serveur/Delete/ | id | Supprimer un compte serveur |✅|

> \* pas obligatoire

## Table

||Api |paramètre| Réponse | Disponibilité |
|---|---|---|---|---|
| POST | api/Table/New/ | ID_TABLE, LIBELLE_TABLE, ID_RESTAURANT |ajout d'une table|✅|
| PUT | api/Table/Change/ | ID_TABLE, LIBELLE_TABLE, ID_RESTAURANT | modification d'une table|✅|
| DELETE | api/Table/Delete/ | ID_TABLE, ID_RESTAURANT | Supprimer une table |✅|


## Restaurant

||Api |paramètre| Réponse | Disponibilité |
|---|---|---|---|---|
| PUT | api/restaurant/Change/ | ID_RESTAURANT, NOM_RESTAURANT, ADRESSE_RESTAURANT, LOGO_RESTAURANT, BG_RESTAURANT, COULEUR_SITE | MAJ d'un restaurant|✅|

## Recette

||Api |paramètre| Réponse | Disponibilité |
|---|---|---|---|---|
| POST | api/recette/New/ |  ID_RESTAURANT, ID_CATEGORIE, NOM_RECETTE, DESCRIPTION_RECETTE, PHOTO_RECETTE, PRIXHT |ajout d'une recette|✅|
| PUT | api/recette/Change/ | ID_RECETTE, ID_RESTAURANT, ID_CATEGORIE, NOM_RECETTE, DESCRIPTION_RECETTE, PHOTO_RECETTE, PRIXHT | modification d'une recette|✅|
| DELETE | api/recette/Delete/ | ID_RECETTE  | Supprimer une recette |✅|



# Login

les paramètres sont :
- email
- password

## CLIENT

POST `/api/login/CLIENT`

### Reponse

### success
Si le mot de passe est bon et l'utilisateur fait partie du staff d'un restaurant, on reçoit:
```json
[
    {
        "id": 65,
        "name": "Bob",
        "email": "tomy49@laposte.net"
    }
]
```
> Un code 200 est aussi retourner

### fail

Un code 400 est renvoyer

## STAFF

POST `/api/login/STAFF`

les paramètres sont :
- email
- password

### Reponse

### success
Si le mot de passe est bon et l'utilisateur fait partie du staff d'un restaurant, on reçoit:
```json
[
    {
        "id": 65,
        "name": "Bob",
        "email": "tomy49@laposte.net",
        "Id_Restorant": 2
    }
]
```
> Un code 200 est aussi retourner

### fail

Un code 400 est renvoyer

# Test Unitaire

## Lancée les test
```bash
.\vendor\bin\phpunit
```

## Crée une nouvelle classe de test

```bash
php artisan make:test NomTest
```

Dans la classe de test, bien faire attention à renommer les fonction avec test en debut

```php
public function test_liste_client()
{
    //test
}
```
---