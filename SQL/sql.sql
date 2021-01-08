CREATE DATABASE `colour_manage`;
CREATE TABLE `user`(account VARCHAR(10) COMMENT '使用者帳號',password VARCHAR(10)COMMENT '使用者密碼',grade VARCHAR(10)COMMENT '0為一般帳號 1為管理員帳號');
INSERT INTO user (account, password,grade) VALUES ("DVD", "DVD",0);
INSERT INTO user (account, password,grade) VALUES ("ADMIN", "1234",1);
CREATE TABLE `colour_manage`(pan VARCHAR(10) COMMENT 'PAN',guest VARCHAR(10)COMMENT '客戶',Book_Name VARCHAR(20)COMMENT '書名'
							,content VARCHAR(20)COMMENT '內容',number VARCHAR(10)COMMENT '色票號碼',Remarks VARCHAR(100)COMMENT '備註'
							,proportion VARCHAR(100)COMMENT '油墨比例',insert_date datetime  COMMENT '新增時間',id INT(10) NOT NULL AUTO_INCREMENT,PRIMARY KEY(id));

CREATE TABLE `log`(account VARCHAR(10) COMMENT '使用者帳號',execute_sql VARCHAR(100)COMMENT 'sql語句',time_date datetime  COMMENT '執行時間',id INT(10) NOT NULL AUTO_INCREMENT,PRIMARY KEY(id));

CREATE TABLE `account_Usage_record`(account VARCHAR(10) COMMENT '使用者帳號',log_in_time_date datetime  COMMENT '登入時間',log_out_time_date datetime  COMMENT '登出時間',id INT(10) NOT NULL AUTO_INCREMENT,PRIMARY KEY(id));
