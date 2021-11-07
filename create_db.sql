use student_space;
drop table IF EXISTS orders;
drop table IF EXISTS product;
drop table IF EXISTS customer;
drop table IF EXISTS registration;
CREATE TABLE product
(item_no   				numeric(4)   not null,
item_name   			varchar(30)  not null,  
price          		    numeric(9,2) not null,
inventory     			numeric      not null ); 
CREATE TABLE customer
(
cc_no     				numeric(16) not null,   
exp_mo   				numeric(2)   not null,
exp_yr      			numeric(4)   not null,
name_first              varchar(20)  not null,
name_last               varchar(20)  not null,
email                   varchar(20)  not null,
address1                varchar(50)  not null,
address2                varchar(50),
city                    varchar(20)  not null,
state 	                varchar(2)   not null,
zip                     numeric(5)   not null,
country                 varchar(20),
phone                   varchar(15)  not null,
fax                     varchar(15)  not null,
mail_list               numeric(1)     );

CREATE TABLE orders
(       
item_no  				numeric(4)  not null,
cc_no 				    numeric(16) not null,
quantity 				numeric     not null,
date_sold 				date        not null
        );
CREATE TABLE registration
( 
username 				varchar(16), 
password 				varchar(16) not null, 
email 				    varchar(50) not null);

alter table product
 add constraint product_item_no_pk primary key(item_no);

alter table customer
 add constraint customer_cc_no_pk primary key(cc_no);

alter table registration
 add constraint registration_username_pk primary key(username);

alter table orders
 add constraint orders_cc_no_item_no_pk primary key(cc_no,item_no);
 
 
alter table orders
add constraint orders_item_no_fk foreign key (item_no) 
references product(item_no);

alter table orders
add constraint orders_cc_no_fk foreign key (cc_no) 
references customer(cc_no);		


 
commit;
	insert into product
		values('0','Moose Boots','250.00','5');  
	insert into product
		values('1','Caribou Skin Boots','300.00','5');  
	insert into product
		values('2','Brown Rabbit Slippers','150.00','5');  
	insert into product
		values('3','Snow Rabbit Slippers','150.00','5');  
	insert into product
		values('4','Earring','1000.00','5');  
	insert into product
		values('5','Necklace','500.00','5');  
	insert into product
		values('6','Hair Clip','75.00','5');  
	insert into product
		values('7','Pendant','400.00','5');  
	insert into product
		values('8','Dog Sled','1000.00','5');  
	insert into product
		values('9','Wood Carving','500.00','5');  
	insert into product
		values('10','Wood Carving','1500.00','5');  
	insert into product
		values('11','Ivory Carvings','2500.00','5');  
		
commit;		
		
		
		