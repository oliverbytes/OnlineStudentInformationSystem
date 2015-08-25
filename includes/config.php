<?php 

/* 
	BY NEMORY OLIVER MARTINEZ - nemoryoliver@gmail.com
*/

// ----------------------------------------- APP PROPERTIES ---------------------------------------------------- //

defined('APP_TITLE') ? null :										define("APP_TITLE"											, "STI Student Information System");

// ----------------------------------------- USERS ---------------------------------------------------- //

defined('T_USERS') ? null :											define("T_USERS"											, "users");
defined('C_USER_ID') ? null : 										define("C_USER_ID"											, "id");
defined('C_USER_LEVEL') ? null : 									define("C_USER_LEVEL"										, "level");
defined('C_USER_NAME') ? null : 									define("C_USER_NAME"										, "name");
defined('C_USER_USERNAME') ? null : 								define("C_USER_USERNAME"									, "username");
defined('C_USER_PASSWORD') ? null : 								define("C_USER_PASSWORD"									, "password");
defined('C_USER_DATETIME') ? null : 								define("C_USER_DATETIME"									, "datetime");

// ----------------------------------------- STUDENTS ---------------------------------------------------- //

defined('T_STUDENTS') ? null :										define("T_STUDENTS"											, "students");
defined('C_STUDENT_ID') ? null : 									define("C_STUDENT_ID"										, "id");
defined('C_STUDENT_STUDENTID') ? null : 							define("C_STUDENT_STUDENTID"								, "studentid");
defined('C_STUDENT_PERSONAL_INFORMATION_ID') ? null : 				define("C_STUDENT_PERSONAL_INFORMATION_ID"					, "personal_information_id");
defined('C_STUDENT_SCHOOL_LAST_ATTENDED_ID') ? null : 				define("C_STUDENT_SCHOOL_LAST_ATTENDED_ID"					, "school_last_attended_id");
defined('C_STUDENT_INQUIRY_ID') ? null : 							define("C_STUDENT_INQUIRY_ID"								, "inquiry_id");
defined('C_STUDENT_SCHOOL_CONSIDERED_ID') ? null : 					define("C_STUDENT_SCHOOL_CONSIDERED_ID"						, "school_considered_id");
defined('C_STUDENT_STI_DISCOVERY_ID') ? null : 						define("C_STUDENT_STI_DISCOVERY_ID"							, "sti_discovery_id");
defined('C_STUDENT_ENROLLMENT_DETAIL_ID') ? null : 					define("C_STUDENT_ENROLLMENT_DETAIL_ID"						, "enrollment_detail_id");
defined('C_STUDENT_APPOINTMENT_DETAIL_ID') ? null : 				define("C_STUDENT_APPOINTMENT_DETAIL_ID"					, "appointment_detail_id");
defined('C_STUDENT_DATETIME') ? null : 								define("C_STUDENT_DATETIME"									, "datetime");

// ----------------------------------------- PERSONAL INFORMATIONS ---------------------------------------------------- //

defined('T_PERSONAL_INFORMATIONS') ? null :							define("T_PERSONAL_INFORMATIONS"							, "personal_informations");
defined('C_PERSONAL_INFORMATION_ID') ? null : 						define("C_PERSONAL_INFORMATION_ID"							, "id");
defined('C_PERSONAL_INFORMATION_STUDENTID') ? null : 				define("C_PERSONAL_INFORMATION_STUDENTID"					, "studentid");
defined('C_PERSONAL_INFORMATION_FIRSTNAME') ? null : 				define("C_PERSONAL_INFORMATION_FIRSTNAME"					, "firstname");
defined('C_PERSONAL_INFORMATION_LASTNAME') ? null : 				define("C_PERSONAL_INFORMATION_LASTNAME"					, "lastname");
defined('C_PERSONAL_INFORMATION_MIDDLENAME') ? null : 				define("C_PERSONAL_INFORMATION_MIDDLENAME"					, "middlename");
defined('C_PERSONAL_INFORMATION_ADDRESS') ? null : 					define("C_PERSONAL_INFORMATION_ADDRESS"						, "address");
defined('C_PERSONAL_INFORMATION_FATHER') ? null : 					define("C_PERSONAL_INFORMATION_FATHER"						, "father");
defined('C_PERSONAL_INFORMATION_MOTHER') ? null : 					define("C_PERSONAL_INFORMATION_MOTHER"						, "mother");
defined('C_PERSONAL_INFORMATION_GUARDIAN') ? null : 				define("C_PERSONAL_INFORMATION_GUARDIAN"					, "guardian");
defined('C_PERSONAL_INFORMATION_GENDER') ? null : 					define("C_PERSONAL_INFORMATION_GENDER"						, "gender");
defined('C_PERSONAL_INFORMATION_CIVILSTATUS') ? null : 				define("C_PERSONAL_INFORMATION_CIVILSTATUS"					, "civilstatus");
defined('C_PERSONAL_INFORMATION_CITIZENSHIP') ? null : 				define("C_PERSONAL_INFORMATION_CITIZENSHIP"					, "citizenship");
defined('C_PERSONAL_INFORMATION_BIRTHDAY') ? null : 				define("C_PERSONAL_INFORMATION_BIRTHDAY"					, "birthday");
defined('C_PERSONAL_INFORMATION_EMAIL') ? null : 					define("C_PERSONAL_INFORMATION_EMAIL"						, "email");
defined('C_PERSONAL_INFORMATION_CONTACTNUMBER1') ? null : 			define("C_PERSONAL_INFORMATION_CONTACTNUMBER1"				, "contactnumber1");
defined('C_PERSONAL_INFORMATION_CONTACTNUMBER2') ? null : 			define("C_PERSONAL_INFORMATION_CONTACTNUMBER2"				, "contactnumber2");
defined('C_PERSONAL_INFORMATION_CONTACTNUMBER3') ? null : 			define("C_PERSONAL_INFORMATION_CONTACTNUMBER3"				, "contactnumber3");
defined('C_PERSONAL_INFORMATION_EMERGENCY_CONTACT_PERSON') ? null : define("C_PERSONAL_INFORMATION_EMERGENCY_CONTACT_PERSON"	, "emergencycontactperson");
defined('C_PERSONAL_INFORMATION_DATETIME') ? null : 				define("C_PERSONAL_INFORMATION_DATETIME"					, "datetime");

