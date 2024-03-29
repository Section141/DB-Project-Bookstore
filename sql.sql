use szm0227db;

CREATE TABLE Supplier (
SupplierID INT NOT NULL,
CompanyName VARCHAR(15), 
ContactLastName VARCHAR(15), 
ContactFirstName VARCHAR(15), 
Phone VARCHAR(15),
PRIMARY KEY(SupplierID));

CREATE TABLE Subject (
SubjectID INT NOT NULL, 
CategoryName VARCHAR(15), 
PRIMARY KEY(SubjectID));

CREATE TABLE Shipper (
ShipperID INT NOT NULL,
ShipperName VARCHAR(15),
PRIMARY KEY(ShipperID));

CREATE TABLE Book(
BookID INT NOT NULL, 
Title VARCHAR(15), 
UnitPrice FLOAT, 
Author VARCHAR(15),
Quantity INT,
SupplierID INT(11),
SubjectID INT(11),
PRIMARY KEY(BookID), 
FOREIGN KEY(SupplierID) REFERENCES Supplier(SupplierID), 
FOREIGN KEY(SubjectID) REFERENCES Subject(SubjectID));

CREATE TABLE Customer (
CustomerID INT NOT NULL, 
LastName VARCHAR(15), 
FirstName VARCHAR(15), 
Phone VARCHAR(15), 
PRIMARY KEY(CustomerID));

CREATE TABLE Employee (
EmployeeID INT NOT NULL, 
LastName VARCHAR(15), 
FirstName VARCHAR(15), 
PRIMARY KEY(EmployeeID));

CREATE TABLE Orders (
OrderID INT NOT NULL, 
CustomerID INT NOT NULL, 
EmployeeID INT NOT NULL, 
OrderDate DATE, 
ShippedDate DATE, 
ShipperID INT, 
PRIMARY KEY(OrderID), 
FOREIGN KEY(CustomerID) REFERENCES Customer(CustomerID), 
FOREIGN KEY(EmployeeID) REFERENCES Employee(EmployeeID) );

CREATE TABLE OrderDetail(
BookID INT NOT NULL, 
OrderID INT NOT NULL, 
Quantity INT,  
FOREIGN KEY(BookID) REFERENCES Book(BookID),  
FOREIGN KEY(OrderID) REFERENCES Orders(OrderID));

INSERT INTO Supplier (SupplierID, CompanyName, ContactLastName, ContactFirstName, Phone) VALUES (1, 'supplier1', 'company1', 'company1', '1111111111');
INSERT INTO Supplier (SupplierID, CompanyName, ContactLastName, ContactFirstName, Phone) VALUES (2, 'supplier2', 'company2', 'company2', '2222222222');
INSERT INTO Supplier (SupplierID, CompanyName, ContactLastName, ContactFirstName, Phone) VALUES (3, 'supplier3', 'company3', 'company3', '3333333333');
INSERT INTO Supplier (SupplierID, CompanyName, ContactLastName, ContactFirstName, Phone) VALUES (4, 'supplier4', 'company4', '', '4444444444');

INSERT INTO Subject (SubjectID, CategoryName) VALUES (1, 'category1');
INSERT INTO Subject (SubjectID, CategoryName) VALUES (2, 'category2');
INSERT INTO Subject (SubjectID, CategoryName) VALUES (3, 'category3');
INSERT INTO Subject (SubjectID, CategoryName) VALUES (4, 'category4');
INSERT INTO Subject (SubjectID, CategoryName) VALUES (5, 'category5');

INSERT INTO Shipper (ShipperID, ShipperName) VALUES (1, 'shipper1');
INSERT INTO Shipper (ShipperID, ShipperName) VALUES (2, 'shipper2');
INSERT INTO Shipper (ShipperID, ShipperName) VALUES (3, 'shipper3');
INSERT INTO Shipper (ShipperID, ShipperName) VALUES (4, 'shipper4');

