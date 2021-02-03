SELECT a.week,a.branchName,
    sum(case when a.flag = 'patient' then a.count else 0 end) patient,
    sum(case when a.flag = 'treat' then a.count else 0 end) treat,
    sum(case when a.flag = 'income' then a.count else 0 end) income
  From
  (SELECT week('2020-07-16') week,count(pm.patientId) count,hbm.branchName, 'patient' as flag 
  FROM patient_master pm
  INNER JOIN hospital_branch_master hbm on
  pm.branchId=hbm.branchId
  where pm.createdAt BETWEEN '2020-07-16' and '2020-07-23' AND hbm.franchiseid = $franchiseid
  group by hbm.branchName,week('2020-07-16')
  UNION
  SELECT week('2020-07-16') week, COUNT(pm.patientId) count,hb.branchName,'treat' as flag
  FROM patient_medication pm
  INNER join user_master um on 
  um.userId=pm.doctorId
  INNER JOIN hospital_branch_master hb 
  on hb.branchId=um.branchId 
  WHERE pm.visitDate BETWEEN '2020-07-16' AND '2020-07-23' AND hb.franchiseid = 1
  GROUP by week('2020-07-16'),hb.branchName
  UNION
  SELECT week('2020-07-16') week,SUM(opm.amount) count,hbm.branchName,'income'as  flag
  FROM opd_payment_transaction_master opm
  inner join opd_patient_payment_master oppm on
  oppm.paymentId=opm.paymentId
  INNER JOIN hospital_branch_master hbm on
  oppm.branchId=hbm.branchId
  where opm.paymentDate BETWEEN ('2020-07-16') and ('2020-07-23') AND hbm.franchiseid = $franchiseid
  group by week('2020-07-16'),hbm.branchName) a group by a.branchName,a.week;


-- procedure consumption details
SELECT a.week,a.testName,
    sum(case when a.flag = 'TestCount' then a.count else 0 end) TestCount,
    sum(case when a.flag = 'TestIncome' then a.count else 0 end) TestIncome
  
  From
  
  (SELECT COUNT(bd.testId) count,week('2020-07-16') week,tm.testName,'TestCount' as flag 
  FROM  bill_details bd INNER join diagnostic_tests_master
  tm on tm.testId=bd.testId
  Inner join opd_patient_payment_master oppm on
  oppm.paymentId=bd.paymentId
   INNER JOIN hospital_branch_master hbm ON oppm.branchId = hbm.branchId
  WHERE bd.createdAt BETWEEN ('2020-07-16') AND ('2020-07-23') AND hbm.franchiseid = $franchiseid
  GROUP by week('2020-07-16'),tm.testName
  
  UNION
  
  SELECT sum(bd.fees) count,week('2020-07-16') week,tm.testName,'TestIncome'as flag FROM  bill_details bd 
  INNER JOIN diagnostic_tests_master tm on tm.testId=bd.testId
  Inner join opd_patient_payment_master oppm on
  oppm.paymentId=bd.paymentId
   INNER JOIN hospital_branch_master hbm ON oppm.branchId = hbm.branchId
  WHERE bd.createdAt BETWEEN ('2020-07-16') AND ('2020-07-23') AND hbm.franchiseid = $franchiseid
  GROUP by week('2020-07-16'),tm.testName)a GROUP BY a.testName

  --consultant wise

  SELECT SUM(opm.amount) amount,week('2020-07-16') week, um.username FROM opd_payment_transaction_master opm
    inner join opd_patient_payment_master oppm on
    oppm.paymentId=opm.paymentId
    INNER join user_master UM on
    oppm.doctorId=um.userId
    INNER JOIN hospital_branch_master hbm ON oppm.branchId = hbm.branchId
    where opm.paymentDate BETWEEN('2020-07-16') and ('2020-07-23') AND hbm.franchiseid = $franchiseid
    group by week('2020-07-16'), um.username

--patient summery
    SELECT week('2020-07-16') week,count(pm.patientId) count,'New Registered Patients' as flag FROM patient_master pm
INNER JOIN hospital_branch_master hbm ON hbm.branchId = pm.branchId
    where pm.createdAt BETWEEN ('2020-07-16') and ('2020-07-23') AND hbm.franchiseid = $franchiseid
    group by week('2020-07-16')
    UNION
    SELECT week('2020-07-16') week,COUNT(pm.`patientId`) count,'Existing Patients' as flag FROM `patient_master` pm
    INNER JOIN hospital_branch_master hbm ON hbm.branchId = pm.branchId
    WHERE pm.`createdAt` < ('2020-07-16') AND hbm.franchiseid = $franchiseid
    GROUP BY week('2020-07-16')
    UNION
    SELECT week('2020-07-16') week,COUNT(ccf.followUp) count,'Call Center Follow Ups' as flag FROM `call_center_followups` ccf
    INNER join call_center cc on
    cc.callId=ccf.callId
    INNER JOIN hospital_branch_master hbm ON hbm.branchId = cc.branchId
    WHERE ccf.followUpDateTime  BETWEEN ('2020-07-16') and ('2020-07-23') AND hbm.franchiseid = $franchiseid
    GROUP BY week('2020-07-16')
    UNION
     SELECT week('2020-07-16') week,count(cc.callId) count, 'Referred Patients' as flag
      FROM `call_center` cc INNER JOIN call_center_patients ccp on ccp.clientId=cc.clientId
      INNER JOIN hospital_branch_master hbm ON hbm.branchId = cc.branchId
       WHERE cc.createdAt BETWEEN ('2020-07-16') and ('2020-07-23') AND hbm.franchiseid = $franchiseid
       GROUP by week('2020-07-16')
    
    UNION
    SELECT  week('2020-07-16') week,count(cc.callId) count,ccp.reference as flag FROM `call_center` cc
    INNER JOIN call_center_patients ccp on
    ccp.clientId=cc.clientId
    INNER JOIN hospital_branch_master hbm ON hbm.branchId = cc.branchId
     WHERE cc.createdAt BETWEEN ('2020-07-16') and ('2020-07-23') AND hbm.franchiseid = $franchiseid
    GROUP by ccp.reference ,week('2020-07-16')

    --package procedure consumption
    SELECT a.week,
    sum(case when a.flag = 'pkcCnt' then a.count else 0 end) ccount,
    sum(case when a.flag = 'pkgIncome' then a.count else 0 end) result,
    'Package Sales' as details
  From
