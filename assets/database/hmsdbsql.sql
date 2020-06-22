
CREATE DATABASE IF NOT EXISTS hmsdb;
USE hmsdb;

CREATE TABLE `admin` (
  admin_id  int NOT NULL,
  admin_username varchar(45) DEFAULT NULL,
  admin_password varchar(45) DEFAULT NULL,
  admin_fname varchar(45) DEFAULT NULL,
  admin_lname varchar(45) DEFAULT NULL,
  admin_contact varchar(45) DEFAULT NULL,
  admin_email varchar(45) DEFAULT NULL
);

INSERT INTO admin (admin_id, admin_username, admin_password, admin_fname, admin_lname, admin_contact, admin_email) VALUES
(1, 'admin', 'admin', 'Muhammad', 'Ateeb', '02134596446', 'ateeb@gmail.com');

CREATE TABLE company (
  company_id  int NOT NULL,
  company_name varchar(45) DEFAULT NULL,
  company_description varchar(45) DEFAULT NULL,
  company_contact  int DEFAULT NULL,
  company_address varchar(45) DEFAULT NULL
);

INSERT INTO company (company_id, company_name, company_description, company_contact, company_address) VALUES
(1, 'New Pharma', 'Islamabad based company ', 23234243, 'h-13, Islamabad'),
(2, 'Netsol', 'International supplier', 2147483647, 'Lahore street, Lahore');

CREATE TABLE doctor (
  doc_id  int NOT NULL,
  doc_username varchar(45) NOT NULL,
  doc_password varchar(45) DEFAULT NULL,
  doc_fname varchar(45) DEFAULT NULL,
  doc_lname varchar(45) DEFAULT NULL,
  doc_email varchar(45) DEFAULT NULL,
  doc_contact varchar(45) DEFAULT NULL,
  doc_gender varchar(45) DEFAULT NULL,
  doc_qualification varchar(45) DEFAULT NULL
);

INSERT INTO doctor (doc_id, doc_username, doc_password, doc_fname, doc_lname, doc_email, doc_contact, doc_gender, doc_qualification) VALUES
(1, 'doctor', 'doctor', 'Khaskhali', 'Asim', 'asim@gmail.com', '03134568446', 'male', 'Ph.D'),
(2, 'doc', 'doc', 'Alina', 'Shoaib', 'alina@gmail.com', '030045666', 'FEMALE', 'MBBS'),
(3, 'faisalraza', '54321', 'Faisal', 'Raza', 'raza@gmail.com', '0210112603', 'male', 'Ph.D'),
(4, 'harisingh', 'hari', 'Hari', 'Singh', 'singh@gmail.com', '03321011243', 'male', 'MBBS');

CREATE TABLE inventory (
  inventory_id  int NOT NULL,
  company_id  int NOT NULL,
  medicine_id  int NOT NULL,
  inventory_medquantity  int DEFAULT NULL,
  inventory_shipdate datetime DEFAULT NULL
);

INSERT INTO inventory (inventory_id, company_id, medicine_id, inventory_medquantity, inventory_shipdate) VALUES
(1, 1, 1, 100, '2018-01-01 13:00:00'),
(2, 1, 2, 10, '2019-01-01 14:00:00'),
(3, 1, 2, 90, '2019-04-02 15:00:00'),
(4, 1, 3, 100, '2019-06-14 10:00:00'),
(5, 2, 4, 100, '2018-11-28 09:00:00'),
(6, 2, 5, 100, '2018-07-24 15:02:00'),
(7, 1, 9, 100, '2019-02-22 16:57:00');

CREATE TABLE medicine (
  medicine_id  int NOT NULL,
  medicine_name varchar(45) DEFAULT NULL,
  medicine_type varchar(45) DEFAULT NULL,
  medicine_cost  int DEFAULT NULL,
  medicine_sale  int DEFAULT NULL,
  medicine_quantity  int NOT NULL,
  company_id  int DEFAULT NULL
);

INSERT INTO medicine (medicine_id, medicine_name, medicine_type, medicine_cost, medicine_sale, medicine_quantity, company_id) VALUES
(1, 'Panadol', 'anti-allergic', 12, 15, 100, 1),
(2, 'Brufen', 'fever', 150, 160, 90, 1),
(3, 'Somogel', 'pain releif', 200, 215, 100, 1),
(4, 'Flagyl', 'pain releif', 80, 90, 100, 2),
(5, 'Aspirin', 'Generic', 500, 670, 100, 2),
(9, 'Colpol', 'Generic', 200, 230, 100, 1);

CREATE TABLE patient (
  patient_id  int NOT NULL,
  patient_fname varchar(45) DEFAULT NULL,
  patient_lname varchar(45) DEFAULT NULL,
  patient_email varchar(45) DEFAULT NULL,
  patient_contact varchar(45) DEFAULT NULL,
  patient_gender varchar(45) DEFAULT NULL,
  patient_bg varchar(45) DEFAULT NULL,
  doc_id  int DEFAULT NULL
);

