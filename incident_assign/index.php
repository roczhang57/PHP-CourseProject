<?php
require('../model/database.php');
require('../model/customer_db.php');
require('../model/product_db.php');
require('../model/incident_db.php');
require('../model/technician_db.php');

session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_incidents';
    }
}

//instantiate variable(s)
$email = '';

switch ($action) {
    case 'list_incidents':
        $incidents = get_incidents_unassigned();
        include('incident_list.php');
        break;
    case 'select_incident':
        $incident_id = filter_input(INPUT_POST, 'incident_id');
        $_SESSION['incidentID'] = $incident_id;
        $technicians = TechnicianDB::get_technicians_with_count();
        include('technician_select.php');
        break;
    case 'assign_incident':
        $technician_id = filter_input(INPUT_POST, 'technician_id');
        $_SESSION['technicianID'] = $technician_id;
        $technician = TechnicianDB::get_technician($technician_id);
        $incident = get_incident($_SESSION['incidentID']);
        $customer = get_customer($incident['customerID']);
        include('incident_assign.php');
        break;
    case 'submit_assign':
        assign_incident($_SESSION['incidentID'], $_SESSION['technicianID']);
        unset($_SESSION['incidentID']);
        unset($_SESSION['technicianID']);
        $message = "This incident was assgined to a technician.";
        include('incident_assign.php');
        break;

}
?>