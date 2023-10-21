DROP ROLE IF EXISTS recrutement;
DROP DATABASE IF EXISTS recrutement;
Create database recrutement;
create role recrutement login PASSWORD 'recrutement';
alter database recrutement owner to recrutement;
\c recrutement recrutement;


drop table Conger cascade;
drop table Type_Conger cascade;
drop table departement_employe cascade;
drop table CNAPS cascade;
drop table CDI cascade;
drop table CDD cascade;
drop table Contrat_essai cascade;
drop table Employe cascade;
drop table Personnel cascade;
drop table Categorie cascade;
drop table Groupe cascade;
drop table poste cascade;
drop table Departement cascade;
drop table Entretien cascade;
drop table Embauche cascade;
drop table Test cascade;
drop table questionnaire cascade;
drop table Candidat cascade;
drop table Annonce cascade;
drop table Admin cascade;

drop sequence sqsociete CASCADE;
create sequence sqsociete;


drop table societe cascade;

drop table poste_emp cascade;


drop sequence sqconge;
drop sequence sqtypeconge;
drop sequence sqcnaps;
drop sequence sqcontratindetermine;
drop sequence sqcontratdetermine;
drop sequence sqcontratessai;
drop sequence sqpersonnel;
drop sequence sqcategorie;
drop sequence sqgroupe;
drop sequence sqposte;
drop sequence sqdepartement;
drop sequence sqcandidat;
drop sequence sqannonce;



create sequence sqannonce;
Alter sequence sqannonce restart;
create sequence sqcandidat;
Alter sequence sqcandidat restart;
create sequence sqcategorie;
Alter sequence sqcategorie restart;
create sequence sqpersonnel;
Alter sequence sqpersonnel restart;
create sequence sqposte;
Alter sequence sqposte restart;
create sequence sqgroupe;
Alter sequence sqgroupe restart;
create sequence sqcontratessai;
Alter sequence sqcontratessai restart;
create sequence sqcontratdetermine;
Alter sequence sqcontratdetermine restart;
create sequence sqcontratindetermine;
Alter sequence sqcontratindetermine restart;
create sequence sqcnaps;
Alter sequence sqcnaps restart;
create sequence sqdepartement;
Alter sequence sqdepartement restart;
create sequence sqtypeconge;
Alter sequence sqtypeconge restart;
create sequence sqconge;
Alter sequence sqconge restart;


drop sequence sqemploye;
create sequence sqemploye;
Alter sequence sqemploye restart;

-- societe
 
create table societe(
    idsociete varchar(20) primary key not null default 'soc'||nextval('sqsociete'),
    nom varchar(40),
    adresse varchar(60),
    telephone int,
    numif varchar(60),
    numrc varchar(60),
    numstat varchar(60),
    cnaps varchar(60)
);


-- NIF : 10 chiffres
-- STAT : 46101 41 2009 0 00167
-- RC : RDC ANTANANARIVO2015 B 00998

insert into societe (nom,adresse,telephone,numif,numrc,numstat,cnaps) values ('Mix Company','Lot63 Antaninarenina ',0340434543,'1891221891','RDC ANTANANARIVO2015 B 00998','46101 41 2009 0 00167','1456543');

-- Societe

create table Admin(
email varchar(50),
mdp varchar(20),
idsociete varchar(20)
);

insert into Admin(email,mdp,idsociete) values('ravelojaonatokiniaina213@gmail.com','12345','soc1');
insert into Admin(email,mdp,idsociete) values('admin@gmail.com','admin','soc1');


create table Annonce(
    idannonce varchar(20) primary key not null default 'annonce'||nextval('sqannonce'),
    pub text,
    datedebut timestamp default CURRENT_TIMESTAMP,
    datefin timestamp
);


create table Candidat(
    idcandidat varchar(20) primary key not null default 'candidat'||nextval('sqcandidat'),
    idannonce varchar(20) references Annonce(idannonce) default null,
    nom varchar(20),
    prenom varchar(20),
    age int not null,
    email varchar(20) default null,
    mdp varchar(20) default null,
    adresse varchar(20),
    sex char(1),
    datenaissance date ,
    st_juridique int,
    nom_pere varchar(20),
    profession_pere varchar(20),
    nom_mere varchar(20),
    profession_mere varchar(20),
    affiliation varchar(30),
    enfant_a_charge int,
    st_matrimoniale int,
    experience int,
    diplome int,
    note float default 0 check(note>=0 and note<=20)
 );


