<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="<?php echo asset('assets/Contrat/bootstrap/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo asset('assets/Contrat/fonts/fontawesome-all.min.css');?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="<?php echo asset('assets/Contrat/css/styles.css');?>">
</head>

<body>
    <nav class="navbar navbar-dark fixed-top bg-dark" data-aos="fade" style="background: var(--bs-gray);">
        <div class="container"><a class="navbar-brand" href="{{url('/retour_a_poste')}}/{{ $idcandidat }}/{{ $idannonce }}" style="font-family: Roboto, sans-serif;font-weight: bold;">ITU</a><button data-bs-toggle="collapse" class="navbar-toggler collapsed" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse text-center" id="navcol-1">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#">First Item</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Second Item</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Third Item</a></li>
                </ul>
            </div>
        </div>
    </nav>

    @IF($contrat==1)
    <div class="container" data-aos="fade-up" data-aos-duration="600" style="margin-top: 120px;">
        <div class="row d-flex d-xl-flex justify-content-center justify-content-xl-center">
            <div class="col-sm-12 col-lg-10 col-xl-9 col-xxl-7 bg-white shadow-lg" style="border-radius: 5px;text-align: center;">
                <div class="p-5" style="text-align: center;">
                    <div class="text-center"><a class="btn btn-primary" href="#" style="border-style: none;background: rgba(108,117,125,0);border-radius: 50px;color: rgb(0,0,0);"><i class="fas fa-arrow-circle-left"></i></a></div>
                    <div class="text-center" style="margin-top: 50px;">
                        <h4 class="text-dark mb-4" style="font-size: 20px;margin-top: -40px;">Contrat d'essai</h4>
                    </div>
                        <p style="text-align: left;">
                        Entre les soussignés :

-	la société ...... (dénomination sociale)
Adresse ......
Immatriculation au RCS ......
Numéro URSSAF ......

Représentée par M. ......
agissant en qualité de ......

d’une part,

et :

-	M. ......
demeurant à ......
n° de Sécurité sociale : ……
de nationalité ......
libre de tout engagement,

d'autre part.
Il a été convenu ce qui suit :

Article 1 – Engagement
Sous réserve des résultats de la visite médicale d’embauche décidant de l’aptitude de M. …… au poste proposé, M. ...... est engagé par la société ...... en qualité de ...... (qualification ou titre).
Ce contrat prend effet à compter du ...... (date) à ...... (heures).
La déclaration préalable à l’embauche de M. ...... a été remise à l’URSSAF de …… (préciser le nom de la ville).


Article 2 - Convention collective
En application de la Convention collective nationale de ...... (et, le cas échéant, de la convention collective départementale et ou régionale), M. ...... relèvera du coefficient ......, position …… (à préciser), niveau …… (à préciser).
L’ensemble des dispositions de la convention sus-indiquée s’applique au présent contrat et ceci tant que ces dernières resteront opposables de droit à l’entreprise.
Un exemplaire de la présente convention collective est à la disposition de M. ...... au sein de l’établissement (préciser le service ou le bureau).


Article 3 - Période d’essai
Le présent contrat est conclu pour une durée indéterminée.
Il ne deviendra définitif qu’à l’expiration d’une période d’essai de ...... (jours ou mois).
Il est expressément convenu que la période d’essai s’entend d’un travail effectif.
Si pendant l’exécution de ladite période d’essai, le contrat de travail de M. ...... devait être suspendu pour quelque motif que ce soit, cette période d’essai serait prolongée d’une durée identique à la période de suspension.
Jusqu’à cette date, il sera possible à M. ......, comme à l’entreprise, de rompre le contrat de travail sans indemnité.
(Un délai de prévenance devra alors être respecté par les parties [C. trav., art. L. 1221-25 et L. 1221-26]).
Si le renouvellement est prévu par la convention collective :
Conformément aux dispositions de la convention collective, cet essai pourra être renouvelé dans les conditions suivantes : ......


Article 4 - Fonctions
M. ...... en sa qualité de …… (poste occupé) sera plus particulièrement chargé de ...... (préciser).
Cette liste de tâches est non exhaustive et pourra être complétée en fonction des besoins de l’entreprise.


