<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

# Projet AP4
## Developement API <i class="bi bi-broadcast-pin"></i>


## Sommaire
1. [Information](#information)
2. [Recevoir des données avec les api](#explication-des-api)
    - [Api Clients](#client)
    - [Api Recettes](#recette)
    - [Api Restaurant](#restaurant)
    - [Api Global](#global)
3. [Envoyer des données avec les api](#Envoie-de-données)

---
# Information

Cette api a été developer avec php en utilisant le framework [laravel](https://laravel.com/)

---
# Explication des api
## Client
|Api | Réponse| Disponibilité |
|---|---|---|
| api/clients | liste des clients |<i class="bi bi-check-lg"></i>|
| api/{id client}/favori | liste des favoris du client |<i class="bi bi-check-lg"></i>|
| api/client/{idClient}/commandes| liste des commandes du client|<i class="bi bi-check-lg"></i>|

---
## Recette

|Api | Réponse|Disponibilité |
|---|---|---|
| api/Recettes|liste de toute les recettes||
| api/recette/categories| liste des catégories disponible||
| api/{id Recette} | les information d'une rectte en particuliére |<i class="bi bi-check-lg"></i>|
| api/{id Recette}/ingrediants | liste des ingrediant présent dans la recette||
| api/recette/{id}/allergenes| liste des alergenes dans la recette||
|api/{id Recette}|liste des catégorie qui est lier a cette recette||


## Restaurant

|Api | Réponse|Disponibilité |
|---|---|---|
| api/restaurants | liste des restaurant ||

## Global
> Les api "Global" represente les api que je n'ai pas classer dans une catégorie particuliére

|Api | Réponse|Disponibilité |
|---|---|---|
||||

---
# Envoie de données