insert into Candidat(nom,prenom,age,email,mdp,adresse,sex,datenaissance,st_juridique,nom_pere,profession_pere,nom_mere,profession_mere,affiliation,enfant_a_charge,st_matrimoniale,experience,diplome) values('Rakoto1','jean1',30,'jean1@gmail.com','jean1','Andoharanofotsy','M','01-01-1990',0,'Rakotobe1','docteur','Rasoa1','femme au foyer','walawala',3,0,1,1);
insert into Candidat(nom,prenom,age,email,mdp,adresse,sex,datenaissance,st_juridique,nom_pere,profession_pere,nom_mere,profession_mere,affiliation,enfant_a_charge,st_matrimoniale,experience,diplome) values('Rakoto2','jean2',30,'jean2@gmail.com','jean2','Andoharanofotsy','M','01-01-1991',1,'Rakotobe2','docteur','Rasoa2','femme au foyer','walawala',2,0,1,0);
insert into Candidat(nom,prenom,age,email,mdp,adresse,sex,datenaissance,st_juridique,nom_pere,profession_pere,nom_mere,profession_mere,affiliation,enfant_a_charge,st_matrimoniale,experience,diplome) values('Rakoto3','jean3',31,'jean3@gmail.com','jean3','Andoharanofotsy','M','01-01-1992',0,'Rakotobe3','docteur','Rasoa3','femme au foyer','walawala',1,0,0,1);
insert into Candidat(nom,prenom,age,email,mdp,adresse,sex,datenaissance,st_juridique,nom_pere,profession_pere,nom_mere,profession_mere,affiliation,enfant_a_charge,st_matrimoniale,experience,diplome) values('Rakoto4','jean4',32,'jean4@gmail.com','jean4','Andoharanofotsy','M','01-01-1993',1,'Rakotobe4','docteur','Rasoa4','femme au foyer','walawala',3,0,1,1);
insert into Candidat(nom,prenom,age,email,mdp,adresse,sex,datenaissance,st_juridique,nom_pere,profession_pere,nom_mere,profession_mere,affiliation,enfant_a_charge,st_matrimoniale,experience,diplome) values('Rakoto5','jean5',33,'jean5@gmail.com','jean5','Andoharanofotsy','M','01-01-1994',0,'Rakotobe5','docteur','Rasoa5','femme au foyer','walawala',4,0,1,1);
insert into Candidat(nom,prenom,age,email,mdp,adresse,sex,datenaissance,st_juridique,nom_pere,profession_pere,nom_mere,profession_mere,affiliation,enfant_a_charge,st_matrimoniale,experience,diplome) values('Rakoto6','jean6',34,'jean6@gmail.com','jean6','Andoharanofotsy','M','01-01-1995',1,'Rakotobe6','docteur','Rasoa6','femme au foyer','walawala',5,0,1,1);
insert into Candidat(nom,prenom,age,email,mdp,adresse,sex,datenaissance,st_juridique,nom_pere,profession_pere,nom_mere,profession_mere,affiliation,enfant_a_charge,st_matrimoniale,experience,diplome) values('Rakoto7','jean7',35,'jean7@gmail.com','jean7','Andoharanofotsy','M','01-01-1991',0,'Rakotobe7','docteur','Rasoa7','femme au foyer','walawala',3,0,1,1);
insert into Candidat(nom,prenom,age,email,mdp,adresse,sex,datenaissance,st_juridique,nom_pere,profession_pere,nom_mere,profession_mere,affiliation,enfant_a_charge,st_matrimoniale,experience,diplome) values('Rakoto8','jean8',36,'jean8@gmail.com','jean8','Andoharanofotsy','M','01-01-1992',1,'Rakotobe8','docteur','Rasoa8','femme au foyer','walawala',2,0,1,0);
insert into Candidat(nom,prenom,age,email,mdp,adresse,sex,datenaissance,st_juridique,nom_pere,profession_pere,nom_mere,profession_mere,affiliation,enfant_a_charge,st_matrimoniale,experience,diplome) values('Rakoto9','jean9',37,'jean9@gmail.com','jean9','Andoharanofotsy','M','01-01-1993',0,'Rakotobe9','docteur','Rasoa9','femme au foyer','walawala',1,0,1,1);
insert into Candidat(nom,prenom,age,email,mdp,adresse,sex,datenaissance,st_juridique,nom_pere,profession_pere,nom_mere,profession_mere,affiliation,enfant_a_charge,st_matrimoniale,experience,diplome) values('Rakoto10','jean10',40,'jean10@gmail.com','jean10','Andoharanofotsy','M','01-01-1994',1,'Rakotobe10','docteur','Rasoa10','femme au foyer','walawala',0,0,1,1);
insert into Candidat(nom,prenom,age,email,mdp,adresse,sex,datenaissance,st_juridique,nom_pere,profession_pere,nom_mere,profession_mere,affiliation,enfant_a_charge,st_matrimoniale,experience,diplome) values('Rakoto11','jean11',41,'jean11@gmail.com','jean11','Andoharanofotsy','F','01-01-1995',0,'Rakotobe11','docteur','Rasoa11','femme au foyer','walawala',3,0,1,1);
insert into Candidat(nom,prenom,age,email,mdp,adresse,sex,datenaissance,st_juridique,nom_pere,profession_pere,nom_mere,profession_mere,affiliation,enfant_a_charge,st_matrimoniale,experience,diplome) values('Rakoto12','jean12',35,'jean12@gmail.com','jean12','Andoharanofotsy','F','01-01-1991',1,'Rakotobe12','docteur','Rasoa12','femme au foyer','walawala',4,0,1,1);
insert into Candidat(nom,prenom,age,email,mdp,adresse,sex,datenaissance,st_juridique,nom_pere,profession_pere,nom_mere,profession_mere,affiliation,enfant_a_charge,st_matrimoniale,experience,diplome) values('Rakoto13','jean13',36,'jean13@gmail.com','jean13','Andoharanofotsy','F','01-01-1992',0,'Rakotobe13','docteur','Rasoa13','femme au foyer','walawala',2,0,1,1);
insert into Candidat(nom,prenom,age,email,mdp,adresse,sex,datenaissance,st_juridique,nom_pere,profession_pere,nom_mere,profession_mere,affiliation,enfant_a_charge,st_matrimoniale,experience,diplome) values('Rakoto14','jean14',26,'jean14@gmail.com','jean14','Andoharanofotsy','F','01-01-1993',1,'Rakotobe14','docteur','Rasoa14','femme au foyer','walawala',5,0,0,1);
insert into Candidat(nom,prenom,age,email,mdp,adresse,sex,datenaissance,st_juridique,nom_pere,profession_pere,nom_mere,profession_mere,affiliation,enfant_a_charge,st_matrimoniale,experience,diplome) values('Rakoto15','jean15',27,'jean15@gmail.com','jean15','Andoharanofotsy','F','01-01-1994',0,'Rakotobe15','docteur','Rasoa15','femme au foyer','walawala',0,0,1,1);
insert into Candidat(nom,prenom,age,email,mdp,adresse,sex,datenaissance,st_juridique,nom_pere,profession_pere,nom_mere,profession_mere,affiliation,enfant_a_charge,st_matrimoniale,experience,diplome) values('Rakoto16','jean16',28,'jean16@gmail.com','jean16','Andoharanofotsy','F','01-01-1995',1,'Rakotobe16','docteur','Rasoa16','femme au foyer','walawala',1,0,1,1);
insert into Candidat(nom,prenom,age,email,mdp,adresse,sex,datenaissance,st_juridique,nom_pere,profession_pere,nom_mere,profession_mere,affiliation,enfant_a_charge,st_matrimoniale,experience,diplome) values('Rakoto17','jean17',29,'jean17@gmail.com','jean17','Andoharanofotsy','F','01-01-1991',0,'Rakotobe17','docteur','Rasoa17','femme au foyer','walawala',2,0,1,1);
insert into Candidat(nom,prenom,age,email,mdp,adresse,sex,datenaissance,st_juridique,nom_pere,profession_pere,nom_mere,profession_mere,affiliation,enfant_a_charge,st_matrimoniale,experience,diplome) values('Rakoto18','jean18',30,'jean18@gmail.com','jean18','Andoharanofotsy','F','01-01-1992',1,'Rakotobe18','docteur','Rasoa18','femme au foyer','walawala',5,0,1,1);
insert into Candidat(nom,prenom,age,email,mdp,adresse,sex,datenaissance,st_juridique,nom_pere,profession_pere,nom_mere,profession_mere,affiliation,enfant_a_charge,st_matrimoniale,experience,diplome) values ('Rakoto19','jean19',34,'jean19@gmail.com','jean19','Andoharanofotsy','F','01-01-1993',0,'Rakotobe19','docteur','Rasoa19','femme au foyer','walawala',2,0,1,1);
insert into Candidat(nom,prenom,age,email,mdp,adresse,sex,datenaissance,st_juridique,nom_pere,profession_pere,nom_mere,profession_mere,affiliation,enfant_a_charge,st_matrimoniale,experience,diplome) values('Rakoto20','jean20',35,'jean20@gmail.com','jean20','Andoharanofotsy','F','01-01-1994',1,'Rakotobe20','docteur','Rasoa20','femme au foyer','walawala',3,0,1,1);


 create table questionnaire(
     idannonce varchar(20),
     question text,
     idcandidat varchar(20),
     note float default 0,
      foreign key(idannonce) references Annonce(idannonce),
        foreign key(idcandidat) references Candidat(idcandidat)
 );

 create table Test(
    idannonce varchar(20),
    idcandidat varchar(20),
    date_test date default current_date,
    heure_test time,
    jour_test int,
    minute_test int,
    note float default 0 check(note>=0 and note<=20),
       foreign key(idannonce) references Annonce(idannonce),
        foreign key(idcandidat) references Candidat(idcandidat)
);