INSERT INTO patient (patient_id, patient_fname, patient_lname, patient_email, patient_contact, patient_gender, patient_bg, doc_id) VALUES
(1, 'Asim', 'hasnat', '123@gmail.com', '90078601', 'MALE', 'B+', 1),
(2, 'Nawaz', 'Sharif', 'sharif@kyunnikla.com', '2147483647', 'male', 'A+', 3),
(3, 'Zardari', 'Asif', 'asif@gmail.com', '210112634', 'male', 'AB-', 1),
(4, 'Kamran', 'Khan', 'kamran@gmail.com', '343221124', 'male', 'B-', 4),
(5, 'Mughees', 'Awan', 'mughees@gmail.com', '12345675', 'male', 'A+', 3),
(6, 'mohsin', 'khan', 'mohsin@gmail.com', '2131231123', 'male', 'A+', 2),
(7, 'Liaquat', 'kamal', 'liaquat@gmail.com', '2147483647', 'male', 'B-', 2),
(8, 'Haider', 'zaid', 'haider@hotmail.com', '2147483647', 'male', 'O+', 1),
(9, 'Awaiz', 'Noor', 'awaiz@seecs.edu.pk', '2147483647', 'male', 'AB+', 4),
(10, 'Amna', 'Khalid', 'khalid@gmail.com', '2147483647', 'female', 'A-', 1),
(11, 'Umair', 'Latif', 'umairlatif@gmail.com', '2131231134', 'male', 'O+', 2),
(12, 'Sarmad', 'Sohail', 'sarmad@gmail.com', '2147483647', 'male', 'B+', 2),
(13, 'Hamza', 'Amjad', 'hamjad@gmail.com', '2147483647', '', 'A+', 2),
(14, 'Ali', 'Asad', 'aasad@gmail.com', '2147483647', 'male', 'O+', 2),
(15, 'Fahad ', 'Imran', 'fimran@gmail.com', '2147483647', 'male', 'B+', 2);

CREATE TABLE pharmacist (
  phar_id  int NOT NULL,
  phar_username varchar(45) NOT NULL,
  phar_password varchar(45) DEFAULT NULL,
  phar_fname varchar(45) NOT NULL,
  phar_lname varchar(45) DEFAULT NULL,
  phar_contact varchar(45) DEFAULT NULL,
  phar_email varchar(45) DEFAULT NULL
);

INSERT INTO pharmacist (phar_id, phar_username, phar_password, phar_fname, phar_lname, phar_contact, phar_email) VALUES
(1, 'phar', 'phar', 'Kamran', 'Akmal', '03454168446', 'akmal@gmail.com');

CREATE TABLE prescription (
  medicine_id  int NOT NULL,
  patient_id  int NOT NULL,
  medicine_quantity  int DEFAULT NULL
);

INSERT INTO prescription (medicine_id, patient_id, medicine_quantity) VALUES
(3, 9, 15),
(4, 7, 5),
(5, 6, 1);


ALTER TABLE admin
  ADD PRIMARY KEY (admin_id),
  ADD UNIQUE KEY admin_username (admin_username);

ALTER TABLE company
  ADD PRIMARY KEY (company_id);

ALTER TABLE doctor
  ADD PRIMARY KEY (doc_id),
  ADD UNIQUE KEY doc_username (doc_username);

ALTER TABLE inventory
  ADD PRIMARY KEY (inventory_id),
  ADD KEY company_id (company_id),
  ADD KEY medicine_id (medicine_id);

ALTER TABLE medicine
  ADD PRIMARY KEY (medicine_id),
  ADD KEY company_id (company_id);

ALTER TABLE patient
  ADD PRIMARY KEY (patient_id),
  ADD KEY doc_id (doc_id);

ALTER TABLE pharmacist
  ADD PRIMARY KEY (phar_id),
  ADD UNIQUE KEY phar_username (phar_username);

ALTER TABLE prescription
  ADD PRIMARY KEY (medicine_id,patient_id),
  ADD KEY patient_id (patient_id);


ALTER TABLE admin
  MODIFY admin_id  int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE company
  MODIFY company_id  int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE doctor
  MODIFY doc_id  int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE inventory
  MODIFY inventory_id  int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE medicine
  MODIFY medicine_id  int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE patient
  MODIFY patient_id  int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

ALTER TABLE pharmacist
  MODIFY phar_id  int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE inventory
  ADD CONSTRAINT inventory_ibfk_1 FOREIGN KEY (company_id) REFERENCES company (company_id),
  ADD CONSTRAINT inventory_ibfk_2 FOREIGN KEY (medicine_id) REFERENCES medicine (medicine_id);

ALTER TABLE medicine
  ADD CONSTRAINT medicine_ibfk_1 FOREIGN KEY (company_id) REFERENCES company (company_id);

ALTER TABLE patient
  ADD CONSTRAINT patient_ibfk_1 FOREIGN KEY (doc_id) REFERENCES doctor (doc_id);

ALTER TABLE prescription
  ADD CONSTRAINT prescription_ibfk_1 FOREIGN KEY (medicine_id) REFERENCES medicine (medicine_id),
  ADD CONSTRAINT prescription_ibfk_2 FOREIGN KEY (patient_id) REFERENCES patient (patient_id);

