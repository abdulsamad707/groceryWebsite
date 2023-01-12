select deliveryboy.id as riderid,count(assignorder.deliveryboyid) as
 orderassigned,username,mobile,
(select count(*) from orderscustomer where deliveryboyid=deliveryboy.id) as ordercomplete,

(select IFNULL(sum(deliveryCharge),"0") from orderscustomer where deliveryboyid=deliveryboy.id) as earning,
(select IFNULL(format(avg(rating),2),"0.00") from riderrating where rider_id=deliveryboy.id) as avgrating
,IFNULL(format((select count(*) from orderscustomer where deliveryboyid=deliveryboy.id)/(count(assignorder.deliveryboyid))*100,2),"0.00") as completeratio,
CASE
WHEN (SELECT format(avg(rating),2) from riderrating where rider_id=deliveryboy.id)>4.5 THEN "EXCELLENT"
WHEN  (SELECT format(avg(rating),2) from riderrating where rider_id=deliveryboy.id)>4 THEN "GOOD"
WHEN  (SELECT format(avg(rating),2) from riderrating where rider_id=deliveryboy.id)>3.5 THEN "AVERAGE"
WHEN  (SELECT format(avg(rating),2) from riderrating where rider_id=deliveryboy.id)>3 THEN "BELOW AVERAGE"
WHEN  (SELECT format(avg(rating),2) from riderrating where rider_id=deliveryboy.id)>=0 AND (SELECT format(avg(rating),2) 

from riderrating where rider_id=deliveryboy.id) <3  THEN "BAD"
ELSE "Not Rated Yet"

END AS riderperformance
from deliveryboy left JOIN assignorder 
 ON assignorder.deliveryboyid=deliveryboy.id 

GROUP by deliveryboy.id