create table Embauche(
    idannonce varchar(20),
    idcandidat varchar(20),
       foreign key(idannonce) references Annonce(idannonce),
        foreign key(idcandidat) references Candidat(idcandidat)
);


create table Entretien(
    idannonce varchar(20),
    idcandidat varchar(20),
    note float default  0 check(note>=0 and note<=20),
    foreign key(idannonce) references Annonce(idannonce),
     foreign key(idcandidat) references Candidat(idcandidat)
);



-- //////////Implementer database 1 


-- Horaire de test
CREATE OR REPLACE FUNCTION passage_test(ida varchar)
    RETURNS time
     LANGUAGE PLPGSQL
    AS
    $BODY$
    declare
	passage time;
    heuremax time;
    duree_test int;
    BEGIN
    select max(heure_test) into heuremax from test where date_test=(select max(date_test) from test) and idannonce=ida;
    select minute_test into duree_test from test where heure_test=(select max(heure_test) from test) and date_test=(select max(date_test) from test) and idannonce =ida;
    IF heuremax is not null THEN
    select max(heure_test) + (duree_test * interval '1 minute') into passage from test where date_test=(select max(date_test) from test) and idannonce=ida;
    ELSE
    passage=now();
    END IF;
    return passage;
   end;
   $BODY$;

