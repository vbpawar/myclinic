--new registrations
SELECT COUNT(pm.patientId),pm.firstVisitDate FROM patient_master pm WHERE pm.firstVisitDate BETWEEN '2020-02-10' AND '2020-02-29' GROUP BY pm.firstVisitDate
--billed patients
SELECT COUNT(opt.transactionId),opt.paymentDate
FROM opd_payment_transaction_master opt WHERE opt.paymentDate BETWEEN '2020-02-15' AND '2020-02-29' GROUP BY opt.paymentDate
--opd payments
SELECT COUNT(opt.transactionId) c,opt.paymentDate,SUM(opt.amount) amount
FROM opd_payment_transaction_master opt INNER JOIN opd_patient_payment_master opd ON opd.paymentId = opt.paymentId
WHERE opt.paymentDate BETWEEN '2020-02-15' AND '2020-02-29' AND opd.isPackage = 0 GROUP BY opt.paymentDate

--opd payments 
SELECT SUM(billedP) billedP,paymentDate,SUM(amount),SUM(total) total,SUM(newR) newR FROM(
SELECT COUNT(opt.transactionId) billedP,opt.paymentDate paymentDate,SUM(opt.amount) amount,SUM(opd.total) total,0 newR
FROM opd_payment_transaction_master opt INNER JOIN opd_patient_payment_master opd ON opd.paymentId = opt.paymentId WHERE opt.paymentDate BETWEEN '2020-02-10' AND '2020-03-29' AND opd.isPackage = 0 GROUP BY opt.paymentDate
    UNION
SELECT 0 billedP,pm.firstVisitDate paymentDate,0 amount,0 total,COUNT(pm.patientId) newR FROM patient_master pm WHERE pm.firstVisitDate BETWEEN '2020-02-10' AND '2020-03-29' GROUP BY pm.firstVisitDate) T GROUP BY paymentDate