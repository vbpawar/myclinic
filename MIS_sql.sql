
SELECT a.week,a.branchName,
    sum(case when a.flag = 'patient' then a.count else 0 end) patient,
    sum(case when a.flag = 'treat' then a.count else 0 end) treat,
    sum(case when a.flag = 'income' then a.count else 0 end) income
  From
  (SELECT week('2020-06-01') week,count(pm.patientId) count,hbm.branchName, 'patient' as flag 
  FROM patient_master pm
  INNER JOIN hospital_branch_master hbm on
  pm.branchId=hbm.branchId
  where pm.createdAt BETWEEN '2020-06-01' and '2020-09-10'  AND hbm.franchiseid = 2
  group by hbm.branchName,week('2020-06-01')
  UNION
  SELECT week('2020-06-01') week, COUNT(pm.patientId) count,hb.branchName,'treat' as flag
  FROM patient_medication pm
  INNER join user_master um on 
  um.userId=pm.doctorId
  INNER JOIN hospital_branch_master hb 
  on hb.branchId=um.branchId 
  WHERE pm.visitDate BETWEEN '2020-06-01' AND '2020-09-10' AND hb.franchiseid = 2
  GROUP by week('2020-06-01'),hb.branchName
  UNION
  SELECT week('2020-06-01') week,SUM(opm.amount) count,hbm.branchName,'income'as  flag
  FROM opd_payment_transaction_master opm
  inner join opd_patient_payment_master oppm on
  oppm.paymentId=opm.paymentId
  INNER JOIN hospital_branch_master hbm on
  oppm.branchId=hbm.branchId
  where opm.paymentDate BETWEEN ('2020-06-01') and ('2020-09-10') AND hbm.franchiseid = 2
  group by week('2020-06-01'),hbm.branchName) a group by a.branchName,a.week


SELECT d.name,SUM(dsk.opening_stock) opening_stock,SUM(dsk.closing_stock) closing_stock,SUM(tabs.total_bill) secondary_sales,0 primary_sales
FROM dbo.tab_distributor d 
JOIN dbo.tab_distributor_stock ds ON ds.distributor_id=d.distributor_id
JOIN dbo.tab_distributor_stock_dtls dsk ON dsk.distributor_stock_id=ds.distributor_stock_id
JOIN dbo.tab_outlet tabo ON tabo.distributor = d.distributor_id
JOIN dbo.tab_sales_bill_details tabs ON tabs.outlet_id = tabo.outlet_id
WHERE ds.stock_updated_date='2020-06-02' AND d.zone_id IN (SELECT zone_id FROM dbo.tab_user_zone u WHERE u.user_id=39)
GROUP BY d.name

Select  [Distributor_Name], [Outlet_Name],IsNull([1],0) [Week_1],IsNull([2],0) as 'Week_2',
IsNull([3],0) as 'Week_3',IsNull([4],0) as 'Week_4',IsNull([5], 0) as 'Week_5'
From(Select  tabd.name as [Distributor_Name], tabo.name as [Outlet_Name],DATEDIFF(week, DATEADD(MONTH, DATEDIFF(MONTH, 0, sales_date), 0), sales_date) +1 as [Weeks],
ts.total_price as 'Sale' From dbo.tab_sale ts
join tab_outlet tabo on ts.outlet_id = tabo.outlet_id
join tab_distributor tabd on tabo.distributor = tabd.distributor_id
Where DatePart(Month, sales_date)= 6
AND tabd.name like 'PUNIT%' 
AND tabo.name in (select tu.[name] from tab_outlet tu where tu.outlet_id IN (2,3,6)  ))p
Pivot (Sum(Sale) for Weeks in ([1],[2],[3],[4],[5])) as pv