Article 5 - Lieu de travail
M. ...... exercera ses fonctions sur le site de …… (adresse de l’établissement ou de l’entreprise). En fonction des nécessités de service, le lieu de travail de M. ...... pourra être modifié de manière temporaire ou définitive à l’intérieur du secteur géographique d’implantation de la société.


Article 6 - Horaire de travail
M. ...... est assujetti à l’horaire de travail de l’établissement, soit un horaire de ...... et une durée hebdomadaire de ...... heures.

Variante
Dans le cadre du présent contrat, M. …… bénéficie d’un horaire individualisé selon les modalités suivantes ...... (préciser)

La durée hebdomadaire du travail sera de ...... h ......

M. ...... pourra être amené à effectuer des heures supplémentaires à la demande de
la Direction qui seront rémunérées conformément aux dispositions légales et conventionnelles en vigueur.


Article 7 - Rémunération
La rémunération mensuelle brute sera de ...... euros pour un horaire mensualisé de ...... heures (vérifier l’adéquation entre le coefficient hiérarchique et les minima conventionnels).
Pour toute heure effectuée au-delà de ......, une majoration sera accordée et calculée conformément aux dispositions légales et conventionnelles en vigueur.


Article 8 – Discipline et Sécurité
M. ...... reconnaît avoir pris connaissance du règlement intérieur en vigueur dans l’établissement. Tout manquement au présent règlement pourrait donner lieu à des poursuites disciplinaires et à un éventuel licenciement pour faute.
M. ...... exercera ses fonctions sous l’autorité et dans le cadre des instructions données par M. ...... ou de toute personne habilitée à cet effet.
M. ...... s’engage à observer toutes les instructions et consignes particulières de travail qui lui seront données et à respecter une stricte obligation de discrétion sur tout ce qui concerne l’activité de l’entreprise.


Article 9 - Congés payés
M. ...... bénéficiera des droits à congés payés conformément aux dispositions légales (ou conventionnelles) en vigueur.


Article 10 - Avantages sociaux
M. ......, relevant de la catégorie professionnelle des …… (préciser employés, agents de maîtrise, cadres), sera affilié dès son entrée au sein de la société à :
-	...... (organisme de retraite) ;
-	...... (organisme de prévoyance).

Article 11 - Rupture du contrat (hors essai)
Le présent contrat pourra être rompu :
-	à l’initiative du salarié ;
-	à l’initiative de l'employeur.
Dans l’un ou l’autre cas, un préavis devra être respecté conformément aux dispositions légales et conventionnelles en vigueur.
La rupture du contrat par l’employeur, justifiée par une cause réelle et sérieuse, entraînera le versement d’une indemnité de licenciement si le salarié a au moins 1 an d’ancienneté. Cette éventuelle rupture entraînera le versement d’une indemnité de licenciement calculée en fonction du barème le plus avantageux résultant soit de la loi soit de la convention collective.
Cette indemnité n’est pas due en cas de faute grave ou lourde ou en cas de force majeure.


Article 12 – Obligations professionnelles
M. ...... s’engage à informer la société de tout changement le concernant, notamment en cas de changement de domicile. La nouvelle adresse sera transmise dès que possible au bureau du personnel.
M. ...... s’engage à déclarer tout accident du travail survenu sur les lieux du travail ou tout accident survenu sur le trajet dans les 48 heures à l’autorité hiérarchique.
M. …… s’engage à informer sans délai la société de toute absence et de justifier des raisons de celle-ci dans les 48 heures par tout justificatif utile (certificat médical le cas échéant).
M. …… s’engage à conserver une discrétion absolue sur tous les fichiers et documents internes à la société pendant toute la durée du présent contrat et après la rupture de celui-ci quelle que soit la cause.
Fait en double exemplaire à ……, le ......

(Signature des parties précédée de la mention « lu et approuvé »)


