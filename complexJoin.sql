SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
FROM Orders
INNER JOIN Customers
ON Orders.CustomerID=Customers.CustomerID;


SELECT object.id, object.price , object.description
FROM object
INNER JOIN user_cart
on object.id=user_cart.item_id and user_cart.user_id = $usrid;



SELECT * FROM user WHERE userid > 2 LIMIT 3, 4