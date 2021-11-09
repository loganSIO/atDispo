**Sommaire d’identification**

  **Titre** : Droits de consultation des disponibilités

  **Résumé** : Ajouter / Supprimer / Modifier les droits de consultation des disponibilités pour un ou plusieurs responsable pédagogique.

  **Acteurs** : Intervenant

  **Date de création** : 09/11/2021

  **Date de mise à jour**  : 09/11/2021

  **Version** : 1.0

  **Responsable** : LE-NEVEZ Logan



**Description des scénarios**

*Préconditions*

- Être connecté à internet.
- Être connecté à l'application.

*Scénario nominal*

1. Se rendre dans l'onglet "Mon Calendrier".
2. Cliquer sur "Modifier les droits".
3. Une nouvelle fenêtre s'ouvre avec : 
   1. Un formulaire d'ajout de responsable pédagogique.
   2. Un tableau de tous les responsables pédagogiques qui suivent votre calendrier de disponibilités avec la possibilité de les supprimer et de modifier leur droits de visualisation.

4. Si il n'y a aucun intervenant, en ajouter un à l'aide du formulaire en rentrant l'e-mail d'un responsable pédagogique. Puis, cliquer sur "Valider"
5. Cliquer sur "Modifier" dans le ligne correspondante à un responsable pédagogique. Un menu déroulant vous permettra alors de positionner leur droit de visualisation en cliquant sur "Oui" ou "Non".

**Enchaînements alternatifs**

*A1 : responsable pédagogique non reconnu*

L'enchaînement A1 démarre au point 4 du scénario nominal.

1. L'application rapporte une erreur concernant le responsable pédagogique. Cela est du au fait que l'e-mail est faux ou n'existe pas dans la base de donnée de l'application.

2. Demander au responsable pédagogique en question de confirmer l'ortographe de son e-mail.

3. Si le responsable pédagogique n'est pas enregistré sur l'application, le rediriger vers "Inscription.md".

   Le scénario nominal reprend au point 3.