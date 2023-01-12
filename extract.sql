
select CONCAT(MonthName(orderDate)," ",year(orderDate)) as monthyear, 

SUM(totalAmount)-(SUM(gst)+sum(deliveryCharge)) as Earning,
format((SUM(totalAmount)-(SUM(gst)+sum(deliveryCharge)))/
((select SUM(totalAmount)-(SUM(gst)+SUM(deliveryCharge)) 
From orderscustomer  ))*100,2) as EarningRatio,
if(format(count(*)/
((select count(*) from orderscustomer )) *100,2) > 30,'BEST',"LOW") AS performance,
count(*) as totalOrderComplete ,(SELECT count(*) From orderscustomer) as orderAssign,
format(count(*)/
((select count(*) from orderscustomer )) *100,2)
as orderRatio ,
SUM(totalItem) as totalItemSale
from orderscustomer where orderStatus ="5"
 group by month(orderDate),year(orderDate) ORDER by year(orderDate),  month(orderDate);