-- Jour
   CREATE OR REPLACE FUNCTION passage_jour_test(ida varchar,debut int,fin int)
    RETURNS int
     LANGUAGE PLPGSQL
     AS
    $BODY$
    declare
	passage_jour int;
    heure_possible int;
    BEGIN
    passage_jour=1;
    select (EXTRACT( HOUR FROM  heure_test) * 60*60)+(EXTRACT (MINUTES FROM heure_test) * 60) + (EXTRACT (SECONDS from heure_test))into heure_possible from test where heure_test=(select max(heure_test) from test) and date_test=(select max(date_test) from test) and idannonce =ida;
    IF heure_possible IS NOT NULL THEN
        IF heure_possible<debut*60*60 OR heure_possible>=fin*60*60 THEN
            passage_jour=passage_jour+1;
            IF passage_jour>5 THEN
                passage_jour=1;
            END IF;
        ELSIF heure_possible>=(debut*60*60) and heure_possible<(fin*60*60) THEN
        END IF;
    ELSE
    passage_jour=1;
    END IF;
    return passage_jour;
   end;
   $BODY$;


   CREATE OR REPLACE FUNCTION passage_date_test(ida varchar,debut int,fin int)
    RETURNS date
     LANGUAGE PLPGSQL
    AS
    $BODY$
    declare
	passage_date date;
    heure_possible int;
    BEGIN
    select (EXTRACT( HOUR FROM  heure_test) * 60*60)+(EXTRACT (MINUTES FROM heure_test) * 60) + (EXTRACT (SECONDS from heure_test))into heure_possible from test where heure_test=(select max(heure_test) from test) and date_test=(select max(date_test) from test) and idannonce =ida;
    select date_test into passage_date from test where heure_test=(select max(heure_test) from test) and date_test=(select max(date_test) from test) and idannonce =ida;
    IF passage_date IS NOT NULL THEN
        IF heure_possible<debut*60*60 OR heure_possible>=fin*60*60 THEN
            passage_date= passage_date + interval '1 day';
        ELSIF heure_possible>=(debut*60*60) and heure_possible<(fin*60*60) THEN
        END IF;
    ELSE
    passage_date=current_date;
    END IF;
    return passage_date;
   end;
   $BODY$;

-- Convertit le temps en seconde
CREATE OR REPLACE FUNCTION to_seconds(t time)
  RETURNS integer AS
$BODY$
DECLARE
    hs INTEGER;
    ms INTEGER;
    s INTEGER;
BEGIN
    SELECT (EXTRACT( HOUR FROM  t) * 60*60) INTO hs;
    SELECT (EXTRACT (MINUTES FROM t) * 60) INTO ms;
    SELECT (EXTRACT (SECONDS from t)) INTO s;
    SELECT (hs + ms + s) INTO s;
    RETURN s;
END;
$BODY$
  LANGUAGE 'plpgsql';


create table Departement(
    iddepartement varchar(20) primary key not null default 'departement'||nextval('sqdepartement'),
    nom varchar(20)
);
INSERT into Departement(nom) values('Developpeur'),('Web'),('Design');


-- Napiana Salaire minimum sy maximum le poste
drop table poste cascade;

create table Poste(
idposte varchar(20) primary key not null default 'poste'||nextval('sqposte'),
nom varchar(90),
iddepartement varchar(20) references Departement(iddepartement),
salmin double precision,
salmax double precision
);


-- INSERT INTO poste(nom,iddepartement) values('developpeur','departement1');
-- INSERT INTO poste(nom,iddepartement) values('design','departement1');


insert into poste(nom,iddepartement,salmin,salmax) values ('Developpeur Junior Vue.js ','departement2',1500000,3000000);
insert into poste(nom,iddepartement,salmin,salmax) values ('Developpeur Senior Vue.js ','departement2',3000000,4000000);


create table Groupe(
    idgroupe varchar(20) primary key not null default 'groupe'||nextval('sqgroupe'),
    nom varchar(20)
);
Insert into groupe(nom) values('1er groupe'),('2e groupe'),('3e groupe'),('4e groupe'),('5e groupe');


create table Categorie(
     idcategorie varchar(20) primary key not null default 'categorie'||nextval('sqcategorie'),
     nomCategorie varchar(20),
     idgroupe varchar(20) references groupe(idgroupe)
);

-- 1er groupe
insert into Categorie(nomCategorie,idgroupe) values('M1','groupe1');
insert into Categorie(nomCategorie,idgroupe) values('M2','groupe1');
insert into Categorie(nomCategorie,idgroupe) values('1A','groupe1');
insert into Categorie(nomCategorie,idgroupe) values('1B','groupe1');