// ----------------------------------------- SCHOOLS LAST ATTENDED ---------------------------------------------------- //

defined('T_SCHOOLS_LAST_ATTENDED') ? null :							define("T_SCHOOLS_LAST_ATTENDED"							, "schools_last_attended");
defined('C_SCHOOL_LAST_ATTENDED_ID') ? null : 						define("C_SCHOOL_LAST_ATTENDED_ID"							, "id");
defined('C_SCHOOL_LAST_ATTENDED_STUDENTID') ? null : 				define("C_SCHOOL_LAST_ATTENDED_STUDENTID"					, "studentid");
defined('C_SCHOOL_LAST_ATTENDED_SCHOOL') ? null : 					define("C_SCHOOL_LAST_ATTENDED_SCHOOL"						, "school");
defined('C_SCHOOL_LAST_ATTENDED_SCHOOLYEAR') ? null : 				define("C_SCHOOL_LAST_ATTENDED_SCHOOLYEAR"					, "schoolyear");
defined('C_SCHOOL_LAST_ATTENDED_PROGRAM') ? null : 					define("C_SCHOOL_LAST_ATTENDED_PROGRAM"						, "program");
defined('C_SCHOOL_LAST_ATTENDED_DATETIME') ? null : 				define("C_SCHOOL_LAST_ATTENDED_DATETIME"					, "datetime");

// ----------------------------------------- INQUIRIES ---------------------------------------------------- //

defined('T_INQUIRIES') ? null :										define("T_INQUIRIES"										, "inquiries");
defined('C_INQUIRY_ID') ? null : 									define("C_INQUIRY_ID"										, "id");
defined('C_INQUIRY_STUDENTID') ? null : 							define("C_INQUIRY_STUDENTID"								, "studentid");
defined('C_INQUIRY_TUITION') ? null : 								define("C_INQUIRY_TUITION"									, "tuition");
defined('C_INQUIRY_PROGRAM') ? null : 								define("C_INQUIRY_PROGRAM"									, "program");
defined('C_INQUIRY_OTHERS') ? null : 								define("C_INQUIRY_OTHERS"									, "others");
defined('C_INQUIRY_DATETIME') ? null : 								define("C_INQUIRY_DATETIME"									, "datetime");
	
// ----------------------------------------- OTHER SCHOOLS CONSIDERED ---------------------------------------------------- //

defined('T_SCHOOLS_CONSIDERED') ? null :							define("T_SCHOOLS_CONSIDERED"								, "schools_considered");
defined('C_SCHOOL_CONSIDERED_ID') ? null : 							define("C_SCHOOL_CONSIDERED_ID"								, "id");
defined('C_SCHOOL_CONSIDERED_STUDENTID') ? null : 					define("C_SCHOOL_CONSIDERED_STUDENTID"						, "studentid");
defined('C_SCHOOL_CONSIDERED_FIRST') ? null : 						define("C_SCHOOL_CONSIDERED_FIRST"							, "first");
defined('C_SCHOOL_CONSIDERED_SECOND') ? null : 						define("C_SCHOOL_CONSIDERED_SECOND"							, "second");
defined('C_SCHOOL_CONSIDERED_THIRD') ? null : 						define("C_SCHOOL_CONSIDERED_THIRD"							, "third");
defined('C_SCHOOL_CONSIDERED_DATETIME') ? null : 					define("C_SCHOOL_CONSIDERED_DATETIME"						, "datetime");

// ----------------------------------------- STUDENT'S DISCOVERY OF STI ---------------------------------------------------- //

