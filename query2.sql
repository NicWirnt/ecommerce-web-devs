Create database my_store;
use my_store;
CREATE Table Customers (
    ID int primary key AUTO_INCREMENT,
    LastName varchar(50) not null,
    FirstName varchar(50) not null,
    Email varchar(255) not null,
    Address1 varchar(255) not null,
    Credential_pass varchar(255) not null,
    City varchar(50) not null,
    PostalCode varchar(50),
    Country varchar(100) not null,
    Phone varchar(50),
    CreditCard varchar(50) not null,
    CardExpYear DateTime,
    ShipAddress varchar(255),
    ShipCity varchar(100),
    ShipRegion varchar(100),
    CreatedDate DateTime,
    UpdatedDate DateTime
);

CREATE Table Admin (
    ID int primary key AUTO_INCREMENT,
    Username varchar(100) not null,
    Email varchar(255) not null,
    CreatedDate DateTime,
    UpdatedDate DateTime
);
Create Table Categories (
    CategoryId int primary key AUTO_INCREMENT,
    CategoryName varchar(255),
    CategoryDescription varchar(255),
    Picture varbinary(65535),
    Active boolean
);
Create Table Suppliers (
    SupplyId int primary key AUTO_INCREMENT,
    CompanyName varchar(255) not null,
    Address1 varchar(255),
    City varchar(50),
    Phone varchar(50),
    Email varchar(100),
    Discount float,
    Notes varchar(255)
);
Create Table Products(
    ProductId int primary key AUTO_INCREMENT,
    ProductName varchar(255) not null,
    ProductDescription varchar(255) not null,
    SupplierId int not null,
    CategoryId int not null,
    QuantityPerUnits int not null,
    UnitPrice float not null,
    AvailableSize varchar(100),
    AvailableColor varchar(100),
    UnitWeight float not null,
    UnitInStock int not null,
    UnitOnOrder int not null,
    ProductAvailable boolean,
    DiscountAvailable boolean,
    Notes varchar(255),
    CONSTRAINT FK_CategoryProduct
    FOREIGN KEY (CategoryId) REFERENCES Categories(CategoryId),
    CONSTRAINT FK_SupplyProduct
    FOREIGN KEY (SupplierId) REFERENCES Suppliers(SupplyId),
    CONSTRAINT CHK_Quantity CHECK (QuantityPerUnits >= 0)
);
Create Table PaymentType (
    TypeId int primary key AUTO_INCREMENT,
    PaymentType varchar(100) not null
);
Create TABLE Payment (
    PaymentId int primary key AUTO_INCREMENT,
    PaymentTypeId int not null,
    CardHolderName varchar(255) not null,
    CONSTRAINT FK_PaymentType FOREIGN KEY (PaymentTypeId)
    REFERENCES PaymentType(TypeId)
);
Create Table Status (
    StatusId int primary key,
    DescriptionStatus varchar(200)
);
Create Table Orders(
    OrderId int primary key AUTO_INCREMENT,
    CustomerId int not null,
    OrderNumber int not null,
    PaymentId int not null,
    OrderDate DateTime not null,
    ShipDate DateTime not null,
    SalesTax float not null,
    OrderTimeStamp DateTime not null,
    TransactionStatusId int not null,
    ErrorLocation varchar(255),
    ErrorMsg varchar(255),
    Fullfilled boolean,
    Deleted boolean,
    Paid boolean not null,
    PaymentDate DateTime not null,
    CONSTRAINT FK_OrderStatus
    FOREIGN KEY (TransactionStatusId) REFERENCES Status(StatusId),
    CONSTRAINT FK_OrderPayment
    FOREIGN KEY (PaymentId) REFERENCES Payment(PaymentId),
    CONSTRAINT FK_CustomerOrder
    FOREIGN KEY (CustomerId) REFERENCES Customers(ID)
);
Create Table OrderDetails (
    OrderDetailsId int primary key AUTO_INCREMENT,
    OrderId int not null,
    ProductId int not null,
    OrderNumber int not null,
    Price float not null,
    Quantity int not null,
    Discount float,
    Total float,
    Size varchar(100),
    Color varchar(50),
    Fullfilled boolean,
    ShipDate DateTime,
    BillDate DateTime,
    CONSTRAINT FK_OrderDetails
    FOREIGN KEY (OrderId) REFERENCES Orders(OrderId),
    CONSTRAINT FK_OrderProduct
    FOREIGN KEY (ProductId) REFERENCES Products(ProductId)
);


/*Insert Query*/

/*Admin*/
INSERT INTO `admin` (`ID`, `Username`, `Email`, `CreatedDate`, `UpdatedDate`) VALUES ('1', 'admin', 'admin@gmail.com', '2023-08-01 09:58:26', '2023-08-01 09:58:26');