-- 2e groupe
insert into Categorie(nomCategorie,idgroupe) values('OS1','groupe2');
insert into Categorie(nomCategorie,idgroupe) values('OS2','groupe2');
insert into Categorie(nomCategorie,idgroupe) values('OS3','groupe2');
insert into Categorie(nomCategorie,idgroupe) values('OP1','groupe2');
insert into Categorie(nomCategorie,idgroupe) values('A1','groupe2');
insert into Categorie(nomCategorie,idgroupe) values('A2','groupe2');
insert into Categorie(nomCategorie,idgroupe) values('A3','groupe2');
insert into Categorie(nomCategorie,idgroupe) values('B1','groupe2');
insert into Categorie(nomCategorie,idgroupe) values('B2','groupe2');
insert into Categorie(nomCategorie,idgroupe) values('B3','groupe2');
insert into Categorie(nomCategorie,idgroupe) values('B4','groupe2');
insert into Categorie(nomCategorie,idgroupe) values('C1','groupe2');
insert into Categorie(nomCategorie,idgroupe) values('C2','groupe2');
insert into Categorie(nomCategorie,idgroupe) values('C3','groupe2');
insert into Categorie(nomCategorie,idgroupe) values('D1','groupe2');
insert into Categorie(nomCategorie,idgroupe) values('D2','groupe2');
insert into Categorie(nomCategorie,idgroupe) values('D3','groupe2');

-- 3e groupe
insert into Categorie(nomCategorie,idgroupe) values('OP2','groupe3');
insert into Categorie(nomCategorie,idgroupe) values('OP3','groupe3');
insert into Categorie(nomCategorie,idgroupe) values('4A','groupe3');
insert into Categorie(nomCategorie,idgroupe) values('4B','groupe3');
insert into Categorie(nomCategorie,idgroupe) values('5A','groupe3');
insert into Categorie(nomCategorie,idgroupe) values('5B','groupe3');
insert into Categorie(nomCategorie,idgroupe) values('A4','groupe3');
insert into Categorie(nomCategorie,idgroupe) values('B5','groupe3');
insert into Categorie(nomCategorie,idgroupe) values('C4','groupe3');
insert into Categorie(nomCategorie,idgroupe) values('D4','groupe3');


create table Personnel(
idpers varchar(20) primary key not null default 'pers'||nextval('sqpersonnel'),
nom varchar(20),
iddepartement varchar(20) references Departement(iddepartement)
);

Insert into Personnel(nom,iddepartement) values('Rabary','departement1');
Insert into Personnel(nom,iddepartement) values('Rakoto','departement1');
Insert into Personnel(nom,iddepartement) values('Rasoa','departement1');


-- script nouvelle base de l'examen 26 septembre
drop table employe cascade;
create table Employe(
        idemploye varchar(20) primary key not null default 'emp'||nextval('sqemploye'),
        idcandidat varchar(20) references Candidat(idcandidat),
        horaire_travail int,
        idcategorie varchar(20) references categorie(idcategorie),
        iddepartement varchar(20) references Departement(iddepartement),
        chef varchar(20) references Personnel(idpers),
        sub varchar(20) references Personnel(idpers),
        debut_service date default now()
);
alter table employe add column numerocnaps varchar(30);

insert into Employe(idcandidat,horaire_travail,idcategorie,iddepartement,chef,sub,numerocnaps) values
('candidat1',10,'categorie7','departement2','pers1','pers3','1236-87-789-9') ,
('candidat2',8,'categorie7','departement2','pers1','pers3','1236-87-789-9') ,
('candidat3',10,'categorie7','departement2','pers1','pers3','1236-87-789-9') ,
('candidat9',10,'categorie7','departement2','pers1','pers3','1236-87-789-9') ,
('candidat5',10,'categorie7','departement2','pers1','pers3','1236-87-789-9'),
('candidat6',10,'categorie7','departement2','pers1','pers3','1236-87-789-9') ,
('candidat8',10,'categorie7','departement2','pers1','pers3','1236-87-789-9');

create table Contrat_essai(
    idcontratessai varchar(20) primary key not null default 'ce'||nextval('sqcontratessai'),
    idemploye varchar(20),
    datedebut timestamp,
    datelimite date default null,
    datefin date default null,
      foreign key(idemploye) references Employe(idemploye)
);

create table CDD(
    idcontratdetermine varchar(20) primary key not null default 'cdd'||nextval('sqcontratdetermine'),
    idemploye varchar(20),
    datedebut date default now(),
    datelimite date default null,
    datefin date default null,
        foreign key(idemploye) references Employe(idemploye)
);

Create table CDI(
    idcontratindetermine varchar(20) primary key not null default 'cdi'||nextval('sqcontratindetermine'),
    idemploye varchar(20) references Employe(idemploye)
);

create table CNAPS(
    idcnaps varchar(20) primary key not null default 'cnaps'||nextval('sqcnaps'),
    idemploye varchar(20),
    dateembauche date,
         foreign key(idemploye) references Employe(idemploye)
);



