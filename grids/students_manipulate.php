<?php

require_once("../includes/initialize.php");

global $session;

if($_POST['oper']=='add')
{
	$student 			  = new Student();
	$student->studentid   = $_POST['studentid'];
    $student->datetime    = time();
	
	//----------------------------------------------------------------------------------------------------------------------------------//

    $personInfo                         = new PersonalInformation();

    $personInfo->studentid              = "0";
    $personInfo->firstname 				= $_POST['a_firstname'];
    $personInfo->lastname 				= $_POST['a_lastname'];
    $personInfo->middlename 			= $_POST['a_middlename'];
    $personInfo->address 				= $_POST['a_address'];
    $personInfo->father 				= $_POST['a_father'];
    $personInfo->mother 				= $_POST['a_mother'];
    $personInfo->guardian 				= $_POST['a_guardian'];
    $personInfo->gender 				= $_POST['a_gender'];
    $personInfo->civilstatus 			= $_POST['a_civilstatus'];
    $personInfo->citizenship 			= $_POST['a_citizenship'];
    $personInfo->birthday 				= strtotime($_POST['a_birthday']);
    $personInfo->email 					= $_POST['a_email'];
    $personInfo->contactnumber1 		= $_POST['a_contactnumber1'];
    $personInfo->contactnumber2 		= $_POST['a_contactnumber2'];
    $personInfo->contactnumber3 		= $_POST['a_contactnumber3'];
    $personInfo->emergencycontactperson = $_POST['a_emergencycontactperson'];

    $personInfo->create();

    //----------------------------------------------------------------------------------------------------------------------------------//

    $schoolLastAttended                 = new SchoolLastAttended();

    $schoolLastAttended->studentid      = "0";
    $schoolLastAttended->school 		= $_POST['b_schoolname'];
    $schoolLastAttended->schoolyear		= $_POST['b_schoolyear'];
    $schoolLastAttended->program 		= $_POST['b_program'];

    $schoolLastAttended->create();

    //----------------------------------------------------------------------------------------------------------------------------------//

    $inquiry                            = new Inquiry();

    $inquiry->studentid                 = "0";
    $inquiry->tuition 					= $_POST['c_tuition'];
    $inquiry->program 					= $_POST['c_program'];
    $inquiry->others 					= $_POST['c_others'];

    $inquiry->create();

    //----------------------------------------------------------------------------------------------------------------------------------//

    $schoolConsidered                   = new SchoolConsidered();

    $schoolConsidered->studentid        = "0";
    $schoolConsidered->first 			= $_POST['d_first'];
    $schoolConsidered->second 			= $_POST['d_second'];
    $schoolConsidered->third 			= $_POST['d_third'];

    $schoolConsidered->create();

    //----------------------------------------------------------------------------------------------------------------------------------//

    $discovery                          = new StiDiscovery();

    $discovery->studentid               = "0";
    $discovery->tv 						= $_POST['e_tv'];
    $discovery->radio 					= $_POST['e_radio'];
    $discovery->print 					= $_POST['e_print'];
    $discovery->website 				= $_POST['e_website'];
    $discovery->seminar 				= $_POST['e_seminar'];
    $discovery->careerfactor 			= $_POST['e_careerfactor'];
    $discovery->event 					= $_POST['e_event'];
    $discovery->flyers 					= $_POST['e_flyers'];
    $discovery->billboards 				= $_POST['e_billboards'];
    $discovery->posters 				= $_POST['e_posters'];
    $discovery->stimuli 				= $_POST['e_stimuli'];
    $discovery->referrals 				= $_POST['e_referrals'];
    $discovery->others 					= $_POST['e_others'];

    $discovery->create();

    //----------------------------------------------------------------------------------------------------------------------------------//

    $enrollmentDetail                       = new EnrollmentDetail();

    $enrollmentDetail->studentid            = "0";
    $enrollmentDetail->status 				= $_POST['f_status'];
    $enrollmentDetail->program 				= $_POST['f_program'];
    $enrollmentDetail->schedule 			= $_POST['f_schedule'];
    $enrollmentDetail->payment 				= $_POST['f_payment'];
    $enrollmentDetail->studentcontactnumber = $_POST['f_studentcontactnumber'];

    $enrollmentDetail->create();

    //----------------------------------------------------------------------------------------------------------------------------------//

    $appointmentDetail                  = new AppointmentDetail();

    $appointmentDetail->studentid       = "0";
    $appointmentDetail->visitschedule 	= strtotime($_POST['g_visitschedule']);
    $appointmentDetail->visitpurpose 	= $_POST['g_visitpurpose'];
    $appointmentDetail->officer 		= $_POST['g_officer'];

    $appointmentDetail->create();

    //----------------------------------------------------------------------------------------------------------------------------------//

    $student->personal_information_id   = $personInfo->id;
    $student->school_last_attended_id  	= $schoolLastAttended->id;
    $student->inquiry_id   				= $inquiry->id;
    $student->school_considered_id   	= $schoolConsidered->id;
    $student->sti_discovery_id   		= $discovery->id;
    $student->enrollment_detail_id  	= $enrollmentDetail->id;
    $student->appointment_detail_id   	= $appointmentDetail->id;

	$student->create();

	//----------------------------------------------------------------------------------------------------------------------------------//

	$appointmentDetail->studentid 		= $student->id;
	$appointmentDetail->update();

	$enrollmentDetail->studentid 		= $student->id;
	$enrollmentDetail->update();

	$discovery->studentid 				= $student->id;
	$discovery->update();

	$schoolConsidered->studentid 		= $student->id;
	$schoolConsidered->update();

	$inquiry->studentid 				= $student->id;
	$inquiry->update();

	$schoolLastAttended->studentid 	   = $student->id;
	$schoolLastAttended->update();

	$personInfo->studentid 			   = $student->id;
	$personInfo->update();	

	//----------------------------------------------------------------------------------------------------------------------------------//

}
else if($_POST['oper']=='edit')
{
	$student 			                = Student::get_by_id($_POST['id']);

    $student->studentid                 = $_POST['studentid'];
    $student->datetime                  = time();

    $student->update();
    
    //----------------------------------------------------------------------------------------------------------------------------------//

    $personInfo                         = PersonalInformation::get_by_id($student->personal_information_id);

    $personInfo->firstname              = $_POST['a_firstname'];
    $personInfo->lastname               = $_POST['a_lastname'];
    $personInfo->middlename             = $_POST['a_middlename'];
    $personInfo->address                = $_POST['a_address'];
    $personInfo->father                 = $_POST['a_father'];
    $personInfo->mother                 = $_POST['a_mother'];
    $personInfo->guardian               = $_POST['a_guardian'];
    $personInfo->gender                 = $_POST['a_gender'];
    $personInfo->civilstatus            = $_POST['a_civilstatus'];
    $personInfo->citizenship            = $_POST['a_citizenship'];
    $personInfo->birthday               = strtotime($_POST['a_birthday']);
    $personInfo->email                  = $_POST['a_email'];
    $personInfo->contactnumber1         = $_POST['a_contactnumber1'];
    $personInfo->contactnumber2         = $_POST['a_contactnumber2'];
    $personInfo->contactnumber3         = $_POST['a_contactnumber3'];
    $personInfo->emergencycontactperson = $_POST['a_emergencycontactperson'];

    $personInfo->update();

    //----------------------------------------------------------------------------------------------------------------------------------//

    $schoolLastAttended                 = SchoolLastAttended::get_by_id($student->school_last_attended_id);

    $schoolLastAttended->school         = $_POST['b_schoolname'];
    $schoolLastAttended->schoolyear     = $_POST['b_schoolyear'];
    $schoolLastAttended->program        = $_POST['b_program'];

    $schoolLastAttended->update();

    //----------------------------------------------------------------------------------------------------------------------------------//

    $inquiry                            = Inquiry::get_by_id($student->inquiry_id);

    $inquiry->tuition                   = $_POST['c_tuition'];
    $inquiry->program                   = $_POST['c_program'];
    $inquiry->others                    = $_POST['c_others'];

    $inquiry->update();

    //----------------------------------------------------------------------------------------------------------------------------------//

    $schoolConsidered                   = SchoolConsidered::get_by_id($student->school_considered_id);

    $schoolConsidered->first            = $_POST['d_first'];
    $schoolConsidered->second           = $_POST['d_second'];
    $schoolConsidered->third            = $_POST['d_third'];

    $schoolConsidered->update();

    //----------------------------------------------------------------------------------------------------------------------------------//

    $discovery                          = StiDiscovery::get_by_id($student->sti_discovery_id);

    $discovery->tv                      = $_POST['e_tv'];
    $discovery->radio                   = $_POST['e_radio'];
    $discovery->print                   = $_POST['e_print'];
    $discovery->website                 = $_POST['e_website'];
    $discovery->seminar                 = $_POST['e_seminar'];
    $discovery->careerfactor            = $_POST['e_careerfactor'];
    $discovery->event                   = $_POST['e_event'];
    $discovery->flyers                  = $_POST['e_flyers'];
    $discovery->billboards              = $_POST['e_billboards'];
    $discovery->posters                 = $_POST['e_posters'];
    $discovery->stimuli                 = $_POST['e_stimuli'];
    $discovery->referrals               = $_POST['e_referrals'];
    $discovery->others                  = $_POST['e_others'];

    $discovery->update();

    //----------------------------------------------------------------------------------------------------------------------------------//

    $enrollmentDetail                       = EnrollmentDetail::get_by_id($student->enrollment_detail_id);

    $enrollmentDetail->status               = $_POST['f_status'];
    $enrollmentDetail->program              = $_POST['f_program'];
    $enrollmentDetail->schedule             = $_POST['f_schedule'];
    $enrollmentDetail->payment              = $_POST['f_payment'];
    $enrollmentDetail->studentcontactnumber = $_POST['f_studentcontactnumber'];

    $enrollmentDetail->update();

    //----------------------------------------------------------------------------------------------------------------------------------//

    $appointmentDetail                  = AppointmentDetail::get_by_id($student->appointment_detail_id);

    $appointmentDetail->visitschedule   = strtotime($_POST['g_visitschedule']);
    $appointmentDetail->visitpurpose    = $_POST['g_visitpurpose'];
    $appointmentDetail->officer         = $_POST['g_officer'];

    $appointmentDetail->update();

    //----------------------------------------------------------------------------------------------------------------------------------//
}
else if($_POST['oper']=='del')
{
    $student                            = Student::get_by_id($_POST['id']);
    $student->delete();

    AppointmentDetail::get_by_id($student->appointment_detail_id)->delete();
    EnrollmentDetail::get_by_id($student->enrollment_detail_id)->delete();
    StiDiscovery::get_by_id($student->sti_discovery_id)->delete();
    SchoolConsidered::get_by_id($student->school_considered_id)->delete();
    SchoolLastAttended::get_by_id($student->school_last_attended_id)->delete();
    PersonalInformation::get_by_id($student->personal_information_id)->delete();
}

?>