CREATE TABLE IF NOT EXISTS department (
`id` INT AUTO_INCREMENT,
`depart_name` VARCHAR(255),
PRIMARY KEY (id)
);
CREATE TABLE iF NOT EXISTS `employee`(
`id` INT AUTO_INCREMENT,
`name` VARCHAR(255),
`mobile` VARCHAR(255),

PRIMARY KEY (id)

);
CREATE TABLE IF NOT EXISTS emp_salary (
`id` INT AUTO_INCREMENT,
`department_id` INT,
`salary` VARCHAR(255),
`added_on` DATETIME DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
PRIMARY KEY (id)
);







SELECT salary_expense FROM (SELECT  

es.salary_expense, row_number() over  
(PARTITION BY department_id order by salary desc)  as rn FROM `emp_salary`es 
left  JOIN department ON department.id=es.department_id

) t  
WHERE t.rn <=3 ;
SELECT DATE_SUB("2017-06-15", INTERVAL 10 DAY);


INSERT INTO emp_salary (department_id,salary,salary_date,employ_id)
SELECT department_id,salary+10000,DATE_SUB(salary_date, INTERVAL 1 YEAR),
employ_id FROM emp_salary
SELECT id,salary_expense,salary_date,LEAD(salary_expense) over
 (PARTITION BY department_id order by year(salary_date) desc)FROM `emp_salary`;
 SELECT * FROM (SELECT department_id,salary_expense,salary_date,LEAD(salary_expense,1) over
 (PARTITION BY department_id order by year(salary_date)) as prev_expanse_salary FROM `emp_salary`) a;


 SELECT count(*),department_id FROM (SELECT department_id,salary,salary_date,LEAD(salary,1) over
 (PARTITION BY department_id order by year(salary_date)  DESC) as prev_expanse_salary FROM `emp_salary`) a
 WHERE a.salary>a.prev_expanse_salary GROUP by department_id
 HAVING COUNT(*) >=2;