-- insert into Employe(idcandidat,horaire_travail,chef,sub)values('candidat1',3,'pers1','pers2');
-- insert into Employe(idcandidat,horaire_travail,chef,sub)values('candidat2',5,'pers3','pers4');
-- insert into Employe(idcandidat,horaire_travail,chef,sub)values('candidat3',6,'pers5','pers6');
-- insert into Employe(idcandidat,horaire_travail,chef,sub)values('candidat4',8,'pers7','pers8');
-- insert into Employe(idcandidat,horaire_travail,chef,sub)values('candidat5',10,'pers9','pers10');
-- insert into Employe(idcandidat,horaire_travail,chef,sub)values('candidat6',10,'pers9','pers10');
-- insert into Employe(idcandidat,horaire_travail,chef,sub)values('candidat7',10,'pers9','pers10');
-- insert into Employe(idcandidat,horaire_travail,chef,sub)values('candidat8',10,'pers9','pers10');
-- insert into Employe(idcandidat,horaire_travail,chef,sub)values('candidat9',10,'pers9','pers10');
-- insert into Employe(idcandidat,horaire_travail,chef,sub)values('candidat10',10,'pers9','pers10');
-- insert into Employe(idcandidat,horaire_travail,chef,sub)values('candidat11',10,'pers9','pers10');
-- insert into Employe(idcandidat,horaire_travail,chef,sub)values('candidat12',10,'pers9','pers10');
-- insert into Employe(idcandidat,horaire_travail,chef,sub)values('candidat13',10,'pers9','pers10');
-- insert into Employe(idcandidat,horaire_travail,chef,sub)values('candidat14',10,'pers9','pers10');
-- insert into Employe(idcandidat,horaire_travail,chef,sub)values('candidat15',10,'pers9','pers10');
-- insert into Employe(idcandidat,horaire_travail,chef,sub)values('candidat16',10,'pers9','pers10');
-- insert into Employe(idcandidat,horaire_travail,chef,sub)values('candidat17',10,'pers9','pers10');
-- insert into Employe(idcandidat,horaire_travail,chef,sub)values('candidat18',10,'pers9','pers10');
-- insert into Employe(idcandidat,horaire_travail,chef,sub)values('candidat19',10,'pers9','pers10');
-- insert into Employe(idcandidat,horaire_travail,chef,sub)values('candidat20',10,'pers9','pers10');

-- 4e groupe
-- 5e groupe

-- Implementer database 2

create table departement_employe(
    iddepartement varchar(20),
    idemploye varchar(20)
);

insert into departement_employe(iddepartement,idemploye) values ('departement1','emp1') , ('departement1','emp2') , ('departement2','emp3') , ('departement2','emp4') , ('departement3','emp5') , ('departement3','emp6') , ('departement2','emp7') , ('departement1','emp8') ;

create table Type_Conger(
idType_conger int,
Nom_conger varchar(30),
jour_max int
);

insert into Type_conger(idType_conger,Nom_conger,jour_max) values (1,'matterniter',180) , (2,'patternitter',3) , (3, 'conger',30) , (4,'permission',10);


create table Conger(
idConge serial,
idemploye varchar(40),
libelle text,
iddepartement varchar(20),
jour_conger int,
idType_conger int,
date_deb date default null,
date_fin date default null,
annee int,
desicionnaire varchar(10)
);

create or replace view v_conger as
select ca.nom as nom , ca.prenom as prenom , c.idConge as idConge,c.idemploye as idemploye , c.libelle as libelle , c.iddepartement as iddepartement ,c.jour_conger as jour_conger , t.nom_conger as idType_conger , c.date_deb as date_deb , c.date_fin as date_fin , c.annee as annee , c.desicionnaire as desicionnaire from candidat as ca inner join employe as e on ca.idcandidat=e.idcandidat inner join Conger as c on e.idemploye=c.idemploye inner join type_conger as t on c.idtype_conger = t.idtype_conger ;


create or replace view v_candidat_employe as
select c.nom as nom , c.prenom as prenom , e.idemploye as idemploye from employe as e inner join candidat as c on e.idcandidat=c.idcandidat ;



---- view -----

---employer naka conger

 create or replace view v_employe_conger as
 select idemploye from Conger group by idemploye;

---employer naka conger tao anatin departement----

create or replace view v_employe_conger_dep as select d.idemploye as idemploye , d.iddepartement as iddepartement from v_employe_conger as v inner join departement_employe as d on v.idemploye=d.idemploye;

-- getting date and hour from all departement

create or replace view v_date_departement as
select d.iddepartement as iddepartement , c.date_deb as date_deb from Conger as c inner join departement_employe as d on c.idemploye = d.idemploye;

---nombre d'employer partit en congé et total nombre d'employe dans un departement---

CREATE OR REPLACE FUNCTION total_emp_dep(id varchar)
    RETURNS int
     LANGUAGE PLPGSQL
    AS
    $BODY$
    declare
    res int;
    BEGIN
    select count(idemploye) into res from departement_employe where iddepartement = id ;
    return res;
   end;
   $BODY$;

create or replace view v_total_emp_dep_cong as
 select count(idemploye) as nbre , iddepartement , total_emp_dep(iddepartement) as total from v_employe_conger_dep group by iddepartement;

-- create table salaire(
-- idemploye varchar(20),
-- sme float
-- );
--  Salaire 04/10/2022
-- create or replace view detail_employe as select * from employe join candidat using (idcandidat);
create or replace view detail_employe as select idemploye,horaire_travail,debut_service,nom,prenom,email,mdp,adresse,sex,datenaissance,experience,diplome,numerocnaps from employe join candidat using (idcandidat);

select * from detail_employe;



drop table poste_emp cascade;
create table poste_emp(
    idposte varchar(30) not null,
    idemploye varchar(30) not null,
    etat integer default 1
);


insert into poste_emp(idposte,idemploye) values ('poste1','emp1');
insert into poste_emp(idposte,idemploye) values ('poste1','emp2');



select * from poste_emp;

-- taux ancienneté
-- Diplome en bacc + int
-- Annee experience

-- salaire = taux * salaire minimum

