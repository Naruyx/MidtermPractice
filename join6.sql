/*Notice how this joins every record to every other record*/
SELECT c.firstName, c.lastName, a.line1, a.city, a.state, a.zipCode
FROM customers c, addresses a 
order by lastName;

/*Add a customer condition to the join*/
SELECT c.firstName, c.lastName, a.line1, a.city, a.state, a.zipCode
FROM customers c, addresses a 
Where c.customerID = a.customerID
order by lastName;

/*Display billing address*/
SELECT c.firstName, c.lastName, a.line1, a.city, a.state, a.zipCode
FROM customers c, addresses a 
Where c.customerID = a.customerID and a.addressID = c.billingAddressID
order by lastName;