Select  [Distributor_Name], [Outlet_Name],IsNull([4],0) [Week_1]
From(Select  tabd.name as [Distributor_Name], tabo.name as [Outlet_Name],DATEDIFF(week, DATEADD(MONTH, DATEDIFF(MONTH, 0, sales_date), 0), sales_date) +1 as [Weeks],
ts.total_price as 'Sale' From dbo.tab_sale ts
join tab_outlet tabo on ts.outlet_id = tabo.outlet_id
join tab_distributor tabd on tabo.distributor = tabd.distributor_id
Where DatePart(Month, sales_date)= 6
AND tabd.name like 'PUNIT%' 
AND tabo.name in (select tu.[name] from tab_outlet tu where tu.outlet_id IN (2,3,6)  ))p
Pivot (Sum(Sale) for Weeks in ([4])) as pv

 Select  [Distributor_Name], [Outlet_Name],

        IsNull([1],0) as 'Week_1',

        IsNull([2],0) as 'Week_2',

        IsNull([3],0) as 'Week_3',

        IsNull([4],0) as 'Week_4',

        IsNull([5], 0) as 'Week_5'
From
(
Select  tabd.name as [Distributor_Name], tabo.name as [Outlet_Name],
        DATEDIFF(week, DATEADD(MONTH, DATEDIFF(MONTH, 0, sales_date), 0), sales_date) +1 as [Weeks],
        ts.total_price as 'Sale'
From dbo.tab_sale ts
    join tab_outlet tabo on ts.outlet_id = tabo.outlet_id
       join tab_distributor tabd on tabo.distributor = tabd.distributor_id
Where DatePart(Month, sales_date)='3'
AND tabd.name = 'PUNIT BALAN GROUP LLP'
AND tabo.name in (select tu.[name] from tab_outlet tu where tu.outlet_id IN (?)  ))p
Pivot (Sum(Sale) for Weeks in ([1],[2],[3],[4],[5])) as pv


tab_distributor_stock
tab_distributor_stock_dtls
-- https://mariadb.com/resources/blog/json-with-mariadb-10-2/
-- JSON DATA
SELECT id,
JSON_VALUE(log,'$.name') AS Name,
CONCAT(JSON_VALUE(log,'$.friends[0].name'),',',JSON_VALUE(log,'$.friends[1].name')) AS friends
FROM Logs WHERE JSON_VALUE(log,'$.index') > 0

-- useractivity
-- ouletvisited

-- [{
-- origin: { lat: 24.799448, lng: 120.979021 },
-- destination: { lat: 24.799524, lng: 24.799524 },
-- },
-- {
-- origin: { lat: 6.4319639, lng: 79.9983415 },
-- destination: { lat: 6.73906232, lng: 80.15640132 },
-- }]
SELECT ov.outlet_visited_id,ua.activity_date,ua.lat_start,ua.lat_end,ov.user_id,ov.latitude,ov.longitude,ov.outlet_id 
FROM dbo.tab_user_activites ua INNER JOIN 
dbo.tab_outlet_visited ov ON ov.user_id = ua.user_id 
WHERE ua.activity_date =  '2020-09-16'  AND ua.user_id IN(55) AND CAST(ov.visited_date_time AS DATE) = (SELECT TOP 1 CAST(ov.visited_date_time AS DATE)
FROM dbo.tab_outlet_visited ov
WHERE CAST(ov.visited_date_time AS DATE) = '2020-09-16'
ORDER BY ov.outlet_visited_id DESC);

SELECT TOP 1 ov.outlet_visited_id,ua.activity_date,ua.lat_start,ua.lat_end,ov.user_id,ov.latitude,ov.longitude,ov.outlet_id 
FROM dbo.tab_user_activites ua JOIN 
dbo.tab_outlet_visited ov ON ov.user_id = ua.user_id 
WHERE ua.activity_date =  '2020-07-25'  AND ua.user_id IN(51) AND CAST(ov.visited_date_time AS DATE) = '2020-07-25'
ORDER BY ov.outlet_visited_id DESC

