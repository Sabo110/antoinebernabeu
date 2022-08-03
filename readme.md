# presentaion du projet
creation d'un site web pour un artiste peintre
# fonctionnalités
le peintre doit pouvoir
-realiser des operations de crud sur une oeuvre c'est à dire une peinture
-realiser des operations de crud sur un blogpost c'est à dire une actualités
-les utilisateurs qui visiterons le site doivent pouvoir:
    * commenter une oeuvre publié par le le peintre
    *commenter un blogpost publié par le peintre
    *contacter le peintre
# Nous commençerons par la creations des differentes entités à savoir
    -peintre(user)
    -blogpost
    -commentaire
    -peinture
# pour realiser les differents tests unitaires sur les entites crée on execute dans la terminale la commande suivante:
    symfony console make:unit-test
    on aura un fichier dans le repertoire tests et on configureras nos differents rests

# pour executer ces tests on execute la commande suivantes (jouer le test)

    php bin/phpunit --testdox
    Nous toujours la possiblité de relancer les tests