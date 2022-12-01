CREATE TABLE Symptome(
   idSymptome INT AUTO_INCREMENT,
   libelle VARCHAR(50),
   PRIMARY KEY(idSymptome)
);

CREATE TABLE Depistage(
   idDepistage INT AUTO_INCREMENT,
   libelle VARCHAR(50),
   PRIMARY KEY(idDepistage)
);

CREATE TABLE Type(
   idType INT AUTO_INCREMENT,
   libelle VARCHAR(50),
   PRIMARY KEY(idType)
);

CREATE TABLE Transmission(
   idTransmission INT AUTO_INCREMENT,
   libelle VARCHAR(50),
   PRIMARY KEY(idTransmission)
);

CREATE TABLE IST(
   idIst INT AUTO_INCREMENT,
   nom VARCHAR(50),
   vaccin BOOLEAN,
   description VARCHAR(150),
   Guerissable BOOLEAN,
   image VARCHAR(50),
   dureeIncubation VARCHAR(30),
   idType INT NOT NULL,
   PRIMARY KEY(idIst),
   FOREIGN KEY(idType) REFERENCES Type(idType)
);

CREATE TABLE Concerner(
   idIst INT,
   idSymptome INT,
   concerneHomme BOOLEAN,
   concerneFemme BOOLEAN,
   PRIMARY KEY(idIst, idSymptome),
   FOREIGN KEY(idIst) REFERENCES IST(idIst),
   FOREIGN KEY(idSymptome) REFERENCES Symptome(idSymptome)
);

CREATE TABLE Detecter(
   idIst INT,
   idDepistage INT,
   PRIMARY KEY(idIst, idDepistage),
   FOREIGN KEY(idIst) REFERENCES IST(idIst),
   FOREIGN KEY(idDepistage) REFERENCES Depistage(idDepistage)
);

CREATE TABLE Transmettre(
   idIst INT,
   idTransmission INT,
   PRIMARY KEY(idIst, idTransmission),
   FOREIGN KEY(idIst) REFERENCES IST(idIst),
   FOREIGN KEY(idTransmission) REFERENCES Transmission(idTransmission)
);
