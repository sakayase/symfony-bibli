# Projet test de Symfony

Application de pret de livre pour une bibliotheque

Livre
[Emprunt Many to Many Livre]
- titre du livre
- genre du livre
- langue du livre
- nom de l'auteur
- année de l'édition
- nombre de pages
- nom de l'éditeur
- cote du livre
- ISBN
- état du livre
Emprunteur User
- nom de l'emprunteur
- email / tel de l'emprunteur
- login, mot de passe de l'emprunteur
- drapeau blacklisté pour emprunteur
- carte emprunteur
Emprunt
[Emprunt Many to One User]
- date d’emprunt
- date de retour
Paramètre
- durée de l'emprunt
- nombre de livres empruntables pour une personne par emprunt
- le montant des amendes de retard