/*Category with No Image*/
INSERT INTO `categories` (`CategoryId`, `CategoryName`, `CategoryDescription`, `Active`) VALUES ('1', 'IPhone', 'Iphone devices',1);
INSERT INTO `categories` (`CategoryId`, `CategoryName`, `CategoryDescription`, `Active`) VALUES ('2', 'Samsung', 'Samsung devices',1);
INSERT INTO `categories` (`CategoryId`, `CategoryName`, `CategoryDescription`, `Active`) VALUES ('3', 'Phone Cases', 'Phone Cases',1);
INSERT INTO `categories` (`CategoryId`, `CategoryName`, `CategoryDescription`, `Active`) VALUES ('4', 'Headphones', 'Headphones',1);
INSERT INTO `categories` (`CategoryId`, `CategoryName`, `CategoryDescription`, `Active`) VALUES ('5', 'Keyboard', 'Keyboard',1);
INSERT INTO `categories` (`CategoryId`, `CategoryName`, `CategoryDescription`, `Active`) VALUES ('6', 'Mouse', 'Mouse',1);

/*Customers*/
INSERT INTO `customers` (`ID`, `LastName`, `FirstName`, `Email`, `Address1`, `Credential_pass`, `City`, `PostalCode`, `Country`, `Phone`, `CreditCard`, `CardExpYear`, `ShipAddress`, `ShipCity`, `ShipRegion`, `CreatedDate`, `UpdatedDate`) VALUES ('1', 'Moore', 'Julia', 'julia.moore@gmail.com', '2030 Zetland NSW', 'JuliaMoore2030', 'Sydney', '2020', 'Australia', '0456783219', '0987564732187650', '2023-08-26 10:09:17', '2030 Zetland NSW', 'Sydney', NULL, '2023-08-09 10:09:17', '2023-08-09 10:09:17');
INSERT INTO `customers` (`ID`, `LastName`, `FirstName`, `Email`, `Address1`, `Credential_pass`, `City`, `PostalCode`, `Country`, `Phone`, `CreditCard`, `CardExpYear`, `ShipAddress`, `ShipCity`, `ShipRegion`, `CreatedDate`, `UpdatedDate`) VALUES ('2', 'Park', 'Daniel', 'daniel.park22@gmail.com', '509 Marrickville NSW', 'DanPark@22', 'Sydney', '2018', 'Australia', '0987456215', '0987564737634650', '2023-08-26 10:09:17', '10 Pitt St NSW', 'Sydney', NULL, '2023-08-09 10:09:17', '2023-08-09 10:09:17');
INSERT INTO `customers` (`ID`, `LastName`, `FirstName`, `Email`, `Address1`, `Credential_pass`, `City`, `PostalCode`, `Country`, `Phone`, `CreditCard`, `CardExpYear`, `ShipAddress`, `ShipCity`, `ShipRegion`, `CreatedDate`, `UpdatedDate`) VALUES ('3', 'Alexendre', 'Han', 'han.alexendria@gmail.com', '698 Zetland NSW', 'HanAlex698', 'Sydney', '2016', 'Australia', '0456783219', '0987564732187650', '2023-08-26 10:09:17', '123 Eastgarden NSW', 'Sydney', NULL, '2023-08-09 10:09:17', '2023-08-09 10:09:17');
INSERT INTO `customers` (`ID`, `LastName`, `FirstName`, `Email`, `Address1`, `Credential_pass`, `City`, `PostalCode`, `Country`, `Phone`, `CreditCard`, `CardExpYear`, `ShipAddress`, `ShipCity`, `ShipRegion`, `CreatedDate`, `UpdatedDate`) VALUES ('4', 'Tran', 'Sam', 'sam.tran@gmail.com', '678 Rosebery NSW', 'SamTran678', 'Sydney', '2017', 'Australia', '0456783219', '0987564732187650', '2023-08-26 10:09:17', '6789 Alexandria NSW', 'Sydney', NULL, '2023-08-09 10:09:17', '2023-08-09 10:09:17');
INSERT INTO `customers` (`ID`, `LastName`, `FirstName`, `Email`, `Address1`, `Credential_pass`, `City`, `PostalCode`, `Country`, `Phone`, `CreditCard`, `CardExpYear`, `ShipAddress`, `ShipCity`, `ShipRegion`, `CreatedDate`, `UpdatedDate`) VALUES ('5', 'Jung', 'Hyo', 'hyo.jung@gmail.com', '1023 Redfern NSW', 'HyoJung1023', 'Sydney', '2022', 'Australia', '0456783219', '0987564732187650', '2023-08-26 10:09:17', '674 Bankstown NSW', 'Sydney', NULL, '2023-08-09 10:09:17', '2023-08-09 10:09:17');
INSERT INTO `customers` (`ID`, `LastName`, `FirstName`, `Email`, `Address1`, `Credential_pass`, `City`, `PostalCode`, `Country`, `Phone`, `CreditCard`, `CardExpYear`, `ShipAddress`, `ShipCity`, `ShipRegion`, `CreatedDate`, `UpdatedDate`) VALUES ('6', 'Cooper', 'Brad', 'brad.cooper@gmail.com', '111  Randwick NSW', 'BradCoop111', 'Sydney', '2008', 'Australia', '0456783219', '0987564732187650', '2023-08-26 10:09:17', '11 Padstow NSW', 'Sydney', NULL, '2023-08-09 10:09:17', '2023-08-09 10:09:17');
INSERT INTO `customers` (`ID`, `LastName`, `FirstName`, `Email`, `Address1`, `Credential_pass`, `City`, `PostalCode`, `Country`, `Phone`, `CreditCard`, `CardExpYear`, `ShipAddress`, `ShipCity`, `ShipRegion`, `CreatedDate`, `UpdatedDate`) VALUES ('7', 'White', 'Casan', 'casan.white@gmail.com', '444 Botany NSW', 'CasanWhite444', 'Sydney', '2015', 'Australia', '0456783219', '0987564732187650', '2023-08-26 10:09:17', '3344 Mascot NSW', 'Sydney', NULL, '2023-08-09 10:09:17', '2023-08-09 10:09:17');

