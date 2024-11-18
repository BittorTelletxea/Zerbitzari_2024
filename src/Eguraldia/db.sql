CREATE DATABASE egurladia;

use eguraldia;

CREATE TABLE herria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    izena VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE iragarpena_eguna (
    id INT AUTO_INCREMENT PRIMARY KEY,
    herria_id INT NOT NULL,
    eguna DATE NOT NULL,
    iragarpena_testua TEXT,
    eguraldia VARCHAR(50), 
    tenperatura_minimoa DECIMAL(5, 2),
    tenperatura_maximoa DECIMAL(5, 2),
    FOREIGN KEY (herria_id) REFERENCES herria(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE iragarpena_orduko (
    id INT AUTO_INCREMENT PRIMARY KEY,
    iragarpena_eguna_id INT NOT NULL,
    ordua TIME NOT NULL,
    eguraldia VARCHAR(50), 
    tenperatura DECIMAL(5, 2),
    prezipitazioa DECIMAL(5, 2),
    haizea_nondik VARCHAR(20), 
    haizea_kmh DECIMAL(5, 2),
    FOREIGN KEY (iragarpena_eguna_id) REFERENCES iragarpena_eguna(id) ON DELETE CASCADE
) ENGINE=InnoDB;