-- select taux_salaire('emp1');

   CREATE OR REPLACE FUNCTION taux_salaire(idemp varchar)
    RETURNS float
     LANGUAGE PLPGSQL
    AS
    $BODY$
    declare
    moisanciennete integer ;
    salaire double precision;
    -- diplome int ;
    -- anciennete int;
    BEGIN
    salaire =1.123;
    -- select salmin from detail_employe join poste_emp using (idemploye) join poste using (idposte) where idemploye=idemp into salaireminimum;
    -- select salmax from detail_employe join poste_emp using (idemploye) join poste using (idposte) where idemploye=idemp into salairemaximum;
    -- select extract(month from (now()-debut_service)) from detail_employe where idemploye=idemp into anciennete;
    -- if salaireminimum*(anciennete/100) > salairemaximum THEN
    --     salaire = salairemaximum;
    -- ELSE

    --     salaire = salaireminimum;
    -- END IF;
    return salaire;
   end;
   $BODY$;

-- Le salaire de l'employé est egal au salaire minimum de son poste fois son taux de salaire , le tout en n'excedant pas le salaire maximum de son poste

   CREATE OR REPLACE FUNCTION salaire_brut_emp(idemp varchar)
    RETURNS double precision
     LANGUAGE PLPGSQL
    AS
    $BODY$
    declare
    taux double precision;
    salaire double precision;
    salaireminimum float ;
    salairemaximum float ;
    anciennete float;
    BEGIN
    select taux_salaire(idemp) into taux;
    select salmin from detail_employe join poste_emp using (idemploye) join poste using (idposte) where idemploye=idemp into salaireminimum;
    select salmax from detail_employe join poste_emp using (idemploye) join poste using (idposte) where idemploye=idemp into salairemaximum;
    select extract(years from (now()-debut_service)) from detail_employe where idemploye=idemp into anciennete;
    if anciennete = 0 then
    anciennete = 1;
    END IF;
    if salaireminimum*taux > salairemaximum THEN
        salaire = salairemaximum;
    ELSE
        salaire = salaireminimum*taux;
    END IF;
    return salaire;
   end;
   $BODY$;

 select salaire_brut_emp('emp1') as salaire_brut;

 select * from detail_employe full join poste_emp using(idemploye) full join poste using (idposte) where idemploye='emp1' ;

create or replace view detailposteemp as
select idposte,idempnhloye,horaire_travail,debut_service,detail_employe.nom as nomemp,prenom,sex,datenaissance,diplome,salmin,salmax,poste.nom as poste,salaire_brut_emp('emp1') as salairebrut    from detail_employe full join poste_emp using(idemploye) full join poste using (idposte) where idemploye=('emp1');


-- Stockage des fiches de salaire / Table/PDF
-- HISTORIQUE DES SALAIRES DE PERSONNE X
    drop sequence sqfiche;
    create sequence sqfiche;
    alter sequence sqfiche restart;

    create table fichesalaire(
        idfichesalaire varchar(20) primary key not null default 'fiche'||nextval('sqfiche'),
        salairebrut double precision,
        anciennete double precision,
        heuresupp50 double precision,
        heurenuit double precision
    );


    create table datefichesalaire(
        idemploye varchar(30),
        datedebut timestamp default CURRENT_TIMESTAMP,
        datefin timestamp,
        idfichesalaire varchar(30),
        foreign key(idfichesalaire) references fichesalaire(idfichesalaire)
    );

    create table type_mouvement(
     idtype_mouvement serial,
     mouvement varchar(30)
    );

    insert into type_mouvement(mouvement) values ('supplementaire') , ('nuit') , ('absence') ;

    create table Mouvement(
        idemploye varchar(30),
        Mois INTEGER,
        semaine INTEGER,
        Jour INTEGER,
        heure INTEGER,
        annee INTEGER,
        type_mouvement int references type_mouvement(idtype_mouvement),
        date_mouvement date default current_date
    );


insert into Mouvement(idemploye,Mois,semaine,Jour,heure,annee,type_mouvement) values ('emp1',1,1,1,16,2022,1) ,  ('emp1',1,1,2,16,2022,1) ,  ('emp1',1,1,3,13,2022,1) ,   ('emp1',1,1,4,6,2022,1) ,  ('emp1',1,1,5,10,2022,1) ,  ('emp1',1,1,5,10,2022,2)  ,  ('emp1',1,1,7,10,2022,2) , ('emp1',1,1,4,10,2022,3) ,


insert into Mouvement(idemploye,Mois,semaine,Jour,heure,annee,type_mouvement) values ('emp2',1,1,1,10,2022,1) ,  ('emp2',1,1,2,10,2022,1) ,  ('emp2',1,1,3,10,2022,1) ,   ('emp2',1,1,4,6,2022,1) ,  ('emp2',1,1,5,10,2022,1) ,  ('emp2',1,1,5,5,2022,2)  ,  ('emp2',1,1,7,5,2022,2) , ('emp2',1,1,4,4,2022,3) ;

insert into Mouvement(idemploye,Mois,semaine,Jour,heure,annee,type_mouvement) values ('emp2',1,1,1,10,2010,3);



