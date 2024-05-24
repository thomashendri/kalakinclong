<?php
include 'kala/config.php';

if(!isset($_SESSION['user'])){
    require __DIR__ ."/kinclong/login.php";
    exit;   
}

$request = $_SERVER['REQUEST_URI'];

$request = explode("/",$request);

$params = null;
if(isset($request[2])){
	$params = $request[2];
}else{
	$params = $request[1];
}

$params = explode("?",$params);

if(isset($params[1])){
    $_gets = $params[1];
    $_gets = explode("&",$_gets);
    foreach($_gets as $vall ){
        $vall = explode("=",$vall);
        if(count($vall) == 2){
           $_get[$vall[0]] =  $vall[1];
        }
    }
}

$params = $params[0];




switch ($params) {
    case 'logout' :
        require __DIR__ . '/kala/logout.php';
        break;
    case '' :
        header("Location: kinclong/dashboard");
        break;
    case 'dashboard' :
        require __DIR__ . '/kinclong/dashboard.php';
        break;
    case 'profile' :
        require __DIR__ . '/ui/profile.php';
        break;
    case 'transaction' :
        if(isset($request[3]) AND $request[3] != ""){            
            require __DIR__ . '/ui/invoice.php';
            break;
        }
        require __DIR__ . '/ui/transaction.php';
        break;
	case 'participants' :
        require __DIR__ . '/ui/participants.php';
        break;
	case 'couponstransaction' :
        require __DIR__ . '/ui/couponstransaction.php';
        break;
	case 'profileparticipant' :
        require __DIR__ . '/ui/profileparticipant.php';
        break;
	case 'crud_jersey' :
        require __DIR__ . '/ui/crud_jersey.php';
        break;
    case 'coupons' :
        require __DIR__ . '/ui/coupons.php';
        break;
    case 'import' :
        require __DIR__ . '/ui/import.php';
        break;
	case 'ticket' :
        require __DIR__ . '/ui/ticket.php';
        break;
	case 'ticketV2' :
        require __DIR__ . '/ui/ticketV2.php';
        break;
	case 'refundtransaction' :
        require __DIR__ . '/ui/refundtransaction.php';
        break;
	case 'summary_participant' :
        require __DIR__ . '/ui/summary_participant.php';
        break;
	case 'summary_participant_deleted' :
        require __DIR__ . '/ui/summary_participant_deleted.php';
        break;
	case 'summary_rpc' :
        require __DIR__ . '/ui/summary_rpc.php';
        break;		
	case 'summary_regis' :
        require __DIR__ . '/ui/summary_regis.php';
        break;
    case 'etiket' :
        require __DIR__ . '/ui/etiket.php';
        break;
    case 'runner' :
        require __DIR__ . '/ui/runner.php';
        break;
    case 'courier' :
        require __DIR__ . '/ui/courier.php';
        break;
    case 'report' :
        require __DIR__ . '/ui/report.php';
        break;
    case 'runnerreport' :
        require __DIR__ . '/ui/runnerreport.php';
        break;
    case 'timelinereportvr' :
        require __DIR__ . '/ui/timelinereportvr.php';
        break;
    case 'invite' :
        require __DIR__ . '/ui/invite.php';
        break;
	case 'ticketxyz' :
        require __DIR__ . '/ui/ticketxyz.php';
        break;
    case 'timeline' :
        require __DIR__ . '/ui/timeline.php';
        break;
    case 'timelineresi' :
        require __DIR__ . '/ui/timelineresi.php';
        break;
	case 'resend' :
        require __DIR__ . '/xyz/resend.php';
        break;
    case 'resetvr' :
        require __DIR__ . '/xyz/resetvr.php';
        break;        
    case 'garmindelete' :
        require __DIR__ . '/xyz/garmin.php';
        break;
    case 'confrimvr' :
        require __DIR__ . '/xyz/confrimvr.php';
        break;
    case 'unconfrimvr' :
        require __DIR__ . '/xyz/unconfrimvr.php';
        break;
	case 'delegation' :
        require __DIR__ . '/ui/delegation.php';
        break;
	case 'quota_payment' :
        require __DIR__ . '/ui/quota_payment.php';
        break;
	case 'quota_fast_track' :
        require __DIR__ . '/ui/quota_fast_track.php';
        break;
        case 'quota_jersey' :
        require __DIR__ . '/ui/quota_jersey.php';
        break;
	case 'bormar_2023' :
        require __DIR__ . '/ui/bormar_2023.php';
        break;

    case 'event' :
        if(isset($request[3])) change_event($request[3]);
        require __DIR__ . '/xyz/event.php';
        break;
    default:
        break;
}


function change_event($event) {
    if((int)$event <> 0 ) {
        foreach($_SESSION['user']['Events'] as $vall){
            if($vall->evnhId == $event){
                $_SESSION['user']['Event']      = $vall->evnhId;
                $_SESSION['user']['EventName']  = $vall->evnhName;
            }
        }
    }
}

?>