Signature du salarié							Signature de l'employeur
                        </p>
                    <form action="{{url('/insert_CE')}}" method="POST" class="user">
                    {{ csrf_field() }}
                        <input type="hidden" name="idemploye" value="{{  $idemploye }}">
                        <input type="hidden" name="idcandidat" value="{{ $idcandidat }}">
                        <input type="hidden" name="idannonce" value="{{ $idannonce  }}">
                        <label class="form-label"><input class="form-control" name="datedeb" type="date"></label>
                        <label class="form-label" style="margin-right: 10px;margin-left: 10px;"><input class="form-control" name="datelimite" type="date"></label>
                        <label class="form-label"><input class="form-control"  name="datefin" type="date"></label>
                        <div class="row mb-3">
                            <p id="emailErrorMsg-1" class="text-danger" style="display:none;">Paragraph</p>
                            <p id="passwordErrorMsg-1" class="text-danger" style="display:none;">Paragraph</p>
                        </div><button class="btn btn-primary d-block btn-user w-100" id="submitBtn-1" type="submit" style="background: var(--bs-gray);font-weight: bold;border-style: none;font-size: 20px;">Valider le contrat</button>
                        <hr>
                    </form>
                    <form action="{{url('/insert_SME')}}" method="POST" class="user">
                    {{ csrf_field() }}
                        <input type="hidden" name="idemploye" value="{{ $idemploye }}">
                        <input type="hidden" name="idcandidat" value="{{ $idcandidat }}">
                        <input type="hidden" name="idannonce" value="{{ $idannonce }}">
                        <label class="form-label"><input class="form-control" name="sme" type="number"></label>
                        <div class="row mb-3">
                            <p id="emailErrorMsg-1" class="text-danger" style="display:none;">Paragraph</p>
                            <p id="passwordErrorMsg-1" class="text-danger" style="display:none;">Paragraph</p>
                        </div><button class="btn btn-primary d-block btn-user w-100" id="submitBtn-1" type="submit" style="background: var(--bs-gray);font-weight: bold;border-style: none;font-size: 20px;">Entrer</button>
                        <hr>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @ELSEIF($contrat==2)
    <div class="container" data-aos="fade-up" data-aos-duration="600" style="margin-top: 120px;">
        <div class="row d-flex d-xl-flex justify-content-center justify-content-xl-center">
            <div class="col-sm-12 col-lg-10 col-xl-9 col-xxl-7 bg-white shadow-lg" style="border-radius: 5px;text-align: center;">
                <div class="p-5" style="text-align: center;">
                    <div class="text-center"><a class="btn btn-primary" href="#" style="border-style: none;background: rgba(108,117,125,0);border-radius: 50px;color: rgb(0,0,0);"><i class="fas fa-arrow-circle-left"></i></a></div>
                    <div class="text-center" style="margin-top: 50px;">
                        <h4 class="text-dark mb-4" style="font-size: 20px;margin-top: -40px;">Contrat à durée déterminée</h4>
                    </div>
                        <p style="text-align: left;">
                        1