/* fonction maka heure supp rehetra  */
create or replace view v_get_heure
as select idemploye , getheuresupp8(sum(heure),40) as heuresupp8 , getheuresupp50(sum(heure),40) as heuresupp50 , sum(heure) as total_heure , annee  , Mois  from Mouvement where type_mouvement=1 group by idemploye , annee , Mois ;


/* fonction maka heure supp nuit  */
create or replace view v_get_heure_nuit
as select idemploye , sum(heure) as total_heure , annee  , Mois  from Mouvement where type_mouvement=2 group by idemploye , annee , Mois ;

/* fonction maka heure absnece */
create or replace view v_get_heure_abscence
as select idemploye , sum(heure) as total_heure , annee  , Mois  from Mouvement where type_mouvement=3 group by idemploye , annee , Mois ;




create or replace FUNCTION  getheuresupp8(heure_vita bigint,total_heure int)
    RETURNS int
 LANGUAGE PLPGSQL
        AS
        $BODY$
        declare
        resultat int;
        BEGIN
        if heure_vita-total_heure>=8 then
            resultat = 8;
        else
            resultat = 0;
        end if;
        return resultat;
    end;
    $BODY$;


create or replace FUNCTION  getheuresupp50(heure_vita bigint,total_heure int)
    RETURNS int
 LANGUAGE PLPGSQL
        AS
        $BODY$
        declare
        resultat int;
        BEGIN
        if heure_vita-total_heure>8 then
            resultat = (heure_vita - total_heure) - 8 ;
        else
            resultat = 0;
        end if;
        return resultat;
    end;
    $BODY$;

/* fonction travail nuit  */


-- Firy h ny h supp vitanty dans l intervalle datedebut a datefin
--
-- functionheuresupp+8(idemp, datedebut,datefin)
--  salaire brut anle emp
-- Firy h ny h supp vitanty dans l intervalle datedebut a datefin
/* irsa */


select sum(salaire_base) as total_base , sum(total_ret) as total_ret , sum(heure_supp_30+heure_supp_40+heure_supp_50+heure_supp_100) as total_supp , sum(salairebrut) as total_salairebrut , sum(cnaps) as total_cnaps
, sum(sanitaire) as total_sanitaire , sum(montant_amp) as total_montant_amp ,sum(net_a_payer) as total_net_a_payer
, sum(avance) as total_avance from fiche_paie;

create table fiche_paie(
idemploye varchar(20),
nom varchar(20),
prenom varchar(20),
date_embauche date,
fonction varchar(50),
num_cnaps varchar(20),
salaire_base double precision,
taux_journalier double precision,
taux_horaire double precision,
datepaie date,
absc_deductible int,
heure_supp_30 double precision,
heure_supp_40 double precision,
heure_supp_50 double precision,
heure_supp_100 double precision,
m_nuit double precision,
prime double precision,
periode_ant double precision,
droit_conger double precision,
droit_preavis double precision,
licencement double precision,
salairebrut double precision,
cnaps double precision,
sanitaire double precision,
irsa_inf_350 double precision,
irsa_350_400 double precision,
irsa_400_500 double precision,
irsa_500_600 double precision,
irsa_supp_600 double precision,
total_irsa double precision,
total_ret double precision,
avance double precision,
net_a_payer double precision,
montant_amp double precision,
annee int,
mois int
);

CREATE OR REPLACE FUNCTION check_IRSA1(salaire double precision)
        RETURNS double precision
        LANGUAGE PLPGSQL
        AS
        $BODY$
        declare
        salairebrut double precision;
        BEGIN
        salairebrut=salaire;
        if  salairebrut>350000 then
            salairebrut=(salairebrut*5)/100;
        else
            salairebrut = 0;
        end if;
        salairebrut = (400000-350000)*5/100;
        return salairebrut;
    end;
    $BODY$;



   CREATE OR REPLACE FUNCTION check_IRSA2(salaire double precision)
    RETURNS double precision
     LANGUAGE PLPGSQL
    AS
    $BODY$
    declare
    salairebrut double precision;
    BEGIN
    salairebrut=salaire;
    if  salairebrut>400000 then
        salairebrut=(salairebrut*10)/100;
    else
    salairebrut = 0;
    end if;
  -- Tokony 500000-400000
        salairebrut = (500000-400000)*10/100;
    return salairebrut;
   end;
   $BODY$;



   CREATE OR REPLACE FUNCTION check_IRSA3(salaire double precision)
    RETURNS double precision
     LANGUAGE PLPGSQL
    AS
    $BODY$
    declare
    salairebrut double precision;
    BEGIN
    salairebrut=salaire;
    if  salairebrut>500000 then
        salairebrut=(salairebrut*10)/100;
    else
        salairebrut = 0;
    end if;
        -- Tokony 600000-500000
            salairebrut = (600000-500000)*15/100;
    return salairebrut;
   end;
   $BODY$;


   CREATE OR REPLACE FUNCTION check_IRSA4(salaire double precision)
    RETURNS double precision
     LANGUAGE PLPGSQL
    AS
    $BODY$
    declare
    salairebrut double precision;
    BEGIN
    salairebrut=salaire;
    if salairebrut>600000 then
    -- Checked
        salairebrut= (salaire-600000)*20/100;
    else
        salairebrut = 0;
    end if;
    return salairebrut;
   end;
   $BODY$;