INSERT INTO Book (BookID, Title, UnitPrice, Author, Quantity, SupplierID, SubjectID) VALUES (1, 'book1', 12.34, 'author1', 5, 3, 1);
INSERT INTO Book (BookID, Title, UnitPrice, Author, Quantity, SupplierID, SubjectID) VALUES (2, 'book2', 56.68, 'author2', 2, 3, 1);
INSERT INTO Book (BookID, Title, UnitPrice, Author, Quantity, SupplierID, SubjectID) VALUES (3, 'book3', 90.12, 'author3', 10, 2, 1);
INSERT INTO Book (BookID, Title, UnitPrice, Author, Quantity, SupplierID, SubjectID) VALUES (4, 'book4', 34.56, 'author4', 12, 3, 2);
INSERT INTO Book (BookID, Title, UnitPrice, Author, Quantity, SupplierID, SubjectID) VALUES (5, 'book5', 78.9, 'author5', 5, 2, 2);
INSERT INTO Book (BookID, Title, UnitPrice, Author, Quantity, SupplierID, SubjectID) VALUES (6, 'book6', 12.34, 'author6', 30, 1, 3);
INSERT INTO Book (BookID, Title, UnitPrice, Author, Quantity, SupplierID, SubjectID) VALUES (7, 'book7', 56.9, 'author2', 17, 3, 4);
INSERT INTO Book (BookID, Title, UnitPrice, Author, Quantity, SupplierID, SubjectID) VALUES (8, 'book8', 33.44, 'author7', 2, 1, 3);

INSERT INTO Customer (CustomerID, LastName, FirstName, Phone) VALUES (1, 'lastname1', 'firstname1', '334-001-001');
INSERT INTO Customer (CustomerID, LastName, FirstName, Phone) VALUES (2, 'lastname2', 'firstname2', '334-002-002');
INSERT INTO Customer (CustomerID, LastName, FirstName, Phone) VALUES (3, 'lastname3', 'firstname3', '334-003-003');
INSERT INTO Customer (CustomerID, LastName, FirstName, Phone) VALUES (4, 'lastname4', 'firstname4', '334-004-004');

INSERT INTO Employee (EmployeeID, LastName, FirstName) VALUES (1, 'lastname5', 'firstname5');
INSERT INTO Employee (EmployeeID, LastName, FirstName) VALUES (2, 'lastname6', 'firstname6');
INSERT INTO Employee (EmployeeID, LastName, FirstName) VALUES (3, 'lastname6', 'firstname9');

INSERT INTO Orders (OrderID, CustomerID, EmployeeID, OrderDate, ShippedDate, ShipperID) VALUES (1, 1, 1, '2016-08-01', '2016-08-03', 1);
INSERT INTO Orders (OrderID, CustomerID, EmployeeID, OrderDate, ShippedDate, ShipperID) VALUES (2, 1, 2, '2016-08-04', null, null);
INSERT INTO Orders (OrderID, CustomerID, EmployeeID, OrderDate, ShippedDate, ShipperID) VALUES (3, 2, 1, '2016-08-01', '2016-08-04', 2);
INSERT INTO Orders (OrderID, CustomerID, EmployeeID, OrderDate, ShippedDate, ShipperID) VALUES (4, 4, 2, '2016-08-04', '2016-08-04', 1);
INSERT INTO Orders (OrderID, CustomerID, EmployeeID, OrderDate, ShippedDate, ShipperID) VALUES (5, 1, 1, '2016-08-04', '2016-08-05', 1);
INSERT INTO Orders (OrderID, CustomerID, EmployeeID, OrderDate, ShippedDate, ShipperID) VALUES (6, 4, 2, '2016-08-04', '2016-08-05', 1);
INSERT INTO Orders (OrderID, CustomerID, EmployeeID, OrderDate, ShippedDate, ShipperID) VALUES (7, 3, 1, '2016-08-04', '2016-08-04', 1);

INSERT INTO OrderDetail (BookID, OrderID, Quantity) VALUES (1, 1, 2);
INSERT INTO OrderDetail (BookID, OrderID, Quantity) VALUES (4, 1, 1);
INSERT INTO OrderDetail (BookID, OrderID, Quantity) VALUES (6, 2, 2);
INSERT INTO OrderDetail (BookID, OrderID, Quantity) VALUES (7, 2, 3);
INSERT INTO OrderDetail (BookID, OrderID, Quantity) VALUES (5, 3, 1);
INSERT INTO OrderDetail (BookID, OrderID, Quantity) VALUES (3, 4, 2);
INSERT INTO OrderDetail (BookID, OrderID, Quantity) VALUES (4, 4, 1);
INSERT INTO OrderDetail (BookID, OrderID, Quantity) VALUES (7, 4, 1);
INSERT INTO OrderDetail (BookID, OrderID, Quantity) VALUES (1, 5, 1);
INSERT INTO OrderDetail (BookID, OrderID, Quantity) VALUES (1, 6, 2);
INSERT INTO OrderDetail (BookID, OrderID, Quantity) VALUES (1, 7, 1);