defined('T_STI_DISCOVERIES') ? null :								define("T_STI_DISCOVERIES"									, "sti_discoveries");
defined('C_STI_DISCOVERY_ID') ? null : 								define("C_STI_DISCOVERY_ID"									, "id");
defined('C_STI_DISCOVERY_STUDENTID') ? null : 						define("C_STI_DISCOVERY_STUDENTID"							, "studentid");
defined('C_STI_DISCOVERY_TV') ? null : 								define("C_STI_DISCOVERY_TV"									, "tv");
defined('C_STI_DISCOVERY_RADIO') ? null : 							define("C_STI_DISCOVERY_RADIO"								, "radio");
defined('C_STI_DISCOVERY_PRINT') ? null : 							define("C_STI_DISCOVERY_PRINT"								, "print");
defined('C_STI_DISCOVERY_WEBSITE') ? null : 						define("C_STI_DISCOVERY_WEBSITE"							, "website");
defined('C_STI_DISCOVERY_SEMINAR') ? null : 						define("C_STI_DISCOVERY_SEMINAR"							, "seminar");
defined('C_STI_DISCOVERY_CAREERFACTOR') ? null : 					define("C_STI_DISCOVERY_CAREERFACTOR"						, "careerfactor");
defined('C_STI_DISCOVERY_EVENT') ? null : 							define("C_STI_DISCOVERY_EVENT"								, "event");
defined('C_STI_DISCOVERY_FLYERS') ? null : 							define("C_STI_DISCOVERY_FLYERS"								, "flyers");
defined('C_STI_DISCOVERY_BILLBOARDS') ? null : 						define("C_STI_DISCOVERY_BILLBOARDS"							, "billboards");
defined('C_STI_DISCOVERY_POSTERS') ? null : 						define("C_STI_DISCOVERY_POSTERS"							, "posters");
defined('C_STI_DISCOVERY_STIMULI') ? null : 						define("C_STI_DISCOVERY_STIMULI"							, "stimuli");
defined('C_STI_DISCOVERY_REFERRALS') ? null : 						define("C_STI_DISCOVERY_REFERRALS"							, "referrals");
defined('C_STI_DISCOVERY_OTHERS') ? null : 							define("C_STI_DISCOVERY_OTHERS"								, "others");
defined('C_STI_DISCOVERY_DATETIME') ? null : 						define("C_STI_DISCOVERY_DATETIME"							, "datetime");

// ----------------------------------------- ENROLLMENT DETAILS ---------------------------------------------------- //

defined('T_ENROLLMENT_DETAILS') ? null :							define("T_ENROLLMENT_DETAILS"								, "enrollment_details");
defined('C_ENROLLMENT_DETAIL_ID') ? null : 							define("C_ENROLLMENT_DETAIL_ID"								, "id");
defined('C_ENROLLMENT_DETAIL_STUDENTID') ? null : 					define("C_ENROLLMENT_DETAIL_STUDENTID"						, "studentid");
defined('C_ENROLLMENT_DETAIL_STATUS') ? null : 						define("C_ENROLLMENT_DETAIL_STATUS"							, "status");
defined('C_ENROLLMENT_DETAIL_PROGRAM') ? null : 					define("C_ENROLLMENT_DETAIL_PROGRAM"						, "program");
defined('C_ENROLLMENT_DETAIL_SCHEDULE') ? null : 					define("C_ENROLLMENT_DETAIL_SCHEDULE"						, "schedule");
defined('C_ENROLLMENT_DETAIL_PAYMENT') ? null : 					define("C_ENROLLMENT_DETAIL_PAYMENT"						, "payment");
defined('C_ENROLLMENT_DETAIL_STUDENTCONTACTNUMBER') ? null : 		define("C_ENROLLMENT_DETAIL_STUDENTCONTACTNUMBER"			, "studentcontactnumber");
defined('C_ENROLLMENT_DETAIL_DATETIME') ? null : 					define("C_ENROLLMENT_DETAIL_DATETIME"						, "datetime");

// ----------------------------------------- APPOINTMENTDETAILS ---------------------------------------------------- //

defined('T_APPOINTMENT_DETAILS') ? null :							define("T_APPOINTMENT_DETAILS"								, "appointment_details");
defined('C_APPOINTMENT_DETAIL_ID') ? null : 						define("C_APPOINTMENT_DETAIL_ID"							, "id");
defined('C_APPOINTMENT_DETAIL_STUDENTID') ? null : 					define("C_APPOINTMENT_DETAIL_STUDENTID"						, "studentid");
defined('C_APPOINTMENT_DETAIL_VISITSCHEDULE') ? null : 				define("C_APPOINTMENT_DETAIL_VISITSCHEDULE"					, "visitschedule");
defined('C_APPOINTMENT_DETAIL_VISITPURPOSE') ? null : 				define("C_APPOINTMENT_DETAIL_VISITPURPOSE"					, "visitpurpose");
defined('C_APPOINTMENT_DETAIL_OFFICER') ? null : 					define("C_APPOINTMENT_DETAIL_OFFICER"						, "officer");
defined('C_APPOINTMENT_DETAIL_DATETIME') ? null : 					define("C_APPOINTMENT_DETAIL_DATETIME"						, "datetime");

/* 
	BY NEMORY OLIVER MARTINEZ - nemoryoliver@gmail.com
*/

?>