SELECT ov.outlet_visited_id,ua.activity_date,ua.lat_start,ua.lat_end,ov.user_id,ov.latitude,ov.longitude,ov.outlet_id 
FROM dbo.tab_user_activites ua INNER JOIN 
dbo.tab_outlet_visited ov ON ov.user_id = ua.user_id 
WHERE ua.activity_date =  '2020-07-25'  AND ua.user_id IN(25,51) AND CAST(ov.visited_date_time AS DATE) =(SELECT TOP 1 CAST(ov.visited_date_time AS DATE)
FROM dbo.tab_outlet_visited ov
WHERE CAST(ov.visited_date_time AS DATE) = '2020-07-25'
ORDER BY ov.outlet_visited_id DESC)
ORDER BY ov.outlet_visited_id DESC

SELECT ua.user_id 
FROM dbo.tab_user_activites ua 
WHERE ua.activity_date =  '2020-07-25'  AND ua.user_id IN(25,51)
UNION
SELECT  ov.user_id
FROM dbo.tab_outlet_visited ov
WHERE CAST(ov.visited_date_time AS DATE) = '2020-07-25' AND ov.user_id IN(25,51)

SELECT ua.user_id userid,ua.long_start lstart,ua.lat_start latstart 
FROM dbo.tab_user_activites ua 
WHERE ua.activity_date =  '2020-07-25'  AND ua.user_id IN(25,51)

SELECT  MAX(ov.outlet_visited_id) as outlet,ov.latitude olat,ov.user_id ouser,ov.longitude olong
FROM dbo.tab_outlet_visited ov
WHERE CAST(ov.visited_date_time AS DATE) = '2020-07-25' AND ov.user_id IN(25,51)
group by ov.user_id,ov.latitude,ov.longitude
order by ov.user_id

SELECT userid,lstart,latstart,outlet,olat,olong FROM(
SELECT  ua.user_id userid,ua.long_start lstart,ua.lat_start latstart,NULL outlet,NULL olat,NULL olong
FROM dbo.tab_user_activites ua 
WHERE ua.activity_date =  '2020-07-25'  AND ua.user_id IN(25,51)
GROUP BY ua.user_id,ua.long_start,ua.lat_start
UNION
SELECT  ov.user_id userid,NULL lstart,NULL latstart,MAX(ov.outlet_visited_id) as outlet,ov.latitude olat,ov.longitude olong
FROM dbo.tab_outlet_visited ov
WHERE CAST(ov.visited_date_time AS DATE) = '2020-07-25' AND ov.user_id IN(25,51)
group by ov.user_id,ov.latitude,ov.longitude) P GROUP BY userid,lstart,latstart,outlet,olong,olat

SELECT MAX(ov.outlet_visited_id) AS outlet_visited_id,ua.lat_start,ua.long_end,ov.latitude,ov.longitude
FROM dbo.tab_user_activites ua INNER JOIN dbo.tab_outlet_visited ov
ON ua.user_id = ov.user_id WHERE ua.user_id IN(25,51) AND ua.activity_date = CAST(ov.visited_date_time AS DATE) AND ua.activity_date = '2020-07-25'
GROUP BY ua.user_id,ua.activity_date,ua.lat_start,ua.long_end,ov.latitude,ov.longitude
ORDER BY ua.user_id

SELECT MAX(ov.outlet_visited_id) AS outlet_visited_id,ua.lat_start,ua.long_end,ov.latitude,ov.longitude\r\n" + 
					"FROM dbo.tab_user_activites ua INNER JOIN dbo.tab_outlet_visited ov\r\n" + 
					"ON ua.user_id = ov.user_id WHERE ua.user_id IN(25,51) AND ua.activity_date = CAST(ov.visited_date_time AS DATE) AND ua.activity_date = '"+todayDate1+"'\r\n" + 
					"GROUP BY ua.user_id,ua.activity_date,ua.lat_start,ua.long_end,ov.latitude,ov.longitude\r\n" + 
					"ORDER BY ua.user_id