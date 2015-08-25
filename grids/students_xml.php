<?php

require_once("../includes/initialize.php");

global $session;

$page       = $_GET['page'];
$limit      = $_GET['rows'];
$sidx       = $_GET['sidx'];
$sord       = $_GET['sord'];

$students_count = Student::get_by_sql("SELECT * FROM ".T_STUDENTS);

$count = count($students_count);

if( $count > 0 && $limit > 0) 
{ 
	$total_pages = ceil($count / $limit); 
} 
else 
{ 
	$total_pages = 0; 
} 
 
if ($page > $total_pages) $page = $total_pages;
 
$start = $limit * $page - $limit;
 
if($start <0) $start = 0; 
if(!$sidx) $sidx = 1;

$ops = array(
        'eq'=>'=', 
        'ne'=>'<>',
        'lt'=>'<', 
        'le'=>'<=',
        'gt'=>'>', 
        'ge'=>'>=',
        'bw'=>'LIKE',
        'bn'=>'NOT LIKE',
        'in'=>'LIKE', 
        'ni'=>'NOT LIKE', 
        'ew'=>'LIKE', 
        'en'=>'NOT LIKE', 
        'cn'=>'LIKE', 
        'nc'=>'NOT LIKE' 
    );

if(isset($_GET['searchString']) && isset($_GET['searchField']) && isset($_GET['searchOper']))
{
    $searchString = $_GET['searchString'];
    $searchField = $_GET['searchField'];
    $searchOper = $_GET['searchOper'];

    foreach ($ops as $key=>$value)
    {
        if ($searchOper==$key)
        {
            $ops = $value;
        }
    }

    if($searchOper == 'eq' ) $searchString = $searchString;
    if($searchOper == 'bw' || $searchOper == 'bn') $searchString .= '%';
    if($searchOper == 'ew' || $searchOper == 'en' ) $searchString = '%'.$searchString;
    if($searchOper == 'cn' || $searchOper == 'nc' || $searchOper == 'in' || $searchOper == 'ni') $searchString = '%'.$searchString.'%';

    $where = "$searchField $ops '$searchString'"; 

    //$students = Student::get_by_sql("SELECT * FROM ".T_STUDENTS." INNER JOIN ".T_PERSONAL_INFORMATIONS." ON ".T_PERSONAL_INFORMATIONS.".student_id=".T_STUDENTS.".id WHERE ".$where." ORDER BY ".T_STUDENTS.".id $sord LIMIT $start , $limit");
    $students = Student::get_by_sql("SELECT * FROM ".T_STUDENTS." WHERE ".$where." ORDER BY $sidx $sord LIMIT $start , $limit");
}
else
{
    //$students = Student::get_by_sql("SELECT * FROM ".T_STUDENTS." INNER JOIN ".T_PERSONAL_INFORMATIONS." ON ".T_PERSONAL_INFORMATIONS.".student_id=".T_STUDENTS.".id ORDER BY ".T_STUDENTS.".id $sord LIMIT $start , $limit");
    $students = Student::get_by_sql("SELECT * FROM ".T_STUDENTS." ORDER BY $sidx $sord LIMIT $start , $limit");
}

header("Content-type: text/xml;charset=utf-8");
 
$s = "<?xml version='1.0' encoding='utf-8'?>";
$s .=  "<rows>";
$s .= "<page>".$page."</page>";
$s .= "<total>".$total_pages."</total>";
$s .= "<records>".$count."</records>";

