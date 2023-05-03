<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

# Projet AP4
## Developement API <i class="bi bi-broadcast-pin"></i>


## Sommaire
1. [Information](#information)
2. [Recevoir des données avec les api](#explication-des-api)
    - [Api Clients](#clients)
    - [Api Recettes](#recette)
    - [Api Restaurant](#restaurant)
    - [Api Global](#global)
    - [Autre](#autre)
3. [Envoyer des données avec les api](#Envoie-de-données)
4. [Login](#login)
    - [CLIENT](#client)
    - [STAFF](#staff)

---
# Information

Cette api a été developer avec php en utilisant le framework [laravel](https://laravel.com/)

---
# Explication des api
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

---
# Envoie de données

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
## Restaurant

||Api |paramètre| Réponse | Disponibilité |
|---|---|---|---|---|
| POST | api/restaurant/Change/ | ID_RESTAURANT, NOM_RESTAURANT, ADRESSE_RESTAURANT, LOGO_RESTAURANT, BG_RESTAURANT, COULEUR_SITE | MAJ d'un restaurant|✅|

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
# Login

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