Articles L.122-1 à L.122-13
Les parties soussignées:
1. Madame / Monsieur / La Société ___________________________________ demeurant /
établi(e) et ayant son siège social à _____________________________ représenté(e) par
_________________________,
ci-après désigné(e) „l’employeur“;
et
2. Madame / Monsieur _________________________________________ demeurant à
___________________________________________________________________________
ci-après désigné(e) „le/la salarié(e)“;
ont conclu le présent CONTRAT DE TRAVAIL A DUREE DETERMINEE.
Article 1er.Objet du contrat de travail à durée déterminée2
Le présent contrat a pour objet: [indiquer les raisons concrètes du recours à un CDD,
conformément à l'article L.122-1(2) du Code du travail
1. le remplacement d’un salarié temporairement absent
ou le remplacement d’un salarié sous contrat à durée indéterminée dont le poste est devenu
vacant, dans l’attente de l’entrée en service effective du salarié appelé à remplacer celui
dont le contrat a pris fin; lorsqu’il est conclu pour le remplacement d’un salarié absent, le
nom du salarié absent «au cas où il s’agit d’un remplacement indirect d’un salarié absent
pour cause de congé parental, le contrat indiquera le nom de ce salarié, même si le
remplacement s’effectue sur un autre poste;»
ou
2. l'emploi à caractère saisonnier3
 dans le secteur suivant;

1
 Attention: A défaut d’écrit ou d’écrit spécifiant que le contrat de travail est conclu pour une durée
déterminée, celui-ci est présumé conclu pour une durée indéterminée;
2
 L'article L.122-1 (2) prévoit les cas de recours à un CDD. L'objet du CDD ne doit pas être de pourvoir
durablement à un emploi lié à l’activité normale et permanente de l’entreprise
3
 défini par règlement grand-ducal du 11 juillet 1989
2
ou
3. l'emploi pour lequel il est d’usage constant de ne pas recourir au CDI en raison de la
nature de l’activité exercée ou du caractère par nature temporaire de cet emploi4
,
ou
4. l’exécution d’une tâche occasionnelle et ponctuelle définie et ne rentrant pas dans le
cadre de l’activité courante de l’entreprise;(préciser en quoi consiste les tâches
occasionnelles et en quoi elles sont ponctuelle)
ou
5. l’exécution d’une tâche précise et non durable en cas de survenance d’un
accroissement temporaire et exceptionnel de l’activité de l’entreprise ou en cas de
démarrage ou d’extension de l’entreprise; (préciser en quoi consiste la tâche précise et non
durable et expliquer l'accroissement de l'activité/ le démarrage de l'entreprise)
ou
6. l’exécution de travaux urgents rendue nécessaire pour prévenir des accidents, pour
réparer des insuffisances de matériel, pour organiser des mesures de sauvetage des
installations ou des bâtiments de l’entreprise de manière à éviter tout préjudice à
l’entreprise et à son personnel; ;(préciser en quoi consiste les travaux urgents et expliquer
les circonstances les rendant nécessaires)
ou
7. l’emploi d’un chômeur inscrit à «l’Agence pour le développement de l’emploi», soit
dans le cadre d’une mesure d’insertion ou de réinsertion dans la vie active, soit appartenant
à une catégorie de chômeurs déclarés éligibles pour l’embauche moyennant contrat à durée
déterminée, définie par un règlement grand-ducal à prendre sur avis du Conseil d’Etat et de
l’assentiment de la Conférence des Présidents de la Chambre des députés. Les critères
déterminant les catégories de chômeurs éligibles tiennent notamment compte de l’âge, de
la formation et de la durée d’inscription du chômeur ainsi que du contexte social dans lequel
il évolue;
ou
8. l’emploi destiné à favoriser l’embauche de certaines catégories de demandeurs
d’emploi;
ou
9. l’emploi pour lequel l’employeur s’engage à assurer un complément de formation
professionnelle au salarié.]
Article 2 Nature de l'emploi occupé et description des fonctions / tâches assignées
Le/la salarié(e) est engagé(e) en tant que [fonction]__________________________. Dans
l’exercice de cette fonction, le/la salarié(e) est amené(e) à [description de tâches
précises]____________________________________________________________________
________________________________________________________.

4 la liste de ces secteurs et emplois étant établie par règlement grand-ducal du 11 juillet 1989;
3
Article 3. Date d'entrée en service et durée du contrat de travail
La date du début de l’exécution du présent contrat est fixée au
[jj/mm/aa]________________________.
Le présent contrat est conclu pour une durée précise de _________ jours/semaines/
mois/années et expire de plein droit le [jj/mm/aa].
ou
Le présent contrat est conclu pour une durée imprécise. La durée minimale du contrat est de
____________ jours/semaines/mois/années. Au-delà de cette durée, il cesse de plein droit
et sans préavis en cas de réalisation de l’objet tel que défini sub. article 1er
.
Article 4 Période d'essai5
Les [[nombre] semaines/mois] après le commencement du travail sont à considérer comme
période d’essai.
Si [[nombre] jours/ 1 mois] avant l’expiration du délai prévu, aucune des deux parties n’a
averti l’autre de la résiliation de l’engagement à l’essai, celui-ci est considéré comme définitif
à partir du jour de l’entrée en service provisoire et conclu pour une durée déterminée.
Article 5 Renouvellement
En cas de nécessité, le présent contrat pourra être renouvelé deux fois sans que sa durée
totale, renouvellement(s) compris, ne puisse excéder 24 mois. Les conditions de ce
renouvellement feront l’objet d’un avenant à signer avant l’expiration du contrat initial.
Article 6. Lieu de travail
Le lieu de travail est __________________________________________________________.
Ou à défaut de lieu de travail fixe ou prédominant: Le salarié sera occupé à divers endroits et
plus particulièrement à l’étranger ainsi qu'au siège ou, le cas échéant, au domicile de
l’employeur;
Article 7. Durée et horaire de travail
La durée de travail hebdomadaire est de ___________ heures, réparties sur ________ jours
ouvrables. L’horaire normal de travail est de __________ à __________ heures et de
__________ à __________ heures.
4
Ou
Lundi de à de à
Mardi de à de à
Mercredi de à de à
Jeudi de à de à
Vendredi de à de à
Samedi de à de à
Dimanche de à de à
Les horaires de travail pourront varier en fonction des besoins de service.
Article 8. Salaire [et, le cas échéant, compléments ou accessoires de salaire]
Le salaire initial brut est fixé à ____________________ € à l’indice __________. Il sera payé
à la fin du mois, déduction faite des charges sociales et fiscales prévues par la loi.
[le cas échéant: Le/la salarié a droit aux compléments ou accessoires de salaire suivants:
Exemples: 13ème mois, chèques-repas, véhicule de fonction,
etc.________________________________________________________________________
___________________________________________________________________________
___________________________________________________________________________
_______________________]
Article 9. Congé annuel payé
Le/la salarié a droit à un congé ordinaire de récréation de _______________ jours ouvrables
par année. Le/la salarié a droit à un douzième du congé annuel par mois de travail entier.
Article 10. Régime complémentaire de pension
Le/la salarié bénéficie du régime complémentaire de pension [à contributions définies OU à
prestations définies], mis en place par l'employeur et donnant droit à des prestations en
matière de retraite, décès, vie, survie et invalidité, tel que décrit dans les règles y relatives.

5
 Voir articles L.122-11 et L.121-5 du Code du travail
5
Article 11. Maladie
Le/la Salarié incapable de travailler pour cause de maladie ou d'accident est obligé d'en
avertir, personnellement ou par personne interposée, l'employeur dès le premier (1er) jour
de son absence en indiquant si possible la durée prévisible de l'absence. Le troisième (3ème)
jour de son absence au plus tard, le/la Salarié est obligé de soumettre à la Société un
certificat médical attestant son incapacité de travail et sa durée prévisible.
Article 12. Clauses dérogatoires et/ou complémentaires
Les parties conviennent des clauses dérogatoires et/ou complémentaires suivantes:
[Exemples: clause de non-concurrence / clause de confidentialité / clause relative aux
communications
électroniques]________________________________________________________________
___________________________________________________________________________
___________________________________________________________________________.
Le présent contrat de travail est régi par le Code du travail et/ou par les dispositions de la
convention collective applicable à l’entreprise.
Le présent contrat de travail est fait en double exemplaire, chacune des parties
reconnaissant par sa signature en avoir reçu un original.
Luxembourg, le [date]
____________________________ ____________________________
Le/la salarié(e) L’employeur
                        </p>
                    <form action="{{url('/insert_CDD')}}" method="POST" class="user">
                    {{ csrf_field() }}
                        <input type="hidden" name="idemploye" value="{{ $idemploye }}">
                        <input type="hidden" name="idcandidat" value="{{ $idcandidat }}">
                        <input type="hidden" name="idannonce" value="{{ $idannonce }}">
                        <label class="form-label"><input class="form-control" name="datedeb" type="date"></label>
                        <label class="form-label" style="margin-right: 10px;margin-left: 10px;"><input class="form-control" name="datelimite" type="date"></label>
                        <label class="form-label"><input class="form-control"  name="datefin" type="date"></label>
                        <div class="row mb-3">
                            <p id="emailErrorMsg-1" class="text-danger" style="display:none;">Paragraph</p>
                            <p id="passwordErrorMsg-1" class="text-danger" style="display:none;">Paragraph</p>
                        </div><button class="btn btn-primary d-block btn-user w-100" id="submitBtn-1" type="submit" style="background: var(--bs-gray);font-weight: bold;border-style: none;font-size: 20px;">Valider le contrat</button>
                        <hr>
                    </form>
                    <form action="{{url('/insert_SME')}}" method="POST" class="user">
                    {{ csrf_field() }}
                        <input type="hidden" name="idemploye" value="{{ $idemploye }}">
                        <input type="hidden" name="idcandidat" value="{{ $idcandidat }}">
                        <input type="hidden" name="idannonce" value="{{ $idannonce }}">
                        <label class="form-label"><input class="form-control" name="sme" type="number"></label>
                        <div class="row mb-3">
                            <p id="emailErrorMsg-1" class="text-danger" style="display:none;">Paragraph</p>
                            <p id="passwordErrorMsg-1" class="text-danger" style="display:none;">Paragraph</p>
                        </div><button class="btn btn-primary d-block btn-user w-100" id="submitBtn-1" type="submit" style="background: var(--bs-gray);font-weight: bold;border-style: none;font-size: 20px;">Entrer</button>
                        <hr>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @ELSEIF($contrat==3)
    <div class="container" data-aos="fade-up" data-aos-duration="600" style="margin-top: 120px;">
        <div class="row d-flex d-xl-flex justify-content-center justify-content-xl-center">
            <div class="col-sm-12 col-lg-10 col-xl-9 col-xxl-7 bg-white shadow-lg" style="border-radius: 5px;text-align: center;">
                <div class="p-5" style="text-align: center;">
                    <div class="text-center"><a class="btn btn-primary" href="#" style="border-style: none;background: rgba(108,117,125,0);border-radius: 50px;color: rgb(0,0,0);"><i class="fas fa-arrow-circle-left"></i></a></div>
                    <div class="text-center" style="margin-top: 50px;">
                        <h4 class="text-dark mb-4" style="font-size: 20px;margin-top: -40px;">Contrat à durée indéterminée</h4>
                    </div>
                        <p style="text-align: left;">
Article L.121-4
Les parties soussignées:
1. Madame / Monsieur / La Société______________________________________________
demeurant / établi(e) et ayant son siège social à __________________________________,
représenté(e) par
____________________________________________________________.
ci-après désigné(e) „l’employeur“;
et
2. Madame / Monsieur _____________________________________ demeurant à
_______________________________.
ci-après désigné(e) „le / la salarié(e)“;
ont conclu le présent CONTRAT DE TRAVAIL A DUREE INDETERMINEE.
Article 1er. Date d’entrée de service
La date du début de l’exécution du présent contrat de travail est fixée au
_________________
___________________________________________________________________________.
Article 2. Période d’essai1
Le présent contrat de travail prévoit une période d’essai de ___________ semaines/mois
allant du __________ au __________.
Si le contrat n’est pas rompu au plus tard [nombre] jours avant la fin de la période d’essai
par l’une des deux (2) parties, il est à considérer comme définitif et à durée indéterminée à
partir de la date indiquée d'entrée en service.

1
 Voir article L.121-5 du code du travail
2
Article 3. Nature de l'emploi occupé et description des fonctions / tâches assignées
Le/la salarié(e) est engagé(e) en qualité de : [fonction]. Dans l’exercice de cette fonction,
le/la salarié(e) est amené(e) à: [description des
tâches]___________________________________.
L'employeur se réserve le droit d'affecter le/la salarié(e) à une autre fonction et ce, selon les
besoins de l'employeur et en considération de la formation et des qualifications du/de la
salarié(e).
Article 4. Lieu de travail
Le lieu de travail est ________________________________________.
Ou à défaut de lieu de travail fixe ou prédominant: Le salarié sera occupé à divers endroits et
plus particulièrement à l’étranger ainsi qu'au siège ou, le cas échéant, au domicile de
l’employeur;
L'employeur se réserve toutefois le droit de changer le lieu du travail du/de la salarié(e) sur
le territoire du Grand Duché de Luxembourg pour les besoins du service. Le/la salarié(e)
accepte une telle modification de son lieu de travail et ne s'oppose pas à une mutation
temporaire à l'étranger si les besoins de l'employeur le requièrent.
Article 5. Durée et horaire de travail
La durée de travail est de __________ heures par semaine, réparties sur __________ jours
ouvrables.
L’horaire de travail est de __________ à __________ heures et de __________ à
______________ heures.
Ou
Lundi de à de à
Mardi de à de à
Mercredi de à de à
Jeudi de à de à
Vendredi de à de à
Samedi de à de à
Dimanche de à de à
Les horaires de travail pourront varier en fonction des besoins de service.
3
Article 6. Salaire [et, le cas échéant, compléments ou accessoires de salaire]
Le salaire initial brut est fixé à ___________ € à l’indice __________. Il sera payé à la fin du
mois, déduction faite des charges sociales et fiscales prévues par la loi.
Le/La salarié(e) a droit aux compléments ou accessoires de salaire suivants:
[Exemples: 13ème mois, chèques-repas, véhicule de fonction, etc._____________________
___________________________________________________________________________
___________________________________________________________________________
Article 7. Congé annuel payé
Le/la salarié(e) a droit à un congé ordinaire de récréation de __________ jours ouvrables par
année. Le/la salarié a droit à un douzième du congé annuel par mois de travail entier.
Article 8. Régime complémentaire de pension
Le/la salarié bénéficie du régime complémentaire de pension [à contributions définies OU à
prestations définies], mis en place par l'employeur et donnant droit à des prestations en
matière de retraite, décès, vie, survie et invalidité, tel que décrit dans les règles y relatives.
Article 9. Maladie
Le/la Salarié incapable de travailler pour cause de maladie ou d'accident est obligé d'en
avertir, personnellement ou par personne interposée, l'employeur dès le premier (1er) jour
de son absence en indiquant si possible la durée prévisible de l'absence. Le troisième (3ème)
jour de son absence au plus tard, le/la Salarié est obligé de soumettre à la Société un
certificat médical attestant son incapacité de travail et sa durée prévisible.
Article 10. Délais à respecter en cas de rupture du contrat avec préavis
En dehors de l’hypothèse visée à l'article 2 et de celle d’un licenciement pour faute grave,
l’employeur ou le/la salarié(e) qui résilie le contrat de travail doit respecter un délai de
préavis.
Celui-ci est en fonction de l’ancienneté de service du/de la salarié(e) et se détermine comme
suit:
4
DÉLAI DE PRÉAVIS
Ancienneté de service Employeur Salarié
< 5 ans
entre 5 ans et 10 ans
> 10 ans
2 mois
4 mois
6 mois
1 mois
2 mois
3 mois
Article 11. Clauses dérogatoires et/ou supplémentaires
Les parties conviennent des clauses dérogatoires et/ou supplémentaires suivantes:
[Exemples: clause de non-concurrence / clause de confidentialité / clause relative aux
communications
électroniques]__________________________________________________.
Le présent contrat de travail est régi par le Code du travail et/ou par les dispositions de la
convention collective applicable à l’entreprise.
Fait en double exemplaire et signé à _________________ le _________________
____________________________ ____________________________
Le/la salarié(e) L’employeur
                        </p>
                    <form action="{{url('/insert_SME')}}" method="POST" class="user">
                    {{ csrf_field() }}
                        <input type="hidden" name="idemploye" value="{{ $idemploye }}">
                        <input type="hidden" name="idcandidat" value="{{ $idcandidat }}">
                        <input type="hidden" name="idannonce" value="{{ $idannonce }}">
                        <label class="form-label"><input class="form-control" name="sme" type="number"></label>
                        <div class="row mb-3">
                            <p id="emailErrorMsg-1" class="text-danger" style="display:none;">Paragraph</p>
                            <p id="passwordErrorMsg-1" class="text-danger" style="display:none;">Paragraph</p>
                        </div><button class="btn btn-primary d-block btn-user w-100" id="submitBtn-1" type="submit" style="background: var(--bs-gray);font-weight: bold;border-style: none;font-size: 20px;">Entrer</button>
                        <hr>
                    </form>
                    <div class="text-center"><a class="small btn btn-primary" href="{{url('/insert_CDI')}}/{{ $idemploye }}" style="background: var(--bs-gray);border-style: none;font-weight: bold;">Valider le contrat</a></div>
                </div>
            </div>
        </div>
    </div>
    @ENDIF
    <footer class="text-center" data-aos="fade" style="margin-top: 20px;">
        <div class="container text-muted py-4 py-lg-5" style="height: 140px;">
            <ul class="list-inline">
                <li class="list-inline-item me-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-facebook">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
                    </svg></li>
                <li class="list-inline-item me-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-twitter">
                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"></path>
                    </svg></li>
                <li class="list-inline-item"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-instagram">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path>
                    </svg></li>
            </ul>
            <p class="mb-0">Copyright © 2022</p>
        </div>
    </footer>
    <script src="<?php echo asset('assets/Contrat/bootstrap/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo asset('assets/Contrat/js/bs-init.js');?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
</body>

</html>