foreach($students as $student)
{
    $s .= "<row id='". $student->id."'>";
    $s .= "<cell></cell>";
    $s .= "<cell>". $student->id."</cell>";
    $s .= "<cell>". $student->studentid."</cell>";

    //----------------------------------------------------------------------------------------------------------------------------------//

    $personInfo = PersonalInformation::get_by_id($student->personal_information_id);

    if(!$personInfo)
    {
        $personInfo = new PersonalInformation();
    }

    $s .= "<cell>". $personInfo->firstname."</cell>";
    $s .= "<cell>". $personInfo->lastname."</cell>";
    $s .= "<cell>". $personInfo->middlename."</cell>";
    $s .= "<cell>". $personInfo->address."</cell>";
    $s .= "<cell>". $personInfo->father."</cell>";
    $s .= "<cell>". $personInfo->mother."</cell>";
    $s .= "<cell>". $personInfo->guardian."</cell>";
    $s .= "<cell>". $personInfo->gender."</cell>";
    $s .= "<cell>". $personInfo->civilstatus."</cell>";
    $s .= "<cell>". $personInfo->citizenship."</cell>";
    $s .= "<cell>". $personInfo->birthday."</cell>";
    $s .= "<cell>". $personInfo->email."</cell>";
    $s .= "<cell>". $personInfo->contactnumber1."</cell>";
    $s .= "<cell>". $personInfo->contactnumber2."</cell>";
    $s .= "<cell>". $personInfo->contactnumber3."</cell>";
    $s .= "<cell>". $personInfo->emergencycontactperson."</cell>";

    //----------------------------------------------------------------------------------------------------------------------------------//

    $schoolLastAttended = SchoolLastAttended::get_by_id($student->school_last_attended_id);

    if(!$schoolLastAttended)
    {
        $schoolLastAttended = new SchoolLastAttended();
    }

    $s .= "<cell>". $schoolLastAttended->school."</cell>";
    $s .= "<cell>". $schoolLastAttended->schoolyear."</cell>";
    $s .= "<cell>". $schoolLastAttended->program."</cell>";

    //----------------------------------------------------------------------------------------------------------------------------------//

    $inquiry = Inquiry::get_by_id($student->inquiry_id);

    if(!$inquiry)
    {
        $inquiry = new Inquiry();
    }

    $s .= "<cell>". $inquiry->tuition."</cell>";
    $s .= "<cell>". $inquiry->program."</cell>";
    $s .= "<cell>". $inquiry->others."</cell>";

    //----------------------------------------------------------------------------------------------------------------------------------//

    $schoolConsidered = SchoolConsidered::get_by_id($student->school_considered_id);

    if(!$schoolConsidered)
    {
        $schoolConsidered = new SchoolConsidered();
    }

    $s .= "<cell>". $schoolConsidered->first."</cell>";
    $s .= "<cell>". $schoolConsidered->second."</cell>";
    $s .= "<cell>". $schoolConsidered->third."</cell>";

    //----------------------------------------------------------------------------------------------------------------------------------//

    $discovery = StiDiscovery::get_by_id($student->sti_discovery_id);

    if(!$discovery)
    {
        $discovery = new StiDiscovery();
    }

    $s .= "<cell>". $discovery->tv."</cell>";
    $s .= "<cell>". $discovery->radio."</cell>";
    $s .= "<cell>". $discovery->print."</cell>";
    $s .= "<cell>". $discovery->website."</cell>";
    $s .= "<cell>". $discovery->seminar."</cell>";
    $s .= "<cell>". $discovery->careerfactor."</cell>";
    $s .= "<cell>". $discovery->event."</cell>";
    $s .= "<cell>". $discovery->flyers."</cell>";
    $s .= "<cell>". $discovery->billboards."</cell>";
    $s .= "<cell>". $discovery->posters."</cell>";
    $s .= "<cell>". $discovery->stimuli."</cell>";
    $s .= "<cell>". $discovery->referrals."</cell>";
    $s .= "<cell>". $discovery->others."</cell>";

    //----------------------------------------------------------------------------------------------------------------------------------//

    $enrollmentDetail = EnrollmentDetail::get_by_id($student->enrollment_detail_id);

    if(!$enrollmentDetail)
    {
        $enrollmentDetail = new EnrollmentDetail();
    }

    $s .= "<cell>". $enrollmentDetail->status."</cell>";
    $s .= "<cell>". $enrollmentDetail->program."</cell>";
    $s .= "<cell>". $enrollmentDetail->schedule."</cell>";
    $s .= "<cell>". $enrollmentDetail->payment."</cell>";
    $s .= "<cell>". $enrollmentDetail->studentcontactnumber."</cell>";

    //----------------------------------------------------------------------------------------------------------------------------------//

    $appointmentDetail = AppointmentDetail::get_by_id($student->appointment_detail_id);

    if(!$appointmentDetail)
    {
        $appointmentDetail = new AppointmentDetail();
    }

    $s .= "<cell>". $appointmentDetail->visitschedule."</cell>";
    $s .= "<cell>". $appointmentDetail->visitpurpose."</cell>";
    $s .= "<cell>". $appointmentDetail->officer."</cell>";

    //----------------------------------------------------------------------------------------------------------------------------------//

    $s .= "<cell>". $student->datetime."</cell>";
    $s .= "<cell></cell>";
    $s .= "</row>";
}

$s .= "</rows>"; 
 
echo $s;
?>