/*Payment Type*/
INSERT INTO `paymenttype` (`TypeId`, `PaymentType`) VALUES ('1', 'Credit Card');
INSERT INTO `paymenttype` (`TypeId`, `PaymentType`) VALUES ('2', 'Cash');

/*Status*/
INSERT INTO `status` (`StatusId`, `DescriptionStatus`) VALUES ('0', 'Unavailable');
INSERT INTO `status` (`StatusId`, `DescriptionStatus`) VALUES ('1', 'Available');

/*Supliers*/
INSERT INTO `suppliers` (`SupplyId`, `CompanyName`, `Address1`, `City`, `Phone`, `Email`, `Discount`, `Notes`) VALUES ('1', 'Apple', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `suppliers` (`SupplyId`, `CompanyName`, `Address1`, `City`, `Phone`, `Email`, `Discount`, `Notes`) VALUES ('2', 'Samsung', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `suppliers` (`SupplyId`, `CompanyName`, `Address1`, `City`, `Phone`, `Email`, `Discount`, `Notes`) VALUES ('3', 'Xiaomi', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `suppliers` (`SupplyId`, `CompanyName`, `Address1`, `City`, `Phone`, `Email`, `Discount`, `Notes`) VALUES ('4', 'Logitech', NULL, NULL, NULL, NULL, NULL, NULL);

/*Products*/
INSERT INTO `products` (`ProductId`, `ProductName`, `ProductDescription`, `SupplierId`, `CategoryId`, `QuantityPerUnits`, `UnitPrice`, `AvailableSize`, `AvailableColor`, `UnitWeight`, `UnitInStock`, `UnitOnOrder`, `ProductAvailable`, `DiscountAvailable`, `Notes`) VALUES ('1', 'Iphone 11', 'Iphone 11', '1', '1', '1', '1100', NULL, NULL, '900', '10', '1', '1', '1', NULL);
INSERT INTO `products` (`ProductId`, `ProductName`, `ProductDescription`, `SupplierId`, `CategoryId`, `QuantityPerUnits`, `UnitPrice`, `AvailableSize`, `AvailableColor`, `UnitWeight`, `UnitInStock`, `UnitOnOrder`, `ProductAvailable`, `DiscountAvailable`, `Notes`) VALUES ('2', 'Iphone 12', 'Iphone 12', '1', '1', '1', '1200', NULL, NULL, '1300', '5', '1', '1', '1', NULL);
INSERT INTO `products` (`ProductId`, `ProductName`, `ProductDescription`, `SupplierId`, `CategoryId`, `QuantityPerUnits`, `UnitPrice`, `AvailableSize`, `AvailableColor`, `UnitWeight`, `UnitInStock`, `UnitOnOrder`, `ProductAvailable`, `DiscountAvailable`, `Notes`) VALUES ('3', 'Samsung Z Fold', 'Samsung Z Fold', '2', '2', '1', '1500', NULL, NULL, '1000', '21', '1', '1', '1', NULL);
INSERT INTO `products` (`ProductId`, `ProductName`, `ProductDescription`, `SupplierId`, `CategoryId`, `QuantityPerUnits`, `UnitPrice`, `AvailableSize`, `AvailableColor`, `UnitWeight`, `UnitInStock`, `UnitOnOrder`, `ProductAvailable`, `DiscountAvailable`, `Notes`) VALUES ('4', 'Keyboard Logitech', 'Keyboard Logitech', '4', '5', '1', '200', NULL, NULL, '400', '7', '1', '1', '1', NULL);
INSERT INTO `products` (`ProductId`, `ProductName`, `ProductDescription`, `SupplierId`, `CategoryId`, `QuantityPerUnits`, `UnitPrice`, `AvailableSize`, `AvailableColor`, `UnitWeight`, `UnitInStock`, `UnitOnOrder`, `ProductAvailable`, `DiscountAvailable`, `Notes`) VALUES ('5', 'Headphone', 'Headphone Xiaomi', '3', '4', '1', '350', NULL, 'White', '280', '6', '1', '1', '0', NULL);

-- I need to update this column -- pass@123
ALTER TABLE admin add pass varchar(250); 
