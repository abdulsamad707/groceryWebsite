SELECT * from riderrating
LEFT JOIN  deliveryboy  on riderrating.rider_id=deliveryboy.id
LEFT JOIN users on riderrating.user_id=users.id

where riderrating.rider_id="1"