(SELECT week('2020-07-16') week,count(oppm.packageId) count,'pkcCnt' as flag FROM opd_patient_payment_master oppm
 INNER JOIN hospital_branch_master hbm ON hbm.branchId = oppm.branchId
    where oppm.createdAt BETWEEN('2020-07-16') and ('2020-07-23') and oppm.isPackage=1 AND hbm.franchiseid = $franchiseid
    group by week('2020-07-16')
    UNION
    SELECT week('2020-07-16') week,sum(bd.fees) count,'pkgIncome' as flag FROM opd_patient_payment_master oppm
    inner join bill_details bd on
    oppm.paymentId=bd.paymentId
 INNER JOIN hospital_branch_master hbm ON hbm.branchId = oppm.branchId
    where bd.createdAt BETWEEN('2020-07-16') and ('2020-07-23') and oppm.isPackage=1 AND hbm.franchiseid = $franchiseid
    group by week('2020-07-16')) a GROUP BY a.week
    
    UNION
    SELECT b.week,
     sum(case when b.flag = 'testCnt' then b.count else 0 end) testCnt,
    sum(case when b.flag = 'testIncome' then b.count else 0 end) testIncome,
    'Procedure Sales' as details
  From
   ( SELECT week('2020-07-16') week,count(bd.testId) count,'testCnt' as flag FROM opd_patient_payment_master oppm
    inner join bill_details bd on
    oppm.paymentId=bd.paymentId
    INNER JOIN hospital_branch_master hbm ON hbm.branchId = oppm.branchId
    where bd.createdAt BETWEEN('2020-07-16') and ('2020-07-23') and oppm.isPackage=1 AND hbm.franchiseid = $franchiseid
    group by week('2020-07-16')
    UNION
    SELECT week('2020-07-16') week,sum(bd.fees) count,'testIncome' as flag FROM opd_patient_payment_master oppm
    inner join bill_details bd on
    oppm.paymentId=bd.paymentId
    INNER JOIN hospital_branch_master hbm ON hbm.branchId = oppm.branchId
    where bd.createdAt BETWEEN('2020-07-16') and ('2020-07-23') and oppm.isPackage=1 AND hbm.franchiseid = $franchiseid
    group by week('2020-07-16'))b GROUP by b.week

    --package consumption detail

    SELECT a.week,a.title,a.count,b.income from
    (SELECT week('2020-07-16') week,pm.title,count(oppm.packageId) count,'pkcCnt' as flag FROM opd_patient_payment_master oppm
    INNER join package_master pm on 
    pm.packageId=oppm.packageId
     INNER JOIN hospital_branch_master hbm ON hbm.branchId = oppm.branchId
    where oppm.createdAt BETWEEN('2020-07-16') and ('2020-07-23') and oppm.isPackage=1 AND hbm.franchiseid = 1
    group by week('2020-07-16'),pm.title) a
    
    inner join 
    
    (SELECT week('2020-07-16'),pm.title,sum(oppm.total) income,'pkgIncome' as flag FROM opd_patient_payment_master oppm
    INNER join package_master pm on 
    pm.packageId=oppm.packageId
          INNER JOIN hospital_branch_master hbm ON hbm.branchId = oppm.branchId
    where oppm.createdAt BETWEEN('2020-07-16') and ('2020-07-23') and oppm.isPackage=1 AND hbm.franchiseid =1
    group by week('2020-07-16'),pm.title) b
    on a.title=b.title

    --day wise

    SELECT week('$fromDate') week,COUNT(pm.patientId) count,
    DATE_FORMAT(pm.lastVisitDate, '%d-%b-%Y') date FROM patient_master pm
    INNER JOIN hospital_branch_master hbm ON hbm.branchId = pm.branchId
    where pm.lastVisitDate BETWEEN('$fromDate') and ('$toDate') AND hbm.franchiseid = $franchiseid
    GROUP BY date(pm.lastVisitDate)

    --weekly count of financial year

    SELECT  CONCAT('week',' ',week(pm.createdAt)) week,COUNT(pm.patientId) count FROM patient_master pm 
INNER JOIN hospital_branch_master hbm ON hbm.branchId = pm.branchId
    WHERE (pm.createdAt) >= '2020-03-31' and (pm.createdAt) <= '2021-04-30' AND hbm.franchiseid = 1
    GROUP BY week(pm.createdAt)