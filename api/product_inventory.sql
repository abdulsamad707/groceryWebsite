SELECT products.productName,products.image,products.productName,orderdetail.qty,orderdetail.price
,orderdetail.price*orderdetail.qty as revenue
from  
orderdetail left join products on orderdetail.product_id=products.id
left join orderscustomer on 
orderdetail.order_id=orderscustomer.id
WHERE orderscustomer.orderStatus="5"
group by product_id;